<?php

/** @var $news array */

use Illuminate\Support\Str;

include "menu.php"

?>

<h2>Новости</h2>
<?php foreach ($news as $item): ?>
    <a href="<?= route('news.view', [ 'id' => $item['id'] ]) ?>">
        <?=$item['title'] ?? ''?>
    </a><br>
<?php endforeach;?>
