<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 12.03.13
 * Time: 15:24
 * To change this template use File | Settings | File Templates.
 */
?>

<section id="header" class="container-fluid">
    <div id="header_photo" class="carousel slide">
        <ol class="carousel-indicators">
            <?php foreach($headers as $header) { ?>
            <li data-target="#header_photo" data-slide-to="<?php echo $i ?>" class="<?php echo ($i == 0)? 'active':'';?>"></li>
            <?php $i++;} ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach($headers as $header) { ?>
                <div class="item <?php echo ($j == 0)? 'active':'';?>">
                    <div class="item-container"  style="background-color: <?php echo 'rgb('.$header->r.','.$header->g.','.$header->b.')' ?>; color: <?php echo text_color($header->r,$header->g,$header->b); ?>">
                        <div class="blank hide-small"></div>
                        <div class="picture">
                            <img src="<?php echo site_url('uploads/header/'.$header->thumbnail).'?'.now()?>" alt="<?php echo $header->title ?>" width="850px"/>
                            <a href="<?php echo site_url('videos/view/'.$header->id) ?>" class="btn btn-primary watch-now show-small">Watch now</a>
                        </div>
                        <div class="description hide-small">
                            <h1><?php echo $header->title ?></h1>
                            <div class="p_wrapper">
                                <p><?php echo $header->description ?></p>
                            </div>
                            <a href="<?php echo site_url('videos/view/'.$header->id) ?>" class="btn btn-primary watch-now">Watch now</a>
                        </div>

                        <div class="blank hide-small"></div>
                    </div>
                </div>
            <?php $j++;} ?>
        </div>
        <a class="carousel-control left" href="#header_photo" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#header_photo" data-slide="next">&rsaquo;</a>
    </div>

</section>
