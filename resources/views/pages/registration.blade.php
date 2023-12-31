@extends('app')

@section('custom-css')
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/sign-in.css" rel="stylesheet" />
@endsection

@section('content')
    <main class="form-signin w-100 m-auto">
        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57" />
            <h1 class="h3 mb-3 fw-normal">Register form</h1>

            <div class="form-floating">
                <input type="name" class="form-control" id="floatingInput" placeholder="harry" name="name" />
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
                <label for="floatingInput">Your name</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                    name="email" />

                <label for="floatingInput">Email address</label>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" />
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">
                Sign in
            </button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
        </form>
    </main>
@endsection
