<?php

namespace frontend\models;

use yii\data\ActiveDataProvider;
use yii\helpers\Console;

class SearchStores extends Device{


    public function rules()
    {
        return [
            [['name_store', 'created_at'], 'safe'],

        ];
    }

    public function scenarios()
    {
        // TODO: Измените автогенерированный макет
        return parent::scenarios();
    }

    public function search($params)
    {
        $query = Store::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // Условия фильтрации сетки
        $query->andFilterWhere(['name_store' => $this->name_store]);
        $query->andFilterWhere(['like', 'name_store', $this->name_store]);

        $query->andFilterWhere(['created_at' => $this->serial_number]);
        $query->andFilterWhere(['like', 'created_at', $this->serial_number]);

        return $dataProvider;
    }


}


