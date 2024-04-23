<?php

namespace Botble\Contact\Http\Requests;

use Botble\Base\Rules\EmailRule;
use Botble\Base\Rules\PhoneNumberRule;
use Botble\Support\Http\Requests\Request;

class ContactRequest extends Request
{
    protected array $mandatoryFields;

    protected array $displayFields;

    public function mandatoryFields(array $fields): static
    {
        $this->mandatoryFields = $fields;

        return $this;
    }

    public function displayFields(array $fields): static
    {
        $this->displayFields = $fields;

        return $this;
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:40'],
            'email' => ['nullable', new EmailRule(), 'max:80'],
            'content' => ['required', 'string', 'max:1000'],
            'phone' => ['nullable', new PhoneNumberRule()],
            'address' => ['nullable', 'string', 'max:500'],
            'subject' => ['nullable', 'string', 'max:500'],
        ];

        $rules = $this->applyRules($rules, $this->request->getString('display_fields'), $this->request->getString('required_fields'));

        return apply_filters('contact_request_rules', $rules, $this);
    }

    public function attributes(): array
    {
        return [
            'name' => __('Name'),
            'email' => __('Email'),
            'phone' => __('Phone'),
            'content' => __('Content'),
        ];
    }

    protected function filtersByDisplayFields(array $rules): array
    {
        if (empty($this->displayFields)) {
            $this->displayFields = ['email', 'address', 'phone', 'subject'];
        }

        $displayFields = [...$this->displayFields, ...$this->alwaysMandatoryFields()];

        foreach ($rules as $key => $rule) {
            if (! in_array($key, $displayFields)) {
                unset($rules[$key]);
            }
        }

        return $rules;
    }

    protected function applyMandatoryFields(array $rules): array
    {
        if (empty($this->mandatoryFields)) {
            $this->mandatoryFields = ['email'];
        }

        $mandatoryFields = [...$this->mandatoryFields, ...$this->alwaysMandatoryFields()];

        foreach ($rules as $key => $rule) {
            if (is_array($rule)) {
                foreach ($rule as $ruleKey => $ruleValue) {
                    if (in_array($ruleValue, ['required', 'nullable'])) {
                        $rule[$ruleKey] = in_array($key, $mandatoryFields) ? 'required' : 'nullable';
                    }

                    $rules[$key] = $rule;
                }
            }
        }

        foreach ($mandatoryFields as $mandatoryField) {
            if (! in_array($mandatoryField, array_keys($rules))
                && in_array($mandatoryField, $this->displayFields)) {
                $rules[$mandatoryField] = 'required';
            }
        }

        return $rules;
    }

    protected function alwaysMandatoryFields(): array
    {
        return ['name', 'content'];
    }

    public function applyRules(array $rules, ?string $displayFields, ?string $mandatoryFields): array
    {
        $this->mandatoryFields(array_filter(explode(',', (string) $mandatoryFields)));
        $this->displayFields(array_filter(explode(',', (string) $displayFields)));

        $rules = $this->filtersByDisplayFields($rules);

        return $this->applyMandatoryFields($rules);
    }
}
