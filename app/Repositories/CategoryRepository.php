<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function active(): CategoryRepository
    {
         $this->query->where('active', Category::ACTIVE);
         return $this;
    }
}
