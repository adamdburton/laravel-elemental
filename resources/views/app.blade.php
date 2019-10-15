<!DOCTYPE html>
{{--mode-dark--}}
<html lang="en" class="">
<head><title>Elemental</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ elemental_asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ elemental_asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ elemental_asset('favicon-16x16.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link href="{{ elemental_mix('/css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-brand-dark text-black dark:text-white text-base leading-normal">
<div id="app"></div>
<script src="{{ elemental_mix('/js/app.js') }}"></script>
</body>
</html>
