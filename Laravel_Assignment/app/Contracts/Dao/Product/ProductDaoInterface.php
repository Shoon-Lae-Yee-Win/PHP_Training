<?php

namespace App\Contracts\Dao\Product;

use Illuminate\Http\Request;

/**
 * Interface for data accessing object of post
 */
interface ProductDaoInterface
{
    public function showPost();
    /**
     * To list post
     * @return Array
     */
    public function listPost();

    /**
     * To Create post
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
     * To export
     */
    public function exportPost();

    /**
     * To search
     * @param request
     * @return Object
     */
    public function searchPost($request);
}
