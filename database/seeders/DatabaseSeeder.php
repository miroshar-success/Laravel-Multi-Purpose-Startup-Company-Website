<?php

namespace Database\Seeders;

use Botble\ACL\Database\Seeders\UserSeeder;
use Botble\Base\Supports\BaseSeeder;
use Botble\Ecommerce\Database\Seeders\CurrencySeeder;
use Botble\Ecommerce\Database\Seeders\ReviewSeeder;
use Botble\Ecommerce\Database\Seeders\ShippingSeeder;
use Botble\Language\Database\Seeders\LanguageSeeder;

class DatabaseSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->prepareRun();

        $this->call([
            LanguageSeeder::class,
            UserSeeder::class,
            PageSeeder::class,
            CurrencySeeder::class,
            SettingSeeder::class,
            ThemeOptionSeeder::class,
            ProductCategorySeeder::class,
            ProductCollectionSeeder::class,
            ProductLabelSeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            ProductAttributeSeeder::class,
            ProductTagSeeder::class,
            FaqSeeder::class,
            TestimonialSeeder::class,
            BlogSeeder::class,
            TeamSeeder::class,
            CareerSeeder::class,
            BusinessServiceSeeder::class,
            MenuSeeder::class,
            WidgetSeeder::class,
            CustomerSeeder::class,
            ReviewSeeder::class,
            ShippingSeeder::class,
            AnnouncementSeeder::class,
        ]);

        $this->finished();
    }
}
