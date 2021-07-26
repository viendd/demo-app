<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

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
    /**
     * @var UploadService
     */
    private $uploadService;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository, UploadService $uploadService)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->uploadService = $uploadService;
    }

    public function index()
    {
        $products = $this->productRepository->getListProductForAdmin();
        return view('admin.product.index')->with(compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getCategoriesHierarchical();
        $codeGenerate = Product::generateCode();
        return view('admin.product.create')->with(compact('categories', 'codeGenerate'));
    }

    public function setDataInsertImageMulti($arrayPath): array
    {
        $data = [];
        collect($arrayPath)->map(function ($path) use (&$data){
            array_push($data, [
                'media' => $path,
                'collection' => 'detail'
            ]);
        });

        return $data;
    }

    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $product = $this->productRepository->store($request->all());
            $pathImageFeature = $this->uploadService->upload($request->file('image_feature'), 'products');
            $arrayPathImageDetail = $this->uploadService->uploadMulti($request->file('image'), 'products');

            $product->medias()->create(['collection' => 'feature', 'media' => $pathImageFeature]);

            $arrayPathImageDetail = $this->setDataInsertImageMulti($arrayPathImageDetail);
            $product->medias()->createMany($arrayPathImageDetail);
            DB::commit();
            $request->session()->flash('message_success', 'Thêm mới sản phẩm thành công');
            return redirect()->route('admin.product.index');
        }catch (\Exception $exception){
            DB::rollBack();
            dd($exception);
            Log::info($exception);
        }
    }
}
