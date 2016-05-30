<?php
require 'vendor/autoload.php';
define('APP', 'app/');
define('VIEWS', APP . 'views');
define('MODELS', APP . 'models');
define('CONTROLLERS', APP . 'controllers');

Flight::set('flight.views.path', VIEWS);

Flight::route('/', function(){
	Flight::render('head', [], 'head');
	Flight::render('hello', [], 'hello');
    Flight::render('index', []); 
});



Flight::start();