<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CategoryApiController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {

        $this->categoryRepository = $categoryRepository;
    }

    public function delete($id)
    {
        $category = $this->categoryRepository->find($id);
        if(!$category){
            return response()->json([
                'code' => 404,
                'message' => 'Not found'
            ]);
        }

        $category->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Delete success'
        ]);
    }
}
