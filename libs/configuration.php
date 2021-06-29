<?php

require 'libs/Config.php';
$config = Config::singleton();
$config->set('controllerFolder', 'controller/');
$config->set('modelFolder', 'model/');
$config->set('viewFolder', 'view/');

$config->set('dbhost', '163.178.107.10'); 
$config->set('dbname', 'turista_inteligente');
$config->set('dbuser', 'laboratorios');
$config->set('dbpass', 'KmZpo.2796');

// $config->set('dbhost', '127.0.0.1'); 
// $config->set('dbname', 'turista_inteligente');
// $config->set('dbuser', 'root');
// $config->set('dbpass', '');
?>

