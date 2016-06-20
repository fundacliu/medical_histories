<?php
require_once 'vendor/autoload.php';
require_once 'lib/choco/orm.php';
require_once 'lib/choco/post.php';
require_once 'config/autoloader.php';
use \Choco\POST;


$a = new Personas();
$a->find("nombres='jeferson'");
echo $a->id() . " " . $a->nombres() . " ";

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
	$persona = new Personas();
    if (POST::exist(["cedula"])) {
        $persona = new Personas();
        $persona->find('cedula = ' . POST::get('cedula'));
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

    } 
	Flight::render('headBase', [], 'headBase');
	Flight::render('menuSuperior', [], 'menuSuperior');
	Flight::render('FormularioBase', [], 'FormularioBase');
	Flight::render('headForm', [], 'headForm');
	Flight::render('base');
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
	Flight::render('header', [], 'header');
	Flight::render('moduloHistoria', [], 'moduloHistoria');
	Flight::render('script', [], 'script');
	Flight::render('menuSuperior', [], 'menuSuperior');
	Flight::render('modulos', [], 'modulos');
	Flight::render('busqueda', [], 'busqueda');	
	Flight::render('historia', []);
});
Flight::route('/especialista', function(){
	Flight::render('head', [], 'head');
	Flight::render('header', [], 'header');
	Flight::render('moduloEspecialista', [], 'moduloEspecialista');
	Flight::render('script', [], 'script');
	Flight::render('menuSuperior', [], 'menuSuperior');
	Flight::render('modulos', [], 'modulos');
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
			$usuario->id_personas($persona->id());
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
		$persona->save();
		echo '<script language=Javascript> location.pathname = location.pathname + \'/../..\'; </script>'; 
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


Flight::start();
