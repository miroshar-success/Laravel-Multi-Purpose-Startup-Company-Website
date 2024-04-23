<?php

namespace ArchiElite\Career\Http\Controllers;

use ArchiElite\Career\Forms\CareerForm;
use ArchiElite\Career\Http\Requests\CareerRequest;
use ArchiElite\Career\Models\Career;
use ArchiElite\Career\Tables\CareerTable;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Facades\PageTitle;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Exception;
use Illuminate\Http\Request;

class CareerController extends BaseController
{
    public function index(CareerTable $table)
    {
        PageTitle::setTitle(trans('plugins/career::career.name'));

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('plugins/career::career.create'));

        return $formBuilder->create(CareerForm::class)->renderForm();
    }

    public function store(CareerRequest $request, BaseHttpResponse $response)
    {
        $career = Career::query()->create($request->input());

        event(new CreatedContentEvent(CAREER_MODULE_SCREEN_NAME, $request, $career));

        return $response
            ->setPreviousUrl(route('careers.index'))
            ->setNextUrl(route('careers.edit', $career->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(Career $career, FormBuilder $formBuilder, Request $request)
    {
        event(new BeforeEditContentEvent($request, $career));

        PageTitle::setTitle(trans('core/base::forms.edit_item', ['name' => $career->name]));

        return $formBuilder->create(CareerForm::class, ['model' => $career])->renderForm();
    }

    public function update(Career $career, CareerRequest $request, BaseHttpResponse $response)
    {
        $career->fill($request->input());

        $career->save();

        event(new UpdatedContentEvent(CAREER_MODULE_SCREEN_NAME, $request, $career));

        return $response
            ->setPreviousUrl(route('careers.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(Career $career, Request $request, BaseHttpResponse $response)
    {
        try {
            $career->delete();

            event(new DeletedContentEvent(CAREER_MODULE_SCREEN_NAME, $request, $career));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }
}
