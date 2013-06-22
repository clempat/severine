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
    
    <link rel="shortcut icon" href="<?php echo site_url('assets/img/favicon.ico') ?>">
    <link rel="icon" type="image/gif" href="<?php echo site_url('assets/img/animated_favicon1.gif') ?>">

    <!-- JAVASCRIPT -->
    <?php echo $js_for_layout ?>

    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-41918631-1', 'severinelenglet.eu');
        ga('send', 'pageview');

    </script>
</head>
<body>

<?php echo $menu_for_layout ?>

<?php echo flash_message() ?>
<?php echo $content_for_layout?>
<footer class="footer">
    © 2013. Séverine Lenglet, Video Journalism, Communication, Media Training. | All Rights Reserved. | <a href="<?php echo site_url('mentions'); ?>">Impressum.</a>

</footer>
</body>
</html>

