@extends('layouts.home_page')

@section('title')
    {{ $product->name }}
@endsection
@section('content')
  <h4 id="product-navbar-sub">
    <a href="/">Trang chủ </a>
    <i class="fas fa-chevron-right fa-sm"></i>
    <a href="{{ url('category') }}">Hãng</a>
    <i class="fas fa-chevron-right fa-sm"></i> 
    <a href="{{ url('category', $category->slug) }}">{{ $product->category->name }}</a> 
    <i class="fas fa-chevron-right fa-sm"></i>
    {{$product->name}}
  </h4>

  <div class="wrapper product-data">
    <div class="product-img">
      <img src="{{ asset('assets/uploads/products/'.$product->image) }}" alt="product-image">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h3>{{ $product->name }}</h3>
        <div id="status-trending">
          <div class="status">{{ $product->quantity > 0 ? "Còn hàng" : 'Hết hàng' }}</div>
          <div class="trending">{{ $product->trending == '1' ? 'Ưa chuộng' : '' }}</div>
        </div>
        <div class="des">
          <pre>{{$product->description}}</pre>
        </div>
        <span id="product-price" class="float-start" >{{$product->selling_price}}&#8363</span>
        <span id="ori-price" class="float-end"><s>{{$product->original_price}}&#8363</s></span>
      <div class="product-price-btn" >
        <div id="pro-qty" class="quantity" style="float:left; margin-left: 10px;">
          <input type="hidden" value="{{ $product->id }}" class="product_id">
          <label id="product-quantity-label" for="">Số lượng</label>
          <div class="input-group text-center mb-3">
            <button class="input-group-text decrement-btn">-</button>
            <input type="text" class="form-control text-center qty-input" name="quantity" value="1">
            <button class="input-group-text increment-btn">+</button>
          </div>
        </div>
        <div style="float:right">
          @if ( $product->quantity > 0 )
          <button type="button" class="btn btn-success addToCartBtn">
            <i class="fas fa-cart-plus"></i>
            Thêm vào giỏ hàng
          </button>
        @endif
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
            window.location.href="/cart";
          }
        });
    });

  </script>
@endsection