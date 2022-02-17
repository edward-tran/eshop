@extends('layouts.admin')
@section('content')
    @if (\Session::has('message'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('message') !!}</li>
            </ul>
        </div>
    @endif
    <div class="card" style="margin: 20px 20px; border-radius:20px;">
        <div class="card-header" style="border-top-left-radius:20px; border-top-right-radius: 20px;">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control" >{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$category->status =='1' ? 'checked' : ''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" {{$category->status =='1' ? 'checked' : ''}} name="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_descrip" rows="3" class="form-control">{{$category->meta_descrip}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{$category->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-6" style="text-align: center;">
                    @if ($category->image)
                        <div style="float: left;">
                            <label for="">Category Image</label>
                        </div>
                        <div style="display: inline-block; float:right;">
                            <img src="{{ asset('assets/uploads/categories/'.$category->image ) }}" class="w-25">
                        </div>
                    @endif
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12" style="text-align: center;">
                        <button type="submit" class="btn btn-primary" style="border-radius:20px;"> UPDATE </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection