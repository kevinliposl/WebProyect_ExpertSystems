<?php

require 'libs/Config.php';
$config = Config::singleton();
$config->set('controllerFolder', 'controller/');
$config->set('modelFolder', 'model/');
$config->set('viewFolder', 'view/');

$config->set('dbhost', '163.178.107.130');
$config->set('dbname', 'expert_systems_b40920_b46549');
$config->set('dbuser', 'laboratorios');
$config->set('dbpass', 'UCRSA.118');
