<?php

namespace MoePlayer\Danmaku\Models;

use Illuminate\Database\Eloquent\Model;

class Danmaku extends Model
{

    protected $table = 'danmaku';

    protected $hidden = ['id', 'user_id', 'ip', 'referer', 'created_at', 'updated_at'];

}
