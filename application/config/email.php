<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| EMAIL CONFIGURATION
| -------------------------------------------------------------------
| PENTING: Ganti dengan email dan password Anda
| Untuk Gmail, gunakan App Password bukan password asli
| Cara buat App Password: https://myaccount.google.com/apppasswords
*/

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'raihanputrapermanaa@gmail.com'; // Ganti dengan email Anda
$config['smtp_pass'] = 'Scarlettcuy887'; // Ganti dengan App Password Gmail
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['wordwrap'] = TRUE;