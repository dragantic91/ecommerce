@extends('front.layouts.app')

@section('meta_title', 'Login: Schoengebraucht')
@section('meta_description', 'My Account Management System for Schoengebraucht E Commerce')

@section('content')
    <!-- Main Content - start -->
    <main>
        <section class="container stylization maincont">


            <ul class="b-crumbs">
                <li>
                    <a href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}">
                        Registrierung / Login
                    </a>
                </li>
            </ul>
            <h1 class="main-ttl"><span>Registrierung / Login</span></h1>
            <div class="auth-wrap">
                <div class="auth-col">
                    <h2>Login</h2>
                    <form class="login" role="form" method="POST" action="{{ route('login.post') }}">
                        {{ csrf_field() }}
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>
                            <label for="email">E-mail <span class="required">*</span></label><input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                            @endif
                        </p>
                        <p>
                            <label for="password">{{ __('front.account-password') }} <span class="required">*</span></label><input id="password" class="form-control" type="password" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            @endif
                        </p>
                        <p class="auth-submit">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                            <input type="checkbox" name="remember_me" id="rememberme" value="forever">
                            <label for="rememberme">{{ __('front.account-remember-me') }}</label>
                        </p>
                        <p class="auth-lost_password">
                            <a href="/forgot-password">{{ __('front.account-lost-your-password') }}</a>
                        </p>
                    </form>
                </div>
                <div class="auth-col">
                    <h2>{{ __('front.account-register') }}</h2>
                    <form class="register" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <p>
                            <label for="title">{{ __('front.account-title') }}<span class="required">*</span></label>
                            <label class="radio-inline">
                                <input type="radio" name="title" value="Herr" required>Herr
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="title" value="Frau">Frau
                            </label>                        </p>
                        <p>
                            <label for="firstname">{{ __('front.account-first-name') }} <span class="required">*</span></label>
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                        </p>
                        <p>
                            <label for="lastname">{{ __('front.account-last-name') }} <span class="required">*</span></label>
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>
                        </p>
                        <p>
                            <label for="reg_email">E-mail <span class="required">*</span></label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </p>
                        <p>
                            <label for="reg_password">{{ __('front.account-password') }} <span class="required">*</span></label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </p>
                        <p>
                            <label for="password">{{ __('front.account-confirm-password') }} <span class="required">*</span></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </p>
                        <p>
                            <label for="subscribe">{{ __('front.i-want-to-subscribe') }} <span class="required">*</span></label>
                            <input type="checkbox" name="subscribe">
                        </p>
                        <p class="auth-submit">
                            <button type="submit" class="btn btn-primary">
                                {{ __('front.account-register') }}
                            </button>
                        </p>
                    </form>
                </div>
            </div>



        </section>
    </main>
    <!-- Main Content - end -->

@endsection

