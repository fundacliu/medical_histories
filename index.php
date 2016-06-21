<?php
require_once 'vendor/autoload.php';
require_once 'lib/choco/session.php';
require_once 'lib/choco/orm.php';
require_once 'lib/choco/post.php';
require_once 'config/autoloader.php';

if (trim($_SERVER['SCRIPT_NAME'], "/index.php") == '')
	define('ROOT', '/' . trim($_SERVER['SCRIPT_NAME'], "/index.php"));
else
	define('ROOT', '/' . trim($_SERVER['SCRIPT_NAME'], "/index.php"));

define('APP', './app/');
define('VIEWS', APP . 'views');
define('MODELS', APP . 'models');
define('CONTROLLERS', APP . 'controllers');
use \Choco\POST;
use \Choco\Session;

Flight::set('flight.views.path', VIEWS);

if (Session::exist(['permiso'])) 
	Flight::view()->set('permiso', Session::get('permiso'));
else 
	Flight::view()->set('permiso', 'invitado');

Flight::route('/', function(){
	if (Session::exist(['permiso'])) 
		Flight::view()->set('permiso', Session::get('permiso'));
	else 
		Flight::view()->set('permiso', 'invitado');	

	Flight::render('head', [], 'head');
	Flight::render('menuSuperior', [], 'menuSuperior');
	Flight::render('script', [], 'script');
	Flight::render('header', [], 'header');
	Flight::render('busqueda', [], 'busqueda');
    Flight::render('index', []); 
});

function base($cedula) {
	/*if (Session::exist(['permiso'])) 
		Flight::view()->set('permiso', Session::get('permiso'));
	else 
		Flight::view()->set('permiso', 'invitado');*/
	$persona = new Personas();
    if (POST::exist(["cedula"]) || isset($cedula)) {
        $persona = new Personas();
        if (POST::exist(["cedula"]))
        	$persona->find('cedula = ' . POST::get('cedula'));
        else
        	$persona->find('cedula = ' . $cedula);
        if ($persona->id() != '') {
	        Flight::view()->set('persona', $persona);


			$dia=date('j'); 
			$mes=date('n'); 
			$ano=date('Y'); 

			$nacimiento=explode("-", $persona->nacimiento()); 
			$dianac=$nacimiento[2]; 
			$mesnac=$nacimiento[1]; 
			$anonac=$nacimiento[0]; 
			//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual 
			if (($mesnac == $mes) && ($dianac > $dia)){ 
			$ano=($ano-1);} 
			//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual 
			if ($mesnac > $mes){ 
			$ano=($ano-1);} 
			//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad 
			$edad=($ano-$anonac);
			Flight::view()->set('edad', $edad);
			Flight::render('headBase', [], 'headBase');
			Flight::render('menuSuperior', [], 'menuSuperior');
			Flight::render('FormularioBase', [], 'FormularioBase');
			Flight::render('headForm', [], 'headForm');
			Flight::render('base');
		}
		else if (isset($cedula)) {
			echo '<script language=Javascript> location.pathname = location.pathname + \'/../../personas\'; </script>'; 
		}
		else 
    		echo '<script language=Javascript> location.pathname = location.pathname + \'/../personas\'; </script>'; 
    } 
    else if (isset($cedula)) 
		echo '<script language=Javascript> location.pathname = location.pathname + \'/../../personas\'; </script>'; 
    else 
    	echo '<script language=Javascript> location.pathname = location.pathname + \'/../personas\'; </script>'; 
}

Flight::route('/base(/@cedula:[0-9]{7})', 'base');
Flight::route('/base(/@cedula:[0-9]{8})', 'base');
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
	Flight::render('clinicaBase', [], 'clinicaBase');
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


Flight::route('/historia', function(){
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('menuSuperior', [], 'menuSuperior');
	Flight::render('busqueda', [], 'busqueda');	
	Flight::render('historia', []);
});
Flight::route('/especialista', function(){
	if (Session::exist(['permiso'])) 
		Flight::view()->set('permiso', Session::get('permiso'));
	else 
		Flight::view()->set('permiso', 'invitado');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('menuSuperior', [], 'menuSuperior');
	Flight::render('busqueda', [], 'busqueda');	
	Flight::render('especialista', []);
});






Flight::route('/accion/registro', function(){
	if (POST::exist(["cedula"])) {
		$persona = new Personas();
		$persona->find('cedula = ' . POST::get("cedula"));
		if ($persona->id() != '' && POST::exist(["pass", "pass2", "correo", "nombres"]) && POST::get("pass") == POST::get("pass2")) {
			$usuario = new Usuarios();
			$usuario->usuario(POST::get('nombres'));
			$usuario->contraseña(POST::get('pass'));
			$usuario->correo(POST::get('correo'));
			$usuario->id_persona($persona->id());
			$usuario->creacion(date('Y-m-d H:i:s'));
			$usuario->save();
			echo '<script language=Javascript> location.pathname = location.pathname + \'/../..\'; </script>'; 
		}
		else {
			echo '<script language=Javascript> location.pathname = location.pathname + \'/../../Registrar\'; </script>'; 
		}
	}
	else {
		echo '<script language=Javascript> location.pathname = location.pathname + \'/../../Registrar\'; </script>'; 
	}
});




Flight::route('/accion/login', function(){
	if (POST::exist(["nick", "password"])) {
		$usuario = new Usuarios();
		$usuario->find('usuario = \'' . POST::get("nick") . '\' and contraseña = \'' . POST::get("password") . '\'');
		if ($usuario->id() != '') {
			
			$persona = new Personas();
			$persona->find('id = ' . $usuario->id_persona());
			Session::new([
				"usuario" => $usuario->usuario(),
				"nombres" => $persona->nombres(),
				"apellidos" => $persona->apellidos(),
				"nacimiento" => $persona->nacimiento(),
				"creacion" => $usuario->creacion(),
				"permiso" => $persona->id_permiso()
			]);

			echo '<script language=Javascript> location.pathname = location.pathname + \'/../..\'; </script>'; 
		}
		else {
			echo '<script language=Javascript> location.pathname = location.pathname + \'/../../Login\'; </script>'; 
		}
	}
	else {
		echo '<script language=Javascript> location.pathname = location.pathname + \'/../../Login\'; </script>'; 
	}
});

Flight::route('/accion/persona', function(){
	if (POST::exist(["nombres", "apellidos", "tipo_cedula", "cedula", "nacimiento", "direccion", "profesion", "sexo", "donde_nacio"])) {
		$persona = new Personas();
		$persona->nombres(POST::get("nombres"));
		$persona->apellidos(POST::get("apellidos"));
		$persona->id_tipo_cedula(POST::get("tipo_cedula"));
		$persona->cedula(POST::get("cedula"));
		$persona->nacimiento(POST::get("nacimiento"));
		$persona->direccion(POST::get("direccion"));
		$persona->profesion(POST::get("profesion"));
		$persona->id_sexo(POST::get("sexo"));
		$persona->Lugar_nacimiento(POST::get("donde_nacio"));
		$persona->registro(date("Y-m-d H:i:s"));
		$persona->id_permiso(1);
		$persona->save();
		echo '<script language=Javascript> location.pathname = location.pathname + \'/../../base/' . POST::get("cedula") . '\'; </script>'; 
	} 
	else {
		echo '<script language=Javascript> location.pathname = location.pathname + \'/../../personas\'; </script>'; 
	}
});

Flight::route('/personas', function(){
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('personas', []);
});
Flight::route('/accion/cerrar', function(){
	Session::close();
	echo '<script language=Javascript> location.pathname = location.pathname + \'/../../\'; </script>'; 
});

Flight::start();
