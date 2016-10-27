<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Noticia;

/**
 * NoticiaSearch represents the model behind the search form about `app\models\Noticia`.
 */
class NoticiaSearch extends Noticia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'numero', 'tipo_id', 'categoria_id', 'stado', 'cont_visitas', 'cont_descargas', 'curso_id', 'created_by', 'updated_by'], 'integer'],
            [['titulo', 'slug', 'asunto', 'descripcion', 'resumen', 'video', 'descarga', 'etiquetas', 'created_at', 'updated_at'], 'safe'],
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
        $query = Noticia::find();

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
            'numero' => $this->numero,
            'tipo_id' => $this->tipo_id,
            'categoria_id' => $this->categoria_id,
            'stado' => $this->stado,
            'cont_visitas' => $this->cont_visitas,
            'cont_descargas' => $this->cont_descargas,
            'curso_id' => $this->curso_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'asunto', $this->asunto])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'resumen', $this->resumen])
            ->andFilterWhere(['like', 'video', $this->video])
            ->andFilterWhere(['like', 'descarga', $this->descarga])
            ->andFilterWhere(['like', 'etiquetas', $this->etiquetas]);

        return $dataProvider;
    }
}
