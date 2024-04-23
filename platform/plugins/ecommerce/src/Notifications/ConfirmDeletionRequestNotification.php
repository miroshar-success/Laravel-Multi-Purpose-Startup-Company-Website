<?php

namespace Botble\Ecommerce\Notifications;

use Botble\Base\Facades\EmailHandler;
use Botble\Ecommerce\Models\CustomerDeletionRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class ConfirmDeletionRequestNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public CustomerDeletionRequest $deletionRequest)
    {
    }

    public function via(): array
    {
        return ['mail'];
    }

    public function toMail(): MailMessage
    {
        $customer = $this->deletionRequest->customer;

        EmailHandler::setModule(ECOMMERCE_MODULE_SCREEN_NAME)
            ->setVariableValue('customer_name', $customer->name)
            ->setVariableValue('customer_email', $customer->email)
            ->setVariableValue('confirm_url', route('customer.delete-account.confirm', ['token' => $this->deletionRequest->token]));

        $template = 'customer-deletion-request-confirmation';

        return (new MailMessage())
            ->view(['html' => new HtmlString(EmailHandler::prepareData(EmailHandler::getTemplateContent($template)))])
            ->subject(EmailHandler::getTemplateSubject($template));
    }
}
