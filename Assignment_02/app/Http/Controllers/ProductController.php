<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Product\ProductServiceInterface;

/**
 * This is Product Controller.
 * This handles Post CRUD processing.
 */
class ProductController extends Controller
{
    /**
     * product interface
     */
    private $productInterface;

    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct(ProductServiceInterface $productServiceInterface)
    {
        $this->productInterface = $productServiceInterface;
    }

    /**
     * To show post
     *@return View
     */
    public function show()
    {
        return view('welcome');
    }

    /**
     * To list post
     *@return View
     */
    public function list()
    {
        $data = $this->productInterface->listPost();
        return view('product.product', $data);
    }

    /**
     * To create post
     *@return Redirect
     */
    public function create(Request $request)
    {
        Validator::make($request->all(), [
            'prod_name' => 'required|min:5|unique:products,prod_name,' . $request->id,
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ])->validate();
        $this->productInterface->createPost($request);
        return redirect()->route('product#list')->with(['createSuccess' => 'Category Created ...']);
    }

    /**
     * To edit post
     *@return View
     */
    public function edit($id)
    {
        $data = $this->productInterface->editPost($id);
        return view('product.edit', $data);
    }

    /**
     * To update post
     *@return Redirect
     */
    public function update($id, Request $request)
    {
        $data = $this->productInterface->updatePost($request, $id);
        return redirect()->route('product#list', $data)->with(['updateSuccess' => 'Category Updated...']);
    }

    /**
     * To delete post
     * @return Back
     */
    public function delete($id)
    {
        $this->productInterface->deletePost($id);
        return back()->with(['deleteSuccess' => 'Category Deleted ...']);
    }

    /**
     * To export data
     */
    public function export()
    {
        return $this->productInterface->exportPost();
    }

    /**
     * To immport data
     * @return back
     */
    public function import(Request $request)
    {
        $this->productInterface->importPost($request);
        return back();
    }
}
