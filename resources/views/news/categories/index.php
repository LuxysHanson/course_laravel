<?php

/** @var $categories array */

use Illuminate\Support\Str;

include __DIR__ ."/../menu.php"

?>

<h2>Список категории новостей</h2>
<?php foreach ($categories as $item): ?>
    <a href="<?= route('news.category', [ 'id' => $item['id'] ]) ?>">
        <?=$item['title'] ?? ''?>
    </a><br>
<?php endforeach;?>
