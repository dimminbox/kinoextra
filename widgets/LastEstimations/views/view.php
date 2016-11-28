<?php if (count($estimations) != 0) : ?>
    <div role="tabpanel" class="tab-pane fade" id="recentBall">
        <ul class="ppost_nav fadeInDown">
            <?php foreach ($estimations as $estimation) : ?>
                <li>
                    <div class="user">
                        <div class="forumLinks">
                            <p class="filmName">Фильм: "<a href="<?=$estimation->film->getUrl()?>"><?=$estimation->film->getName()?></a>"</p>
                            <p id="citata">Оценка <strong><?=$estimation->estimate?></strong> (<span><?=$estimation->date?></span>)</p>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>