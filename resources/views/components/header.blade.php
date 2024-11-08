<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}">
            <h1>{{ __('misc.homepage_title') }}</h1>
        </a>
        {{ $introduction_text ?? '' }}
    </div>
    @if (app()->getLocale() == 'nl')
        <a href="{{ url()->current() }}?lang=en">{{ __('messages.language_button') }}</a>
        @else
            <a href="{{ url()->current() }}?lang=nl">{{ __('messages.language_button') }}</a>
        @endif
</div>
