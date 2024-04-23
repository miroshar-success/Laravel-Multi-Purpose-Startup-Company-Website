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
use Botble\BusinessService\Forms\PackageForm;
use Botble\BusinessService\Http\Requests\PackageRequest;
use Botble\BusinessService\Models\Package;
use Botble\BusinessService\Tables\PackageTable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PackageController extends BaseController
{
    public function __construct(protected BaseHttpResponse $response)
    {
    }

    public function index(PackageTable $table): View|JsonResponse
    {
        PageTitle::setTitle(trans('plugins/business-services::business-services.package.name'));

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder): string
    {
        PageTitle::setTitle(trans('plugins/business-services::business-services.package.create'));

        return $formBuilder->create(PackageForm::class)->renderForm();
    }

    public function store(PackageRequest $request): BaseHttpResponse
    {
        $package = Package::query()->create($request->validated());

        event(new CreatedContentEvent('packages', $request, $package));

        return $this->response
            ->setNextUrl(route('business-services.packages.edit', $package))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(Package $package, Request $request, FormBuilder $formBuilder): string
    {
        event(new BeforeEditContentEvent($request, $package));

        PageTitle::setTitle(trans('core/base::forms.edit_item', ['name' => $package->name]));

        return $formBuilder->create(PackageForm::class, ['model' => $package])->renderForm();
    }

    public function update(Package $package, PackageRequest $request): BaseHttpResponse
    {
        $package->update($request->validated());

        event(new UpdatedContentEvent('packages', $request, $package));

        return $this->response
            ->setPreviousUrl(route('business-services.packages.index'))
            ->setNextUrl(route('business-services.packages.edit', $package))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(Package $package, Request $request): BaseHttpResponse
    {
        $package->delete();

        event(new DeletedContentEvent('packages', $request, $package));

        return $this->response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
