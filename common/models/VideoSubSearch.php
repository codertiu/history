<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VideoSub;

/**
 * VideoSubSearch represents the model behind the search form about `common\models\VideoSub`.
 */
class VideoSubSearch extends VideoSub
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'video_id', 'creator', 'created_date', 'update_date', 'status'], 'integer'],
            [['name', 'description', 'link', 'video'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = VideoSub::find();

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
            'id' => $this->id,
            'video_id' => $this->video_id,
            'creator' => $this->creator,
            'created_date' => $this->created_date,
            'update_date' => $this->update_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'video', $this->video]);

        return $dataProvider;
    }
}