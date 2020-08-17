@extends('layouts.auth')

@section('content')
<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">REM</h1>
        </div>
        <h3>Register to Web Artikel</h3>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                    required name="username" value="{{ old('username') }}">
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required
                    name="name" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                    required name="email" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" required name="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirm Password" required
                    name="password_confirmation">
            </div>
            <div class="form-group">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" checked id="myCheckbox" /><i></i> Agree the terms and policy
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">Login</a>
        </form>
        <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
    </div>
</div>
@endsection

@section('js')
    <script>
        const btnCek = document.getElementById('myCheckbox')
        btnCek.addEventListener('change', (e) => {
            let cek = e.target.checked
            console.log(cek)
        })
        
    </script>
@endsection
