<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Device extends ActiveRecord
{
    public static function tableName()
    {
        return 'device';
    }

    public function getStores()
    {
        return $this->hasOne(Store::className(), ['id' => 'name_store']);
    }

    public function getDevice()
    {
        return $this->hasMany(Device::className(), ['name_store' => 'id']);
    }

    public function rules()
    {
        return [
            [['serial_number', 'name_store', 'about'], 'required'],
            [['name_store'], 'string'],
            [['serial_number'], 'string', 'max' => 255],

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



?>