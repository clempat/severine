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
    <h2>Ajouter un article.</h2>

    <?php echo form_open(site_url('admin/prints/add'), array('class' => 'form-horizontal')) ?>
    <?php echo $this->form_builder->text('title', 'Titre') ?>
    <?php echo $this->form_builder->checkbox('Publier', 'published', 'true', true) ?>
    <?php echo $this->form_builder->checkbox('Mettre fin de liste', 'pull_end', 'true') ?>
    <?php echo $this->form_builder->textarea('article', 'Article','', 'ckeditor') ?>
    <?php echo $this->form_builder->option('language','Langue',array(
        (object) array('id'=>'french', 'name'=>'Français'),
        (object) array('id'=>'english', 'name'=>'Anglais'),
        (object) array('id'=>'german', 'name'=>'Allemand')
    )); ?>
    <div id="video_photos">
        <h3>Choix Photo: <small><a href="<?php echo site_url('admin/photos') ?>">Gerer la bibliothèque</a></small> </h3>
        <ol class="selectable thumbnails">
            <?php foreach ($photos as $photo) {?>
                <li id="<?php echo $photo->id ?>" class="ui-state-default span3"><a href="#selectable" class="thumbnail"><img src="<?php echo site_url('uploads/thumbs/'.$photo->filename).'?'.now()?>" alt="<?php echo $photo->filename ?>"></a></li>
            <?php }?>
        </ol>
    </div>
    <?php echo $this->form_builder->hidden('photo_id') ?>
    <div class="form-actions">
        <a href="<?php echo site_url('admin/prints') ?>" class='btn'>Cancel</a>
        <input type="submit" name="add" id="add" value="Ajouter" class="btn btn-primary" />
    </div>
    <?php echo form_close()?>

</section>