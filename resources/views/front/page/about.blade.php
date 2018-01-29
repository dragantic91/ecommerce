<?php $menu_about_us = 'active'; ?>

@extends('front.layouts.app')

@section('meta_title')
    {{ $page->name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $page->title }}</h1>

                <main>
                    <section class="container">


                        <ul class="b-crumbs">
                            <li>
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about-us') }}">
                                    Über uns
                                </a>
                            </li>

                        </ul>
                        <h1 class="main-ttl"><span>Über uns</span></h1>
                        <!-- Blog Post - start -->
                        <div class="post-wrap stylization">
                            <!-- Slider -->
                            <div class="flexslider post-slider" id="post-slider-car">
                                <ul class="slides">
                                    <li>
                                        <a data-fancybox-group="fancy-img" class="fancy-img" href="/front/assets/img/about/1.jpg"><img src="/front/assets/img/about/1516893129testslider.jpg" alt=""></a>
                                    </li>
                                    <li>
                                        <a data-fancybox-group="fancy-img" class="fancy-img" href="/front/assets/img/about/1.jpg"><img src="/front/assets/img/about/1516893129testslider.jpg" alt=""></a>
                                    </li>
                                    <li>
                                        <a data-fancybox-group="fancy-img" class="fancy-img" href="/front/assets/img/about/1.jpg"><img src="/front/assets/img/about/1516893129testslider.jpg" alt=""></a>
                                    </li>
                                </ul>
                            </div>

                            <p class="text-justify">
                                {!! $page->content !!}
                            </p>

                            <!-- Share Links -->
                            <div class="post-share-wrap">
                                <ul class="post-share">
                                    <li>
                                        <a onclick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[url]=http://allstore-html.real-web.pro','sharer', 'toolbar=0,status=0,width=620,height=280');" data-toggle="tooltip" title="Share on Facebook" href="javascript:">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="popUp=window.open('http://twitter.com/home?status=Post with Shortcodes http://allstore-html.real-web.pro','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on Twitter" href="javascript:;">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="popUp=window.open('http://vk.com/share.php?url=http://allstore-html.real-web.pro','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on VK" href="javascript:;">
                                            <i class="fa fa-vk"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" title="Share on Pinterest" onclick="popUp=window.open('http://pinterest.com/pin/create/button/?url=http://allstore-html.real-web.pro&amp;description=AllStore HTML Template&amp;media=http://discover.real-web.pro/wp-content/uploads/2016/09/insect-1130497_1920.jpg','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" title="Share on Google +1" href="javascript:;" onclick="popUp=window.open('https://plus.google.com/share?url=http://allstore-html.real-web.pro','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" title="Share on Linkedin" onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url=http://allstore-html.real-web.pro&amp;title=AllStore HTML Template','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" title="Share on Tumblr" onclick="popUp=window.open('http://www.tumblr.com/share/link?url=http://allstore-html.real-web.pro&amp;name=AllStore HTML Template&amp;description=Aliquam%2C+consequuntur+laboriosam+minima+neque+nesciunt+quod+repudiandae+rerum+sint.+Accusantium+adipisci+aliquid+architecto+blanditiis+dolorum+excepturi+harum+ipsa%2C+ipsam%2C...','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                                            <i class="fa fa-tumblr"></i>
                                        </a>
                                    </li>
                                </ul>




                            </div>
                            <!-- Blog Post - end -->
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
@endsection
