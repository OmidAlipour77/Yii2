
<ul class="category-menu">
    <?php
    $model=\frontend\models\Category::find()->all();
    foreach ($model as $v):?>
    <li>
        <h2><a href=""><?=$v->Title?></a></h2>
    </li>
    <?php endforeach;?>
</ul>