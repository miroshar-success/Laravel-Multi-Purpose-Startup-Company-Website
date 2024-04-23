<?php

namespace Botble\Ecommerce\Http\Controllers\Fronts;

use Botble\Ecommerce\Concerns\Http\Ajax\HasSearchProducts;
use Botble\Ecommerce\Facades\ProductCategoryHelper;
use Botble\Ecommerce\Http\Controllers\BaseController;
use Botble\Theme\Facades\Theme;

class PublicAjaxController extends BaseController
{
    use HasSearchProducts;

    public function ajaxGetCategoriesDropdown()
    {
        $categoriesDropdownView = Theme::getThemeNamespace('partials.product-categories-dropdown');

        return $this
            ->httpResponse()
            ->setData([
                'select' => ProductCategoryHelper::renderProductCategoriesSelect(),
                'dropdown' => view()->exists($categoriesDropdownView)
                    ? view($categoriesDropdownView)->render()
                    : null,
            ]);
    }
}
