<?php

namespace Botble\Setting\Http\Controllers;

use Botble\Setting\Forms\WebsiteTrackingSettingForm;
use Botble\Setting\Http\Requests\WebsiteTrackingSettingRequest;

class WebsiteTrackingSettingController extends SettingController
{
    public function edit()
    {
        $this->pageTitle(trans('core/setting::setting.website_tracking.title'));

        return WebsiteTrackingSettingForm::create()->renderForm();
    }

    public function update(WebsiteTrackingSettingRequest $request)
    {
        return $this->performUpdate(
            $request->validated()
        )->withUpdatedSuccessMessage();
    }
}
