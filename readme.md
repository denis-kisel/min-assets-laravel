# MinAssets

Package for minimize assets for laravel framework

## Installation

Via composer

``` bash
$ composer require denis-kisel/min-assets
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
    @if (config('app.debug'))
            <link href='{{ url('/css/bootstrap.min.css') }}' rel='stylesheet'>
            <link href='{{ url('/css/style.css') . '?v=' . time() }}' rel='stylesheet'>
    @else
        <link href='{{ url('/css/min.css') . '?v=' . filemtime(public_path('css/min.css')) }}' rel='stylesheet'>
    @endif
    
    ...
```
