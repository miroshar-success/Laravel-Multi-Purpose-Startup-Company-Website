<?php

namespace Database\Seeders;

use Botble\Base\Facades\MetaBox;
use Botble\Base\Supports\BaseSeeder;
use Botble\Testimonial\Models\Testimonial;
use Illuminate\Support\Arr;

class TestimonialSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('testimonials');

        $testimonials = [
            [
                'name' => 'Wade Warren',
                'company' => 'Louis Vuitton',
                'content' => 'Even factoring differences in body weight between children and adults into account.',
                'title' => 'Satisfied client testimonial',
            ],
            [
                'name' => 'Brooklyn Simmons',
                'company' => 'Nintendo',
                'content' => 'So yes, the alcohol (ethanol) in hand sanitizers can be absorbed through the skin, but no, it would not cause intoxication.',
                'title' => '98% of residents recommend us',
            ],
            [
                'name' => 'Jenny Wilson',
                'company' => 'Starbucks',
                'content' => 'Their blood alcohol levels rose to 0.007 to 0.02 o/oo (parts per thousand), or 0.7 to 2.0 mg/L.',
                'title' => 'Our success stories',
            ],
            [
                'name' => 'Albert Flores',
                'company' => 'Bank of America',
                'content' => 'So yes, the alcohol (ethanol) in hand sanitizers can be absorbed through the skin, but no, it would not cause intoxication.',
                'title' => 'This is simply unbelievable',
            ],
        ];

        Testimonial::query()->truncate();

        foreach ($testimonials as $index => $item) {
            $item['image'] = 'testimonials/' . ($index + 1) . '.png';

            $testimonial = Testimonial::query()->create(Arr::except($item, ['title']));

            MetaBox::saveMetaBoxData($testimonial, 'title', Arr::get($item, 'title'));
        }
    }
}
