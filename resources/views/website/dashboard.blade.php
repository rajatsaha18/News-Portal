@extends('website.master')

@section('title')
    User Dashboard
@endsection

@section('body')
    <section class="py-5 mt-4 mb-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            You are Logged In
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
