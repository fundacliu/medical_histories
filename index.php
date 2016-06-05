<?php
require_once 'vendor/autoload.php';
require_once 'lib/php-activerecord/ActiveRecord.php';
define('APP', './app/');
define('VIEWS', APP . 'views');
define('MODELS', APP . 'models');
define('CONTROLLERS', APP . 'controllers');

Flight::set('flight.views.path', VIEWS);

Flight::route('/', function(){
	Flight::render('head', [], 'head');
	Flight::render('menuSuperior', [], 'menuSuperior');
	Flight::render('script', [], 'script');
	Flight::render('header', [], 'header');
	Flight::render('modulos', [], 'modulos');
	Flight::render('busqueda', [], 'busqueda');
    Flight::render('index', []); 
});

ActiveRecord\Config::initialize(function($cfg)
{
     $cfg->set_model_directory(MODELS);
     $cfg->set_connections(array(
         'development' => 'mysql://root@localhost/medical_histories'));
 });



Flight::start();