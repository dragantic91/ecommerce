

<div class="prod-i">
    <div class="prod-i-top">
        <a href="{{ route('product.view', $product->slug)}}" title="{{ $product->name }}" class="prod-i-img">
            @include('front.catalog.product.view.product-image',['product' => $product])
        </a>
    </div>
    <div class="prod-sticker">
        @if($product->discount == 1)
            <p class="prod-sticker-3">-{{ number_format(100-($product->discount_price/$product->price*100), 0) }}%</p><br>
        @endif
        @if($product->hit_product == 1)
            <p class="prod-sticker-2">HIT</p><br>
        @endif
        @if($product->new_product == 1)
            <p class="prod-sticker-1">NEW</p>
        @endif

    </div>
    <h3>
        <a href="{{ route('product.view', $product->slug)}}" title="{{ $product->name }}">{{ $product->name }}</a>
    </h3>
    @if($product->discount == 1)
        <p class="prod-i-price">
            <b>CHF {{ number_format($product->discount_price, 2) }}</b><br>
            <del>CHF {{ number_format($product->price,2) }}</del>
        </p>
    @else
        <p class="prod-i-price">
            <b>CHF {{ number_format($product->price,2) }}</b><br>
            <del></del>
        </p>
    @endif
</div>

@push('scripts')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endpush