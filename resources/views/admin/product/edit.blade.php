@extends('layouts.admin')
@section('title')
Edit Product Detail
@endsection
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
            <h4>Edit Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-product', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Category</label>
                        <select class="form-select">
                            <option >{{ $product->category->name }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $product->slug }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control" >{{ $product->small_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control" >{{ $product->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" name="original_price" value="{{ $product->original_price }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling price</label>
                        <input type="number" class="form-control" name="selling_price" value="{{ $product->selling_price }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" name="tax" value="{{ $product->tax }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$product->status == '1' ? 'checked':''}}  name="status" ">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{$product->trending == '1' ? 'checked' : ''}} name="trending" value="{{ $product->slug }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $product->meta_title }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{$product->meta_description}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{ $product->meta_keywords }}</textarea>
                    </div>
                    <div class="col-md-6" style="text-align: center;">
                    @if ($product->image)
                        <div style="float: left;">
                            <label for="">Product Image</label>
                        </div>
                        <div style="display: inline-block; float:right;">
                            <img src="{{ asset('assets/uploads/products/'.$product->image ) }}" class="w-25">
                        </div>
                    @endif
                    </div>
                    <div class="col-md-6" >
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