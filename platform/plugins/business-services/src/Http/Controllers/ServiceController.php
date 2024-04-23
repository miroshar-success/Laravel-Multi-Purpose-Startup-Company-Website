<?php

namespace Botble\BusinessService\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Facades\PageTitle;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\BusinessService\Forms\ServiceForm;
use Botble\BusinessService\Http\Requests\ServiceRequest;
use Botble\BusinessService\Models\Service;
use Botble\BusinessService\Tables\ServiceTable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    public function __construct(protected BaseHttpResponse $response)
    {
    }

    public function index(ServiceTable $table): View|JsonResponse
    {
        PageTitle::setTitle(trans('plugins/business-services::business-services.service.name'));

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder): string
    {
        PageTitle::setTitle(trans('plugins/business-services::business-services.service.create'));

        return $formBuilder->create(ServiceForm::class)->renderForm();
    }

    public function store(ServiceRequest $request): BaseHttpResponse
    {
        $service = Service::query()->create($request->validated());

        event(new CreatedContentEvent('services', $request, $service));

        return $this->response
            ->setNextUrl(route('business-services.services.edit', $service))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(Service $service, Request $request, FormBuilder $formBuilder): string
    {
        event(new BeforeEditContentEvent($request, $service));

        PageTitle::setTitle(trans('core/base::forms.edit_item', ['name' => $service->name]));

        return $formBuilder->create(ServiceForm::class, ['model' => $service])->renderForm();
    }

    public function update(Service $service, ServiceRequest $request): BaseHttpResponse
    {
        $service->update($request->validated());

        event(new UpdatedContentEvent('services', $request, $service));

        return $this->response
            ->setPreviousUrl(route('business-services.services.index'))
            ->setNextUrl(route('business-services.services.edit', $service))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(Service $service, Request $request): BaseHttpResponse
    {
        $service->delete();

        event(new DeletedContentEvent('services', $request, $service));

        return $this->response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
