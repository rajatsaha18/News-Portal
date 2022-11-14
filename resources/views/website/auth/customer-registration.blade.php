@extends('website.master')

@section('title')
    Register Page
@endsection

@section('body')

    <section class="block-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Registration Form</h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li><i class="pe-7s-home"></i> <a href="home-style-one.html" title="">Home</a></li>
                            <li><a href="#" title="">Registration</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-secondary">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-4 mx-auto">
                    <h4 class="text-center text-success">Registration Form</h4>
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <form action="{{ route('register-user') }}" method="post">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if(Session::has('fail'))
                                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                @endif
                                @csrf

                                <div class="form-group mt-5">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Full Name" value="{{old('name')}}"/>
                                </div>
                                <span class="text-danger">@error('name') {{ $message }}@enderror</span>

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
                                    <input type="submit" class="btn btn-success btn-block" value="Register"/>
                                </div>
                            </form>
                            <br>
                            <a href="{{ route('login-customer') }}">Already Register !! Login Here</a>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

