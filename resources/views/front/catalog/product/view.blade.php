@extends('front.layouts.app')

@section('meta_title')
    {{ $product->name }} - Schoengebraucht
@endsection

@section('content')

<!-- Main Content - start -->
<main>
    <section class="container">
        <ul class="b-crumbs">
            <li>
                <a href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('all.category.view') }}">
                    Catalog
                </a>
            </li>
        </ul>

        <!-- Single Product - start -->
        <div class="prod-wrap">

            <!-- Product Images -->
            <div class="prod-slider-wrap">
                <div class="prod-slider">
                    <ul class="prod-slider-car">
                        @foreach($images as $image)
                            <li>
                                <a data-fancybox-group="product" class="fancy-img" href="{{ $image->path->url }}">
                                    <img src="{{ $image->path->medUrl }}" alt="">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="prod-thumbs">
                    <ul class="prod-thumbs-car">
                        @foreach($images as $key => $image)
                            <li>
                                <a data-slide-index="{{ $key }}" href="#">
                                    <img src="{{ $image->path->url }}" alt="">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Product Description/Info -->


            <div class="prod-cont">
                <h1 class="main-ttl"><span>{{ $product->name }}</span></h1>
                <div class="prod-cont-txt">
                    {!! $product->description !!}
                </div>


                <div class="prod-info">
                    <p class="prod-price">
                    @if($product->discount == 1)
                        <b>CHF {{ number_format($product->discount_price, 2) }}</b><br>
                        <del>CHF {{ number_format($product->price,2) }}</del>
                    @else
                        <b>CHF {{ number_format($product->price,2) }}</b><br>
                        <del></del>
                    @endif
                    </p>

                    <form method="post" action="{{ route('cart.add-to-cart') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="slug" value="{{ $product->slug }}"/>
                        <p class="prod-qnt">
                            <input id="prodQnt" class="prod-qty" name="qty" value="1" type="text" data-max="{{ $product->qty }}">
                            <a id="prodPlus" class="prod-plus"><i class="fa fa-angle-up"></i></a>
                            <a id="prodMinus" class="prod-minus"><i class="fa fa-angle-down"></i></a>
                        </p>
                        <button type="submit" class="prod-addwrap-button"
                                href="{{ route('cart.add-to-cart', $product->id) }}">
                            In den Warenkorb
                        </button>
                    </form>
                </div>

                <div class="row">
                    <div class="col-xs-6" id="prodart"><a href="#" style="color: dodgerblue" class="qview-btn prod-i-qview"><span>Frage Zum Artikel</span></a></div>
                    <div class="col-xs-6" id="prodart"><a href="mailto:?Subject=Schoengebraucht&amp;Body={{ Request::url() }}" style="color: dodgerblue">Artikel weiterempfehlen</a></div>
                </div>
                <h4 style="color: red; margin-top: 35px;">Artikel Nr. {{ $product->product_no }}</h4>
                <!-- Share Links -->

                <div class="post-share-wrap">
                    <h4 id="share">Teilen</h4>
                    <ul class="post-share">
                        <li>
                            <a href="mailto:?Subject=Schoengebraucht&amp;Body={{ Request::url() }}" title="Share via E-mail">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </li>
                        <li>
                            <a href="whatsapp://send?text={{ Request::url() }}"  data-action="share/whatsapp/share" title="Share on WhatsApp">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.facebook.com/sharer.php?u={{ Request::url() }}" target="_blank" title="Share on Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/share?url={{ Request::url() }}&amp;text=Schoengebraucht&amp;hashtags=schoengebraucht" target="_blank" title="Share on Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://vkontakte.ru/share.php?url={{ Request::url() }}" target="_blank" title="Share on VK">
                                <i class="fa fa-vk"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/share?url={{ Request::url() }}" target="_blank"title="Share on Google +1">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ Request::url() }}" target="_blank">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>



        </div>
        <!-- Single Product - end -->

        <!-- Quick View Product - start -->
        <div class="qview-modal">
            <div class="prod-wrap">

                <!-- Contact Form -->

                <div class="auth-wrap">
                    <h3 class="fat">Frage Zum Artikel</h3>
                    <form method="post" action="{{ route('product.mail') }}">
                        <div class="auth-col" style="width: auto;">
                                {{ csrf_field() }}
                                <p>
                                    <label for="firstname" style="width: 100%;">Name </label><input style="width: 100%;" name="name" type="text" id="firstname">
                                </p>
    
                                <p>
                                    <label for="email" style="width: 100%;">Email </label><input style="width: 100%;" name="email" type="email" id="email">
                                </p>
    
                                <p>
                                    <label for="company" style="width: 100%;">Ihre Frage</label>
                                    <textarea name="mess" style="width: 100%;"></textarea>
                                </p>

                                 <input type="hidden" name="url" value="{{ Request::url() }}">

                                <p class="auth-submit">
                                    <input id="sende" type="submit" value="Senden">
                                </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Quick View Product - end -->

    </section>
</main>
<!-- Main Content - end -->

@endsection

@section('scripts')
    <script>
        $('.prod-qty').on('change', function () {
            var $this = $(this);
            var max = parseInt($this.data('max'));

            if ($this.val() > max) {
                $this.val(max);
            }
        });

        $('.prod-plus').click(function () {
            var $this = $(this);
            var $qnt = $('.prod-qty', $this.parent());
            var value = parseInt($qnt.val());

            var max = parseInt($qnt.data('max'));

            if (value < 0)
                value = 0;
            if (value < max)
                value += 1;
            $qnt.val(value);
        });
        $('.prod-minus').click(function () {
            var $this = $(this);
            var $qnt = $('.prod-qty', $this.parent());
            var value = parseInt($qnt.val());
            if (value > 0)
                value -= 1;
            if (value < 0)
                value = 0;
            $qnt.val(value);
        });

    </script>
@endsection
