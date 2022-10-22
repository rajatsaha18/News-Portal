@extends('admin.master')

@section('title')
    Edit subcategory
@endsection

@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">News SubCategory Edit Form</h4>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                <form action="{{route('subcategory.update', ['id' => $subCategory->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">SubCategory Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{$subCategory->name}}" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">SubCategory Description</label>
                        <div class="col-sm-9">
                            <textarea  name="description" class="form-control" id="horizontal-email-input">{{$subCategory->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">SubCategory Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                            <img src="{{asset($subCategory->image)}}" alt="" height="60" width="80"/>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" name="submit" class="btn btn-success w-md">Update SubCategory info</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


