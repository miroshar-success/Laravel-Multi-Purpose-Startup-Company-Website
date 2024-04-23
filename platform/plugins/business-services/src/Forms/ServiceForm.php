<?php

namespace Botble\BusinessService\Forms;

use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\BusinessService\Http\Requests\ServiceRequest;
use Botble\BusinessService\Models\Service;
use Botble\BusinessService\Models\ServiceCategory;

class ServiceForm extends FormAbstract
{
    public function buildForm(): void
    {
        $this
            ->setupModel(new Service())
            ->setValidatorClass(ServiceRequest::class)
            ->withCustomFields()
            ->add('category_id', 'customSelect', [
                'label' => trans('plugins/business-services::business-services.category'),
                'required' => true,
                'attr' => [
                    'class' => 'select-search-full',
                ],
                'choices' => [null => trans('plugins/business-services::business-services.form.none')] + ServiceCategory::query()
                        ->wherePublished()
                        ->pluck('name', 'id')
                        ->all(),
            ])
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
            ->add('is_featured', 'onOff', [
                'label' => trans('plugins/business-services::business-services.form.is_featured'),
            ])
            ->add('status', SelectField::class, StatusFieldOption::make()->toArray())
            ->add('image', 'mediaImage')
            ->setBreakFieldPoint('status');
    }
}
