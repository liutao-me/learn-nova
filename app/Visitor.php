<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Actionable;

class Visitor extends Model
{
    // 定义用户常量
    const ORGANIC_TYPE = 'Organic';  //基本类型
    const USER_SUBMITTED_TYPE = 'User Submitted';  //用户提交类型

    const PROSPECT_STATUS = 'Prospect';  //预期
    const VISITOR_STATUS = 'Visitor';  //访客状态
    const CUSTOMER_STATUS = 'Customer'; //客户状态

    protected $fillable = [
        'type',
        'status',
        'email',
        'name'
    ];

    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    // 获取类型
    public static function getTypes()
    {
        return [
            self::ORGANIC_TYPE => self::ORGANIC_TYPE,
            self::USER_SUBMITTED_TYPE => self::USER_SUBMITTED_TYPE,
        ];
    }

    //获取状态
    public static function getStatuses()
    {
        return [
            self::PROSPECT_STATUS => self::PROSPECT_STATUS,
            self::VISITOR_STATUS => self::VISITOR_STATUS,
            self::CUSTOMER_STATUS => self::CUSTOMER_STATUS,
        ];
    }
}
