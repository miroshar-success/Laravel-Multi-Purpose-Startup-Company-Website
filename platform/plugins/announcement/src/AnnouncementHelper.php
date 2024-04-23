<?php

namespace ArchiElite\Announcement;

use ArchiElite\Announcement\Enums\AnnouncePlacement;
use ArchiElite\Announcement\Enums\TextAlignment;
use ArchiElite\Announcement\Models\Announcement;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;

class AnnouncementHelper
{
    public static function getPlacement(): string
    {
        return setting('announcement_placement', AnnouncePlacement::TOP);
    }

    public static function isBottomPlacement(): bool
    {
        return self::getPlacement() === AnnouncePlacement::BOTTOM;
    }

    public static function isThemeBuiltIn(): bool
    {
        return self::getPlacement() === AnnouncePlacement::THEME;
    }

    public static function getMaxWidth(): string
    {
        $maxWidth = setting('announcement_max_width', '1200');
        $unit = setting('announcement_max_width_unit', 'px');

        return $maxWidth . $unit;
    }

    public static function getFontSize(): string
    {
        $fontSize = setting('announcement_font_size', '0.9');
        $unit = setting('announcement_font_size_unit', 'rem');

        return $fontSize . $unit;
    }

    public static function getTextAlignment(): string
    {
        return setting('announcement_text_alignment', TextAlignment::CENTER);
    }

    public static function getAnnouncements(): Collection
    {
        $dismissedAnnouncements = json_decode(Cookie::get('ae-anno-dismissed-announcements', '[]'), true);
        $dismissedAnnouncements = Arr::flatten($dismissedAnnouncements);

        return Announcement::query()
            ->whereNotIn('id', $dismissedAnnouncements)
            ->available()
            ->inRandomOrder()
            ->get();
    }
}
