<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 20.03.13
 * Time: 10:54
 * To change this template use File | Settings | File Templates.
 */?>
<nav class="navbar navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="<?php echo site_url()?>"><?php echo img('assets/img/201303201235_logo.png') ?></a>
<div class="nav-collapse collapse">
    <ul class="nav pull-right">
        <?php echo menu_link_to('home', 'icon-home') ?>
        <?php echo menu_link_to('video', 'icon-film') ?>
        <?php echo menu_link_to('print','icon-book') ?>
        <?php echo menu_link_to('contact', 'icon-envelope') ?>
        <?php echo menu_link_to('about', 'icon-user') ?>
    </ul>
</div>
</div>
</div>
</nav>