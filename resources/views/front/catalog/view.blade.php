@extends('front.layouts.app')

@section('meta_title')
Kategorie - Schoengebraucht E-commerce
@endsection

@section('content')
<main>
    <section class="container">

        <ul class="b-crumbs">
            <li>
                <a href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('all.category.view') }}">
                    Shop
                </a>
            </li>
            <li>
                <span>Kategorie</span>
            </li>
        </ul>
        <h1 class="main-ttl"><span>Kategorie</span></h1>
        <!-- Catalog Sidebar - start -->
        <div class="section-sb">
            @include('front.catalog.category.options')
        </div>
        <div class="section-cont">
            <!-- Catalog Topbar - start -->
            <div class="section-top">
                <!-- View Mode -->
                <ul class="section-mode">
                    <li class="section-mode-gallery {{ $mode == 'grid' ? 'active' : '' }}">
                        <a title="View mode: Gallery" href="{{ urldecode(route('all.category.view', array_merge(request()->query(), ['mode' => 'grid']), false)) }}"></a>
                    </li>
                    <li class="section-mode-list {{ $mode == 'list' ? 'active' : '' }}">
                        <a title="View mode: List" href="{{ urldecode(route('all.category.view', array_merge(request()->query(), ['mode' => 'list']), false)) }}"></a>
                    </li>
                </ul>
                <!-- Sorting -->
                <div class="section-sortby">
                    <p>{{ old('order_by') ? __('front.' . old('order_by')) : 'sortierung' }}</p>
                    <ul>
                        @foreach(getOrderBy() as $key => $value)
                        <li>
                            <a href="{{ urldecode(route('all.category.view', array_merge(request()->query(), ['order_by' => $key]), false)) }}">{{ $value }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Count per page -->
                <div class="section-count">
                    <p>{{ old('view') ? old('view') : 12 }}</p>
                    <ul>
                        @foreach(getshowNumbers() as $num)
                        <li>
                            <a href="{{ urldecode(route('all.category.view', array_merge(request()->query(), ['view' => $num]), false)) }}">{{ $num }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="product-items">
                <div class="prod-items section-items {{ $mode == 'grid' ? 'is-active' : '' }}" id="catalog-gallery">
                    @if(count($products) <= 0)
                    <p>Das Produkt wurde nicht gefunden</p>
                    @else
                    @foreach($products as $product)
                        <?php
                        $image = $product->image;
                        $imageType = (isset($imageType)) ? $imageType : "medUrl"
                        ?>
                        @include('front.catalog.product.view.product-card',['imageType' => 'medUrl'])
                    @endforeach
                    <div class="clearfix"></div>
                    {{ $products->appends(request()->input())->links('front.pagination.bootstrap-4') }}
                    @endif
                </div>
                <div class="prod-items section-items {{ $mode == 'list' ? 'is-active' : '' }}" id="catalog-list">
                    @foreach($products as $product)
                    <?php
                    $image = $product->image;
                    $imageType = (isset($imageType)) ? $imageType : "medUrl"
                    ?>
                        @include('front.catalog.product.view.product-card-list',['imageType' => 'medUrl'])
                    @endforeach
                    <div class="clearfix"></div>
                    {{ $products->appends(request()->input())->links('front.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
</main>
@endsection