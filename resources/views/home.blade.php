@extends('layout.app')
@section('content')
<h1>Welcome hehe!</h1>
<form action="/logout" method="post">
    @csrf
    <button class="btn btn-danger">Log out</button>
</form>

<main class="d-flex align-items-center py-4 bg-body-tertiary">
    <div style="max-width: 330px; padding: 1rem;" class="form-signin w-100 m-auto">
        <form action="/create-post" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" placeholder="Title">
            </div>
            <div class="mb-3">
                <textarea name="body" id="" placeholder="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</main>
<div style="border: 3px solid black">
    <h4>All posts</h4>
    @foreach ($posts as $post)
    <div style="background-color: gray; padding: 10px; margin: 10px;">
        <h4>{{ $post['title'] }} by {{ $post->user->name }}</h4>
        {{ $post['body'] }}

        <p><a href="/edit-post/{{$post->id}}" class="btn btn-success">Edit</a></p>
        <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
    @endforeach
</div>

@endsection