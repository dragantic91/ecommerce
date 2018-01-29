<?php $menu_home = 'active'; ?>

@extends('front.layouts.app')

@section('meta_title','Home Page')
@section('meta_description','Home Page')

@section('content')
<!-- Main Content - start -->
<main>
    <section class="container">
        <!-- Slider -->
        <div class="fr-slider-wrap">
            <div class="fr-slider">
                <ul class="slides">
                    <li>
                    <img src="front/assets/img/slider/1516750717slide1.jpg" alt="">
                    <div class="fr-slider-cont">
                        <h3>MEGA SALE -30%</h3>
                        <p>Winter collection for women's. <br>We all have choices for you. Check it out!</p>
                        <p class="fr-slider-more-wrap">
                            <a class="fr-slider-more" href="{{ route('all.category.view') }}">View collection</a>
                        </p>
                    </div>
                    </li>
                    <li>
                        <img src="front/assets/img/slider/1516750717slide1.jpg" alt="">
                        <div class="fr-slider-cont">
                            <h3>NEW COLLECTION</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>Aliquam consequuntur dolorem doloribus fuga harum</p>
                            <p class="fr-slider-more-wrap">
                                <a class="fr-slider-more" href="{{ route('all.category.view') }}">Shopping now</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <img src="front/assets/img/slider/1516750717slide1.jpg" alt="">
                        <div class="fr-slider-cont">
                            <h3>SUMMER TRENDS</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>Aliquam consequuntur dolorem doloribus fuga harum</p>
                            <p class="fr-slider-more-wrap">
                                <a class="fr-slider-more" href="{{ route('all.category.view') }}">Start shopping</a>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="container">
        <!-- Popular Products -->
        <div class="fr-pop-wrap">
            <h3 class="component-ttl"><span>Top Angebote</span></h3>
            <div class="fr-pop-tab-cont">
                <p data-frpoptab-num="4" class="fr-pop-tab-mob" data-frpoptab="#frpoptab-tab-4">Kleider</p>
                <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-4">
                    <ul class="slides">
                        @foreach($hitAndNewProducts as $product)
                        <?php
                        $image = $product->image;
                        $imageType = (isset($imageType)) ? $imageType : "medUrl"
                        ?>
                        <li class="prod-i">
                            <div class="prod-i-top">
                                <a href="{{ route('product.view', $product->slug)}}" class="prod-i-img"><img src="{{ $image->$imageType }}"></a>
                            </div>
                            <div class="prod-sticker">
                                @if($product->discount == 1)
                                <p class="prod-sticker-3">{{ number_format(100-($product->discount_price/$product->price*100), 0) }}%</p><br>
                                @endif
                                @if($product->new_product == 1)
                                <p class="prod-sticker-2">NEW</p><br>
                                @endif
                                @if($product->hit_product == 1)
                                <p class="prod-sticker-1">HIT</p><br>
                                @endif
                            </div>
                            <h3>
                                <a href="{{ route('product.view', $product->slug)}}" title="{{ $product->name }}">{{ $product->name }}</a>
                            </h3>
                            @if($product->discount == 1)
                            <p class="prod-i-price">
                                <b>CHF {{ number_format($product->discount_price, 2) }}</b><br>
                                <del>CHF {{ number_format($product->price,2) }}</del>
                            </p>
                            @else
                            <p class="prod-i-price">
                                <b>CHF {{ number_format($product->price,2) }}</b><br>
                                <del></del>
                            </p>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div><!-- .fr-pop-tab-cont -->
    </div><!-- .fr-pop-wrap -->
</section>
</main>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.6/sweetalert2.all.min.js"></script>
<script>
    @if(Session::has('order_made'))
    swal({
        title: '{{ __('front.all_done') }}',
        confirmButtonText: 'OK',
        type: 'success',
        text: '{{ Session::get('order_made') }}'
    });
    @endif
</script>
@stop