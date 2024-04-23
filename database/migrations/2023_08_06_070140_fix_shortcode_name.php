<?php

use Botble\Page\Models\Page;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class () extends Migration
{
    public function up(): void
    {
        $pages = Page::query()
            ->where('content', 'like', '%why-choose-we%')
            ->get();

        if ($pages->isEmpty()) {
            return;
        }

        foreach ($pages as $page) {
            $content = $page->content;

            $content = str_replace(
                ['[why-choose-we ', '][/why-choose-we]'],
                ['[why-choose-us ', '][/why-choose-us]'],
                $content
            );

            $page->update([
                'content' => $content,
            ]);
        }

        if (! is_plugin_active('language') || ! is_plugin_active('language-advanced')) {
            return;
        }

        $translations = DB::table('pages_translations')
            ->where('content', 'like', '%why-choose-we%')
            ->get();

        if ($translations->isEmpty()) {
            return;
        }

        foreach ($translations as $translation) {
            $content = $translation->content;

            $content = str_replace(
                ['[why-choose-we ', '][/why-choose-we]'],
                ['[why-choose-us ', '][/why-choose-us]'],
                $content
            );

            DB::table('pages_translations')
                ->where('pages_id', $translation->pages_id)
                ->update([
                    'content' => $content,
                ]);
        }
    }
};
