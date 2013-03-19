<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 15.03.13
 * Time: 10:18
 * To change this template use File | Settings | File Templates.
 */
?>
<section id="page" class="container-fluid">
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
    <div class="span12 text-right"><a href="photos/add" class="btn btn-primary">Ajoutez une photo</a></div>
</section>