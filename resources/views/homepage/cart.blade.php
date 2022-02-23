@extends('layouts.home_page')

@section('title')
    Giỏ hàng
@endsection
@section('content')
    <h4 id="cart-navbar-sub">
        <a href="/">Trang chủ</a>
        <i class="fas fa-chevron-right fa-sm"></i> 
        <a href="{{ url('cart') }}">Cart</a> 
    </h4>
    <div class="wrapper" id="cart-detail">
      @if ($cartItems->count() > 0)
        <table class="table">
        @php $total = 0;@endphp
        @foreach ($cartItems as $cartItem)
            <tr class="product-data">
                <td>
                    <img class="product-image" src="{{ asset('assets/uploads/products/'.$cartItem->products->image ) }}">
                </td>
                <td class="w-75" ><h5>{{ $cartItem->products->name }}</h5></td>
                <td class="w-25">
                  <div id="cart-price-label"><label for="">Giá sản phẩm</label></div>
                  <div class="selling-price">
                    {{ $cartItem->products->selling_price }}&#8363
                  </div>
                </td>
                <td class="w-25">
                    <div class="quantity">
                        <input type="hidden" value="{{ $cartItem->product_id }}" class="product_id" >
                        @if ( $cartItem->products->quantity >= $cartItem->product_qty )
                        <label id="cart-quantity-label" for="">Số lượng</label>
                        <div class="input-group text-center quantity-button">
                          <button class="input-group-text  decrement-btn">-</button>
                          <input type="text" class="form-control text-center qty-input" name="quantity"  value="{{ $cartItem->product_qty }}" >
                          <button class="input-group-text  increment-btn">+</button>
                        </div>
                        @elseif ( $cartItem->products->quantity == 0)
                        <div id="out-of-stock">
                          Hết hàng! &#128532
                        </div>
                        @else
                        <div id="not-enough">Không đủ số lượng trong kho! &#128551
                          <div class="input-group text-center quantity-button">
                            <button class="input-group-text  decrement-btn">-</button>
                            <input type="text" class="form-control text-center qty-input" name="quantity"  value="{{ $cartItem->product_qty }}" >
                            <button class="input-group-text">+</button>
                          </div>
                        </div>
                        @endif
                    </div>
                </td>
                <td class="w-25">
                  <button class="changeQuantity btn btn-primary"><i class="fas fa-upload"></i>Cập nhật</button>
                </td>
                <td class="w-25">
                  <button type="button" class="btn btn-danger delete-cart-item"><i class="fas fa-trash-alt"></i>Xóa</button>
                </td>
            </tr>
            @php $total += $cartItem->products->selling_price * $cartItem->product_qty; @endphp
        @endforeach
        </table>
        <div id="cart-total" class="col-md-12">
          <div id="cart-total-money" class="col-md-9">
            <div>
              <label for="">Tổng tiền</label>
            </div>
            <div>
              <span class="selling-price">{{$total}}&#8363</span>
            </div>
          </div>
          <div id="cart-checkout-button" class="col-md-3">
            <a href="{{ url('checkout') }}" class="btn btn-success" id="checkout">
              <img id="checkout-img" src="{{ asset('assets/img/checkout.png') }}" alt="checkout image">
              Mua hàng
            </a>
          </div>
        </div>
    </div>
    @else
    <div style="color:red;">
      Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm vào giỏ hàng!
    </div>
    @endif
@endsection
@section('scripts')
  <script>
    // Incre button
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

    $('.changeQuantity').click(function (e) { 
      e.preventDefault();
      
      var product_id = $(this).closest('.product-data').find('.product_id').val();
      var update_qty = $(this).closest('.product-data').find('.qty-input').val();

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: "POST",
        url: "update-cart",
        data: {
          'product_id':product_id,
          'product_qty':update_qty,
        },
        dataType: "json",
        success: function (response) {
          alert(response.status);
          window.location.reload();
        }
      });
    });

    $('.delete-cart-item').click(function (e) { 
      e.preventDefault();

      var product_id = $(this).closest('.product-data').find('.product_id').val();

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: "POST",
        url: "delete-cart-item",
        data: {
          'product_id':product_id,
        }
        ,
        dataType: "json",
        success: function (response) {
          alert(response.status);
          window.location.reload();
        }
      });

    });

  </script>
@endsection