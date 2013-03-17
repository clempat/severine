<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 15.03.13
 * Time: 10:53
 * To change this template use File | Settings | File Templates.
 */
?>

<section id="page" class="container-fluid">
    <h2>Ajouter une photo</h2>
    <?php echo form_open_multipart('admin/photos/add', array('class' => 'form-horizontal'));?>
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="userfile">Photo</label>
                <div class="controls">
                    <?php echo form_upload('userfile'); ?>
                    <span class="help-inline">The max size for your photo allowed by the server is <strong><?php echo ini_get('upload_max_filesize')?></strong></span>
                </div>

            </div>
            <div class="form-actions">
                <?php echo form_submit('upload', 'Upload'); ?>
            </div>

        </fieldset>
    <?php echo form_close(); ?>
</section>