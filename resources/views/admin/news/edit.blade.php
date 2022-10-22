@extends('admin.master')

@section('title')
    Edit News
@endsection

@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">News Edit Form</h4>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                <form action="{{route('news.update', ['id'=> $news->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">News Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" value="{{$news->title}}" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">News Description</label>
                        <div class="col-sm-9">
                            <textarea  name="description" class="form-control" id="horizontal-email-input">{{$news->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">News Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                            <img src="{{asset($news->image)}}" alt="" height="60" width="80"/>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" name="submit" class="btn btn-success w-md">Update News info</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



