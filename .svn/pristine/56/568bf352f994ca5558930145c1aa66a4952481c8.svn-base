
<div class="col-sm-2 vertical-menu">
    @if($user->image_path == "")
        <a id="slika">
            <img src="/front/assets/img/slika.jpg" class="img-responsive img-thumbnail" alt="">
            <p class="text-center">
                <strong class="text-center">{{ $user->fullName }}</strong>
            </p>
        </a>
    @else
        <a id="slika">
            <img src="{{ $user->image_path->smallUrl }}" class="img-responsive img-thumbnail" alt="">
            <p class="text-center">
                <strong class="text-center">{{ $user->fullName }}</strong>
            </p>
        </a>
    @endif
    <a href="{{ route('my-account.home') }}" class="{{ $nav_home or ''  }}">{{ __('front.account-overview') }}</a>
    <a href="{{ route('my-account.edit') }}" class="{{ $nav_edit or ''  }}">{{ __('front.account-edit-account') }}</a>
    <a href="{{ route('my-account.upload-image') }}" class="{{ $nav_upload_image or ''  }}">{{ __('front.account-upload-image') }}</a>
    <a href="{{ route('my-account.home') }}">{{ __('front.account-my-order') }}</a>
    <a href="{{ route('my-account.address.index') }}" class="{{ $nav_address or ''  }}">{{ __('front.address') }}</a>
    <a href="{{ route('my-account.change-password') }}" class="{{ $nav_password or ''  }}">{{ __('front.account-change-password') }}</a>
    <a href="{{ route('logout') }}">{{ __('front.account-logout') }}</a>

</div>

