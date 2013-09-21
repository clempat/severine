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

            <a class="brand" href="<?php echo site_url()?>"><?php echo img('assets/img/201303201235_logo_admin.png') ?></a>
            <div class="nav-collapse collapse pull-right">
                <ul class="nav">
                    <?php echo menu_link_to('admin/pages/dashboard', 'icon-home', 'Dashboard') ?>
                    <?php echo menu_link_to('admin/photos', 'icon-camera', 'Photos') ?>
                    <?php echo menu_link_to('admin/videos', 'icon-film', 'Videos') ?>
                    <?php echo menu_link_to('admin/prints','icon-book', 'Prints') ?>
                    <?php echo menu_link_to('admin/site/about','icon-user', 'About') ?>
                    <?php echo menu_link_to('home', 'icon-eye-open', 'Website') ?>
                </ul>
            </div>
        </div>
    </div>
</nav>