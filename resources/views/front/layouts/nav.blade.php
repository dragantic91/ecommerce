
<!-- Catalog menu - start -->
<div class="topcatalog">
    <a href="{{ route('all.category.view') }}" class="topcatalog-btn">Shop</a>
    <ul class="topcatalog-list">
        @include('front.layouts.category-tree', ['categories', $categories])
    </ul>
</div>
<!-- Catalog menu - end -->

<!-- Main menu - start -->
<button type="button" class="mainmenu-btn" style="width: 50%;">Menu</button>

<ul class="mainmenu">
    <li>
        <a href="{{ route('home') }}" class="{{ $menu_home or ''  }}">
            Home
        </a>
    </li>
    <li>
        <a href="{{ route('about-us') }}" class="{{ $menu_about_us or ''  }}">
            Über uns
        </a>
    </li>
    <li>
        <a href="{{ route('wir-kaufen') }}" class="{{ $menu_wir or ''  }}">
            Wir Kaufen
        </a>
    </li>
    <li>

        <a href="{{ route('contact') }}" class="{{ $menu_contact or ''  }}">
            Kontakt
        </a>
    </li>

    <li class="mainmenu-more">
        <span>...</span>
        <ul class="mainmenu-sub"></ul>
    </li>
</ul>
<!-- Main menu - end -->

<!-- Search - start -->
<div class="topsearch">
    <form class="topsearch-form" action="{{ route('all.category.view') }}" method="get" role="search">
        <input type="text" name="q" placeholder="{{ __('front.product-search-products') }}" value="{{ old('q') }}">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<!-- Search - end -->