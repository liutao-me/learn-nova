<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // 定义优先级
    const LOW_PRIORITY = 'Low';
    const MEDIUM_PRIORITY = 'Medium';
    const HIGH_PRIORITY = 'High';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function visitor()
    {
        return $this->belongsTo('App\visitor');
    }

    // 获取优先级
    public static function getPriority()
    {
        return [
            self::LOW_PRIORITY => self::LOW_PRIORITY,
            self::MEDIUM_PRIORITY => self::MEDIUM_PRIORITY,
            self::HIGH_PRIORITY => self::HIGH_PRIORITY,
        ];
    }
}
