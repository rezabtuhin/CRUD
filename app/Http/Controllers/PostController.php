<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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