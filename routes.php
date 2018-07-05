<?php

Route::resource('/danmakuv2', 'MoePlayer\Danmaku\Controllers\DanmakuController')
    ->middleware([
        'throttle',
        'web'
    ]);