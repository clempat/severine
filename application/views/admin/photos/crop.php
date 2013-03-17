<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 15.03.13
 * Time: 10:18
 * To change this template use File | Settings | File Templates.
 */
?>
<section id="page" class="container jcrop">
    <h1><?php echo $photo_title?></h1>
        <?php echo img(array('src' => $photo_src, 'id'=>'crop_box')) ?>
        <form action="" method="post" onsubmit="return checkCoords();">
            <input type="hidden" id="photo_crop_x" name="photo_crop_x" />
            <input type="hidden" id="photo_crop_y" name="photo_crop_y" />
            <input type="hidden" id="photo_crop_w" name="photo_crop_w" />
            <input type="hidden" id="photo_crop_h" name="photo_crop_h" />
            <input type="submit" name= "crop_it" value="Crop Image" class="btn btn-large btn-inverse" />
        </form>

    <div style="width:300px; height:200px; overflow:hidden" class="preview_bloc">
        <?php echo img(array('src' => $photo_src, 'id'=>'preview')) ?>
    </div>

</section>