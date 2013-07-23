<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:03
 * To change this template use File | Settings | File Templates.
 */
?>
<section id="page" class="container" style="margin-top: 20px;">
    <div class="span10 offset1">
        <h1><i class="icon-facetime-video"></i> <?php echo $video->title ?></h1>
        <p style="margin-top: 20px;"><?php echo $video->description ?></p>
        <div class="video-container" style="width: 100%;"><?php echo $player;?></div>
    </div>
</section>