<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * To create data
     * @return view('index', Array)
     */
    public function create()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    /**
     * To store data
     * @param Request
     * @return Redirect ('/')
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'title' => 'required',
            'author' => 'required',
        ));
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $post = new Post;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->save();
        return redirect('/');
    }

    /**
     * To edit data
     * @param id
     * @return view('index', Array('post', 'posts'));
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $posts = Post::all();
        return view('index', compact('post', 'posts'));
    }

    /**
     * To update data
     * @param Request,id
     * @return Redirect('/')
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), array(
            'title' => 'required',
            'author' => 'required',
        ));
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }
        $post = Post::find($id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->save();
        return redirect('/');
    }

    /**
     * To destory data
     * @param id
     * @return Redirect('/')
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/');
    }
}
