<?php $nav_address = 'active'; ?>

@extends('front.layouts.app')

@section('meta_title','My Address List Account E commerce')
@section('meta_description','My Address List Account E commerce')

@section('content')
    <main class="padd">
        <div class="container">
            <div class="bat">
                <div class="row">

                    @include('front.user.my-account.sidebar')
                    <div class="col-sm-10 profile-info">
                        <form method="POST" action="{{ route('my-account.address.new') }}">
                            {{ csrf_field() }}
                            <div class="row space">
                                <div id="different-shipping-form" style="clear: both;">
                                    <div class="radio shipping-address-wrapper">
                                        <div class="row">
                                            <div class="form-group  col-sm-6">
                                                <label class="control-label" for="input-billing-firstname">{{ __('front.account-first-name') }}*</label>
                                                <input type="text" name="first_name"
                                                       value="" placeholder="{{ __('front.account-first-name') }}*"
                                                       id="input-billing-firstname" class="form-control">
                                            </div>
                                            <div class="form-group  col-sm-6">
                                                <label class="control-label" for="input-billing-lastname">{{ __('front.account-last-name') }}*</label>
                                                <input type="text" name="last_name"
                                                       value="" placeholder="{{ __('front.account-last-name') }}*"
                                                       id="input-billing-lastname" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label" for="input-shipping-address-1">{{ __('front.account-address-1') }}*</label>
                                            <input type="text" name="address" value="" placeholder="{{ __('front.account-address-1') }}*"
                                                   id="input-shipping-address-1" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="input-shipping-address-2">{{ __('front.account-Address 2') }}</label>
                                            <input type="text" name="address2" value="" placeholder="{{ __('front.account-Address 2') }}"
                                                   id="input-shipping-address-2" class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="control-label" for="input-shipping-postcode">{{ __('front.account-zip') }}*</label>
                                                <input type="text" data-name="postcode" name="postcode" value=""
                                                       placeholder="{{ __('front.account-zip') }}*"
                                                       id="input-shipping-postcode"
                                                       class="shipping tax-calculation  form-control">
                                            </div>


                                            <div class="form-group  col-sm-6">
                                                <label class="control-label" for="input-shipping-city">{{ __('front.account-city') }}*</label>
                                                <input type="text" data-name="city" name="city" placeholder="{{ __('front.account-city') }}*"
                                                       id="input-shipping-city"
                                                       class="shipping tax-calculation  form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="control-label" for="input-shipping-phone">{{ __('front.phone') }}</label>
                                                <input type="text" name="phone" value="" placeholder="{{ __('front.phone') }}"
                                                       id="input-shipping-phone" class="form-control">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="control-label" for="input-shipping-phone">Adresstyp*</label>

                                                <select type="text" class="form-control" id="delivery" name="type">
                                                    <option value="BILLING" selected>Rechnungsadresse</option>
                                                    <option value="SHIPPING">Versandadresse</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row space">
                                <button type="submit" class="btn btn-primary">Speichern</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection