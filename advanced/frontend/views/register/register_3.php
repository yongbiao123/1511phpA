<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<div class="top">
    <h2>欢迎注册</h2>
</div>

<?php $form = ActiveForm::begin(['action'=>'?r=register/next']); ?>

<h4>请选择您的兴趣标签：</h4>
<td>
    <select name="type" id="">
        <option value="0">足球</option>
        <option value="1">篮球</option>
        <option value="2">乒乓球</option>
    </select>
</td>
<td><a class="a_button" href="<?= URL::to(['register/aa'])?>">上一步</a>
    <a class="a_button" href="">完成</a></td>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

