<?php

namespace Database\Seeders;

use ArchiElite\Announcement\Models\Announcement;
use Botble\Base\Supports\BaseSeeder;
use Botble\Setting\Facades\Setting;
use Carbon\Carbon;

class AnnouncementSeeder extends BaseSeeder
{
    public function run(): void
    {
        Announcement::query()->truncate();

        $announcements = [
            'Cyber Monday: Save big on the Creative Cloud All Apps plan for individuals through 2 Dec',
            'Students and teachers save a massive 71% on Creative Cloud All Apps',
            'Black Friday and Cyber Monday 2023 Deals for Motion Designers, grab it now!',
        ];

        $now = Carbon::now();

        foreach ($announcements as $key => $value) {
            Announcement::query()->create([
                'name' => sprintf('Announcement %s', $key + 1),
                'content' => $value,
                'start_date' => $now,
                'dismissible' => true,
            ]);
        }

        $settings = [
            'announcement_max_width' => '1390',
            'announcement_text_color' => '#024430',
            'announcement_background_color' => '#FFE7BB',
            'announcement_text_alignment' => 'start',
            'announcement_dismissible' => '1',
        ];

        Setting::delete(array_keys($settings));

        Setting::set($settings)->save();
    }
}
