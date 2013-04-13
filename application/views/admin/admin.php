<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 21:04
 * To change this template use File | Settings | File Templates.
 */
?>
<section id="page" class="container">
    <h2>Liste des Photos :</h2>
    <ul class="thumbnails">
        <?php foreach($photos as $photo) {?>
            <li class="span4">
                <div class="thumbnail" style="background-color: <?php echo 'rgb('.$photo->r.','.$photo->g.','.$photo->b.')' ?>; color: <?php echo text_color($photo->r,$photo->g,$photo->b); ?>">
                    <img src="<?php echo site_url('uploads/thumbs/'.$photo->filename).'?'.now()?>" alt="<?php echo $photo->filename ?>">
                    <p>
                    <h3><?php echo $photo->title ?></h3>
                    <div class="btn-group text-center">
                        <a href="<?php echo site_url('admin/photos/crop/'.$photo->id) ?>" class="btn">Editer</a>
                        <a href="<?php echo site_url('admin/photos/dell/'.$photo->id ) ?>" class="btn btn-danger">Supprimer</a>
                    </div>
                    </p>
                </div>
            </li>
        <?php } ?>
    </ul>
    <div class="span12 text-right"><a href="<?php echo site_url('admin/photos') ?>" class="btn btn-primary">Section Photo</a></div>
    <h2>Liste des Vidéos :</h2>
    <ul class="thumbnails sortable">
        <?php foreach($videos as $video) {?>
            <li id="<?php echo $video->id ?>" class="span4 video">
                <div class="thumbnail" style="background-color: <?php echo 'rgb('.$video->r.','.$video->g.','.$video->b.')' ?>; color: <?php echo text_color($video->r,$video->g,$video->b); ?>">
                    <img src="<?php echo site_url('uploads/thumbs/'.$video->thumbnail).'?'.now()?>" alt="<?php echo $video->title ?>">
                    <p>
                    <h3><?php echo $video->title ?></h3>
                    </p>
                    <p>
                        <?php echo $video->description ?>
                    </p>
                    <p>
                    <div class="btn-group text-center">
                        <a href="<?php echo site_url('admin/videos/edit/'.$video->id) ?>" class="btn">Editer</a>
                        <a href="<?php echo site_url('admin/videos/dell/'.$video->id ) ?>" class="btn btn-danger">Supprimer</a>
                    </div>
                    </p>
                </div>
            </li>
        <?php } ?>
    </ul>
    <div class="span12 text-right"><a href="<?php echo site_url('admin/videos') ?>" class="btn btn-primary">Section Video</a></div>

</section>