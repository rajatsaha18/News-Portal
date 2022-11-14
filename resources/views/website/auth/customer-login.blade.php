@extends('website.master')

@section('title')
    Login Page
@endsection

@section('body')
    <section class="block-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Login Form</h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li><i class="pe-7s-home"></i> <a href="home-style-one.html" title="">Home</a></li>
                            <li><a href="#" title="">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-secondary">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-4 mr-auto">
                    <h4 class="text-center text-success">Login Form</h4>
                    <div class="card text-muted">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <form action="{{ route('login-user') }}" method="post">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if(Session::has('fail'))
                                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                @endif
                                @csrf

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{old('email')}}"/>
                                </div>
                                <span class="text-danger">@error('email') {{ $message }}@enderror</span>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}"/>
                                </div>
                                <span class="text-danger">@error('password') {{ $message }}@enderror</span>

                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" class="btn btn-success btn-block" value="Login"/>
                                </div>
                            </form>
                            <br>
                            <a href="{{ route('registration-customer') }}">New User !! Register Here</a>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
