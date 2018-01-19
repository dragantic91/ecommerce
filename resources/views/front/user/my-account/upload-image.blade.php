<?php $nav_upload_image = 'active'; ?>

@extends('front.layouts.app')

@section('meta_title','Upload My Account E commerce')
@section('meta_description','Upload My Account E commerce')

@section('content')
    <main class="padd">
        <div class="container">
            <div class="bat">
                <div class="row">

                    @include('front.user.my-account.sidebar')

                    <div class="col-sm-10 profile-info" style="padding-left: 15px;">
                        <div class="row">
                            <div class="col-sm-4">
                                <form action="{{ route('my-account.upload-image.post') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <label>{{ __('front.account-set-profile-picture') }}</label><br><br>
                                    <div class="input-file" style="padding: 0; text background: #e15024">
                                        <input type="file" name="profile_image"  id="profile_image" />
                                        <label style="text-transform: uppercase; margin: 10px 20px 10px 17px;" for="file-input">{{ __('front.account-upload') }}</label>
                                    </div>
                                    <div class="auth-submit">
                                        <button class="btn btn-primary" type="submit">{{ __('front.account-set-profile-picture') }}</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection