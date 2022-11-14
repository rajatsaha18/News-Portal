@extends('website.master')

@section('title')
    User-Dashboard Page
@endsection

@section('body')

    <section class="block-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>User Dashboard</h1>
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

    <section class="py-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-9">
                    <h4 class="text-center text-success">Welcome To Dashboard</h4>

                    <div class="card card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td><a href="{{ route('customer-logout') }}">Logout</a></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection


