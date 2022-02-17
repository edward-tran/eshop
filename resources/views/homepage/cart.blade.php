@extends('layouts.home_page')

@section('title')
    Giỏ hàng
@endsection
@section('content')
@include('sweetalert::alert')
    <h4 style="margin-left:260px; margin-top:10px; color:white">
        <a href="/" style="color: white;">Trang chủ </a>
        <i class="fas fa-chevron-right fa-sm" style="margin-left:10px; margin-right:10px;"></i> 
        <a href="{{ url('cart') }}" style="color: white;">Cart</a> 
    </h4>
    <div class="wrapper" style="height: auto; padding:15px;">
        <table class="table">
        @php $total = 0;@endphp
        @foreach ($cartItems as $cartItem)
            <tr style="margin-top:50px;" class="product-data">
                <td style="text-align:center; width:100px;">
                    <img src="{{ asset('assets/uploads/products/'.$cartItem->products->image ) }}" width="80px"; height="80px;">
                </td>
                <td class="w-75" ><h5 style="margin-top:25px;">{{ $cartItem->products->name }}</h5></td>
                <td class="w-25">
                  <div style="font-weight:bold;"><label for="">Giá sản phẩm</label></div>
                  <div style="margin-top: 8px; color:red; font-weight:bold; font-size:20px;">
                    {{ $cartItem->products->selling_price }}&#8363
                  </div>
                </td>
                <td class="w-25">
                    <div class="quantity">
                        <input type="hidden" value="{{ $cartItem->product_id }}" class="product_id" >
                        <label for="" style="margin-left:25px; "><b>Số lượng</b></label>
                        <div class="input-group text-center" style="margin-bottom:10px; width:120px;">
                            <button class="input-group-text  decrement-btn">-</button>
                            <input type="text" class="form-control text-center qty-input" name="quantity"  value="{{ $cartItem->product_qty }}" >
                            <button class="input-group-text  increment-btn">+</button>
                        </div>
                    </div>
                </td>
                <td class="w-25">
                  <button class="changeQuantity btn btn-primary" style="width:120px; margin-top:20px; border-radius:30px;"><i class="fas fa-upload" style="margin-right:5px;"></i>Cập nhật</button>
                </td>
                <td class="w-25" style="text-align: center;">
                  <button style="width:80px; margin-top:20px; margin-right:10px; border-radius:30px;" type="button" class="btn btn-danger delete-cart-item"><i class="fas fa-trash-alt" style="margin-right:5px;"></i>Xóa</button>
                </td>
            </tr>
            @php $total += $cartItem->products->selling_price * $cartItem->product_qty; @endphp
        @endforeach
        </table>
        <div style="display: inline-block;" class="col-md-12">
          <div style="float:left; text-align:center; font-weight:bold; padding-left:110px;" class="col-md-9">
            <div>
              <label for="">Tổng tiền</label>
            </div>
            <div>
              <span style="color: red;">{{$total}}&#8363</span>
            </div>
          </div>
          <div style="float:right; padding-top:10px;" class="col-md-3">
            <button class="btn btn-success" style="border-radius:30px; width:150px; height:45px;"><img src="{{ asset('assets/img/checkout.png') }}" style="margin-right:5px;" width="30px;" height="30px;" >Thanh toán</button>
          </div>
        </div>
    </div>
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