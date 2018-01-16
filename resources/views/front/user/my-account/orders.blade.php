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
                        <h3 class="fat">Meine Bestellungen</h3>
                        <div class="row space">
                            <div class="auth-wrap">
                                @if(count($orders) == 0)
                                    <p>Keine Bestellungen vorhanden</p>
                                @else
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Datum</th>
                                                <th>Versandoption</th>
                                                <th>Bestellstatus</th>
                                                <th>Ansicht</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>

                                                    <td> {{ $order->id }}</td>
                                                    <td> {{ $order->created_at }} </td>
                                                    <td> {{ $order->payment_option }}</td>
                                                    <td> {{ $order->order_status_title }} </td>
                                                    <td><a href="{{ route('my-account.order.view', $order->id) }}" style="color: cornflowerblue">Ansicht</a></td>
                                                </tr>
                                            @endforeach
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
    </main>
@endsection