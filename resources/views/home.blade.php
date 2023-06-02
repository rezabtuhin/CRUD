@extends('layout.app')
@section('content')

@auth
<h1>Welcome hehe!</h1>
<form action="/logout" method="post">
    @csrf
    <button class="btn btn-danger">Log out</button>
</form>
@else
{{ redirect('/register')}}
@endauth

<h1>hello</h1>

@endsection