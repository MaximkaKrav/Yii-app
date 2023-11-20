<?php

namespace frontend\models;
use frontend\models\Device;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\Console;

class SearchDevices extends Device
{
    public function rules()
    {
        return [
            [['store_id'], 'integer'],
        ];
    }
        public function search($params)
        {
            $query = Device::find();

            // add conditions that should always apply here

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $this->load($params);

            if (!$this->validate()) {
                // uncomment the following line if you do not want to return any records when validation fails
                // $query->where('0=1');
                return $dataProvider;
            }

            // grid filtering conditions
            $query->andFilterWhere([
                'store_id' => $this->id,
            ]);

            $query->andFilterWhere(['like', 'store_id', $this->title]);

            return $dataProvider;
        }


}


