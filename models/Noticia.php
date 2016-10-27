<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticia".
 *
 * @property integer $id
 * @property integer $numero
 * @property string $titulo
 * @property string $slug
 * @property string $asunto
 * @property string $descripcion
 * @property string $resumen
 * @property string $video
 * @property integer $tipo_id
 * @property string $descarga
 * @property integer $categoria_id
 * @property string $etiquetas
 * @property integer $stado
 * @property integer $cont_visitas
 * @property integer $cont_descargas
 * @property integer $curso_id
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property Comentario[] $comentarios
 * @property Categoria $categoria
 * @property Curso $curso
 * @property Tipo $tipo
 * @property User $createdBy
 * @property User $updatedBy
 */
class Noticia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero', 'tipo_id', 'categoria_id', 'stado', 'cont_visitas', 'cont_descargas', 'curso_id', 'created_by', 'updated_by'], 'integer'],
            [['titulo', 'slug', 'descripcion', 'resumen', 'video', 'tipo_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['descripcion'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['titulo', 'slug'], 'string', 'max' => 150],
            [['asunto', 'descarga'], 'string', 'max' => 100],
            [['resumen', 'video'], 'string', 'max' => 300],
            [['etiquetas'], 'string', 'max' => 255],
            [['titulo'], 'unique'],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['curso_id' => 'id']],
            [['tipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['tipo_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numero' => 'Numero',
            'titulo' => 'Titulo',
            'slug' => 'Slug',
            'asunto' => 'Asunto',
            'descripcion' => 'Descripcion',
            'resumen' => 'Resumen',
            'video' => 'Video',
            'tipo_id' => 'Tipo ID',
            'descarga' => 'Descarga',
            'categoria_id' => 'Categoria ID',
            'etiquetas' => 'Etiquetas',
            'stado' => 'Stado',
            'cont_visitas' => 'Cont Visitas',
            'cont_descargas' => 'Cont Descargas',
            'curso_id' => 'Curso ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['noticia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'curso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['id' => 'tipo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
