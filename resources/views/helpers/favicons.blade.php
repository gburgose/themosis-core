{{--
  Generate your favicons on: https://www.favicon-generator.org/
  and then upload to ./resources/favicons/
  Also you can edit your 'THEME_COLOR' on your environment file
--}}

<link rel="apple-touch-icon" sizes="57x57" href="{{ themosis_theme_assets() }}/favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="{{ themosis_theme_assets() }}/favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="{{ themosis_theme_assets() }}/favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="{{ themosis_theme_assets() }}/favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="{{ themosis_theme_assets() }}/favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="{{ themosis_theme_assets() }}/favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="{{ themosis_theme_assets() }}/favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="{{ themosis_theme_assets() }}/favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="{{ themosis_theme_assets() }}/favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ themosis_theme_assets() }}/favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="{{ themosis_theme_assets() }}/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="{{ themosis_theme_assets() }}/favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{ themosis_theme_assets() }}/favicons/favicon-16x16.png">
<link rel="manifest" href="{{ themosis_theme_assets() }}/favicons/manifest.json">

<meta name="msapplication-TileImage" content="{{ themosis_theme_assets() }}/favicons/ms-icon-144x144.png">
@if (env('THEME_COLOR'))
    <meta name="msapplication-TileColor" content="{{ env('THEME_COLOR') }}">
    <meta name="theme-color" content="{{ env('THEME_COLOR') }}">
@endif
