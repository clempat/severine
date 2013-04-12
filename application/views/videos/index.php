<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:03
 * To change this template use File | Settings | File Templates.
 */
?>
<section id="page" class="container-fluid">
    <div id="filter" class="span12" style="margin-top: 20px;">
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="<?php echo site_url('videos') ?>">All</a></li>
            <li><a href="<?php echo site_url('videos/german') ?>" data-value="german">German</a></li>
            <li><a href="<?php echo site_url('videos/english') ?>" data-value="english">English</a></li>
            <li><a href="<?php echo site_url('videos/french') ?>" data-value="french">French</a></li>
        </ul>
    </div>
    <div id="thumbnail_container" class="span12" style="position: relative;">
        <!-- thumbnail -->
        <ul class="thumbnails h-fix filtered-container">
            <?php foreach($videos as $video) { ?>
                <li class="span4" data-id="<?php echo $video->id ?>">
                    <div class="thumbnail">
                        <div class="ribbon-wrapper-green"><div class="ribbon-green"><?php echo ucfirst($video->language) ?></div></div>
                        <img src="<?php echo site_url('uploads/thumbs/'.$video->thumbnail).'?'.now()?>" alt="<?php echo $video->title ?>">
                        <div class="caption">
                            <h3><?php echo $video->title ?></h3>
                            <div class="p_wrapper"><?php echo $video->description ?></div>
                            <div class="bottom"><a href="<?php echo site_url('videos/view/'.$video->id) ?>" class="btn btn-primary">Watch now</a></div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div id="pagination" class="pagination pagination-centered">
        <?php echo $pagination ?>
    </div>
</section>