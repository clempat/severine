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
        <?php if (!isset($page_title)) {
        echo "Séverine Lenglet - Journalist, Filmmaker, Video Trainer";
    } else {
        echo $page_title;
    } ?>
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="<?php echo site_url('assets/css/bootstrap_and_overrides.css')?>" rel="stylesheet" media="screen">
    <link href="<?php echo site_url('assets/css/application.css')?>" rel="stylesheet" media="screen">

    <!-- JAVASCRIPT -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?php echo site_url('assets/js/jquery.dotdotdot-1.5.6.js') ?>"></script>
    <script src="<?php echo site_url('assets/js/bootstrap.js') ?>"></script>
    <script src="<?php echo site_url('assets/js/application.js') ?>"></script>

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


