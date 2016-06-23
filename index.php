<?php
require_once 'vendor/autoload.php';
require_once 'vendor/chocoland/orm/session.php';
require_once 'vendor/chocoland/orm/orm.php';
require_once 'vendor/chocoland/orm/post.php';
require_once 'config/autoloader.php';

if (trim($_SERVER['SCRIPT_NAME'], "/index.php") == '')
	define('ROOT', trim($_SERVER['SCRIPT_NAME'], "/index.php"));
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
    Flight::render('layout'); 
});

function base($cedula) {
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
			
			Flight::render('FormularioBase', [], 'FormularioBase');
			
			Flight::render('head', [], 'head');
			Flight::render('layout'); 
		}
		else if (isset($cedula)) {
			echo '<script language=Javascript> location.pathname = \'' . ROOT . '/personas\'; </script>'; 
		}
		else 
    		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/personas\'; </script>'; 
    } 
    else if (isset($cedula)) 
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/personas\'; </script>'; 
    else 
    	echo '<script language=Javascript> location.pathname = \'' . ROOT . '/personas\'; </script>'; 
}

Flight::route('/base(/@cedula:[0-9]{7})', 'base');
Flight::route('/base(/@cedula:[0-9]{8})', 'base');
Flight::route('/login', function(){
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('login', [], 'login');
	Flight::render('layout'); 
});
Flight::route('/registrar', function(){
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('registrar', [], 'registrar');
	Flight::render('layout'); 
});
Flight::route('/orden', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('orden', [], 'orden');
	Flight::render('layout'); 
});
Flight::route('/ingreso', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('ingreso', [], 'ingreso');
	Flight::render('layout'); 
});
Flight::route('/egreso', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('egreso', [], 'egreso');
	Flight::render('layout'); 
});
Flight::route('/enfermeria', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('enfermeria', [], 'enfermeria');
	Flight::render('layout'); 
});
Flight::route('/clinica', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('clinica', [], 'clinica');
	Flight::render('layout'); 
});
Flight::route('/laboratorio', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('laboratorio', [], 'laboratorio');
	Flight::render('layout'); 
});
Flight::route('/evolucion', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('evolucion', [], 'evolucion');
	Flight::render('layout'); 
});
Flight::route('/especialista', function(){
	Flight::render('head', [], 'head');
	Flight::render('header', [], 'header');
	Flight::render('script', [], 'script');
	Flight::render('menuSuperior', [], 'menuSuperior');
	Flight::render('moduloEspecialista', [], 'moduloEspecialista');
	Flight::render('layout', []);
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
			echo '<script language=Javascript> location.pathname = \'' . ROOT . '/\'; </script>'; 
		}
		else {
			echo '<script language=Javascript> location.pathname = \'' . ROOT . '/registrar\'; </script>'; 
		}
	}
	else {
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/registrar\'; </script>'; 
	}
});

Flight::route('/personas', function(){
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('personas', [], 'personas');
	Flight::render('layout');
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
			echo '<script language=Javascript> location.pathname = \'' . ROOT . '/\'; </script>'; 
		}
		else {
			echo '<script language=Javascript> location.pathname = \'' . ROOT . '/login\'; </script>'; 
		}
	}
	else {
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/login\'; </script>'; 
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
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/login\'' . POST::get("cedula") . '; </script>'; 
		echo '<script language=Javascript> location.pathname = location.pathname + \'/../../base/' . POST::get("cedula") . '\'; </script>'; 
	} 
	else {
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/personas\'; </script>'; 
		echo '<script language=Javascript> location.pathname = location.pathname + \'/../../personas\'; </script>'; 
	}
});

Flight::route('/accion/menores', function(){
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

Flight::route('/menores', function(){
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('menores', [], 'menores');
	Flight::render('layout');
});

Flight::route('/accion/cerrar', function(){
	Session::close();
	echo '<script language=Javascript> location.pathname = location.pathname + \'/../../\'; </script>'; 
});

Flight::start();
