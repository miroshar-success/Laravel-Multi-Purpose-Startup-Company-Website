<?php

namespace Botble\Ecommerce\Forms\Settings;

use Botble\Base\Facades\Assets;
use Botble\Ecommerce\Http\Requests\Settings\CurrencySettingRequest;
use Botble\Ecommerce\Models\Currency;
use Botble\Setting\Forms\SettingForm;

class CurrencySettingForm extends SettingForm
{
    public function setup(): void
    {
        parent::setup();

        Assets::addScripts(['jquery-ui'])
            ->addScriptsDirectly('vendor/core/plugins/ecommerce/js/currencies.js')
            ->addStylesDirectly('vendor/core/plugins/ecommerce/css/currencies.css');

        $currencies = Currency::query()
            ->orderBy('order')
            ->get()
            ->toArray();

        $this
            ->setSectionTitle(trans('plugins/ecommerce::setting.currency.name'))
            ->setSectionDescription(trans('plugins/ecommerce::setting.currency.currency_setting_description'))
            ->setFormOptions([
                'class' => 'currency-setting-form',
            ])
            ->contentOnly()
            ->setValidatorClass(CurrencySettingRequest::class)
            ->add('enable_auto_detect_visitor_currency', 'onOffCheckbox', [
                'label' => trans('plugins/ecommerce::setting.currency.form.enable_auto_detect_visitor_currency') ,
                'value' => get_ecommerce_setting('enable_auto_detect_visitor_currency', false),
                'help_block' => [
                    'text' => trans('plugins/ecommerce::setting.currency.form.auto_detect_visitor_currency_description'),
                ],
            ])
            ->add('add_space_between_price_and_currency', 'onOffCheckbox', [
                'label' => trans('plugins/ecommerce::setting.currency.form.add_space_between_price_and_currency'),
                'value' => get_ecommerce_setting('add_space_between_price_and_currency', false),
            ])
            ->add('thousands_separator', 'customSelect', [
                'label' => trans('plugins/ecommerce::setting.currency.form.thousands_separator'),
                'selected' => get_ecommerce_setting('thousands_separator', ','),
                'choices' => [
                    ',' => trans('plugins/ecommerce::setting.currency.form.separator_comma'),
                    '.' => trans('plugins/ecommerce::setting.currency.form.separator_period'),
                    'space' => trans('plugins/ecommerce::setting.currency.form.separator_space'),
                ],
            ])
            ->add('decimal_separator', 'customSelect', [
                'label' => trans('plugins/ecommerce::setting.currency.form.decimal_separator'),
                'selected' => get_ecommerce_setting('decimal_separator', '.'),
                'choices' => [
                    ',' => trans('plugins/ecommerce::setting.currency.form.separator_comma'),
                    '.' => trans('plugins/ecommerce::setting.currency.form.separator_period'),
                    'space' => trans('plugins/ecommerce::setting.currency.form.separator_space'),
                ],
            ])
            ->add('api_provider_field', 'html', [
                'html' => view('plugins/ecommerce::settings.partials.currencies.api-provider-fields'),
            ])
            ->add('use_exchange_rate_from_api', 'onOffCheckbox', [
                'label' => trans('plugins/ecommerce::setting.currency.form.use_exchange_rate_from_api'),
                'value' => get_ecommerce_setting('use_exchange_rate_from_api', false),
            ])
            ->add('data_currencies', 'html', [
                'html' => view('plugins/ecommerce::settings.partials.currencies.data-currency-fields', compact('currencies')),
            ])
            ->add('currency_table', 'html', [
                'html' => view('plugins/ecommerce::settings.partials.currencies.currency-table'),
            ]);
    }
}
