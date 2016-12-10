<?php if (count($comments)!=0) :?>
<div role="tabpanel" class="tab-pane fade active in" id="recentComment">
    <ul class="ppost_nav  fadeInDown">
        <?php foreach ($comments as $comment) :?>
        <li>
            <div class="user">
                <div>
                    <span class="userName">Автор <?=$comment->getAuthor()?>: </span>
                    <span id="citata">"<?=$comment->getText()?>"</span>
                </div>

                <div class="forumLinks">
                    <p class="filmName">Фильм: "<a href="<?=$comment->film->getUrl()?>"><?=$comment->film->getName()?></a>"</p>
                    <a href="<?=$comment->film->getUrl()?>#comment<?=$comment->id?>">Читать</a> | 
                    <a href="<?=$comment->film->getUrl()?>?reply&commentId=<?=$comment->id?>#comments">Ответить</a>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
        

    </ul>
</div>
<?php endif; ?>