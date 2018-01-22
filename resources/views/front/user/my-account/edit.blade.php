<?php $nav_edit = 'active'; ?>

@extends('front.layouts.app')

@section('meta_title','My Account E commerce')
@section('meta_description','My Account E commerce')

@section('content')
    <main class="padd">
        <div class="container">
            <div class="bat">
                <div class="row">

                    @include('front.user.my-account.sidebar')

                    <div class="col-sm-9 profile-info">
                        <h3 class="fat">{{ __('front.account-profile-edit') }}</h3>
                        <div class="row space">
                            <div class="auth-wrap">

                                <div class="auth-col" style="width: 63%;">
                                    <form method="post" action="{{ route('my-account.store') }}">
                                        {{ csrf_field() }}
                                        <p>
                                            <label for="title">{{ __('front.account-title') }}<span class="required">*</span></label>
                                            <label class="radio-inline">
                                                <input type="radio" name="title" value="Herr" @if ($user->title == 'Herr') checked @endif>Herr
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="title" value="Frau" @if ($user->title == 'Frau') checked @endif>Frau
                                            </label>
                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                        <p>
                                            <label for="firstname">{{ __('front.account-first-name') }}<span class="required">*</span></label>
                                            <input id="first_name" class="form-control" type="text" value="{{ $user->first_name }}"
                                                   name="first_name">
                                            @if ($errors->has('first_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                        <p>
                                            <label for="lastname">{{ __('front.account-last-name') }}<span class="required">*</span></label>
                                            <input id="last_name" type="text" class="form-control" value="{{ $user->last_name}}"
                                                   name="last_name">
                                            @if ($errors->has('last_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                        <p>
                                            <label for="email">{{ __('front.email') }}<span class="required">*</span></label>
                                            <input id="email" type="text" class="form-control" disabled="true"
                                                   value="{{ $user->email }}"
                                                   name="email">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                        <p>
                                            <label for="tel">{{ __('front.phone') }}</label>
                                            <input id="phone" type="text" class="form-control"
                                                   value="{{ $user->phone }}"
                                                   name="phone">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                        <p>
                                            <label for="company">{{ __('front.account-company-name') }}</label>
                                            <input id="company_name" type="text" class="form-control"
                                                   value="{{ $user->company_name }}"
                                                   name="company_name">
                                            @if ($errors->has('company_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('company_name') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                        <p class="auth-submit">
                                            <button type="submit" class="btn btn-primary">{{ __('front.account-update-profile') }}</button>
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