<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 12.03.13
 * Time: 15:25
 * To change this template use File | Settings | File Templates.
 */
?>
<section id="page" class="container-fluid" style="margin-top: 20px;">
    <?php if ($mail_sent === "ok") {?>
        <div class="alert-box success">Votre message à bien été envoyé ! <a href="" class="close">&times;</a></div>
    <?php }elseif ($mail_sent === "error"){ ?>
        <div class="alert-box success">Votre message n'a pas été envoyé, veuillez contacter le webmaster ! <a href="" class="close">&times;</a></div>
    <?php } ?>
    <div class="span12"><h1><i class="icon-comment"></i> Contact</h1></div>
    <div class="span8">
        <form id="contactForm" action="contact" method="POST" class="form-horizontal">
            <?php echo form_label('<i class="icon-asterisk" style="color:red;"></i> Your email :', 'email', array('required '));?>
            <?php echo form_input($form['email']);?>
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
<section id="page" class="container-fluid" style="margin-top: 20px;">



</section>

