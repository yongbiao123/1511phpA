<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<center>
    <table border="1">
        <tr align="center">
            <td>ID</td>
            <td>评论人</td>
            <td>操作</td>
        </tr>
        <?php foreach($list as $val): ?>
            <tr align="center">
                <td><?= $val['id']?></td>
                <td><?= Html::encode($val['username'])?></td>
                <td><?= $val['id']?></td>
                <td><a href="<?= Url::toRoute(['admin/del', 'id' => $val['id']])?>">删除</a>
                    <a href="<?= Url::toRoute(['admin/save', 'id' => $val['id']])?>">修改</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</center>