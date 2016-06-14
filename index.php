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

Flight::route('/orden', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('script', [], 'script');
	Flight::render('ordenBase', [], 'ordenBase');
	Flight::render('orden', []);
});
Flight::route('/ingreso', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('ingresoBase', [], 'ingresoBase');
	Flight::render('script', [], 'script');
	Flight::render('ingreso', []);
});
Flight::route('/egreso', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('egresoBase', [], 'egresoBase');
	Flight::render('script', [], 'script');
	Flight::render('egreso', []);
});
Flight::route('/enfermeria', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('enfermeriaBase', [], 'enfermeriaBase');
	Flight::render('script', [], 'script');
	Flight::render('enfermeria', []);
});


Flight::route('/clinica', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('script', [], 'script');
	Flight::render('clinica', []);
});

Flight::route('/laboratorio', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('script', [], 'script');
	Flight::render('laboratorio', []);
});

Flight::route('/evolucion', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('script', [], 'script');
	Flight::render('evolucion', []);
});




Flight::start();
