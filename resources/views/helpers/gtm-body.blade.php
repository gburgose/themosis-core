@if (env("APP_ENV") == 'production' && env('GTM_CODE'))
    @if ( !isPagespeed() )
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ env('GTM_CODE') }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif
@endif
