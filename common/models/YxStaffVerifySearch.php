<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\YxStaffVerify;

/**
 * YxStaffVerifySearch represents the model behind the search form of `common\models\YxStaffVerify`.
 */
class YxStaffVerifySearch extends YxStaffVerify
{

    public function attributes(){
        return array_merge(parent::attributes(),['company.name']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'staff_id', 'company_id', 'staff_sex', 'staff_age', 'staff_found', 'staff_main_server_id', 'staff_verify_state', 'staff_fraction', 'staff_base_fraction', 'staff_history_fraction', 'staff_clinch', 'staff_price', 'staff_manage_time', 'staff_educate'], 'integer'],
            [['staff_name', 'staff_img', 'staff_idcard', 'staff_intro', 'staff_state', 'staff_memo', 'staff_login_ip', 'staff_login_time', 'staff_all_server_id', 'staff_query', 'staff_verify_memo','company.name', 'staff_idcard_front', 'staff_idcard_back', 'staff_address', 'staff_skill', 'staff_crime_record', 'staff_sin_record', 'staff_health_img'], 'safe'],
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
        $query = YxStaffVerify::find();

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
            'staff_id' => $this->staff_id,
            'company_id' => $this->company_id,
            'staff_sex' => $this->staff_sex,
            'staff_age' => $this->staff_age,
            'staff_found' => $this->staff_found,
            'staff_main_server_id' => $this->staff_main_server_id,
            'staff_verify_state' => $this->staff_verify_state,
            'staff_fraction' => $this->staff_fraction, 
           'staff_base_fraction' => $this->staff_base_fraction, 
           'staff_history_fraction' => $this->staff_history_fraction, 
           'staff_clinch' => $this->staff_clinch, 
           'staff_price' => $this->staff_price, 
           'staff_manage_time' => $this->staff_manage_time, 
           'staff_educate' => $this->staff_educate, 
        ]);

        $query->andFilterWhere(['like', 'staff_name', $this->staff_name])
            ->andFilterWhere(['like', 'staff_img', $this->staff_img])
            ->andFilterWhere(['like', 'staff_idcard', $this->staff_idcard])
            ->andFilterWhere(['like', 'staff_intro', $this->staff_intro])
            ->andFilterWhere(['like', 'staff_state', $this->staff_state])
            ->andFilterWhere(['like', 'staff_memo', $this->staff_memo])
            ->andFilterWhere(['like', 'staff_login_ip', $this->staff_login_ip])
            ->andFilterWhere(['like', 'staff_login_time', $this->staff_login_time])
            ->andFilterWhere(['like', 'staff_all_server_id', $this->staff_all_server_id])
            ->andFilterWhere(['like', 'staff_query', $this->staff_query])
            ->andFilterWhere(['like', 'staff_verify_memo', $this->staff_verify_memo])
            ->andFilterWhere(['like', 'staff_idcard_front', $this->staff_idcard_front])
           ->andFilterWhere(['like', 'staff_idcard_back', $this->staff_idcard_back])
           ->andFilterWhere(['like', 'staff_address', $this->staff_address])
           ->andFilterWhere(['like', 'staff_skill', $this->staff_skill])
           ->andFilterWhere(['like', 'staff_crime_record', $this->staff_crime_record])
           ->andFilterWhere(['like', 'staff_sin_record', $this->staff_sin_record])
           ->andFilterWhere(['like', 'staff_health_img', $this->staff_health_img]);

        $query->join('INNER JOIN','yx_company C','yx_staff_verify.company_id=C.id');
        $query->andFilterWhere(['like', 'C.name', $this->getAttribute('company.name')]);

        return $dataProvider;
    }
}
