@extends('layout.app')
@section('content')
<h1>Welcome hehe!</h1>
<form action="/logout" method="post">
    @csrf
    <button class="btn btn-danger">Log out</button>
</form>

<main class="d-flex align-items-center py-4 bg-body-tertiary">
    <div style="max-width: 330px; padding: 1rem;" class="form-signin w-100 m-auto">
        <form action="/edit-post/{{$post->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" placeholder="Title" value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <textarea name="body" id="" placeholder="body">{{ $post->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
</main>
@endsection