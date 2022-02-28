@extends('layouts.home_page')

@section('title')
    Mobile World - Điện thoại
@endsection

@section('content')
    @include('layouts.inc.carousel')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h4 style="color:#fdf2f3; margin-bottom:10px;">Các sản phẩm nổi bật</h4>
                <div class="owl-carousel owl-theme">
                @foreach($featuredCategories as $featuredCategory)
                    @foreach($featuredProducts as $featuredProduct)
                    <div class="item" >
                        <a href="{{ url('category/'.$featuredCategory->slug.'/'.$featuredProduct->slug ) }}">
                        <div class="card" style="border-radius: 15px;">
                            <div style=" margin-top:-1px; margin-left: -2px; color:white; background-color:red; width:100px; height:30px; border-top-right-radius: 25px; border-bottom-right-radius:25px; border-top-left-radius:8px; padding-left: 10px; padding-top: 2px;">Giảm {{ceil(($featuredProduct->original_price - $featuredProduct->selling_price)/$featuredProduct->original_price * 100)}}%</div>
                                <img style="margin-top:10px;" height="350px" src="{{ asset('assets/uploads/products/'.$featuredProduct->image) }}" alt="">
                                <div class="card-body">
                                    <h5>{{ $featuredProduct->name }}</h5>
                                    <span class="float-start" style="color:red;">{{ $featuredProduct->selling_price }}&#8363</span>
                                    <span class="float-end" style="color:black;"><s>{{ $featuredProduct->original_price }}&#8363</s></span>
                                </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                @endforeach  
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h4 style="color:#fdf2f3; margin-bottom:10px;">Các hãng được ưa chuộng</h4>
                <div class="owl-carousel owl-theme">
                    @foreach($featuredCategories as $featuredCategory)
                    <div class="item" >
                    <a href="{{ url('category/'.$featuredCategory->slug) }}">
                        <div class="card" style="border-radius: 15px; background-color:#f8f8f8;">
                            <img style="margin-top:10px;" height="200px" src="{{ asset('assets/uploads/categories/'.$featuredCategory->image) }}" alt="">
                            <div class="card-body" >
                                <h5>{{ $featuredCategory->name }}</h5>
                                <p>
                                    {{ $featuredCategory->description }}
                                </p>
                            </div>
                        </div>
                    </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
        
@endsection

@section('scripts')
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    });
</script>
@endsection

