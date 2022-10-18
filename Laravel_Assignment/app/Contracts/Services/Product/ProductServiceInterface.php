<?php

namespace App\Contracts\Services\Product;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface ProductServiceInterface
{
    /**
     * To list post
     * @return Array
     */
    public function listPost();

    /**
     * To create post
     * @param Request
     * @return Object
     */
    public function createPost($request);

    /**
     * To edit post
     * @param id
     * @return Object
     */
    public function editPost($id);

    /**
     * To update post
     * @param Request,id
     * @return Object
     */
    public function updatePost($request, $id);

    /**
     * To destroy post
     * @param id
     * @return Object
     */
    public function deletePost($id);

    /**
     * To export data
     * @return Array
     */
    public function exportPost();

    /**
     * To import data
     * @return Array
     */
    public function importPost($request);
}
