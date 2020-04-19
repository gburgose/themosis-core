<!DOCTYPE html>
<html lang="es">

<head>
    @include('helpers.gtm-head')
    @include('helpers.google-analytics')
    @include('helpers.robots')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    @include('helpers.favicons')
    @include('helpers.hotjar')
    @wp_head
</head>

<body {{ body_class() }}>
    @include('helpers.gtm-body')
    <div id="app">
        <div class="wrapper">
            @yield('content')
        </div>
        @stack('modals')
    </div>
    @include('helpers.hubspot-chat')
    @include('helpers.google-maps')
    @stack('scripts')
    @wp_footer
</body>

</html>