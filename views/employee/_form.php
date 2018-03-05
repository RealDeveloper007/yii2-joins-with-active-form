<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */

//print_r($data['Designations']); die;

if($data['Designations']) {
        foreach ($data['Designations'] as $count) {
            $id[] = $count['id'];
            $name[] = $count['designation_name'];
        }
        $result = array_combine($id, $name);
    } else {

        $result = array("0" => "No designation found");
    }
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($data['model'], 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($data['model'], 'email')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($data['model'], 'phone')->textInput(['maxlength' => true]) ?>
    
     <?= $form->field($data['Emodel'], 'designation')->dropDownList($result,['prompt' => '--Select--']) ?>
    
    <?= $form->field($data['Emodel'], 'salary')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($data['model'], 'status')->hiddenInput(['value'=>1])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
