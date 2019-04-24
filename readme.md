# MinAssets

Package for minimize assets for laravel framework

## Installation

Via composer

``` bash
$ composer require denis-kisel/min-assets-laravel
```

Public config
``` bash
$ php artisan vendor:publish --provider="DenisKisel\\MinAssets\\MinAssetsServiceProvider"
```

## Usage

Set *config/min_assets.php* config

Run in the bash
``` bash
$ php artisan min
```

Output assets like
``` blade
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />

    @if (config('app.debug'))
            <link href='{{ url('/css/bootstrap.min.css') }}' rel='stylesheet'>
            <link href='{{ url('/css/style.css') . '?v=' . time() }}' rel='stylesheet'>
    @else
        <link href='{{ url('/css/min.css') . '?v=' . filemtime(public_path('css/all.min.css')) }}' rel='stylesheet'>
    @endif
    
    ...
```
