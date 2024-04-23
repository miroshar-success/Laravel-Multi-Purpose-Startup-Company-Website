<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Theme\Database\Traits\HasThemeOptionSeeder;
use Carbon\Carbon;

class ThemeOptionSeeder extends BaseSeeder
{
    use HasThemeOptionSeeder;

    public function run(): void
    {
        $this->uploadFiles('logo');

        $this->createThemeOptions([
            'site_name' => 'Iori',
            'site_title' => 'Multipurpose Startup Laravel Script.',
            'site_description' => 'Iori is a Multipurpose Agency Laravel Script. It is a powerful, clean, modern, and fully responsive template. It is designed for agency, business, corporate, creative, freelancer, portfolio, photography, personal, resume, and any kind of creative fields.',
            'copyright' => sprintf('©%s Archi Elite JSC. All right reserved.', Carbon::now()->year),
            'favicon' => 'logo/favicon.png',
            'logo' => 'logo/logo.png',
            'primary_font' => 'Manrope',
            'primary_color' => '#024430',
            'success_color' => '#06D6A0',
            'danger_color' => '#EF476F',
            'warning_color' => '#FFD166',
            'secondary_color' => '#066a4c',
            'homepage_id' => 1,
            'login_background' => 'general/banner-authentication.png',
            'hotline' => '0123456789',
            'action_button_text' => 'Get Started',
            'action_button_url' => '/register',
            'header_top_enabled' => 1,
            'cookie_consent_message' => 'Your experience on this site will be improved by allowing cookies',
            'cookie_consent_learn_more_url' => '/cookie-policy',
            'cookie_consent_learn_more_text' => 'Cookie Policy',
            'social_links' => [
                [
                    [
                        'key' => 'social-name',
                        'value' => 'Facebook',
                    ],
                    [
                        'key' => 'social-icon',
                        'value' => 'icons/facebook.png',
                    ],
                    [
                        'key' => 'social-url',
                        'value' => 'https://www.facebook.com/',
                    ],
                ],
                [
                    [
                        'key' => 'social-name',
                        'value' => 'Twitter',
                    ],
                    [
                        'key' => 'social-icon',
                        'value' => 'icons/twitter.png',
                    ],
                    [
                        'key' => 'social-url',
                        'value' => 'https://www.twitter.com/',
                    ],
                ],
                [
                    [
                        'key' => 'social-name',
                        'value' => 'Instagram',
                    ],
                    [
                        'key' => 'social-icon',
                        'value' => 'icons/instagram.png',
                    ],
                    [
                        'key' => 'social-url',
                        'value' => 'https://www.instagram.com/',
                    ],
                ],
                [
                    [
                        'key' => 'social-name',
                        'value' => 'Linkedin',
                    ],
                    [
                        'key' => 'social-icon',
                        'value' => 'icons/linkedin.png',
                    ],
                    [
                        'key' => 'social-url',
                        'value' => 'https://www.linkedin.com/',
                    ],
                ],
            ],
            '404_page_image' => 'icons/404.png',
        ]);
    }
}
