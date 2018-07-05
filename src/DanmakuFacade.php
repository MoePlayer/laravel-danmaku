<?php

namespace MoePlayer\Danmaku;

use \Illuminate\Support\Facades\Facade;

class MongoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'danmaku';
    }
}

