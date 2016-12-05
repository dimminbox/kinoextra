<div class="middle_content">
    <h1 class="filmname"><?= \app\controllers\CController::$h1 ?></h1>

    <ul class="featured_nav">
        <?php foreach ($alphavit as $index => $countries) : ?>
            <div style="margin: 10px;">
                <h3><?= $index ?></h3>

                <?php foreach ($countries as $country): ?>
                    <span class="country_name">
                        <strong><a href="<?= $country['url'] ?>"><?= $country['name'] ?></a></strong>
                    </span>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>
        ?>
    </ul>
</div>