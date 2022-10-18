<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Category\CategoryServiceInterface;

/**
 * This is Category Controller.
 * This handles Post CRUD processing.
 */
class CategoryController extends Controller
{
    /**
     * category interface
     */
    private $categoryInterface;

    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct(CategoryServiceInterface $categoryServiceInterface)
    {
        $this->categoryInterface = $categoryServiceInterface;
    }

    /**
     * To list post
     *@return View
     */
    public function list()
    {
        $categories = $this->categoryInterface->getPost();
        return view('category.category', compact('categories'));
    }

    /**
     * To create post
     *@return Redirect
     */
    public function create(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'cat_name' => 'required|unique:categories,cat_name,',
            ]
        )->validate();
        $this->categoryInterface->storePost($request);
        return redirect()->route('category#list')->with(['createSuccess' => 'Category Created ...']);
    }

    /**
     * To edit post
     *@return View
     */
    public function edit($id)
    {
        $category = $this->categoryInterface->editPost($id);
        return view('category.edit', compact('category'));
    }

    /**
     * To update post
     *
     * @return Redirect
     */
    public function update($id, Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'cat_name' => 'required|unique:categories,cat_name,' . $request->id,
            ]
        )->validate();
        $this->categoryInterface->updatePost($request, $id);
        return redirect()->route('category#list')->with(['updateSuccess' => 'Category Updated ...']);
    }

    /**
     * To delete post
     *@return Back
     */
    public function delete($id)
    {
        $this->categoryInterface->deletePost($id);
        return back()->with(['deleteSuccess' => 'Category Deleted ...']);
    }
}
