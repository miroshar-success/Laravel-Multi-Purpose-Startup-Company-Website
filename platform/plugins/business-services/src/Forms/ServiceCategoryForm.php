<?php

namespace Botble\BusinessService\Forms;

use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\BusinessService\Http\Requests\ServiceCategoryRequest;
use Botble\BusinessService\Models\ServiceCategory;

class ServiceCategoryForm extends FormAbstract
{
    public function buildForm(): void
    {
        $this
            ->setupModel(new ServiceCategory())
            ->setValidatorClass(ServiceCategoryRequest::class)
            ->withCustomFields()
            ->add('name', TextField::class, NameFieldOption::make()->required()->toArray())
            ->add('parent_id', 'customSelect', [
                'label' => trans('core/base::forms.parent'),
                'attr' => [
                    'class' => 'select-search-full',
                ],
                'choices' => ['' => trans('plugins/business-services::business-services.form.none')] + ServiceCategory::query()
                        ->where('parent_id', null)
                        ->pluck('name', 'id')
                        ->all(),
            ])
            ->add('order', 'number', [
                'label' => trans('core/base::forms.order'),
                'attr' => [
                    'placeholder' => trans('core/base::forms.order_by_placeholder'),
                ],
                'default_value' => 0,
            ])
            ->add('status', SelectField::class, StatusFieldOption::make()->toArray())
            ->add('image', 'mediaImage')
            ->setBreakFieldPoint('status');
    }
}
