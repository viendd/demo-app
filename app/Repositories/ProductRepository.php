<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function active(): ProductRepository
    {
        return $this->where(['status' => Product::ACTIVE]);
    }

    public function getListProductForAdmin(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->with('category', 'medias')->paginator(10, ['*'], request()->query('page'));
    }

    public function getListProductForClient()
    {
        return $this->with('category', 'medias')->active()->limit(8)->get();
    }

    public function productsSameCategory($category, $product)
    {
        return $this->where(['category_id' => $category->id])->whereNotIn('id', [$product->id])->limit(10)->get();
    }

    public function getProductsByCategories($arraySlugCategories, $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->active()->queryRelationship('whereHas', 'category', function ($q) use ($arraySlugCategories){
            $q->whereIn('slug', $arraySlugCategories);
        })->paginator(10, ['*'], $request->query('page'));
    }

    public function getProductFilter($request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $queryStringCategories = $request->query('categories');
        $queryStringPrices = $request->query('prices');
        $queryStringSort = $request->query('sort');
        $this->active();
        if ($queryStringCategories){
            $this->queryRelationship('whereHas', 'category', function ($q) use ($queryStringCategories){
               $q->whereIn('slug', explode(',', $queryStringCategories));
            });
        }

        if ($queryStringPrices){
            $queryStringPrices = array_map('intval', explode(',', $queryStringPrices));
            $this->whereBetween('price_sell', $queryStringPrices);
        }

        if ($queryStringSort){
            switch ($queryStringSort){
                case "name-asc":
                    $this->orderBy('name', 'asc');
                    break;
                case "name-desc":
                    $this->orderBy('name', 'desc');
                    break;

                case "price-desc":
                    $this->orderBy('price_sell', 'desc');
                    break;

                case "price-asc":
                    $this->orderBy('price_sell', 'asc');
                    break;
            }
        }


        return $this->paginator(10, ['*'], $request->query('page'));
    }
}
