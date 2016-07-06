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

function historia_adulto($cedula) {
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

Flight::route('/historia/adultos(/@cedula:[0-9]{7})', 'historia_adulto');
Flight::route('/historia/adultos(/@cedula:[0-9]{8})', 'historia_adulto');
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
function orden($cedula) {
	Flight::view()->set('cedula', $cedula);
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('orden', [], 'orden');
	Flight::render('layout'); 
}
Flight::route('/orden/@cedula:[0-9]{7}', 'orden');
Flight::route('/orden/@cedula:[0-9]{8}', 'orden');
function ingreso($cedula) {
	$persona = new Personas();
	$persona->find('cedula = ' . $cedula);
	if ($persona->lenght() == 1) {
		$departamentos = new Departamentos();
		$departamentos->find();
		Flight::view()->set('cedula', $cedula);
		Flight::view()->set('nombres', $persona->nombres());
		Flight::view()->set('apellidos', $persona->apellidos());
		Flight::view()->set('fecha', date("Y-m-d"));
		Flight::view()->set('departamentos', $departamentos->array());
		Flight::render('headBase', [], 'headBase');
		Flight::render('head', [], 'head');
		Flight::render('script', [], 'script');
		Flight::render('ingreso', [], 'ingreso');
		Flight::render('layout'); 
	}
	
}
Flight::route('/ingreso/@cedula:[0-9]{7}', 'ingreso');
Flight::route('/ingreso/@cedula:[0-9]{8}', 'ingreso');
function egreso($cedula) {
	$persona = new Personas();
	$persona->find('cedula = ' . $cedula);
	if ($persona->lenght() == 1) {
		$departamentos = new Departamentos();
		$departamentos->find();
		Flight::view()->set('cedula', $cedula);
		Flight::view()->set('nombres', $persona->nombres());
		Flight::view()->set('apellidos', $persona->apellidos());
		Flight::view()->set('fecha', date("Y-m-d"));
		Flight::view()->set('departamentos', $departamentos->array());
		Flight::render('headBase', [], 'headBase');
		Flight::render('head', [], 'head');
		Flight::render('script', [], 'script');
		Flight::render('egreso', [], 'egreso');
		Flight::render('layout'); 
	}
}
Flight::route('/egreso/@cedula:[0-9]{7}', 'egreso');
Flight::route('/egreso/@cedula:[0-9]{8}', 'egreso');
function enfermeria($cedula) {
	Flight::view()->set('cedula', $cedula);
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('enfermeria', [], 'enfermeria');
	Flight::render('layout'); 
}
Flight::route('/enfermeria/@cedula:[0-9]{7}', 'enfermeria');
Flight::route('/enfermeria/@cedula:[0-9]{8}', 'enfermeria');
function clinica($cedula) {
	Flight::view()->set('cedula', $cedula);
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('clinica', [], 'clinica');
	Flight::render('layout'); 
}
Flight::route('/clinica/@cedula:[0-9]{7}', 'clinica');
Flight::route('/clinica/@cedula:[0-9]{8}', 'clinica');
function clinica2($cedula) {
	Flight::view()->set('cedula', $cedula);
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('clinica2', [], 'clinica2');
	Flight::render('layout'); 
}
Flight::route('/clinica2/@cedula:[0-9]{7}', 'clinica2');
Flight::route('/clinica2/@cedula:[0-9]{8}', 'clinica2');
function clinica3($cedula) {
	Flight::view()->set('cedula', $cedula);
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('clinica3', [], 'clinica3');
	Flight::render('layout'); 
}
Flight::route('/clinica3/@cedula:[0-9]{7}', 'clinica3');
Flight::route('/clinica3/@cedula:[0-9]{8}', 'clinica3');
Flight::route('/Resultado', function(){
	Flight::render('headBase', [], 'headBase');
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('Resultado', [], 'Resultado');
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
	if (Session::exist(['permiso']) && POST::exist(['cedula'])) {
		Flight::view()->set('cedula', POST::get('cedula'));
		Flight::render('head', [], 'head');
		Flight::render('header', [], 'header');
		Flight::render('script', [], 'script');
		Flight::render('menuSuperior', [], 'menuSuperior');
		Flight::render('moduloEspecialista', [], 'moduloEspecialista');
		Flight::render('layout');
	}
	else 
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/\'; </script>';
});
Flight::route('/Autorizar', function(){
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('menuSuperior', [], 'menuSuperior');
	Flight::render('Autorizar', [], 'Autorizar');
	Flight::render('layout'); 
});

Flight::route('/accion/registro', function(){
	if (POST::exist(["cedula"])) {
		$persona = new Personas();
		$persona->find('cedula = ' . POST::get("cedula"));
		echo $persona->id_permiso();
		echo $persona->id_permiso() != 1;
		if ($persona->id() != '' && $persona->id_permiso() != 1 && POST::exist(["pass", "pass2", "correo", "nombres"]) && POST::get("pass") == POST::get("pass2")) {
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

Flight::route('/accion/autorizar', function(){
	if (POST::exist(["cedula", "permiso"])) {
		$persona = new Personas();
		$persona->find('cedula = ' . POST::get('cedula'));
		if ($persona->lenght() == 1) {
			echo $persona->id_permiso() . "<br>"; 
			$persona->id_permiso(POST::get('permiso'));
			echo $persona->id_permiso(); 
			$persona->save();
			echo '<script language=Javascript> location.pathname = \'' . ROOT . '/\'; </script>'; 
		}
		else
			echo '<script language=Javascript> location.pathname = \'' . ROOT . '/Autorizar\'; </script>'; 
	}
	else
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/Autorizar\'; </script>'; 
});

Flight::route('/accion/busqueda', function(){
	if (POST::exist(["cedula"])) {
		if (POST::get("es_menor") == "si") {
			$persona = new Menores();
			$relacion = new Padres();
			$padre = new Personas();
			$padre->find('cedula = ' . POST::get("cedula"));
			if ($padre->id() != '') {
				$relacion->find('id_padre = ' . $padre->id());
				if ($relacion->id() != '') {
					if ($relacion->lenght() == 1) {
						echo '<script language=Javascript> location.pathname = \'' . ROOT . '/historia/menores/' . POST::get('cedula') . '\'; </script>'; 
					}
					else {
						echo '<script language=Javascript> location.pathname = \'' . ROOT . '/historia/menores/resultado/' . POST::get('cedula') . '\'; </script>'; 
					}
				}
				else 
					echo $relacion->id();
					//echo '<script language=Javascript> location.pathname = \'' . ROOT . '/historia/agregar/menores/\'; </script>'; 
			}
			else 
				echo '<script language=Javascript> location.pathname = \'' . ROOT . '/historia/agregar/menores/\'; </script>'; 
			
		}
		if (POST::get("es_menor") == "no") {
			$persona = new Personas();
			$persona->find('cedula = ' . POST::get("cedula"));
			if ($persona->id() != '') {
				echo '<script language=Javascript> location.pathname = \'' . ROOT . '/historia/adultos/' . POST::get('cedula') . '\'; </script>'; 
			}
			else {
				echo '<script language=Javascript> location.pathname = \'' . ROOT . '/historia/agregar/adultos/\'; </script>';
			}
		}
		else 
			echo '<script language=Javascript> location.pathname = \'' . ROOT . '/\'; </script>'; 
	}
	else {
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/\'; </script>'; 
	}
});

Flight::route('/historia/agregar/adultos', function(){
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
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/historia/adultos/' . POST::get("cedula") . '\'; </script>'; 
		
	} 
	else {
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/historia/agregar/adultos/\'; </script>'; 
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
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/historia/adultos' . POST::get("cedula") . '\'; </script>'; 
	} 
	else {
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/historia/agregar/adultos\'; </script>'; 
	}
});

function historia_menor($cedula) {
	$persona = new Personas();
    if (POST::exist(["cedula"]) || isset($cedula)) {

		$persona = new Menores();
		$relacion = new Padres();
		$padre = new Personas();
		if (POST::exist(["cedula"]))
        	$padre->find('cedula = ' . POST::get('cedula'));
        else
        	$padre->find('cedula = ' . $cedula);
		if ($padre->id() != '') {
			$relacion->find('id_padre = ' . $padre->id());

			if ($relacion->lenght() == 1) {
				var_dump($relacion->id_hijo());
			}
			else if ($relacion->lenght() >= 1) {
				var_dump($relacion->id_hijo());
				echo '<script language=Javascript> location.pathname = \'' . ROOT . '/historia/buscar/menores/' . $cedula . '\'; </script>'; 			

			}
			else
				echo "string";
			}
		}
        /*
        $persona = new Menores();

        
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
	*/
}

function buscar_menor($cedula) {
	/*$persona = new Personas();
    if (POST::exist(["cedula"]) || isset($cedula)) {

		$persona = new Menores();
		$relacion = new Padres();
		$padre = new Personas();
		if (POST::exist(["cedula"]))
        	$padre->find('cedula = ' . POST::get('cedula'));
        else
        	$padre->find('cedula = ' . $cedula);
		if ($padre->id() != '') {
			$relacion->find('id_padre = ' . $padre->id());

			if ($relacion->lenght() == 1) {
				var_dump($relacion->id_hijo());
				echo "string";
			}
			else if ($relacion->lenght() >= 1) {
				var_dump($relacion->id_hijo());
				foreach ($relacion as $key => $value) {
					var_dump($k); 	
				}			

			}
			else
				echo "string";
		}
	}
	*/
	echo "string";
}


Flight::route('/historia/menores(/@cedula:[0-9]{7})', 'buscar_menor');
Flight::route('/historia/menores(/@cedula:[0-9]{8})', 'buscar_menor');
Flight::route('/historia/buscar/menores(/@cedula:[0-9]{7})', 'historia_menor');
Flight::route('/historia/buscar/menores(/@cedula:[0-9]{8})', 'historia_menor');

Flight::route('/historia/agregar/menores', function(){
	Flight::render('head', [], 'head');
	Flight::render('script', [], 'script');
	Flight::render('menores', [], 'menores');
	Flight::render('layout');
});

Flight::route('/accion/cerrar', function(){
	Session::close();
	echo '<script language=Javascript> location.pathname = \'' . ROOT . '/\'; </script>'; 
});

Flight::route('/accion/ingreso', function(){
	if (POST::exist(['cedula', 'descripcion', 'departamentos', 'fecha'])) {
		$persona = new Personas();
		$persona->find('cedula = ' . POST::get('cedula'));
		if ($persona->lenght() == 1) {
			$hospitalizacion = new Hospitalizacion();
			$ingreso = new Ingreso();
			$hospitalizacion->find('id_persona = ' . $persona->id());
			if ($hospitalizacion->lenght() == 0) {
				$hospitalizacion = new Hospitalizacion();
				$hospitalizacion->id_persona($persona->id());
				$hospitalizacion->dado_de_alta(2);
				$hospitalizacion->id_departamento(POST::get('departamentos'));
				$hospitalizacion->es_emergencia((POST::exist(['emergencia'])) ? 1 : 2);
				$hospitalizacion->es_externa((POST::exist(['externa'])) ? 1 : 2);
				$hospitalizacion->save();
				$hospitalizacion->find('id_persona = ' . $persona->id());
				$ingreso->id_hospitalizacion($hospitalizacion->id());
				$ingreso->descripcion(POST::get('descripcion'));
				$ingreso->creacion(POST::get('fecha'));
				$ingreso->save();
				echo '<script language=Javascript> window.close(); </script>'; 
			}
			else if ($hospitalizacion->lenght() >= 1) {
				$num = $hospitalizacion->lenght();
				$cont = 0;
				foreach ($hospitalizacion->array() as $value) {
					if ($value['dado_de_alta'] == 1) $cont += 1;
				}
				if ($num == $cont) {
					$hospitalizacion = new Hospitalizacion();
					$hospitalizacion->id_persona($persona->id());
					$hospitalizacion->dado_de_alta(2);
					$hospitalizacion->id_departamento(POST::get('departamentos'));
					$hospitalizacion->es_emergencia((POST::exist(['emergencia'])) ? 1 : 2);
					$hospitalizacion->es_externa((POST::exist(['externa'])) ? 1 : 2);
					$hospitalizacion->save();
					$hospitalizacion->find('id_persona = ' . $persona->id());
					$ingreso->id_hospitalizacion($hospitalizacion->id()[$hospitalizacion->lenght() - 1]);
					$ingreso->descripcion(POST::get('descripcion'));
					$ingreso->creacion(POST::get('fecha'));
					$ingreso->save();
					echo '<script language=Javascript> window.close(); </script>'; 
				}
				else 
					echo '<script language=Javascript> location.pathname = \'' . ROOT . '/ingreso/' . POST::get('cedula') . '\'; </script>'; 
			}
			else 
				echo '<script language=Javascript> location.pathname = \'' . ROOT . '/ingreso/' . POST::get('cedula') . '\'; </script>'; 
		}
		else 
			echo '<script language=Javascript> location.pathname = \'' . ROOT . '/ingreso/' . POST::get('cedula') . '\'; </script>'; 
	}
	else 
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/ingreso/' . POST::get('cedula') . '\'; </script>'; 
});

Flight::route('/accion/egreso', function(){
	if (POST::exist(['cedula', 'descripcion', 'fecha'])) {
		$persona = new Personas();
		$persona->find('cedula = ' . POST::get('cedula'));
		if ($persona->lenght() == 1) {
			$hospitalizacion = new Hospitalizacion();
			$egreso = new Egreso();
			$hospitalizacion->find('id_persona = ' . $persona->id());
			if ($hospitalizacion->lenght() == 1) {
				$hospitalizacion->dado_de_alta(1);
				$hospitalizacion->save();
				$egreso->id_hospitalizacion($hospitalizacion->id());
				$egreso->descripcion(POST::get('descripcion'));
				$egreso->creacion(POST::get('fecha'));
				$egreso->save();
				echo '<script language=Javascript> window.close(); </script>'; 
			}
			else if ($hospitalizacion->lenght() > 1) {
				$num = $hospitalizacion->lenght();
				$cont = 0;
				foreach ($hospitalizacion->array() as $value) {
					if ($value['dado_de_alta'] == 1) $cont += 1;
				}
				$cont += 1;
				if ($num == $cont) {
					$hospitalizacion->find('id = ' . $hospitalizacion->id()[$hospitalizacion->lenght() - 1]);
					$hospitalizacion->dado_de_alta(1);
					$hospitalizacion->save();
					$egreso->id_hospitalizacion($hospitalizacion->id());
					var_dump($egreso->id_hospitalizacion());
					$egreso->descripcion(POST::get('descripcion'));
					$egreso->creacion(POST::get('fecha'));
					$egreso->save();
					echo '<script language=Javascript> window.close(); </script>'; 
				}
				else 
					echo '<script language=Javascript> location.pathname = \'' . ROOT . '/egreso/' . POST::get('cedula') . '\'; </script>'; 
			}
			else 
				echo '<script language=Javascript> location.pathname = \'' . ROOT . '/egreso/' . POST::get('cedula') . '\'; </script>'; 
		}
		else 
			echo '<script language=Javascript> location.pathname = \'' . ROOT . '/egreso/' . POST::get('cedula') . '\'; </script>'; 
	}
	else 
		echo '<script language=Javascript> location.pathname = \'' . ROOT . '/egreso/' . POST::get('cedula') . '\'; </script>'; 
});

Flight::start();
