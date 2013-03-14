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
            <li data-target="#header_photo" data-slide-to="0" class="active"></li>
            <li data-target="#header_photo" data-slide-to="1"></li>
            <li data-target="#header_photo" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <?php echo img('assets/img/testHeader/1.JPG') ?>
                <div class="text-header">
                    <h1>Essai</h1>
                    <div class="p_wrapper">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean justo ante, accumsan at scelerisque sit amet, congue et ligula. Praesent faucibus, elit sit amet semper facilisis, odio metus accumsan felis, eu euismod metus mauris nec massa. Suspendisse malesuada tortor quis mi molestie eget pellentesque sem scelerisque. Maecenas eros massa, tempus nec tincidunt a, dictum vitae enim. Donec tincidunt urna a sapien venenatis rhoncus. Aenean eget nulla ante, a convallis leo. Proin in velit lacus, sit amet ullamcorper nisl. Suspendisse porta leo id lorem bibendum mattis et sed nunc.
                        </p>
                    </div>
                    <a href="#" class="btn btn-primary">Watch now</a>
                </div>
            </div>
            <div class="item">
                <?php echo img('assets/img/testHeader/2.JPG') ?>

            </div>
            <div class="item">
                <?php echo img('assets/img/testHeader/3.JPG') ?>

            </div>
        </div>
        <a class="carousel-control left" href="#header_photo" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#header_photo" data-slide="next">&rsaquo;</a>
    </div>

</section>
<section id="page" class="container-fluid">
    <div id="filter" class="span12">
        <ul class="nav nav-pills pull-right">
            <li class="active">
                <a href="#">All</a>
            </li>
            <li><a href="#">German</a></li>
            <li><a href="#">English</a></li>
            <li><a href="#">French</a></li>
        </ul>
    </div>
    <div id="thumbnail_container" class="span12">
        <!-- thumbnail -->
        <ul class="thumbnails">
            <li class="span4">
                <div class="thumbnail">
                    <img data-src="holder.js/300x200" alt="">
                    <h3>Thumbnail label</h3>
                    <p>Thumbnail caption...</p>
                </div>
            </li>
            <li class="span4">
                <div class="thumbnail">
                    <img data-src="holder.js/300x200" alt="">
                    <h3>Thumbnail label</h3>
                    <p>Thumbnail caption...</p>
                </div>
            </li>
            <li class="span4">
                <div class="thumbnail">
                    <img data-src="holder.js/300x200" alt="">
                    <h3>Thumbnail label</h3>
                    <p>Thumbnail caption...</p>
                </div>
            </li>
            <li class="span4">
                <div class="thumbnail">
                    <img data-src="holder.js/300x200" alt="">
                    <h3>Thumbnail label</h3>
                    <p>Thumbnail caption...</p>
                </div>
            </li>
            <li class="span4">
                <div class="thumbnail">
                    <img data-src="holder.js/300x200" alt="">
                    <h3>Thumbnail label</h3>
                    <p>Thumbnail caption...</p>
                </div>
            </li>
            <li class="span4">
                <div class="thumbnail">
                    <img data-src="holder.js/300x200" alt="">
                    <h3>Thumbnail label</h3>
                    <p>Thumbnail caption...</p>
                </div>
            </li>
            <li class="span4">
                <div class="thumbnail">
                    <img data-src="holder.js/300x200" alt="">
                    <h3>Thumbnail label</h3>
                    <p>Thumbnail caption...</p>
                </div>
            </li>
        </ul>

    </div>
</section>