<?php

use yii\helpers\Html;

$this->title = "History";

?>

<?php

$css = <<<Css
.cart_tbl{
   border: 1px solid black;
   border-collapse:collapse;
}
.cart_tbl tr td{
   border: 1px solid black;
   padding:5px;
}


Css;
$this->registerCss($css)
?>
<table class="cart_tbl">
    <tr>
        <td>کد سفارش</td>
        <td>تاریخ</td>
    </tr>

    <?php
    foreach ($data as $value) {
        ?>
        <tr>
            <td><?= $value->id ?></td>
            <td><?= $value->date ?></td>
            <td>
                <?= Html::a('Details', ['hisdet','id'=>$value->id], ['class' => 'btn btn-sm btn-success']) ?>
            </td>
        </tr>
    <?php
    } ?>
</table>