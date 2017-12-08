<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<div class="top">
    <h2>欢迎注册</h2>
</div>

<?php $form = ActiveForm::begin(['action'=>'?r=register/do']); ?>

<table>
    <input type="text" name="id" value="<?= $id ?>"/>
    <tr>
        <td>昵称：</td>
        <td>
            <input type="text" name="name">
        </td>
    </tr>
    <tr>
        <td>生日：</td>
        <td>
            <input type="text" name="sr">
        </td>
    </tr>
    <tr>
        <td>工作地址：</td>
        <td>
            <input type="text" name="address">
        </td>
    </tr>
    <tr>
        <td><a class="a_button" href="<?= URL::to(['register/add'])?>">上一步</a>
            <a class="a_button" href="<?= URL::to(['register/next'])?>">下一步</a></td>
    </tr>
</table>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


