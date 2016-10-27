<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NoticiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noticia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'asunto') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'resumen') ?>

    <?php // echo $form->field($model, 'video') ?>

    <?php // echo $form->field($model, 'tipo_id') ?>

    <?php // echo $form->field($model, 'descarga') ?>

    <?php // echo $form->field($model, 'categoria_id') ?>

    <?php // echo $form->field($model, 'etiquetas') ?>

    <?php // echo $form->field($model, 'stado') ?>

    <?php // echo $form->field($model, 'cont_visitas') ?>

    <?php // echo $form->field($model, 'cont_descargas') ?>

    <?php // echo $form->field($model, 'curso_id') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
