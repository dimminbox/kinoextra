<?php if (count($styles) != 0) : ?>
    <h2>Онлайн меню</h2>
    <ul class="post_nav">
        <?php foreach ($styles as $style) : ?>
            <li><a href="<?= $style->getUrl() ?>"><?= $style->getName() ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>