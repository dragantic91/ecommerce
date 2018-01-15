<?php $nav_password = 'active'; ?>

@extends('front.layouts.app')

@section('meta_title','My Account E commerce')
@section('meta_description','My Account E commerce')

@section('content')
    <main class="padd">
        <div class="container">
            <div class="bat">
                <div class="row">

                    @include('front.user.my-account.sidebar')

                    <div class="col-sm-10 profile-info">
                        <h3 class="fat">{{ __('front.account-change-password') }}</h3>
                        <div class="row space">
                            <div class="auth-wrap">

                                <div class="auth-col" style="width: 63%;">
                                    <form method="post" action="{{ route('my-account.change-password.post') }}" >
                                        {{ csrf_field() }}

                                        <p>
                                            <label for="reg_password">{{ __('front.account-current-password') }} <span class="required">*</span></label><input type="password" name="current_password" id="reg_password">
                                        </p>
                                        <p>
                                            <label for="reg_password">{{ __('front.account-new-password') }} <span class="required">*</span></label><input type="password" name="password" id="reg_password">
                                        </p>
                                        <p>
                                            <label for="reg_password">{{ __('front.account-confirm-password') }}<span class="required">*</span></label><input type="password" name="password_confirmation" id="reg_password">
                                        </p>

                                        <p class="auth-submit">
                                            <button class="btn btn-primary" type="submit">{{ __('front.account-change-password') }}</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection