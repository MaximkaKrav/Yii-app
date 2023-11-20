<?php

namespace frontend\models;
use frontend\models\Device;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\Console;

class SearchDevices extends Device{


public function rules()
{
    return [
        [['name_store'], 'integer'],
    ];
    }

    public function scenarios()
    {
        // TODO: Измените автогенерированный макет
        return parent::scenarios();
    }

    public function search($params)
    {
        $query = Device::find();

        // Добавьте условия, которые всегда должны применяться здесь

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

//        if (!$this->validate()) {
//            // Раскомментируйте следующую строку, если не хотите возвращать записи при ошибке валидации
//            // $query->where('0=1');
//            return $dataProvider;
//        }

        // Условия фильтрации сетки
        $query->andFilterWhere(['name_store' => $this->name_store]);
        $query->andFilterWhere(['like', 'name_store', $this->name_store]);

        return $dataProvider;
    }

}


