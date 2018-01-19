@extends('front.layouts.app')

@section('meta_title','Cart Page Schoengebraucht E commerce')
@section('meta_description','Cart Page Schoengebraucht E commerce')

@section('styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style>
        .checkbox {
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="b-crumbs">
                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cart.view') }}">
                            Warenkorb
                        </a>
                    </li>
                </ul>
                <h1 class="main-ttl"><span>Warenkorb</span></h1>
                @if(count($cartProducts) <= 0)
                    <p>{{ __('front.product-no-found') }}</p>
                @else
                    <form method="post" action="{{ route('cart.update.delivery') }}" id="cart-form">
                        {{ csrf_field() }}
                        <table class="table table-responsive">
                            <tr style="border: solid 2px;">
                                <th class="col-sm-1"><b>{{ __('front.product') }}</b></th>
                                <th class="col-sm-5"></th>
                                <th class="col-sm-1"><b>{{ __('front.delivery') }}</b></th>
                                <th class="col-sm-1" style="text-align: center"><b>{{ __('front.quantity') }}</b></th>
                                <th class="col-sm-1 text-center"><b>{{ __('front.price') }}</b></th>
                                <th class="col-sm-1 text-center"><b>{{ __('front.total') }}</b></th>
                                <th class="col-sm-2"> </th>
                            </tr>
                            <?php $total = 0; $taxTotal = 0;$giftCouponAmount = 0; ?>
                            @foreach($cartProducts as $product)

                                <input type="hidden" name="_method" value="post" />


                                <tr style="border: solid 2px;">
                                    <td class="col-sm-1">
                                        <div class="media">
                                            <img alt="{{ $product['name'] }}"
                                                 class="d-flex mr-3"
                                                 style="height: 72px;"
                                                 src="{{ asset( $product['image']) }}"/>
                                        </div>
                                    </td>

                                    <td class="col-sm-5" style="padding-top: 20px">
                                        <div class="media">

                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="{{ route('product.view', $product['slug'])}}">
                                                        {{ $product['name'] }}
                                                    </a>
                                                </h4>

                                                <p>Status: <span class="text-success"><strong>{{ __('front.in-stock') }}</strong></span></p>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-1" style="padding-top: 25px">
                                        @if($product['delivery'] == 0)
                                            <div class="checkbox disabled" title="Dieses Produkt kann nicht geliefert werden">
                                                <label>
                                                    <input id="toggle" name="delivery[]"  type="checkbox" disabled data-toggle="toggle" data-on="{{ __('front.yes') }}" data-off="{{ __('front.no') }}">
                                                </label>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input id="toggle" name="delivery[]" value="{{ $product['id'] }}" type="checkbox" data-toggle="toggle" data-on="{{ __('front.yes') }}" data-off="{{ __('front.no') }}">
                                                </label>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="col-sm-1" style="padding-top: 25px">
                                        <p class="prod-qnt">
                                            <input type="text" class="form-control" name="qty" id="qty{{ $product['id'] }}"
                                               value="{{ $product['qty']}}">
                                            <input type="hidden" data-product-id="{{ $product['id'] }}" data-token="{{ csrf_token() }}">
                                            <a class="prod-plus change-qty"><i class="fa fa-angle-up"></i></a>
                                            <a class="prod-minus change-qty"><i class="fa fa-angle-down"></i></a>
                                        </p>
                                        
                                    </td>
                                    <?php $total += ($product['price'] * $product['qty']); ?>

                                    <td class="col-sm-1 text-center price" style="padding-top: 32px">
                                        <strong>CHF <span>{{ number_format($product['price'],2) }}</span></strong></td>
                                    <td class="col-sm-1 text-center price-and-quantity" style="padding-top: 32px">
                                        <strong>CHF <span>{{ number_format($product['price'] * $product['qty'] ,2)}}</span></strong></td>
                                    <td class="col-sm-2" style="padding-top: 25px">
                                        <div class="btn-group">
                                            <a class="btn btn-md btn-hover btn-danger" href="{{ route('cart.destroy', $product['id'])}}">
                                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                            </a>
                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                            <tr style="border: solid 2px;" class="total-price">
                                <td class="col-sm-1">&nbsp;  </td>
                                <td class="col-sm-5">  </td>
                                <td class="col-sm-1">  </td>
                                <td class="col-sm-1">  </td>
                                <td class="col-sm-1">  </td>
                                <td class="col-sm-1"><h6>{{ __('front.total') }}</h6></td>
                                <td class="col-sm-1 text-right"><h6><strong>CHF <span>{{ number_format(($total),2) }}</span></strong></h6></td>
                            </tr>

                            <tr style="border: solid 2px;">
                                <td class="col-sm-1">&nbsp;  </td>
                                <td class="col-sm-5" style="font-size: 12px;">
                                    Bezahlung innert 48 h und Abholung innert 7 Tagen<br>
                                    Ich wünsche einen Versand. Überweisung innert 48 h
                                </td>
                                <td class="col-sm-1">  </td>

                                <td class="col-sm-1">  </td>
                                <td class="col-sm-1">  </td>
                                <td class="col-sm-1">
                                    <a href="{{ route('home') }}" class="btn btn-light" id="continue-shopping">
                                        <span class="oi oi-cart"></span> {{ __('front.continue-shopping') }}
                                    </a>
                                </td>
                                <td class="col-sm-1 text-right">
                                    <input type="submit" id="button-checkout" value="{{ __('front.checkout') }}" style="margin-right: 30px" />
                                </td>
                            </tr>
                        </table>
                    </form>
                @endif

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function () {
            $('.change-qty').click(function () {
                var that = $(this);
                var qtyField = that.siblings('input[type="text"]');
                var qty = parseInt(qtyField.val());

                if (qty <= 0 || isNaN(qty)) {
                    qty = 1;
                }
                qty = addOrSubstractQty(qty, that.attr('class'));
                qtyField.val(qty);

                var closestTd = that.closest('td');
                var price = closestTd.siblings('td.price').find('span');
                var priceAndQuantity = closestTd.siblings('td.price-and-quantity').find('span');
                var totalPrice = price.closest('tr').siblings('tr.total-price').find('span');
                var singleProductTotal = parseFloat(price.text()) * qty;
                priceAndQuantity.text(singleProductTotal.toFixed(2));
                var sum = 0;

                $('td.price-and-quantity').each(function() {
                    sum += parseFloat($(this).find('span').text());
                });
                totalPrice.text(sum.toFixed(2));


                var hiddenField = that.siblings('input[type="hidden"]')
                var token = hiddenField.attr('data-token');
                var productId = hiddenField.attr('data-product-id');
                var data = { _token: token, productId: productId, qty: qty };

                $.ajax({
                    url: '{{ url('cart/update') }}',
                    data: data,
                    type: 'post',
                    success: function (data) {
                        if (data.status) {
                            return true;
                        }
                    },
                });
            });

            $('p.prod-qnt input:text').on('keyup', function () {
                var that = $(this);
                var qty = that.val();

                if (qty != '' && qty <= 0 || isNaN(qty)) {
                    qty = 1;
                }

                var closestTd = that.closest('td');
                var price = closestTd.siblings('td.price').find('span');
                var priceAndQuantity = closestTd.siblings('td.price-and-quantity').find('span');
                var totalPrice = price.closest('tr').siblings('tr.total-price').find('span');
                var singleProductTotal = parseFloat(price.text()) * qty;
                priceAndQuantity.text(singleProductTotal.toFixed(2));
                var sum = 0;
                    priceAndQuantity.each(function() {
                    sum += parseFloat($(this).text());
                });
                totalPrice.text(sum.toFixed(2));

                var hiddenField = that.siblings('input[type="hidden"]')
                var token = hiddenField.attr('data-token');
                var productId = hiddenField.attr('data-product-id');
                var data = { _token: token, productId: productId, qty: qty };

                $.ajax({
                    url: '{{ url('/cart/update') }}',
                    data: data,
                    type: 'post',
                    success: function (data) {
                        if (data.status) {
                            return true;
                        }
                    }
                });

                that.val(qty);
            });
        });
    </script>
@endsection