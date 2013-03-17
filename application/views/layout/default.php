<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 15.03.13
 * Time: 14:38
 * To change this template use File | Settings | File Templates.
 */
?>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 12.03.13
 * Time: 15:21
 * To change this template use File | Settings | File Templates.
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <!-- Descriptive Meta Tags -->

    <meta name="keywords" content="Journalist, filmmaker, video, videos, print, séverine, Lenglet, severine"/>
    <meta name="description" content="Séverine Lenglet - Journalist, Filmmaker, Video Trainer"/>
    <meta name="copyright" content="Copyright (c) Séverine Lenglet 2013"/>
    <meta name="language" content="fr-FR"/>
    <meta name="author" content="">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <!-- Open Graph Meta Tags -->

    <meta name="og:title" content="Séverien Lenglet - Journalist, Filmmaker, Video Trainer"/>
    <meta name="og:type" content="website"/>
    <meta name="og:url" content="<?php echo current_url(); ?>"/>
    <meta name="og:image" content="<?php echo site_url('assets/img/filmstrip.png'); ?>"/>
    <meta name="og:site_name" content="Séverine Lenglet"/>
    <meta name="og:description" content="Séverine Lenglet - Journalist, Filmmaker, Video Trainer"/>

    <meta name="og:email" content="s_lenglet@yahoo.fr"/>

    <title>
        <?php if (!isset($title_for_layout)) {
            echo "Séverine Lenglet - Journalist, Filmmaker, Video Trainer";
        } else {
            echo $title_for_layout;
        } ?>
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <?php echo $css_for_layout ?>

    <!-- JAVASCRIPT -->
    <?php echo $js_for_layout ?>

</head>
<body>
<nav class="navbar navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="<?php echo site_url()?>"><?php echo img('assets/img/201303121935_logo.png') ?></a>
            <div class="nav-collapse collapse pull-right">
                <ul class="nav">
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
<?php echo flash_message() ?>
<?php echo $content_for_layout?>

</body>
</html>

