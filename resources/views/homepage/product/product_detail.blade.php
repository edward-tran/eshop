@extends('layouts.home_page')

@section('title')
    {{ $product->name }}
@endsection
@section('content')

  <h4 style="margin-left:260px; margin-top:10px; color:white">
    <a href="/" style="color: white;">Trang chủ </a>
    <i class="fas fa-chevron-right fa-sm" style="margin-left:10px; margin-right:10px;"></i> 
    <a href="{{ url('category', $category->slug) }}" style="color: white;">{{ $product->category->name }}</a> 
    <i class="fas fa-chevron-right fa-sm" style="margin-left:10px; margin-right:10px;"></i>
    {{$product->name}}
  </h4>
  <div class="wrapper product-data">
    <div class="product-img">
      <img src="{{ asset('assets/uploads/products/'.$product->image) }}">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h3>{{ $product->name }}</h3>
        <div style="height: 20px; margin-bottom:10px;">
          <div class="status">{{$product->quantity > 0 ? "Còn hàng" : 'Hết hàng'}}</div>
          <div class="trending">{{$product->trending == '1' ? 'Ưa chuộng' : ''}}</div>
        </div>
        <div class="des">
          <pre style="font-family:Arial, Helvetica, sans-serif">{{$product->description}}</pre>
        </div>
        <span style="color:red; margin-left:30px; " class="float-start" >{{$product->selling_price}}&#8363</span>
        <span class="float-end" style="margin-right:50px;"><s>{{$product->original_price}}&#8363</s></span>
      <div class="product-price-btn" >
        <div class="quantity" style="float:left; margin-left: 10px;">
          <input type="hidden" value="{{$product->id}}" class="product_id">
          <label for="" style="margin-right:5px; margin-left:25px; font-weight:bold;">Số lượng</label>
          <div class="input-group text-center mb-3" style="width: 120px; margin-bottom:10px;">
            <button class="input-group-text decrement-btn">-</button>
            <input type="text" class="form-control text-center qty-input" name="quantity" style="height: 38px; width:35px;" value="1">
            <button class="input-group-text increment-btn">+</button>
          </div>
        </div>
        <div style="float:right">
          <button type="button" class="btn btn-success addToCartBtn"><i class="fas fa-cart-plus" style="margin-right:5px;"></i>Thêm vào giỏ hàng</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script>
    $(document).ready(function () {
  $('.increment-btn').click(function (e) { 
    e.preventDefault();
    
    //var inc_value = $('.qty-input').val();
    var inc_value = $(this).closest('.product-data').find('.qty-input').val();
    var value = parseInt(inc_value, 10);
    value = isNaN(value) ? 0 : value;
    if ( value < 10 ){
      value++;
      //$('.qty-input').val(value);
      $(this).closest('.product-data').find('.qty-input').val(value);
    }
  });
});

// Decre button
$(document).ready(function () {
  $('.decrement-btn').click(function (e) { 
    e.preventDefault();
    
    var dec_value = $(this).closest('.product-data').find('.qty-input').val();
    var value = parseInt(dec_value, 10);
    value = isNaN(value) ? 0 : value;
    if ( value > 1 ){
      value--;
      $(this).closest('.product-data').find('.qty-input').val(value);
    }
  });
});

// Add to cart 
$('.addToCartBtn').click(function (e) { 
    e.preventDefault();
    
    var product_id = $(this).closest('.product-data').find('.product_id').val();
    var product_qty = $(this).closest('.product-data').find('.qty-input').val();

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      method: "POST",
      url: "/add-to-cart",
      data: {
        'product_id': product_id,
        'product_qty': product_qty,
      },
      dataType: "json",
      success: function (response) {
        alert(response.status);
        window.location.reload();
      }
    });
});

  </script>
@endsection