<?php

namespace Botble\BusinessService\Forms;

use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\BusinessService\Enums\PackageDuration;
use Botble\BusinessService\Http\Requests\PackageRequest;
use Botble\BusinessService\Models\Package;

class PackageForm extends FormAbstract
{
    public function buildForm(): void
    {
        $this
            ->setupModel(new Package())
            ->setValidatorClass(PackageRequest::class)
            ->withCustomFields()
            ->add('name', TextField::class, NameFieldOption::make()->required()->toArray())
            ->add('description', TextareaField::class, DescriptionFieldOption::make()->toArray())
            ->add('content', 'editor', [
                'label' => trans('core/base::forms.content'),
                'required' => true,
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('duration', 'customSelect', [
                'label' => trans('plugins/business-services::business-services.duration'),
                'required' => true,
                'attr' => [
                    'class' => 'select-search-full',
                ],
                'choices' => PackageDuration::labels(),
                'selected' => $this->getModel()->duration->getValue() ?: PackageDuration::MONTHLY,
            ])
            ->add('openRow', 'html', [
                'html' => '<div class="row mb-3">',
            ])
            ->add('price', 'text', [
                'label' => trans('plugins/business-services::business-services.price'),
                'required' => true,
                'attr' => [
                    'placeholder' => trans('plugins/business-services::business-services.form.price_placeholder'),
                ],
                'wrapper' => [
                    'class' => 'col-md-6',
                ],
            ])
            ->add('annual_price', 'text', [
                'label' => trans('plugins/business-services::business-services.annual_price'),
                'attr' => [
                    'placeholder' => trans('plugins/business-services::business-services.form.annual_price_placeholder'),
                ],
                'wrapper' => [
                    'class' => 'col-md-6',
                ],
            ])
            ->add('closeRow', 'html', [
                'html' => '</div>',
            ])
            ->add('features', 'textarea', [
                'label' => trans('plugins/business-services::business-services.form.features'),
                'required' => true,
                'attr' => [
                    'placeholder' => trans('plugins/business-services::business-services.form.features_placeholder'),
                ],
                'help_block' => [
                    'text' => trans('plugins/business-services::business-services.form.features_help_block'),
                ],
            ])
            ->add('is_popular', 'onOff', [
                'label' => trans('plugins/business-services::business-services.is_popular'),
            ])
            ->add('status', SelectField::class, StatusFieldOption::make()->toArray())
            ->setBreakFieldPoint('status');
    }
}
