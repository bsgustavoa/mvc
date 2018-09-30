<?php
/**
 * Meramente incessante e golfo.
 *
 * @author Webboo! Soluções Web
 *
 * @link https://www.webboo.com.br
 *
*/
require 'environment.php';

global $config;
global $db;

$config = [];
define('HEY', [
    'msg' => 'HEY!'
]);

if(ENVIRONMENT == 'development') {
    define('BASE_URL', 'http://localhost/mvc/');/*
    $config['dbname'] = 'system';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'toor';*/
} else {
    define('BASE_URL', '#');
    $config['dbname'] = '#';/*
    $config['host'] = '';
    $config['dbuser'] = '';
    $config['dbpass'] = '';*/
} /*
try {
    $db = new PDO('mysql:dbname='.$config['dbname'].';charset=utf8;host='.$config['host'], $config['dbuser'], $config['dbpass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die($e->getMessage());
} */
