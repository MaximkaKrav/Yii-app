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
        [['nameStore', 'serial_number'], 'safe'],

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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // Условия фильтрации сетки
        $query->andFilterWhere(['nameStore' => $this->nameStore]);
        $query->andFilterWhere(['like', 'nameStore', $this->nameStore]);

        $query->andFilterWhere(['serial_number' => $this->serial_number]);
        $query->andFilterWhere(['like', 'serial_number', $this->serial_number]);

        return $dataProvider;
    }


}


