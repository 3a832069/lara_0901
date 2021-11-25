<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use App\Models\Post;


class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        $data = [
            'posts' => $posts,
        ];

        return view('admin.posts.index', $data);

    }

    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(PostRequest $request)
    {
        Post::create($request->all());

        return redirect()->route('admin.posts.index');
    }
    public function edit($id)
    {
        $data = ['id' => $id];

        return view('admin.posts.edit', $data);
    }

}
