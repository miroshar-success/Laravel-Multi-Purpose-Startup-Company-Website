<?php

namespace Database\Seeders;

use Botble\Base\Facades\MetaBox;
use Botble\Base\Supports\BaseSeeder;
use Botble\Ecommerce\Models\ProductCategory;
use Botble\Slug\Facades\SlugHelper;
use Illuminate\Support\Arr;

class ProductCategorySeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('product-categories');

        $categories = [
            1 => [
                'name' => 'Desktop PC',
            ],
            2 => [
                'name' => 'Headphone',
            ],
            3 => [
                'name' => 'Laptop',
            ],
            4 => [
                'name' => 'Mobile Phone',
            ],
            5 => [
                'name' => 'Printer',
            ],
            6 => [
                'name' => 'Books',
            ],
            7 => [
                'name' => 'Tablet',
            ],
            8 => [
                'name' => 'USB Flash',
            ],
            9 => [
                'name' => 'Game Mouse',
            ],
            10 => [
                'name' => 'Security',
            ],
            11 => [
                'name' => 'Watch',
            ],
            12 => [
                'name' => 'Scanner',
            ],
        ];

        ProductCategory::query()->truncate();

        foreach ($categories as $index => $item) {
            $this->createCategoryItem($index, $item);
        }
    }

    protected function createCategoryItem(int $index, array $category, int $parentId = 0): void
    {
        $category['is_featured'] = $index <= 12;
        $category['image'] = 'product-categories/' . $index . '.png';
        $category['parent_id'] = $parentId;
        $category['order'] = $index;
        $category['description'] = 'From year to year we strive to invent the most innovative technology that is used by both small enterprises and space enterprises.';

        if (Arr::has($category, 'children')) {
            $children = $category['children'];
            unset($category['children']);
        } else {
            $children = [];
        }

        $createdCategory = ProductCategory::query()->create(Arr::except($category, ['icon']));

        SlugHelper::createSlug($createdCategory);

        if (isset($category['icon'])) {
            MetaBox::saveMetaBoxData($createdCategory, 'icon', $category['icon']);
        }

        if ($children) {
            foreach ($children as $childIndex => $child) {
                $this->createCategoryItem($childIndex, $child, $createdCategory->id);
            }
        }
    }
}
