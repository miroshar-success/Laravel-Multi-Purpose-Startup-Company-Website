<?php

namespace Database\Seeders;

use ArchiElite\Career\Models\Career;
use Botble\Base\Facades\MetaBox;
use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Post;
use Botble\Ecommerce\Models\Product;
use Botble\Language\Models\LanguageMeta;
use Botble\Menu\Facades\Menu;
use Botble\Menu\Models\Menu as MenuModel;
use Botble\Menu\Models\MenuLocation;
use Botble\Menu\Models\MenuNode;
use Botble\Page\Models\Page;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class MenuSeeder extends BaseSeeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Main menu',
                'location' => 'main-menu',
                'items' => [
                    [
                        'title' => 'Home',
                        'url' => '#',
                        'child_style' => 'two_col',
                        'children' => [
                            [
                                'title' => 'Homepage 1',
                                'url' => '/',
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 2',
                                'reference_id' => $this->getPageId('Homepage 2'),
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 3',
                                'reference_id' => $this->getPageId('Homepage 3'),
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 4',
                                'reference_id' => $this->getPageId('Homepage 4'),
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 5',
                                'reference_id' => $this->getPageId('Homepage 5'),
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 6',
                                'reference_id' => $this->getPageId('Homepage 6'),
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 7',
                                'reference_id' => $this->getPageId('Homepage 7'),
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 8',
                                'reference_id' => $this->getPageId('Homepage 8'),
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 9',
                                'reference_id' => $this->getPageId('Homepage 9'),
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 10',
                                'reference_id' => $this->getPageId('Homepage 10'),
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 11',
                                'reference_id' => $this->getPageId('Homepage 11'),
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 12',
                                'reference_id' => $this->getPageId('Homepage 12'),
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Company',
                        'url' => '#',
                        'child_style' => 'hr_per_2_child',
                        'children' => [
                            [
                                'title' => 'Our Service',
                                'reference_id' => $this->getPageId('Services'),
                                'reference_type' => Page::class,
                            ],
                            [
                                'title' => 'Term and Conditions',
                                'reference_id' => $this->getPageId('Term and Conditions'),
                                'reference_type' => Page::class,
                            ],
                            [
                                'title' => 'Pricing Plan',
                                'reference_id' => $this->getPageId('Pricing'),
                                'reference_type' => Page::class,
                            ],
                            [
                                'title' => 'Meet Our Team',
                                'reference_id' => $this->getPageId('Teams'),
                                'reference_type' => Page::class,
                            ],
                            [
                                'title' => 'Help Center',
                                'reference_id' => $this->getPageId('Help Center'),
                                'reference_type' => Page::class,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Career',
                        'url' => '#',
                        'children' => [
                            [
                                'title' => 'Career Listing',
                                'reference_id' => $this->getPageId('Career Listing'),
                                'reference_type' => Page::class,
                            ],
                            [
                                'title' => 'Career Details',
                                'url' => Career::query()->first()->url,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Pages',
                        'url' => '#',
                        'children' => [
                            [
                                'title' => 'About Us',
                                'reference_id' => $this->getPageId('About Us'),
                                'reference_type' => Page::class,
                            ],
                            [
                                'title' => 'Contact',
                                'reference_id' => $this->getPageId('Contact'),
                                'reference_type' => Page::class,
                            ],
                            [
                                'title' => 'Coming Soon',
                                'reference_id' => $this->getPageId('Coming Soon'),
                                'reference_type' => Page::class,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Blog',
                        'url' => '#',
                        'children' => [
                            [
                                'title' => 'Blog listing',
                                'reference_id' => $this->getPageId('Blog'),
                                'reference_type' => Page::class,
                            ],
                            [
                                'title' => 'Blog detail',
                                'url' => Post::query()->first()->url,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Products',
                        'url' => '#',
                        'children' => [
                            [
                                'title' => 'Product listing',
                                'url' => '/products',
                            ],
                            [
                                'title' => 'Product detail',
                                'url' => Product::query()->first()->url,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'About Us',
                'items' => [
                    [
                        'title' => 'Mission & Vision',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Our Team',
                        'reference_id' => $this->getPageId('Teams'),
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Press &amp; Media',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Advertising',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Testimonials',
                        'url' => '/',
                    ],
                ],
            ],
            [
                'name' => 'Support',
                'items' => [
                    [
                        'title' => 'FAQs',
                        'reference_id' => $this->getPageId('Help Center'),
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Editor Help',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Community',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Live Chatting',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Contact Us',
                        'reference_id' => $this->getPageId('Contact'),
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Support Center',
                        'reference_id' => $this->getPageId('Help Center'),
                        'reference_type' => Page::class,
                    ],
                ],
            ],
            [
                'name' => 'Useful links',
                'items' => [
                    [
                        'title' => 'Request an offer',
                        'url' => '/',
                    ],
                    [
                        'title' => 'How it works',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Pricing',
                        'reference_id' => $this->getPageId('Pricing'),
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Reviews',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Stories',
                        'url' => '/',
                    ],
                ],
            ],
            [
                'name' => 'Footer bottom menu',
                'location' => 'footer-bottom-menu',
                'items' => [
                    [
                        'title' => 'Privacy policy',
                        'reference_id' => $this->getPageId('Privacy policy'),
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Cookies',
                        'reference_id' => $this->getPageId('Cookie Policy'),
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Terms of service',
                        'reference_id' => $this->getPageId('Term and Conditions'),
                        'reference_type' => Page::class,
                    ],
                ],
            ],
            [
                'name' => 'Resources',
                'location' => 'footer-menu',
                'items' => [
                    [
                        'title' => 'Project management',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Solutions',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Customers',
                        'url' => '/',
                    ],
                    [
                        'title' => 'News & Events',
                        'reference_id' => $this->getPageId('Blog'),
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Careers',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Support',
                        'reference_id' => $this->getPageId('Help Center'),
                        'reference_type' => Page::class,
                    ],
                ],

            ],
            [
                'name' => 'We offer',
                'location' => 'footer-menu',
                'items' => [
                    [
                        'title' => 'Project software',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Resource software',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Workflow automation',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Gantt chart makers',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Project dashboards',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Task software',
                        'url' => '/',
                    ],
                ],
            ],
        ];

        MenuModel::query()->truncate();
        MenuLocation::query()->truncate();
        MenuNode::query()->truncate();

        foreach ($menus as $index => $item) {
            $item['slug'] = Str::slug($item['name']);

            $item['items'] = $this->mapMenuNodes($item['items']);

            $this->saveMenu($item, $index);
        }

        Menu::clearCacheMenuItems();
    }

    protected function getPageId(string $name): int
    {
        return (int) Page::query()->where('name', $name)->value('id');
    }

    protected function mapMenuNodes($items): array
    {
        if (empty($items)) {
            return $items;
        }

        foreach ($items as $position => $node) {
            $items[$position] = array_merge($node, [
                'position' => $position,
            ]);

            if (! empty($node['children'])) {
                $items[$position]['children'] = $this->mapMenuNodes($node['children']);
            }
        }

        return $items;
    }

    protected function saveMenu(array $item, int $index): void
    {
        $menu = MenuModel::query()->create(Arr::except($item, ['items', 'location']));

        if (isset($item['location'])) {
            $menuLocation = MenuLocation::query()->create([
                'menu_id' => $menu->id,
                'location' => $item['location'],
            ]);

            LanguageMeta::saveMetaData($menuLocation);
        }

        foreach ($item['items'] as $menuNode) {
            $this->createMenuNode($index, $menuNode, $menu->id);
        }

        LanguageMeta::saveMetaData($menu);
    }

    protected function createMenuNode(int $index, array $menuNode, int|string $menuId, int|string $parentId = 0): void
    {
        $menuNode['menu_id'] = $menuId;
        $menuNode['parent_id'] = $parentId;

        if (isset($menuNode['url'])) {
            $menuNode['url'] = str_replace(url(''), '', $menuNode['url']);
        }

        if (Arr::has($menuNode, 'children')) {
            $children = $menuNode['children'];
            $menuNode['has_child'] = true;

            unset($menuNode['children']);
        } else {
            $children = [];
            $menuNode['has_child'] = false;
        }

        $createdNode = MenuNode::query()->create(Arr::except($menuNode, 'child_style'));

        if (Arr::has($menuNode, 'child_style')) {
            MetaBox::saveMetaBoxData($createdNode, 'child_style', Arr::get($menuNode, 'child_style'));
        }

        if ($children) {
            foreach ($children as $child) {
                $this->createMenuNode($index, $child, $menuId, $createdNode->id);
            }
        }
    }
}
