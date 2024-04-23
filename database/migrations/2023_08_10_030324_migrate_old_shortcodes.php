<?php

use Botble\Page\Models\Page;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class () extends Migration {
    public function up(): void
    {
        $pages = Page::query()
            ->where(function (Builder $query) {
                $query
                    ->where('content', 'like', '%what-we-offer%')
                    ->where('content', 'like', '% service_ids="%');
            })
            ->orWhere(function (Builder $query) {
                $query
                    ->where('content', 'like', '%choose-to-the-plan%')
                    ->where('content', 'like', '% package_ids="%');
            })
            ->get();

        if ($pages->isEmpty()) {
            return;
        }

        $patternOne = '/(\[what-we-offer(.*?)service_ids=(".*?")([^]]*)])(\[\/what-we-offer])/i';
        $patternTwo = '/(\[choose-to-the-plan(.*?)package_ids=(".*?")([^]]*)])(\[\/choose-to-the-plan])/i';

        foreach ($pages as $page) {
            $content = $page->content;

            if (preg_match($patternOne, $content)) {
                $content = preg_replace($patternOne, '[services$2service_ids=$3$4][/services]', $content);
            }

            if (preg_match($patternTwo, $content)) {
                $content = preg_replace($patternTwo, '[pricing-plan$2package_ids=$3$4][/pricing-plan]', $content);
            }

            $page->update([
                'content' => $content,
            ]);
        }

        if (! is_plugin_active('language') || ! is_plugin_active('language-advanced')) {
            return;
        }

        $translations = DB::table('pages_translations')
            ->where(function (Builder $query) {
                $query
                    ->where('content', 'like', '%what-we-offer%')
                    ->where('content', 'like', '% service_ids="%');
            })
            ->orWhere(function (Builder $query) {
                $query
                    ->where('content', 'like', '%choose-to-the-plan%')
                    ->where('content', 'like', '% package_ids="%');
            })
            ->get();

        if ($translations->isEmpty()) {
            return;
        }

        foreach ($translations as $translation) {
            $content = $translation->content;

            if (preg_match($patternOne, $content)) {
                $content = preg_replace($patternOne, '[services$2service_ids=$3$4][/services]', $content);
            }

            if (preg_match($patternTwo, $content)) {
                $content = preg_replace($patternTwo, '[pricing-plan$2package_ids=$3$4][/pricing-plan]', $content);
            }

            DB::table('pages_translations')
                ->where('pages_id', $translation->pages_id)
                ->update([
                    'content' => $content,
                ]);
        }
    }
};
