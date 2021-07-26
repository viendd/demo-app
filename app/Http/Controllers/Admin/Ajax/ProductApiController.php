<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class ProductApiController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    public function delete($id)
    {
        $product = $this->productRepository->find($id);
        if(!$product){
            return response()->json([
                'code' => 404,
                'message' => 'Not found'
            ]);
        }

        $product->delete();
        return response()->json([
            'code' => 200,
            'message' => 'Delete success'
        ]);
    }
}
