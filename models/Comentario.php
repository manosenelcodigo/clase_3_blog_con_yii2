<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $email
 * @property string $web
 * @property string $rel
 * @property string $comentario
 * @property string $fecha
 * @property integer $noticia_id
 * @property integer $stado
 * @property string $ip_cliente
 * @property string $puerto_cliente
 * @property integer $course_by
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property Noticia $noticia
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'email', 'comentario', 'fecha', 'noticia_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['comentario'], 'string'],
            [['fecha', 'created_at', 'updated_at'], 'safe'],
            [['noticia_id', 'stado', 'course_by', 'created_by', 'updated_by'], 'integer'],
            [['nombre', 'email', 'web'], 'string', 'max' => 150],
            [['rel'], 'string', 'max' => 100],
            [['ip_cliente'], 'string', 'max' => 15],
            [['puerto_cliente'], 'string', 'max' => 5],
            [['noticia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Noticia::className(), 'targetAttribute' => ['noticia_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'web' => 'Web',
            'rel' => 'Rel',
            'comentario' => 'Comentario',
            'fecha' => 'Fecha',
            'noticia_id' => 'Noticia ID',
            'stado' => 'Stado',
            'ip_cliente' => 'Ip Cliente',
            'puerto_cliente' => 'Puerto Cliente',
            'course_by' => 'Course By',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticia()
    {
        return $this->hasOne(Noticia::className(), ['id' => 'noticia_id']);
    }
}
