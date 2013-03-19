<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 21:03
 * To change this template use File | Settings | File Templates.
 */
?>

<section id="page" class="container-fluid">
    <h2>Login</h2>
    <?php echo form_open(site_url('admin/pages/login'), array('class' => 'form-horizontal')) ?>

    <?php echo $this->form_builder->text('username', 'Login') ?>


    <?php echo $this->form_builder->password('password', 'Mot de passe') ?>

    <?php echo form_submit('submit','Connexion');?>
    <?php echo form_close(); ?>
    <?php echo validation_errors();?>

</section>