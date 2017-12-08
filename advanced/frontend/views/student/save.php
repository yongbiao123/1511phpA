<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//$model->sex = 1;  //默认选中

?>
<?php $form = ActiveForm::begin();?>
    <?= $form->field($model,'username')?>
    <?= $form->field($model,'sex')->radioList(['0' => '女', '1' => '男']);?>
    <?= $form->field($model,'age')->dropDownList([18 =>18,24 =>24,36 =>36],['prompt' => '请选择']);?>
    <?= $form->field($model,'hobby')->checkboxList(['篮球' => '篮球', '足球' => '足球', '乒乓球' => '乒乓球']);?>
<div class="form-group">
    <?= Html::submitButton('Submit',['class' => 'btn btn-primary'])?>
</div>
<?php ActiveForm::end(); ?>
