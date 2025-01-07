<?php
$config = Config::singleton();
 
$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');
 
$config->set('dbhost', 'localhost');
$config->set('dbname', 'microframework');
$config->set('dbuser', 'root');
$config->set('dbpass', '');
?>