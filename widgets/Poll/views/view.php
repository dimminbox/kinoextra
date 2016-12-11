<script type="text/javascript">
    $(document).ready(function () {
        $(".zvezda").click(function () {
            //alert($(this).attr("title"));
        });
        $(".zvezda").hover(
                function () {
                    $(".small").css("background", "none");
                    cur = $(this).attr("title");
                    elem = 1;
                    while (elem <= cur) {
                        $("div#val_7_film" + elem).css("background-image", "url('/images/services.png')");
                        elem++;
                    }
                },
                function () {
                    $(".zvezda").css("background-image", "");
                }
        );

    });

</script>
<div id="mposter"></div>
<div id="<? echo 'estimate_'.$model.'_'.$model_name; ?>">
    <div id="my" class="<? echo 'my_'.$model.'_'.$model_name; ?>">
        <?php
        $numb = 1;
        while ($numb <= $number) {
            if ($estimate - $numb >= 0) {
                $width = 100;
            } else
                $width = round((1 - $numb + $estimate) * 100, 2);

            echo '<div title="' . $numb . '" class="zvezda" id="val' . $model_id . '_film' . $numb . '" onclick="sendPoll('.$model_id.','.$numb.')"></div>';
            $numb ++;
        }
        ?>
    </div>
    <div class="golos">
        <?php echo $estimate; ?>
        <span><?php echo $count; ?></span>
    </div>
</div>
