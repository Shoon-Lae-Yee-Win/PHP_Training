<?php

namespace App\Dao;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Contracts\Dao\PostDaoInterface;


/**
 * Data accessing oobject for post
 */
class PostDao implements PostDaoInterface
{
    /**
     * To get post
     * @return Object $post get post
     */
    public function getPost()
    {
        $posts = Post::all();
        return $posts;
    }

    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post storeded post
     */
    public function storePost($request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->save();
        return $post;
    }

    /**
     * To edit post
     * @param id
     * @return Object
     */
    public function editPost($id)
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * To update post
     * @param Request,id
     * @return Object
     */
    public function updatePost($request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->save();
        return $post;
    }

    /**
     * To delete post
     * @param id
     * @return Object
     */
    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return $post;
    }
}
