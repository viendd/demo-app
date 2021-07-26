<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryRepository->getCategoriesHierarchical(null, 'list');
        return view('admin.category.index')->with(compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getCategoriesHierarchical();
        return view('admin.category.create')->with(compact('categories'));
    }

    public function store(CreateCategoryRequest $request)
    {
        $request->merge(['slug' => Str::slug($request->input('name'))]);
        $category = $this->categoryRepository->store($request->all());
        if($category){
            $request->session()->flash('message_success', 'Thêm mới thành công');
        }else{
            $request->session()->flash('message_error', 'Có lỗi xảy ra. Xin vui lòng thử lại');
        }
        return redirect()->route('category.index');

    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        if(!$category){
            return abort(404);
        }

        $categories = $this->categoryRepository->getCategoriesHierarchical($id);
        return view('admin.category.edit')->with(compact('categories', 'category'));
    }

    public function update($id, EditCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);
        if(!$category){
            return abort(404);
        }
        $request->merge(['slug' => Str::slug($request->input('name'))]);
        $category = $this->categoryRepository->update($id, $request->all());
        if($category){
            $request->session()->flash('message_success', 'Cập nhật thành công');
            return redirect()->route('category.index');
        }
    }


//    //Implicit Binding Model
//    public function show(Category $category)
//    {
//        return $category;
//    }
}
