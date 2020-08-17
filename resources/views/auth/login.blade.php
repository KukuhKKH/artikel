@extends('layouts.auth')

@section('content')
<div class="loginColumns animated fadeInDown">
    <div class="row">
        <div class="col-md-6">
            <h2 class="font-bold">Welcome to Artiel web app</h2>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium, architecto?
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis adipisci culpa mollitia consequuntur.
            </p>
            <p>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione dolor aspernatur perferendis cum, quaerat velit ut. Blanditiis velit maxime delectus.
            </p>
            <p>
                <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, animi.</small>
            </p>
            <p>
                <small>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quam at optio debitis error maiores, accusantium ullam .</small>
            </p>
            <p>
                <small>CP : 083845257534 (Kukuh Rahmadani)</small>
            </p>

        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
                    
                @endif
                <form method="POST" action="{{ route('login') }}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" required placeholder="Email / Username" autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                    @if (Route::has('register'))
                    <p class="text-muted text-center">
                        <small>Do not have an account?</small>
                    </p>

                    <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Create an account</a>
                    @endif
                </form>
                <p class="m-t">
                    <small>Company Bersama &copy; 2019 - {{ date('Y') }}</small>
                </p>
            </div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-6">
            Company Bersama
        </div>
        <div class="col-md-6 text-right">
            <small>2019 - {{ date('Y') }}</small>
        </div>
    </div>
</div>
@endsection