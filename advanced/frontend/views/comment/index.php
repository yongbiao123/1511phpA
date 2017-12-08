<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

use DfaFilter\SensitiveHelper;
// 获取感词库索引数组
$wordData = array(
    'user',
    'admin',
);
?>
<center>
    <h1>欢迎 <font color="red"><?= Html::encode($username)?></font>进入展示页面</h1>
    <a href="<?= Url::toRoute(['comment/save'])?>">添加</a>
    <table border="1">
        <tr align="center">
            <td>ID</td>
            <td>评论人</td>
            <td>评论内容</td>
            <td>操作</td>
        </tr>
        <?php foreach($list as $val): ?>
            <tr align="center">
                <td><?= $val['id']?></td>
                <td><?= Html::encode($val['username'])?></td>
                <td><?= $filterContent = SensitiveHelper::init()->setTree($wordData)->replace($val['comment'], '***');?></td>
                <td>
                    <a href="<?= Url::toRoute(['comment/del', 'id' => $val['id']])?>">删除</a>
                    <a href="<?= Url::toRoute(['comment/save', 'id' => $val['id']])?>">修改</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</center>

