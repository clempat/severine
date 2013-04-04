<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:03
 * To change this template use File | Settings | File Templates.
 */?>
<section id="page" class="container-fluid">
    <div id="filter" class="span12" style="margin-top: 20px;">
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="<?php echo site_url('prints') ?>">All</a></li>
            <li><a href="<?php echo site_url('prints/german') ?>" data-value="german">German</a></li>
            <li><a href="<?php echo site_url('prints/english') ?>" data-value="english">English</a></li>
            <li><a href="<?php echo site_url('prints/french') ?>" data-value="french">French</a></li>
        </ul>
    </div>
    <div class="span12" style="margin-top: 20px; float: left;">
        <ul class="media-list">
            <?php foreach($prints as $print) { ?>
                <li class="media">
                    <a class="pull-left" href="#">
                        <div class="ribbon-wrapper-green left"><div class="ribbon-green left"><?php echo ucfirst($print->language) ?></div></div>
                        <img src="<?php echo site_url($print->thumbnail)?>" class="hidden-phone"/>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading blank-phone"><?php echo $print->title ?></h4>
                        <p><?php echo $print->article ?></p>
                        <div class="bottom">
                            <div class="btn-group text-center">
                                <a href="<?php echo site_url('admin/prints/edit/'.$print->id) ?>" class="btn">Editer</a>
                                <a href="<?php echo site_url('admin/prints/dell/'.$print->id ) ?>" class="btn btn-danger">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>

</section>