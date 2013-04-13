<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 12.03.13
 * Time: 15:25
 * To change this template use File | Settings | File Templates.
 */
?>
<section id="page" class="container" style="margin-top: 20px;">
    <?php if ($mail_sent == "ok") {?>
        <div class="alert alert-success">Your message was correctly sent! <a href="" class="close">&times;</a></div>
    <?php }elseif ($mail_sent == "error"){ ?>
        <div class="alert alert-error">Your message could not be sent, please contact the webmaster ! <a href="" class="close">&times;</a></div>
    <?php } ?>
    <div class="span12"><h1><i class="icon-comment"></i> Contact</h1></div>
    <div class="span8">
        <form id="contactForm" action="contact" method="POST">
            <?php echo form_label('Your name :', 'firstName');?>
            <div class="controls controls-row">
                    <?php echo form_input($form['firstName']);?>
                    <?php echo form_input($form['name']);?>
            </div>

            <?php echo form_label('Your telephone :', 'tel');?>
            <div class="controls">
                <?php echo form_input($form['tel']);?>
            </div>
            <?php echo form_label('<i class="icon-asterisk" style="color:red;"></i> Your email :', 'email');?>
            <div class="controls">
                <?php echo form_input($form['email']);?>
            </div>
            <?php echo form_label('<i class="icon-asterisk" style="color:red;"></i> Object :', 'object', array('required '));?>
            <div class="controls">
                <?php echo form_input($form['object']);?>
            </div>
            <?php echo form_label('<i class="icon-asterisk" style="color:red;"></i> Message :', 'msg', array('required '));?>
            <div class="controls">
                <?php echo form_textarea($form['msg']);?>
            </div>
            <div class="controls form-actions">
                <input type="submit" name="q" id="q" class="btn btn-primary" value="Send" />
            </div>
    </div>
    <div class="span3 offset1">
        <div class="well well-small" style="width:100%;">
            <address>
                <strong>Séverine Lenglet</strong><br/>
                Chamissoplatz 4<br />
                10965 Berlin<br />
                <abbr title="Phone"><i class="icon-phone"></i></abbr> 0049 (0)1632543147<br/>
                <abbr title="Email"><i class="icon-envelope"></i></abbr> s_lenglet@yahoo.fr
            </address>
        </div>

    </div>

</section>

