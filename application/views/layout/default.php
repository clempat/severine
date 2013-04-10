<!DOCTYPE html>
<html>
<head>
    <!--[if lte IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
<?php echo $menu_for_layout ?>

<?php echo flash_message() ?>
<?php echo $content_for_layout?>
<footer class="footer">
    © 2013. Séverine Lenglet, Journalist, Filmmaker, Video Trainer. | All Rights Reserved. | <a href="<?php echo site_url('mentions'); ?>">Mentions.</a>

</footer>
</body>
</html>

