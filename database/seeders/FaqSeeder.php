<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Faq\Models\Faq;
use Botble\Faq\Models\FaqCategory;

class FaqSeeder extends BaseSeeder
{
    public function run(): void
    {
        Faq::query()->truncate();
        FaqCategory::query()->truncate();

        $categories = [
            'General',
            'Buying',
            'Payment',
            'Support',
        ];

        foreach ($categories as $index => $value) {
            FaqCategory::query()->create([
                'name' => $value,
                'order' => $index,
            ]);
        }

        $faqItems = [
            [
                'question' => 'Can I see the demo before purchasing?',
                'answer' => 'Etiam amet mauris suscipit in odio integer congue metus vitae arcu mollis blandit ultrice ligula egestas and magna suscipit lectus magna suscipit luctus blandit vitae',
                'category_id' => 1,
            ],
            [
                'question' => 'Can I use your system on different devices?',
                'answer' => 'Etiam amet mauris suscipit in odio integer congue metus vitae arcu mollis blandit ultrice ligula egestas and magna suscipit lectus magna suscipit luctus blandit vitae',
                'category_id' => 1,
            ],
            [
                'question' => 'Can I import my sitemap to your system?',
                'answer' => 'An enim nullam tempor sapien gravida a donec ipsum enim an porta justo integer at velna vitae auctor integer congue undo magna at pretium purus pretium',
                'category_id' => 1,
            ],
            [
                'question' => 'Can I cancel my subscription at any time?',
                'answer' => 'An enim nullam tempor sapien gravida a donec ipsum enim an porta justo integer at velna vitae auctor integer congue undo magna at pretium purus pretium',
                'category_id' => 2,
            ],
            [
                'question' => 'How can I switch my subscription between essential, and premium plan',
                'answer' => 'Cubilia laoreet augue egestas and luctus donec curabite diam vitae dapibus libero and quisque gravida donec and neque.',
                'category_id' => 2,
            ],
            [
                'question' => 'Is there an additional discount when paid annually?',
                'answer' => 'Cubilia laoreet augue egestas and luctus donec curabite diam vitae dapibus libero and quisque gravida donec and neque. Blandit justo aliquam molestie nunc sapien',
                'category_id' => 2,
            ],
            [
                'question' => 'Where does it come from ?',
                'answer' => 'If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.',
                'category_id' => 3,
            ],
            [
                'question' => 'I have an issue with my account',
                'answer' => '<ul>
                    <li>Etiam amet mauris suscipit sit amet in odio. Integer congue leo metus. Vitae arcu mollis blandit ultrice ligula</li>
                    <li>An enim nullam tempor sapien gravida donec congue leo metus. Vitae arcu mollis blandit integer at velna</li>
                </ul>',
                'category_id' => 3,
            ],
            [
                'question' => 'What happens if I don’t renew my license after one year?',
                'answer' => '<ul>
                    <li>Etiam amet mauris suscipit sit amet in odio. Integer congue leo metus. Vitae arcu mollis blandit ultrice ligula</li>
                    <li>An enim nullam tempor sapien gravida donec congue leo metus. Vitae arcu mollis blandit integer at velna</li>
                </ul>',
                'category_id' => 3,
            ],
            [
                'question' => 'Do you have a free trial?',
                'answer' => '<ul class="text-body-text">
                    <li>Fringilla risus, luctus mauris orci auctor purus</li>
                    <li>Quaerat sodales sapien euismod blandit purus and ipsum primis in cubilia laoreet augue luctus</li>
                </ul>',
                'category_id' => 4,
            ],
            [
                'question' => 'What kind of payment methods do you provide?',
                'answer' => '<ul class="text-body-text">
                <li>Fringilla risus, luctus mauris orci auctor purus</li>
                <li>Quaerat sodales sapien euismoda laoreet augue luctus</li>
              </ul>',
                'category_id' => 4,
            ],
        ];

        foreach ($faqItems as $value) {
            Faq::query()->create($value);
        }
    }
}
