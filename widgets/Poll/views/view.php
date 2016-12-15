
<div id="mposter"></div>
<div id="<?php echo 'estimate_'.$model_id; ?>">
    <div id="my">
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
