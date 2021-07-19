<header class="header header--white">
    <div class="main-line main-line--lk container"><a class="main-line__logo" href="{{ route('customer.main') }}"><img src="{{ asset('img/logo/logo.png') }}" alt=""></a>
        <p class="main-line__slogan">Energy of Cryptocurrency
        </p>
        <!-- <div class="main-line__call"><a class="main-line__phone" href="tel:+121232233456">+12 123 223-34-56 </a><a class="main-line__link" href="#call" data-fancybox="" data-modal="true">Обратный звонок</a>
        </div> -->
        @include('partials.language')
        <div class="main-line__links">
            {{--<a class="main-line__link" href="#">{{ __('Admin panel') }}</a>--}}
            {{--<a class="main-line__link" href="#">{{ __('Account') }}</a>--}}
        </div>
        @if(Auth::user()->isImpersonated())
            <a class="btn btn--accent2 main-line__btn" href="{{ route('admin.impersonate.leave') }}"
                @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>@if(canEditLang() && checkRequestOnEdit())
                <editor_block data-name='Return to my account' contenteditable="true">{{ __('Return to my account') }}</editor_block>
              @else
                {{ __('Return to my account') }}
              @endif</a>
        @else
            <a class="btn btn--accent2 main-line__btn" href="{{ route('logout') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @else onclick="event.preventDefault(); document.getElementById('logout-form').submit();" @endif
               >@if(canEditLang() && checkRequestOnEdit())
                <editor_block data-name='Log out' contenteditable="true">{{ __('Log out') }}</editor_block>
              @else
                {{ __('Log out') }}
              @endif</a>
        @endif
    </div>
</header>

<a href="https://t.me/luminex_asia" class="btn_tlg" style="left:inherit; right:2%; bottom:2%;">TELEGRAM SUPPORT</a>