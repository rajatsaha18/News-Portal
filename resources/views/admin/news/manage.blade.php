@extends('admin.master')

@section('title')
    Manage News
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All News Info</h4>
                    <h4 class="text-success text-center">{{Session::get('message')}}</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl no.</th>
                            <th>Category Name</th>
                            <th>SubCategory Name</th>
                            <th>News Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newses as $news)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$news->category->name}}</td>
                                <td>{{$news->subcategory?->name}}</td>
                                <td>{{$news->title}}</td>
                                <td>{{$news->description}}</td>
                                <td><img src="{{asset($news->image)}}" alt="" height="60" width="80"></td>
                                <td>
                                    <a href="{{route('news.edit', ['id' => $news->id])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('news.delete', ['id' => $news->id])}}" class="btn btn-danger btn-sm" onclick=" return confirm( 'Are you sure delete this category ?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection



