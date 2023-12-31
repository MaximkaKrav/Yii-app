<?php

namespace frontend\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Store extends ActiveRecord{


    public static function tableName()
    {
        return 'store';
    }
//    public function rules()
//    {
//        return [
//            [['serial_number', 'store_id','id'], 'required'],
//
//        ];
//    }

    public function getDevices(){

        return $this->hasMany(Device::className(),['nameStore' => 'id']);
    }

    public function rules()
    {
        return [
            [['nameStore'], 'required'],
            [['nameStore'], 'string'],

        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => function () {
                },
            ],
        ];


    }
}