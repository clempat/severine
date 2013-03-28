<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:03
 * To change this template use File | Settings | File Templates.
 */
?>
<section id="page" class="container-fluid" style="margin-top: 20px;">
    <div class="span8">
        <h1><i class="icon-facetime-video"></i> <?php echo $video->title ?></h1>
        <p style="margin-top: 20px;"><?php echo $video->description ?></p>
        <div class="video-container" style="width: 100%;"><?php echo video_player($video);?></div>
    </div>
    <div class="span3 offset1">
        <div class="well well-small" style="width:100%;">
            <h2 class="text-center"><i class="icon-tags"></i> Tags</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer tincidunt ornare lacus adipiscing Praesent tristique libero tempus nibh sagittis</p>
        </div>
        <div class="well well-small text-center" style="width:100%;">
            <h2><i class="icon-bullhorn"></i> Sharing</h2>
            <div class="btn-group" style="margin-top: 10px;">
                <a href="#" class="btn btn-large btn-primary"><i class="icon-twitter"></i></a>
                <a href="#" class="btn btn-large btn-info"><i class="icon-facebook"></i></a>
                <a href="#" class="btn btn-large btn-danger"><i class="icon-google-plus"></i></a>
            </div>
        </div>
    </div>

</section>