<?php

namespace ArchiElite\Career\Http\Controllers;

use ArchiElite\Career\Models\Career;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Theme\Facades\Theme;
use Illuminate\Routing\Controller;

class PublicController extends Controller
{
    public function careers()
    {
        SeoHelper::setTitle(__('Careers'));

        Theme::breadcrumb()->add(__('Careers'), route('public.careers'));

        $careers = Career::query()
            ->wherePublished()
            ->orderByDesc('created_at')
            ->paginate(10);

        return Theme::scope('career.careers', compact('careers'))->render();
    }
}
