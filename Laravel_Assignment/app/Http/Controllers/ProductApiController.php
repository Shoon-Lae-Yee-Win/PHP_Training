<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Product\ProductServiceInterface;

class ProductApiController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Api.productapi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = $this->productInterface->listPost();
        return response()->json([

            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prod_name' => 'required|min:5|unique:products,prod_name,',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }
        $this->productInterface->createPost($request);
        return response()->json([
            'status' => 200,
            'message' => "Product added Successfully!"
        ]);
    }

    /**
     * To edit data
     * @param id
     * @return
     */
    public function edit($id)
    {
        $data = $this->productInterface->editPost($id);
        if ($data) {
            return response()->json([
                'status' => 200,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => "No Product!",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'prod_name' => 'required|min:5|unique:products,prod_name,' . $request->id,
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }
        $this->productInterface->updatePost($request, $id);
        return response()->json([
            'status' => 200,
            'message' => "Product updated Successfully!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->productInterface->deletePost($id);
        return response()->json([
            'status' => 200,
            'message' => "Product deleted successfully!",
        ]);
    }
}
