<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Contracts\Services\PostServiceInterface;
use App\Http\Requests\postCreateRequest;
use App\Http\Requests\postUpdateRequest;

/**
 * This is Post Controller.
 * This handles Post CRUD processing.
 */
class PostController extends Controller
{
    /**
     * post interface
     */
    private $postInterface;

    /**
     * Cretae a new controller instance
     *
     * @return void
     */
    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->postInterface = $postServiceInterface;
    }

    /**
     * To create post
     *
     * @return View index posts
     */
    public function show()
    {
        $posts = $this->postInterface->getPost();
        return view('index', compact('posts'));
    }

    /**
     * To store data
     *
     * @return Redirect /
     */
    public function store(postCreateRequest $request)
    {
        $post = $this->postInterface->storePost($request);
        return redirect('/');
    }

    /**
     * To edit data
     */
    public function edit($id)
    {
        $posts = $this->postInterface->getPost();
        $post = $this->postInterface->editPost($id);
        return view('index', compact('post', 'posts'));
    }

    /**
     * To update data
     */
    public function update(postUpdateRequest $request, $id)
    {
        $post = $this->postInterface->updatePost($request, $id);
        return redirect('/');
    }

    /**
     * To delete data
     */
    public function destroy($id)
    {
        $post = $this->postInterface->deletePost($id);
        return redirect('/');
    }
}
