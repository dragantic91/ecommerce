<?php $nav_orders = 'active'; ?>

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
                        <h3 class="fat">Bestellansicht</h3>
                        <div class="row space">
                            <div class="auth-wrap">
                                <h3 class="fet">Grundinformationen bestellen</h3>
                                <label class="h5">Bestellnummer: {{ $order->id }}</label><br>
                                <label class="h5">Geschlossen / Offen: {{ $order->payment_option }}</label><br>
                                <label class="h5">Bestellnummer: {{ $order->orderStatusTitle  }}</label><br>
                                <h3 class="fet" style="padding-top: 20px">Bestellinformationen</h3>
                                <div class="table-responsive">
                                    <table class="table">

                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Titel</th>
                                            <th>Menge</th>
                                            <th>Preis</th>
                                            <th>Gesamt</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order->products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->qty }}</td>
                                                    <td>CHF {{ number_format($product->price, 2) }}</td>
                                                    <td>CHF {{ number_format($product->price*$product->qty, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                                <h3 class="fet">Kundendaten</h3>
                                <div class="table-responsive row">
                                    @if (!is_null($order->shipping_address))
                                        <div class="col-sm-6">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>{{ __('lang.order-shipping-info') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{ $order->shipping_address->first_name }} {{ $order->shipping_address->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->shipping_address->address1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->shipping_address->address2 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->shipping_address->area }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->shipping_address->phone }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                    @if (!is_null($order->billing_address))
                                        <div class="col-sm-6">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>{{ __('lang.order-shipping-info') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{ $order->billing_address->first_name }} {{ $order->billing_address->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->billing_address->address1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->billing_address->address2 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->billing_address->area }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->billing_address->phone }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection