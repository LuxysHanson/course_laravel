<?php include __DIR__ . "/../menu.php" ?>

<h2>Вывод новостей по данной категории</h2>


<?php foreach ($news as $item): ?>
    <a href="<?= route('news.view', [ 'id' => $item['id'] ]) ?>">
        <?=$item['title'] ?? ''?>
    </a><br>
<?php endforeach;?>
