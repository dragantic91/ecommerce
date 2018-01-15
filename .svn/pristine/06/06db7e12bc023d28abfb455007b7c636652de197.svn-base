<?php $menu_contact = 'active'; ?>

@extends('front.layouts.app')

@section('meta_title')
    {{ $page->title }}
@endsection

@section('scripts')
    <script src="{{ asset('front/assets/js/gmap.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $page->title }}</h1>

                <main>
                    <section class="container stylization maincont">


                        <ul class="b-crumbs">
                            <li>
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">
                                    Kontakt
                                </a>
                            </li>
                        </ul>
                        <h1 class="main-ttl"><span>Kontakt</span></h1>

                        <!-- Contact Form -->
                        <div class="contactform-wrap">
                            <form method="post" action="{{ route('contact.email') }}" class="form-validate">
                                {{ csrf_field() }}
                                <h3 class="component-ttl component-ttl-ct component-ttl-hasdesc"><span>Kontaktformular</span></h3>
                                <p class="component-desc component-desc-ct">Unvollstandige Anfragen werden nicht beantwortet.</p>
                                <p class="contactform-field contactform-text">
                                    <label class="contactform-label">Name</label><span class="contactform-input"><input placeholder="Name" type="text" name="name" value="{{ old('name') }}" data-required="text" required></span>
                                </p>
                                <p class="contactform-field contactform-tel">
                                    <label class="contactform-label">Telefon</label><span class="contactform-input"><input placeholder="Ihre Telefon" type="text" name="tel" value="{{ old('tel') }}" data-required="text" required></span>
                                </p>
                                <p class="contactform-field contactform-email">
                                    <label class="contactform-label">Email</label><span class="contactform-input"><input placeholder="Ihre Email" type="text" name="email" value="{{ old('email') }}" data-required="text" data-required-email="email" required></span>
                                </p>
                                <p class="contactform-field contactform-textarea">
                                    <label class="contactform-label">Nachricht</label><span class="contactform-input"><textarea placeholder="Ihre Nachricht" name="mess" data-required="text" required>{{ old('mess') }}</textarea></span>
                                </p>

                                <p class="contactform-submit">
                                    <button class="btn btn-primary" type="submit">Senden</button>
                                </p>
                            </form>
                        </div>
                        <br>
                        <!-- Contacts - end -->

                        <!-- Kontakt - start -->
                        <br>
                        <div class="iconbox-wrap">
                            <div class="row iconbox-list">
                                <div class="cf-xs-6 cf-sm-4 cf-lg-4 col-xs-6 col-sm-4 iconbox-i">
                                    <p class="iconbox-i-img"><i class="fa fa-phone" aria-hidden="true" style="font-size:60px;"></i></p>
                                    <h3 class="iconbox-i-ttl">+41 44 450 21 02</h3>
                                    <span class="contact-text">
                                        Rufen Sie uns an
                                    </span>
                                    <span class="iconbox-i-margin"></span>
                                </div>
                                <div class="cf-xs-6 cf-sm-4 cf-lg-4 col-xs-6 col-sm-4 iconbox-i">
                                    <p class="iconbox-i-img"><i class="fa fa-map-marker" aria-hidden="true" style="font-size:60px;"></i></p>
                                    <h3 class="iconbox-i-ttl">Adresse</h3>
                                    <span class="contact-text">
                                        Brock GmbH<br>
                                        Birmensdorferstr. 430<br>
                                        8055 Zurich
                                    </span>
                                    <span class="iconbox-i-margin"></span>
                                </div>
                                <div class="cf-xs-6 cf-sm-4 cf-lg-4 col-xs-6 col-sm-4 iconbox-i">
                                    <p class="iconbox-i-img"><i class="fa fa-clock-o" aria-hidden="true" style="font-size:60px;"></i></p>
                                    <h3 class="iconbox-i-ttl">Öffnungszeiten</h3>
                                    <span class="contact-text">
                                        Montag - Freitag 13:00 - 18:00
                                    </span>
                                    <span class="iconbox-i-margin"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Contacts Info - end -->
                        <div class="social-wrap">
                            <div class="social-list">
                                <div class="social-i">
                                    <a rel="nofollow" href="https://de-de.facebook.com/schoengebraucht.ch" target="_blank"/>
                                        <p class="social-i-img">
                                            <i class="fa fa-facebook"></i>
                                        </p>
                                        <p class="social-i-ttl">Facebook</p>
                                    </a>
                                </div>
                                <div class="social-i">
                                    <a rel="nofollow" href="https://www.instagram.com/schoengebraucht.ch/" target="_blank">
                                        <p class="social-i-img">
                                            <i class="fa fa-instagram"></i>
                                        </p>
                                        <p class="social-i-ttl">Instagram</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Google Maps -->
                        <div class="contacts-map allstore-gmap">
                            <div class="marker" data-zoom="15" data-lat="47.3691831" data-lng="8.49889" data-marker="assets/img/marker.png">534-540 Little Bourke St, Basel, Svizeria</div>
                        </div>

                    </section>
                </main>
            </div>
        </div>
    </div>
@endsection