<?php

namespace Botble\Contact\Http\Controllers;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\EmailHandler;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Contact\Events\SentContactEvent;
use Botble\Contact\Forms\Fronts\ContactForm;
use Botble\Contact\Http\Requests\ContactRequest;
use Botble\Contact\Models\Contact;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PublicController extends BaseController
{
    public function postSendContact(ContactRequest $request)
    {
        $blacklistDomains = setting('blacklist_email_domains');

        if ($blacklistDomains) {
            $emailDomain = Str::after(strtolower($request->input('email')), '@');

            $blacklistDomains = collect(json_decode($blacklistDomains, true))->pluck('value')->all();

            if (in_array($emailDomain, $blacklistDomains)) {
                return $this
                    ->httpResponse()
                    ->setError()
                    ->setMessage(__('Your email is in blacklist. Please use another email address.'));
            }
        }

        $blacklistWords = trim(setting('blacklist_keywords', ''));

        if ($blacklistWords) {
            $content = strtolower($request->input('content'));

            $badWords = collect(json_decode($blacklistWords, true))
                ->filter(function ($item) use ($content) {
                    $matches = [];
                    $pattern = '/\b' . preg_quote($item['value'], '/') . '\b/iu';

                    return preg_match($pattern, $content, $matches, PREG_UNMATCHED_AS_NULL);
                })
                ->pluck('value')
                ->all();

            if (! empty($badWords)) {
                return $this
                    ->httpResponse()
                    ->setError()
                    ->setMessage(__('Your message contains blacklist words: ":words".', ['words' => implode(', ', $badWords)]));
            }
        }

        do_action('form_extra_fields_validate', $request, ContactForm::class);

        $receiverEmails = null;

        if ($receiverEmailsSetting = setting('receiver_emails', '')) {
            $receiverEmails = trim($receiverEmailsSetting);
        }

        if ($receiverEmails) {
            $receiverEmails = collect(json_decode($receiverEmails, true))
                ->pluck('value')
                ->all();
        }

        try {
            $form = ContactForm::create();

            $form->saving(function (ContactForm $form) use ($receiverEmails) {
                $form
                    ->getModel()
                    ->fill($form->getRequestData())
                    ->save();

                /**
                 * @var Contact $contact
                 */
                $contact = $form
                    ->getModel();

                event(new SentContactEvent($contact));

                $args = [];

                if ($contact->name && $contact->email) {
                    $args = ['replyTo' => [$contact->name => $contact->email]];
                }

                EmailHandler::setModule(CONTACT_MODULE_SCREEN_NAME)
                    ->setVariableValues([
                        'contact_name' => $contact->name ?? 'N/A',
                        'contact_subject' => $contact->subject ?? 'N/A',
                        'contact_email' => $contact->email ?? 'N/A',
                        'contact_phone' => $contact->phone ?? 'N/A',
                        'contact_address' => $contact->address ?? 'N/A',
                        'contact_content' => $contact->content ?? 'N/A',
                    ])
                    ->sendUsingTemplate('notice', $receiverEmails ?: null, $args);
            });

            return $this
                ->httpResponse()
                ->setMessage(__('Send message successfully!'));
        } catch (ValidationException $exception) {
            throw $exception;
        } catch (Exception $exception) {
            BaseHelper::logError($exception);

            return $this
                ->httpResponse()
                ->setError()
                ->setMessage(__("Can't send message on this time, please try again later!"));
        }
    }
}
