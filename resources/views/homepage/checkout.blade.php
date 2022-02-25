@extends('layouts.home_page')
@section('title')
    Thông tin đặt hàng
@endsection
@section('content')
 <div class="wrapper" id="checkout-page">
    <form action="{{ url('place-order') }}" method="POST">
        @csrf
        <div id="left-content" class="col-md-6">
            <div id="customer-detail">Thông tin khách hàng</div>
            <hr>
            <div id="checkout-form">
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Tên</label>
                    <input class="col-md-9 custom-input name" name="name" type="text" placeholder="Nhập vào tên" value="{{ Auth::user()->name }}">
                    <span id="name_error" class="text-danger" style="font-size: 15px; width:600px; height:10px; margin-left:130px;"></span>
                </div>
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Email</label>
                    <input class="col-md-9 custom-input email" name="email" type="text" placeholder="Nhập vào email" value="{{ Auth::user()->email }}">
                    <span id="email_error" class="text-danger" style="font-size: 15px; width:600px; height:10px; margin-left:130px;"></span>
                </div>
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Địa chỉ</label>
                    <input class="col-md-9 custom-input address" name="address" type="text" placeholder="Nhập vào địa chỉ" value="{{ Auth::user()->address }}">
                    <span id="address_error" class="text-danger" style="font-size: 15px; width:600px; height:10px; margin-left:130px;"></span>
                </div>
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Số điện thoại</label>
                    <input class="col-md-9 custom-input phone" name="phone" type="text" placeholder="Nhập vào số điện thoại" value="{{ Auth::user()->phone }}">
                    <span id="phone_error" class="text-danger" style="font-size: 15px; width:600px; height:10px; margin-left:130px;"></span>
                </div>
            </div>
        </div>
        <div id="right-content" class="col-md-6">
            <div id="checkout-cart-detail">Thông tin giỏ hàng</div>
            <hr>
            <div id="detail">
                <table>
                    <thead>
                        <tr id="thead-tr">
                            <td class="col-md-2"></td>
                            <td class="col-md-4">Sản phẩm</td>
                            <td class="col-md-2">Giá</td>
                            <td class="col-md-2">Số lượng</td>
                            <td class="col-md-2">Tong tien</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                        @foreach ($cartItems as $cartItem)
                            <td class="col-md-2">
                                <img id="td-img" src="{{ asset('assets/uploads/products/'.$cartItem->products->image ) }}" alt="product-image">
                            </td>
                            <td id="td-product-name" class="col-md-4">
                                {{ $cartItem->products->name }}
                            </td>
                            <td class="col-md-2">
                                {{ $cartItem->products->selling_price }}&#8363
                            </td>
                            <td class="col-md-2">
                                {{ $cartItem->product_qty }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="place-order-button" class="col-md-12">
                <div style="float: left;" class="col-md-6"></div>
                <div style="float: right" class="col-md-6">
                    <input type="hidden" name="payment_method" value="COD">
                    <button type="submit" class="btn btn-danger">Thanh Toán | COD</button>
                    <button type="button" class="btn btn-success razorpayBtn" style="margin-top:5px;">
                    Thanh Toán với Razorpay
                    </button>
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
    </form>
 </div>

@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('.razorpayBtn').click(function (e) { 
            e.preventDefault();
            
            var name = $('.name').val();
            var email = $('.email').val();
            var address = $('.address').val();
            var phone = $('.phone').val();

            if (!name){
                name_error = "Vui lòng nhập tên của bạn!";
                $('#name_error').html('');
                $('#name_error').html(name_error);
            }else{
                name_error ="";
                $('#name_error').html('');
            }

            if (!email){
                email_error = "Vui lòng nhập email của bạn!";
                $('#email_error').html('');
                $('#email_error').html(email_error);
            }else{
                email_error ="";
                $('#email_error').html('');
            }

            if (!address){
                address_error = "Vui lòng nhập địa chỉ của bạn!";
                $('#address_error').html('');
                $('#address_error').html(address_error);
            }else{
                address_error ="";
                $('#address_error').html('');
            }

            if (!phone){
                phone_error = "Vui lòng nhập số điện thoại của bạn!";
                $('#phone_error').html('');
                $('#phone_error').html(phone_error);
            }else{
                phone_error ="";
                $('#phone_error').html('');
            }

            if (name_error != '' ||  email_error != '' || address_error != '' ||  phone_error != ''){
                return false;
            }else{

                var data = {
                    'name':name,
                    'email':email,
                    'address':address,
                    'phone':phone,
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "pay-with-razorpay",
                    data: data,
                    success: function (response) {
                        //alert(response.total);
                        var options = {
                            "key": "rzp_test_yUEnNRIjIsLKcp", // Enter the Key ID generated from the Dashboard
                            "amount": 1*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": "INR",
                            "name": response.name,
                            "description": "Cảm ơn bạn đã chọn dịch vụ của chúng tôi!",
                            "image": "https://example.com/your_logo",
                            //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                            "handler": function (responses){
                                alert(responses.razorpay_payment_id);


                                $.ajax({
                                    type: "POST",
                                    url: "place-order",
                                    data:{
                                        'name':responses.name,
                                        'email':responses.email,
                                        'address':responses.address,
                                        'phone':responses.phone,
                                        'payment_method':"Thanh toán với Razorpay",
                                        'payment_id':responses.razorpay_payment_id
                                    },
                                    success: function (responsess) {
                                        alert(responsess.status);
                                    }
                                });
                            },
                            "prefill": {
                                "name": response.name,
                                "email": response.email,
                                "contact": response.phone
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };

                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    }
                });
            }
        });
    });
</script>
<script src="https://www.paypal.com/sdk/js?client-id=AYTu49Iof3rOlAHaiHm2EjdjbR1TlwBk3YmvXcjuh-gvKmelJZCYMosPe1tBqiTru7xc9vfenmahK7y6"></script>
<script>
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '77.44' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
              }
            }]
          });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                
                var data = {
                    'name':name,
                    'email':email,
                    'address':address,
                    'phone':phone,
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "place-order",
                    data: {
                        'name':name,
                        'email':email,
                        'address':address,
                        'phone':phone,
                        'payment_method':'Thanh toan voi Paypal',
                        'payment_id':transaction.id
                    },
                    success: function (response) {
                        alert(response.status);
                    }
                });

            // When ready to go live, remove the alert and show a success message within this page. For example:
            // var element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
    }).render('#paypal-button-container');
</script>
@endsection
