<?php
/**
 * Olá World!
 *
 * @author Gustavo B. Amaral
 *
 * @link https://github.com/bsgustavoa
 *
*/
session_start();
if (empty($_SESSION['hijacking'])) {

    $_SESSION['hijacking'] = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

}

$token = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

if ($_SESSION['hijacking'] != $token) {

    if ( isset($_SESSION['token']) ) {
        unset($_SESSION['token']);
    }

}

require 'config.php';
require 'routes.php';
require __DIR__.'/vendor/autoload.php';

$core = new Core\Core();
$core->run();
