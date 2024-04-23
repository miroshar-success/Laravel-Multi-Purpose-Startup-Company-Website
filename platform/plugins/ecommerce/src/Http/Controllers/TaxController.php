<?php

namespace Botble\Ecommerce\Http\Controllers;

use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Ecommerce\Forms\TaxForm;
use Botble\Ecommerce\Http\Requests\TaxRequest;
use Botble\Ecommerce\Models\Tax;
use Botble\Ecommerce\Tables\TaxTable;
use Exception;
use Illuminate\Http\Request;

class TaxController extends BaseController
{
    public function index(TaxTable $dataTable)
    {
        $this->pageTitle(trans('plugins/ecommerce::tax.name'));

        return $dataTable->renderTable();
    }

    public function create()
    {
        $this->pageTitle(trans('plugins/ecommerce::tax.create'));

        return TaxForm::create()->renderForm();
    }

    public function store(TaxRequest $request)
    {
        $tax = Tax::query()->create($request->input());

        event(new CreatedContentEvent(TAX_MODULE_SCREEN_NAME, $request, $tax));

        return $this
            ->httpResponse()
            ->setPreviousUrl(route('ecommerce.settings.taxes'))
            ->setNextUrl(route('tax.edit', $tax->id))
            ->withCreatedSuccessMessage();
    }

    public function edit(Tax $tax)
    {
        $this->pageTitle(trans('plugins/ecommerce::tax.edit', ['title' => $tax->title]));

        return TaxForm::createFromModel($tax)->renderForm();
    }

    public function update(Tax $tax, TaxRequest $request)
    {
        $tax->fill($request->input());
        $tax->save();

        event(new UpdatedContentEvent(TAX_MODULE_SCREEN_NAME, $request, $tax));

        return $this
            ->httpResponse()
            ->setPreviousUrl(route('tax.index'))
            ->withUpdatedSuccessMessage();
    }

    public function destroy(Tax $tax, Request $request)
    {
        try {
            $tax->delete();
            event(new DeletedContentEvent(TAX_MODULE_SCREEN_NAME, $request, $tax));

            return $this
                ->httpResponse()->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $this
                ->httpResponse()
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }
}
