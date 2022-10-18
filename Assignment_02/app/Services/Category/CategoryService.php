<?php

namespace App\Services\Category;

use Illuminate\Http\Request;
use App\Contracts\Dao\Category\CategoryDaoInterface;
use App\Contracts\Services\Category\CategoryServiceInterface;

/**
 * Service class for post.
 */
class CategoryService implements CategoryServiceInterface
{
    /**
     * post dao
     */
    private $categoryDao;
    /**
     * class constructor
     * @param CategoryDaoInterface
     * @return
     */
    public function __construct(CategoryDaoInterface $categoryDao)
    {
        $this->categoryDao = $categoryDao;
    }

    /**
     * To get post
     * @return Array
     */
    public function getPost()
    {
        return $this->categoryDao->getPost();
    }

    /**
     * To store post
     * @param Request
     * @return Object
     */
    public function storePost($request)
    {
        return $this->categoryDao->storePost($request);
    }

    /**
     * To edit post
     * @param id
     * @return Object
     */
    public function editPost($id)
    {
        return $this->categoryDao->editPost($id);
    }

    /**
     * To update post
     * @param Request,id
     * @return Object
     */
    public function updatePost($request, $id)
    {
        return $this->categoryDao->updatePost($request, $id);
    }

    /**
     * To delete post
     * @param id
     * @return Object 
     */
    public function deletePost($id)
    {
        return $this->categoryDao->deletePost($id);
    }
}
