@extends('admin.master')

@section('title')
    Add Sub Category
@endsection

@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">News Sub Category Form</h4>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                <form action="{{route('subcategory.new')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_id" required>
                                <option value="" disabled selected>--select Category--</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Sub Category Description</label>
                        <div class="col-sm-9">
                            <textarea  name="description" class="form-control" id="horizontal-email-input"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Sub Category Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" name="submit" class="btn btn-success w-md">Add Sub Category</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

