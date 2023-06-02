@extends('layout.app')
@section('content')
    <main class="d-flex align-items-center py-4 bg-body-tertiary">
        <div style="max-width: 330px; padding: 1rem;" class="form-signin w-100 m-auto">
            <form action="/login" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" >Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            Don't have an account? <a href="/register">Register</a>
        </div>
    </main>

    
@endsection
