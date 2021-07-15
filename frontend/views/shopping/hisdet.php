<?php

use frontend\models\Product;

$this->title = "History_Details";

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
        <td>نام محصول</td>
        <td>قیمت</td>
        <td>تعداد</td>
    </tr>

    <?php foreach ($data as $value) { 
        $item=Product::find()->where(['Id'=>$value->productId])->one();
        ?>
        <tr>
            <td><?= $value->orderId ?></td>
            <td><?= $item->Title ?></td>
            <td><?= $item->Price ?></td>
            <td><?= $value->count ?></td>
        </tr>
    <?php
    } ?>
</table>