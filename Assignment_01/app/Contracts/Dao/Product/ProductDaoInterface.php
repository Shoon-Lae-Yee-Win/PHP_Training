<?php

namespace App\Contracts\Dao\Product;

/**
 * Interface for data accessing object of post
 */
interface ProductDaoInterface
{
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
}
