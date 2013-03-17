<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 21:03
 * To change this template use File | Settings | File Templates.
 */

echo form_open('admin/pages/login');
echo form_label('Login','username');
echo form_input('username',set_value('username'));

echo form_label('Mot de passe','password');
echo form_password('password');

echo form_submit('submit','Connexion');
echo form_close();
echo validation_errors();
echo $error_credentials;