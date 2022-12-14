<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface PostServiceInterface
{
    /**
     * To get post
     * @return Array $post get post
     */
    public function getPost();

    /**
     * To store post
     * @param Request $request request with inputs
     * @return Object $post stored post
     */
    public function storePost($request);

    /**
     * To edit post
     * @param id
     * @return Object $post edit post
     */
    public function editPost($id);

    /**
     * To update post
     * @param Request,id
     * @return Object $post update post
     */
    public function updatePost($request, $id);

    /**
     * To destroy post
     * @param id
     * @return Object $post delete post
     */
    public function deletePost($id);
}
