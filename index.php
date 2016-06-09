<?php
require_once 'vendor/autoload.php';
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
	Flight::render('FormularioBase', [], 'FormularioBase');
	Flight::render('headForm', [], 'headForm');
    Flight::render('index', []); 
});

Flight::route('/base', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('menuSuperior', [], 'menuSuperior');
	Flight::render('FormularioBase', [], 'FormularioBase');
	Flight::render('headForm', [], 'headForm');
    Flight::render('base', []); 
});

/*
$author = new Sexo();
$author->setSexo('Masculino');
$author->save();
*/

Flight::start();