<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function getCategoriesHierarchical($id = null, $page = null)
    {
         return $this->query
             ->when(!$page, function ($q){
                 $q->active();
             })
             ->when($id, function ($q) use ($id){
                $q->whereNotIn('id', [$id]);
            })->getParent()->with(['children' => function($q) use ($id){
                $q->when($id, function ($q) use ($id){
                    $q->whereNotIn('id', [$id]);
                });
             }])->get();
    }

    public function getListPaginator()
    {
        return $this->query->orderBy('created_at', 'DESC')->paginate(PER_PAGE);
    }

    public function getListCategoryNoPaginator($isHasProduct = false)
    {
        return $this->query
            ->when($isHasProduct, function ($q){
                $q->hasProduct();
            })
            ->where('active', '=', Category::ACTIVE)
            ->withCount(['products' =>  function ($q){
                 $q->active();
            }])
            ->get();
    }
}
