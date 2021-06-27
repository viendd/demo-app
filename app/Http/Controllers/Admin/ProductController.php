<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return view('admin.product.index');
    }
}
