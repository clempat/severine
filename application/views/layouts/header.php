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
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- Descriptive Meta Tags -->

    <meta name="keywords" content="Journalist, filmmaker, video, videos, print, séverine, Lenglet, severine" />
    <meta name="description" content="Séverine Lenglet, Journalist and Filmmaker" />
    <meta name="copyright" content="Copyright (c) Séverine Lenglet 2013" />
    <meta name="language" content="fr-FR" />
    <meta name="author" content="">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Open Graph Meta Tags -->

    <meta name="og:title" content="Séverien Lenglet, Journalist and Filmmaker"/>
    <meta name="og:type" content="website"/>
    <meta name="og:url" content="<?php echo current_url(); ?>"/>
    <meta name="og:image" content="<?php echo site_url('assets/img/severine_100x100.png'); ?>"/>
    <meta name="og:site_name" content="Séverine Lenglet"/>
    <meta name="og:description" content="Séverine Lenglet, Journalist and Filmmaker."/>

    <meta name="og:email" content="s_lenglet@yahoo.fr"/>

    <title>
        <?php if (!isset($page_title)){echo "Séverine Lenglet, Journalist and Filmmaker";} else {echo $page_title;} ?>
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LESS -->
    <link href="<?php echo site_url('assets/css/application.css')?>" rel="stylesheet" media="screen">
</head>
<body>

