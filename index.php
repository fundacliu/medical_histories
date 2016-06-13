<?php
require_once 'vendor/autoload.php';
require_once 'lib/choco/orm.php';
//require_once 'config/autoloader.php';

/*
$a= new Historias();
$a->save();
var_dump($a);
*/
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

Flight::route('/base', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('menuSuperior', [], 'menuSuperior');
	Flight::render('FormularioBase', [], 'FormularioBase');
	Flight::render('headForm', [], 'headForm');
	Flight::render('base', []);
});

Flight::route('/Login', function(){
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('Login', []);
});
Flight::route('/Registrar', function(){
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('Registrar', []);
});
Flight::route('/Recuperar', function(){
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('Recuperar', []);
});

Flight::start();
