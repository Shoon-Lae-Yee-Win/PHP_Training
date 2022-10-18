<?php

namespace App\Contracts\Services\Category;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface CategoryServiceInterface
{
    /**
     * To get post
     * @return Array
     */
    public function getPost();

    /**
     * To store post
     * @param Request
     * @return Object
     */
    public function storePost($request);

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
}
