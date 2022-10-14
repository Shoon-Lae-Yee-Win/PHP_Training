<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Contracts\Dao\PostDaoInterface;
use App\Contracts\Services\PostServiceInterface;

/**
 * Service class for post.
 */
class PostService implements PostServiceInterface
{
    /**
     * post dao
     */
    private $postDao;
    /**
     * class constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * To get post
     * @return Object $post get post
     */
    public function getPost()
    {
        return $this->postDao->getPost();
    }

    /**
     * To store post
     * @param Request $request request with inputs
     * @return Object $post stored post
     */
    public function storePost($request)
    {
        return $this->postDao->storePost($request);
    }

    /**
     * To edit post
     * @param id
     * @return Object $post edit post
     */
    public function editPost($id)
    {
        return $this->postDao->editPost($id);
    }

    /**
     * To update post
     * @param Request,id
     * @return Object $post update post
     */
    public function updatePost($request, $id)
    {
        return $this->postDao->updatePost($request, $id);
    }

    /**
     * To delete post
     * @param id
     * @return Object $post delete post
     */
    public function deletePost($id)
    {
        return $this->postDao->deletePost($id);
    }
}
