<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Transmision */

$this->title = 'Create Transmision';
$this->params['breadcrumbs'][] = ['label' => 'Transmisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transmision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
