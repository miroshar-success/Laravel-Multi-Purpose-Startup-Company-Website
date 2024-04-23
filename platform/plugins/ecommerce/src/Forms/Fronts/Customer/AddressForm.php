<?php

namespace Botble\Ecommerce\Forms\Fronts\Customer;

use Botble\Base\Forms\FieldOptions\ButtonFieldOption;
use Botble\Base\Forms\FieldOptions\CheckboxFieldOption;
use Botble\Base\Forms\FieldOptions\EmailFieldOption;
use Botble\Base\Forms\FieldOptions\InputFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\CheckboxField;
use Botble\Base\Forms\Fields\EmailField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Ecommerce\Http\Requests\AddressRequest;
use Botble\Ecommerce\Models\Address;

class AddressForm extends FormAbstract
{
    public function setup(): void
    {
        $selectClass = $selectClass ?? '';
        $model = $this->getModel();

        $this
            ->setupModel(new Address())
            ->setValidatorClass(AddressRequest::class)
            ->contentOnly()
            ->columns()
            ->add(
                'name',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/ecommerce::addresses.name'))
                    ->placeholder(trans('plugins/ecommerce::addresses.name_placeholder'))
            )
            ->add(
                'phone',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/ecommerce::addresses.phone'))
                    ->placeholder(trans('plugins/ecommerce::addresses.phone_placeholder'))
            )
            ->add('email', EmailField::class, EmailFieldOption::make())
            ->add(
                'zip_code',
                TextField::class,
                TextFieldOption::make()
                    ->placeholder(trans('plugins/ecommerce::addresses.zip_placeholder'))
                    ->label(trans('plugins/ecommerce::addresses.zip'))
            )
            ->add(
                'address',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/ecommerce::addresses.address'))
                    ->placeholder(trans('plugins/ecommerce::addresses.address_placeholder'))
                    ->colspan(2)
            )
            ->when(EcommerceHelper::isUsingInMultipleCountries(), function (AddressForm $form) use ($selectClass) {
                $form->add(
                    'country',
                    SelectField::class,
                    SelectFieldOption::make()
                        ->label(trans('plugins/ecommerce::addresses.country'))
                        ->attributes([
                            'data-type' => 'country',
                            'class' => $selectClass,
                        ])
                        ->choices(EcommerceHelper::getAvailableCountries())
                        ->colspan(2)
                );
            }, function (AddressForm $form) {
                $form->add('country', 'hidden', InputFieldOption::make()->value(EcommerceHelper::getFirstCountryId()));
            })
            ->when(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation(), function (AddressForm $form) use ($selectClass) {
                $model = $this->getModel();

                $form->add(
                    'state',
                    SelectField::class,
                    SelectFieldOption::make()
                        ->choices(EcommerceHelper::getAvailableStatesByCountry(old('country', $model->country)))
                        ->attributes([
                            'data-type' => 'state',
                            'data-url' => route('ajax.states-by-country'),
                            'class' => $selectClass,
                        ])
                        ->label(trans('plugins/ecommerce::addresses.state'))
                );
            }, function (AddressForm $form) {
                $form->add('state', TextField::class, TextFieldOption::make()->label(trans('plugins/ecommerce::addresses.state')));
            })
            ->when(EcommerceHelper::useCityFieldAsTextField(), function (AddressForm $form) {
                $form->add('city', TextField::class, TextFieldOption::make()->label(trans('plugins/ecommerce::addresses.city')));
            }, function (AddressForm $form) use ($selectClass) {
                $form->add(
                    'city',
                    SelectField::class,
                    SelectFieldOption::make()
                        ->label(trans('plugins/ecommerce::addresses.city'))
                        ->attributes([
                            'data-type' => 'city',
                            'data-url' => route('ajax.cities-by-state'),
                            'class' => $selectClass,
                        ])
                        ->choices(EcommerceHelper::getAvailableCitiesByState(old('state', $form->getModel()->state)))
                );
            })
            ->add(
                'is_default',
                CheckboxField::class,
                CheckboxFieldOption::make()
                    ->label(__('Use this address as default.'))
                    ->colspan(2)
                    ->toArray()
            )
            ->add(
                'submit',
                'submit',
                ButtonFieldOption::make()
                    ->colspan(2)
                    ->label(($model && $model->getKey()) ? __('Update') : __('Create'))
                    ->cssClass('btn btn-primary mt-2')
                    ->toArray()
            );
        ;
    }
}
