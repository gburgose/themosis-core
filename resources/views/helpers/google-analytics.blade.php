@if (env("APP_ENV") == 'production' && env('GOOGLE_ANALYTICS'))
    @if ( !isPagespeed() )
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', "{{ env('GOOGLE_ANALYTICS') }}");
        </script>
    @endif
@endif
