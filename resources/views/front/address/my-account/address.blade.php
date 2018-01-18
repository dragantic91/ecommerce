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
                        <h3 class="fat">{{ __('front.address') }}</h3>
                        @if(count($addresses) <= 0)
                            <p>Adresse wurde nicht gefunden</p>
                        @else

                            <div class="row space">
                                <div class="auth-wrap">
                                    @foreach($addresses as $address)
                                        <div class="auth-col">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        @if($address->type == "SHIPPING")
                                                            <th>{{ __('front.account-shipping-address') }}</th>
                                                        @else
                                                            <th>{{ __('front.account-billing-address') }}</th>
                                                        @endif
                                                        <th><a href="{{ route('my-account.address.destroy', $address->id) }}" style="color: cornflowerblue">Löschen</a></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td style="font-weight: 700">{{ __('front.account-first-name') }}</td>
                                                        <td>{{ $address->first_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 700">{{ __('front.account-last-name') }}</td>
                                                        <td>{{ $address->last_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 700">{{ __('front.account-address-1') }}</td>
                                                        <td>{{ $address->address1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 700">{{ __('front.account-Address 2') }}</td>
                                                        <td>{{ $address->address2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 700">{{ __('front.account-city') }}</td>
                                                        <td>{{ $address->city }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 700">{{ __('front.account-zip') }}</td>
                                                        <td>{{ $address->postcode }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 700">{{ __('front.phone') }}</td>
                                                        <td>{{ $address->phone }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection