<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| EMAIL SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to send email
|
| For complete instructions please consult the 'Email'
| page of the User Guide.
|
*/

$config['protocol'] = 'smtp';
$config['smtp_host'] = getenv('SMTP_ADDRESS');
$config['smtp_user'] = getenv('SMTP_USERNAME');
$config['smtp_pass'] = getenv('SMTP_PASSWORD');
$config['smtp_port'] = getenv('SMTP_PORT');
