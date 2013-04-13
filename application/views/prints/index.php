<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:03
 * To change this template use File | Settings | File Templates.
 */?>

<section id="page" class="container">
    <div id="filter" class="span12" style="margin-top: 20px;">
        <ul class="nav nav-pills pull-left">
            <li class="active"><a href="<?php echo site_url('prints') ?>">All</a></li>
            <li><a href="<?php echo site_url('prints/german') ?>" data-value="german">German</a></li>
            <li><a href="<?php echo site_url('prints/english') ?>" data-value="english">English</a></li>
            <li><a href="<?php echo site_url('prints/french') ?>" data-value="french">French</a></li>
        </ul>
    </div>
    <div id="thumbnail_container" class="span12" style="margin-top: 20px; position: relative; float: left;">
        <ul class="media-list filtered-container">
            <?php foreach($prints as $print) { ?>
                <li class="media" data-id="<?php echo $print->id ?>">
                    <a class="pull-left" href="<?php echo site_url('prints/view/'.$print->id) ?>">
                        <div class="ribbon-wrapper-green left"><div class="ribbon-green left"><?php echo ucfirst($print->language) ?></div></div>
                        <img src="<?php echo site_url($print->thumbnail)?>" class="hidden-phone"/>
                    </a>
                    <div class="media-body">
                        <h3 class="media-heading blank-phone"><?php echo $print->title ?></h3>
                        <?php echo $print->article ?>
                        <div class="bottom">
                            <div class="btn-group text-center">
                                <a href="<?php echo site_url('prints/view/'.$print->id) ?>" class="btn btn-primary">Read now</a>
                            </div>
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