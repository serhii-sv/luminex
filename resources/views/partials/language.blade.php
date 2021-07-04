<div class="language">
    <p class="language__name"><span>{{ session('lang') }}</span></p>
    <ul class="language__list">
        <li class="language__item">
            <a href="{{ route('set.lang', ['locale' => 'en']) }}"><button class="language__button">English</button></a>
        </li>
        <li class="language__item">
            <a href="{{ route('set.lang', ['locale' => 'ru']) }}"><button class="language__button">Russian</button></a>
        </li>
        <li class="language__item">
            <a href="{{ route('set.lang', ['locale' => 'cn']) }}"><button class="language__button">Chinesse</button></a>
        </li>
    </ul>
</div>