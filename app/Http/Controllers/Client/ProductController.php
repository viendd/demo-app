<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show(Product $product)
    {
        if (!isAttributeModelExists($product)){
             return view('client.pages.404');
        }

        $product = $product->load(['category', 'medias']);

        $category = $this->categoryRepository->find($product->getAttribute('category_id'));
        $productsSameCategory = $this->productRepository->productsSameCategory($category, $product);
        return view('client.pages.product-detail')->with(compact('product', 'productsSameCategory'));
    }

    public function getProductsByCategory(Category $category, Request $request)
    {
        if (!isAttributeModelExists($category)){
            return view('client.pages.404');
        }
        $categories = $this->categoryRepository->getListCategoryNoPaginator(false);

        $productsCategory = $this->productRepository->getProductsByCategories([$category->getAttribute('slug')], $request);
        return view('client.pages.product-category')->with(compact('categories', 'productsCategory'));

    }

    public function filterProduct(Request $request)
    {
        $categories = $this->categoryRepository->getListCategoryNoPaginator(false);
        $productsCategory = $this->productRepository->getProductFilter($request);
        return view('client.pages.product-category')->with(compact('categories', 'productsCategory'));
    }
}
