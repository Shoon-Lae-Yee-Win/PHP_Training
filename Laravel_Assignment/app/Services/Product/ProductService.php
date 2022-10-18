<?php

namespace App\Services\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Contracts\Dao\Product\ProductDaoInterface;
use App\Contracts\Services\Product\ProductServiceInterface;

/**
 * Service class for post.
 */
class ProductService implements ProductServiceInterface
{
    /**
     * post dao
     */
    private $productDao;
    /**
     * class constructor
     * @param ProductDaoInterface
     * @return
     */
    public function __construct(ProductDaoInterface $productDao)
    {
        $this->productDao = $productDao;
    }

    /**
     * To list post
     * @return Array
     */
    public function listPost()
    {
        return $this->productDao->listPost();
    }

    /**
     * To create post
     * @param Request
     * @return Object
     */
    public function createPost($request)
    {
        return $this->productDao->createPost($request);
    }

    /**
     * To edit post
     * @param id
     * @return Object
     */
    public function editPost($id)
    {
        return $this->productDao->editPost($id);
    }

    /**
     * To update post
     * @param Request,id
     * @return Object
     */
    public function updatePost($request, $id)
    {
        return $this->productDao->updatePost($request, $id);
    }

    /**
     * To delete post
     * @param id
     * @return Object
     */
    public function deletePost($id)
    {
        return $this->productDao->deletePost($id);
    }

    /**
     * To export data
     * @return Array
     */
    public function exportPost()
    {
        $products=$this->productDao->exportPost();
        return Excel::download(new ProductExport($products), 'product.xlsx');
    }

    /**
     * To import data
     * @return Array
     */
    public function importPost($request)
    {
        return Excel::import(new ProductImport,$request->file('product_file'));
    }
}
