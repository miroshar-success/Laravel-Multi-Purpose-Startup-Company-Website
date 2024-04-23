<?php

namespace Theme\Iori\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Blog\Models\Category;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Ecommerce\Services\Products\GetProductService;
use Botble\Theme\Facades\Theme;
use Botble\Theme\Http\Controllers\PublicController;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class IoriController extends PublicController
{
    public function __construct(protected BaseHttpResponse $httpResponse)
    {
        $this->middleware(function ($request, $next) {
            if (! $request->ajax()) {
                return $this->httpResponse->setNextUrl(route('public.index'));
            }

            return $next($request);
        })->only([
            'ajaxGetPostByCategory',
            'ajaxGetProducts',
            'getProducts',
        ]);
    }

    public function ajaxGetPostByCategory(int|string $categoryId, BaseHttpResponse $response)
    {
        $category = Category::query()
            ->where('id', $categoryId)
            ->wherePublished()
            ->first();

        if (! $category) {
            abort(404);
        }

        $category
            ->loadMissing(['posts' => function (BelongsToMany $query) {
                $query->orderByDesc('created_at')->wherePublished();
            }]);

        $posts = $category->posts;

        return $response->setData(Theme::partial('posts.posts', compact('posts')));
    }

    public function ajaxGetProducts(Request $request, BaseHttpResponse $response)
    {
        $limit = $request->integer('limit', 10) ?: 10;

        $products = match ($request->query('type')) {
            'featured' => get_featured_products(['take' => $limit]),
            'on-sale' => get_products_on_sale(['take' => $limit]),
            'trending' => get_trending_products(['take' => $limit]),
            'top-rated' => get_top_rated_products($limit),
            default => get_products(['take' => $limit]),
        };

        $data = view(Theme::getThemeNamespace('views.ecommerce.product-items'), compact('products'))->render();

        return $response->setData($data);
    }

    public function getProducts(Request $request, GetProductService $productService, BaseHttpResponse $response)
    {
        if (! EcommerceHelper::productFilterParamsValidated($request)) {
            return $response->setNextUrl(route('public.products'));
        }

        $products = $productService->getProduct($request);

        $total = $products->total();
        $layout = $request->input('layout');

        $message = $total > 1 ? __(':total Products found', compact('total')) : __(
            ':total Product found',
            compact('total')
        );

        $view = Theme::getThemeNamespace('views.ecommerce.includes.product-items');

        if (! view()->exists($view)) {
            $view = 'plugins/ecommerce::themes.includes.product-items';
        }

        $additional = [
            'breadcrumb' => view()->exists(Theme::getThemeNamespace('partials.breadcrumbs')) ? Theme::partial('breadcrumbs') : Theme::breadcrumb()
                ->render(),
        ];

        return $response
            ->setData(view($view, compact('products', 'layout'))->render())
            ->setAdditional($additional)
            ->setMessage($message);
    }

    public function getSearch(Request $request, PostInterface $postRepository, BaseHttpResponse $response)
    {
        $request->validate([
            'q' => ['nullable', 'string', 'max:120'],
        ]);

        if (! empty($query = $request->input('q'))) {
            $posts = $postRepository->getSearch($query);

            if ($posts->isNotEmpty()) {
                return $response
                    ->setData(Theme::partial('search-results', compact('posts')));
            }
        }

        return $response
            ->setError()
            ->setMessage(__('No results found, please try with different keywords.'));
    }

    public function getSearchProducts(Request $request, GetProductService $productService, BaseHttpResponse $response)
    {
        if (! EcommerceHelper::productFilterParamsValidated($request)) {
            return $response->setError();
        }

        $with = EcommerceHelper::withProductEagerLoadingRelations();

        $products = $productService->getProduct($request, null, null, $with);

        if ($products->isNotEmpty()) {
            return $response->setData(Theme::partial('search-results-products', compact('products')));
        }

        return $response
            ->setError()
            ->setMessage(__('No results found, please try with different keywords.'));
    }
}
