# Laravel Danmaku

[![GitHub license](https://img.shields.io/github/license/MoePlayer/laravel-danmaku.svg)](https://github.com/MoePlayer/laravel-danmaku/blob/master/LICENSE)

## Installation

You can install the package via composer:

```bash
composer require moeplayer/laravel-danmaku

```

Copy the package migration to your local migration with the publish command:

```
php artisan vendor:publish --tag danmaku
php artisan migrate 
```
Add danmakuv2 to the csrf whitelist
```php
// app\Http\Middleware\VerifyCsrfToken.php
protected $except = [
     'danmakuv2'
];
```

## Usage

```javascript
const dp = new DPlayer({
    container: document.getElementById('dplayer'),
    screenshot: true,
    video: {
        url: 'demo.mp4',
        pic: 'demo.jpg',
        thumbnails: 'thumbnails.jpg'
    },
    danmaku: {
        id: 'demo',
        api: 'http://domain/danmakuv2',
        user: 'dog'
    }
});
```