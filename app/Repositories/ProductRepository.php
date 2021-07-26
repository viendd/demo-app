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

    public function getListProductForAdmin(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->with('category', 'medias')->paginator(10, ['*'], request()->query('page'));
    }
}
