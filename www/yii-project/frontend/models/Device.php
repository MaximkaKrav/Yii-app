<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Device extends ActiveRecord
{
    public static function tableName()
    {
        return 'device';
    }
    public function getStores()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }
    public function getDevice(){
        return $this->hasMany(Device::className(),['store_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['serial_number', 'store_id','name_store','about'], 'required'],
            [['store_id'], 'string'],
            [['serial_number'], 'string', 'max' => 255],
        ];
    }




}



?>