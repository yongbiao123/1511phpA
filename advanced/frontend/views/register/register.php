<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['action'=>'?r=register/add_do']); ?>

<table>
    <tr>
        <td>手机号：</td>
        <td>
            <input type="text" name="tel">
        </td>
    </tr>
    <tr>
        <td>密码：</td>
        <td>
            <input type="password" name="password">
    </td>
    </tr>
    <tr>
        <td>确认密码：</td>
        <td>
            <input type="password" name="repassword">
        </td>
    </tr>
</table>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>





