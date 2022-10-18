<?php

namespace App\Dao\Product;

use App\Models\Product;
use App\Models\Category;
use App\Contracts\Dao\Product\ProductDaoInterface;

/**
 * Data accessing oobject for post
 */
class ProductDao implements ProductDaoInterface
{
    /**
     * To list post
     * @return Object
     */
    public function listPost()
    {
        $categories = Category::select('id', 'cat_name')->get();
        $products = Product::with('category')->paginate(3);
        return compact('categories', 'products');
    }

    /**
     * To create post
     * @param Request
     * @return Object
     */
    public function createPost($request)
    {
        $data = $this->productData($request);
        $product = Product::create($data);
        return $product;
    }

    /**
     * To edit post
     * @param id
     * @return Object
     */
    public function editPost($id)
    {
        $categories = Category::select('id', 'cat_name')->get();
        $product = Product::where('id', $id)->first();
        return compact('categories', 'product');
    }

    /**
     * To update post
     * @param request,id
     * @return Object
     */
    public function updatePost($request, $id)
    {
        $categories = Category::select('id', 'cat_name')->get();
        $data = $this->productData($request);
        $productUpdate = Product::where('id', $request->id)->update($data);
        return compact('categories', 'productUpdate');
    }

    /**
     * To delete post
     * @param id
     * @return Object
     */
    public function deletePost($id)
    {
        $productDelete = Product::where('id', $id)->delete();
        return $productDelete;
    }

    /**
     * productData
     */
    private function productData($request)
    {
        return [
            'prod_name' => $request->prod_name,
            'cat_id' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
        ];
    }
}
