<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //create function
    public function create()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    //store data function
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

    //edit data function
    public function edit($id)
    {
        $post = Post::find($id);
        $posts = Post::all();
        return view('index', compact('post', 'posts'));
    }

    //update data function
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

    //delete data function
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/');
    }
}
