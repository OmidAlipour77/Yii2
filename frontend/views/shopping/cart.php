<?php

use yii\helpers\Html;

$this->title = "Cart";


?>
<?php

$css= <<<Css
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
      <td>نام محصول</td>
      <td>قیمت</td>
   </tr>
   
      <?php foreach ($data as $value) { ?>
         <tr>
         <td><?=$value->Title ?></td>
         <td><?=$value->Price?></td>
         </tr>
      <?php
      } ?>
 
   <tr>
      <td>
      <?= Html::a('check out', ['checkout'],['class'=>'btn btn-success']) ?>
      </td>
   </tr>
</table>