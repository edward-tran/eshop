@extends('layouts.home_page')

@section('title')
    Điện thoại {{ $category->name }}
@endsection

@section('content')
<h4 style="color:white; margin-top:10px; margin-left:120px;">
<a href="/" style="color:white;"> Trang chủ </a>
<i class="fas fa-chevron-right fa-sm" style="margin-left:10px; margin-right:10px;"></i> 
{{ $category->name }}</h4>
    <div class="py-5">
        <div class="container">
            <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4 mb-3" >
                        <div class="card" style="border-radius: 15px;">
                            <a href="{{ url('category/'.$category->slug.'/'. $product->slug) }}">
                            <img style="margin-top:10px; height:300px;"  src="{{ asset('assets/uploads/products/'.$product->image) }}" alt="">
                            <div class="card-body" style="border-radius: 15px; ">
                                <h5 style="height:50px;">{{ $product->name }}</h5>
                                <span class="float-start" style="color:red;">{{ $product->selling_price }}&#8363</span>
                                <span class="float-end"><s>{{ $product->original_price }}&#8363</s></span>
                            </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection