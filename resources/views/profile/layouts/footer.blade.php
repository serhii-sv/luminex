<footer class="footer footer--lk">
    <div class="container">
        <div class="main-line"><a class="main-line__logo" href="{{ route('customer.main') }}"><img src="{{ asset('img/logo/footer-logo-lk.png') }}" alt=""></a>
            <p class="main-line__slogan">Energy of Cryptocurrency
            </p>
            <!-- <div class="main-line__call">
                <a class="main-line__phone" href="tel:+121232233456">+12 123 223-34-56 </a>
                <a class="main-line__link" href="#call" data-fancybox="" data-modal="true">Обратный звонок</a>
            </div> -->
            <div class="main-line__buttons">
                <a class="btn btn--white main-line__btn" href="{{ route('customer.main') }}/agreement" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>@if(canEditLang() && checkRequestOnEdit())
                    <editor_block data-name='User agreement' contenteditable="true">{{ __('User agreement') }}</editor_block>
                  @else
                    {{ __('User agreement') }}
                  @endif</a>
                @if(Auth::user()->isImpersonated())
                    <a class="btn btn--accent2 main-line__btn" href="{{ route('admin.impersonate.leave') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>@if(canEditLang() && checkRequestOnEdit())
                        <editor_block data-name='Return to my account' contenteditable="true">{{ __('Return to my account') }}</editor_block>
                      @else
                        {{ __('Return to my account') }}
                      @endif</a>
                @else
                    <a class="btn btn--accent2 main-line__btn" href="{{ route('logout') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @else onclick="event.preventDefault(); document.getElementById('logout-form').submit();" @endif>@if(canEditLang() && checkRequestOnEdit())
                        <editor_block data-name='Log out' contenteditable="true">{{ __('Log out') }}</editor_block>
                      @else
                        {{ __('Log out') }}
                      @endif</a>
                @endif
            </div>
        </div>
    </div>
</footer>
