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
     * To show post
     * @return Array
     */
    public function showPost()
    {
        $data = Product::orderBy('id', 'desc')->get();
        return $data;
    }

    /**
     * To list post
     * @return Array
     */
    public function listPost()
    {
        $categories = Category::select('id', 'cat_name')->get();
        $products = Product::with('category')->get();
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
     * To export post
     * @return Array
     */
    public function exportPost()
    {
        $products = Product::all();
        return $products;
    }

    /**
     * To search post
     * @return Array
     */
    public function searchPost($request)
    {
        $name = $request->name;
        $category = $request->category;
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $products = Product::join('categories', 'products.cat_id', '=', 'categories.id')
            ->select('products.*', 'categories.cat_name');
        if ($name) {
            $products->whereRaw("prod_name like '%$name%'");
        }
        if ($category) {
            $products->whereRaw("cat_name like '%$category%'");
        }
        if ($startDate) {
            $products->whereRaw("products.created_at >= '$startDate'");
        }
        if ($endDate) {
            $products->whereRaw("products.created_at <= '$endDate'");
        }
        $products = $products->get();
        return $products;
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
