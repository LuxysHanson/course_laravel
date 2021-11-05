<?php

/** @var $news array */

include "menu.php"

?>

<?php if (!empty($news)) : ?>
    <h2><?=$news['title']?></h2>
    <p><?=$news['text']?></p>
<?php else: ?>
    <p>Новость отсутвует</p>
<?php endif; ?>

