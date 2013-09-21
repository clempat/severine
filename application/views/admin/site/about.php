<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:05
 * To change this template use File | Settings | File Templates.
 */
?>
<section id="page" class="container">
    <h2>Changer la page About</h2>

    <?php echo form_open(site_url('admin/site/about/'), array('class' => 'form-horizontal')) ?>
    <?php echo $this->form_builder->textarea('html', '', $about->html, 'ckeditor span12') ?>
    <div class="form-actions">
        <a href="<?php echo site_url('admin/site/about') ?>" class='btn'>Cancel</a>
        <input type="submit" name="valid" id="valid" value="Valider" class="btn btn-primary" />
    </div>
    <?php echo form_close()?>

</section>