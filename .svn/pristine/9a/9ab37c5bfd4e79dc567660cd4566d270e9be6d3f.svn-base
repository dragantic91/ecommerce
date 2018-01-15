@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="main-title-wrap">
                <div class='h1'>
                    {{ __('lang.order-view') }}
                </div>
                <div class="clearfix"></div>
                <br/>

                <div class="card card-default">
                    <h3 class="card-header">{{ __('lang.order-basic-info') }}</h3>

                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <th>{{ __('lang.order-number') }}</th>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('lang.order-shipping-option') }}</th>
                                <td>{{ $order->payment_option }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('lang.order-status') }}</th>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <span style="margin-top: 20px;">{{ $order->orderStatusTitle }}</span>
                                        </div>
                                        <div class="col-3">
                                            @if(!isset($changeStatus))
                                                <form action="{{ route('admin.order.change-status', $order->id) }}">
                                                    <input type="submit" value="{{ __('lang.order-change-status') }}" />
                                                </form>
                                            @endif
                                            @if(isset($changeStatus) && $changeStatus === true)
                                                <form action="{{ route('admin.order.update-status',$order->id) }}"
                                                      method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="put">

                                                    @include('admin.forms.select',
                                                                ['name' => 'order_status_id',
                                                                'label' => '',
                                                                'options' => $orderStatus])
                                                    <div class="form-group text-center">
                                                        <button type="submit" class="btn btn-primary">{{ __('lang.order-save') }}</button>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="card-default card ">
                    <h3 class="card-header">{{ __('lang.order-item-info') }}</h3>

                    <div class="card-body">

                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('lang.order-title') }}</th>
                                <th>{{ __('lang.order-qty') }}</th>
                                <th>{{ __('lang.order-price') }}</th>
                                <th>{{ __('lang.order-total') }}</th>
                            </tr>
                            @foreach($order->products as $product)
                                <tr>

                                    <td> {{ $product->id }}</td>
                                    <td> {{ $product->name }}</td>
                                    <td> {{ $product->getRelationValue('pivot')->qty }} </td>
                                    <td> {{ $product->getRelationValue('pivot')->price }} </td>
                                    <td> {{ $total = $product->getRelationValue('pivot')->price * $product->getRelationValue('pivot')->qty }} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-default card">
                    <h3 class="card-header">{{ __('lang.order-address-info') }}</h3>

                    <div class="card-body">
                        <div class="row">

                            @if (!is_null($order->shipping_address_id))

                                <div class="col-md-6">
                                    <h6>{{ __('lang.order-shipping-info') }}</h6>

                                    <p>
                                        {{ $order->shipping_address->first_name }} {{ $order->shipping_address->last_name }}
                                        <br/>
                                        {{ $order->shipping_address->address1 }}<br/>
                                        {{ $order->shipping_address->address2 }}<br/>
                                        {{ $order->shipping_address->area }}<br/>
                                        {{ $order->shipping_address->city }}<br/>
                                        <br/>
                                        {{ $order->shipping_address->phone }}<br/>
                                    </p>
                                </div>
                            @endif

                            @if (!is_null($order->billing_address_id))
                                <div class="col-md-6">
                                    <h6>{{ __('lang.order-shipping-info') }}</h6>

                                    <p>
                                        {{ $order->billing_address->first_name }} {{ $order->billing_address->last_name }}
                                        <br/>
                                        {{ $order->billing_address->address1 }}<br/>
                                        {{ $order->billing_address->address2 }}<br/>
                                        {{ $order->billing_address->area }}<br/>
                                        {{ $order->billing_address->city }}<br/>
                                        <br/>
                                        {{ $order->billing_address->phone }}<br/>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

