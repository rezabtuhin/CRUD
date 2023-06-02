<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function deletePost(Post $post)
    {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }
        return redirect('/');

    }


    public function updatePost(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        $incommingField = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $incommingField['title'] = strip_tags($incommingField['title']);
        $incommingField['body'] = strip_tags($incommingField['body']);
        $post->update($incommingField);
        return redirect('/');
    }

    public function showEditScreen(Post $post)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);

    }

    public function createPost(Request $request)
    {
        $incommingField = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incommingField['title'] = strip_tags($incommingField['title']);
        $incommingField['body'] = strip_tags($incommingField['body']);
        $incommingField['user_id'] = auth()->id();
        Post::create($incommingField);

        return redirect('/');
    }
}