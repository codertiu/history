<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Post;

/**
 * PostSearch represents the model behind the search form about `common\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'creator', 'created_date', 'update_date', 'seen', 'status'], 'integer'],
            [['category_id','title', 'description', 'content', 'main_img', 'second_img', 'third_img'], 'safe'],
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
        $query = Post::find();

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
        $query->joinWith('category');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'category_id' => $this->category_id,
            'creator' => $this->creator,
            'created_date' => $this->created_date,
            'update_date' => $this->update_date,
            'seen' => $this->seen,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'category.name', $this->category_id])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'main_img', $this->main_img])
            ->andFilterWhere(['like', 'second_img', $this->second_img])
            ->andFilterWhere(['like', 'third_img', $this->third_img]);

        return $dataProvider;
    }
}
