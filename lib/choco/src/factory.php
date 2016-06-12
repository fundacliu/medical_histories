<?php
namespace Choco;
use \PDO;

class Factory {
	public static function model($file) {
		$var = "\tprotected ";
		$num_values = 0;
		$functions = '';
		$map = '$map = [';
		$model = Yaml::read($file);
		$start = '';
		$function = '';
		foreach($model as $db=>$entities) {
			$var = $var . '$db = \'' . $db . '\', ';
			foreach($entities as $name_entities=>$values) {
				echo 'entitie ' . $name_entities . ' has been created from ' . $db . "\n";
				$var = $var . '$name = \'' . $name_entities . '\', ';
				$start = Self::php_start() . ucwords($name_entities) . ' extends ' . $db  . " {\n";
				foreach ($values as $name_value => $property) {
					$num_values = $num_values + 1;
					$var = $var . '$' . $name_value . " = null, ";
					$map = $map . '\'' . $name_value . '\', ';
					$value='';
					$function = $function . "\n function set" . ucwords($name_value) . " {\n";
					$function = $function . "\t ";
					/*foreach($property as $name_property=>$value_final) {

						// - $value = $value . '\'' . $name_property . '\' => \'' . $value_final . '\', ';
						//$map = $map . '\'' . $name_property . '\' => \'' . $value_final . '\', ';
					}*/
				}
				$value = trim($value, ', ');
				//$map = $map . $value . '], ';
			}
		}
		$var = $var . $map;
		$var = trim($var, ', ');
		$var = $var . '], $num_entities = ' . $num_values . ';';
		// file_exists()
		chdir(__DIR__ . '/../../../');
		if (is_dir('app/models'))
			chdir('app/models');
		else
			mkdir('app/models');

		if (file_exists($name_entities . '.php'))
			unlink($name_entities . '.php');
		$file_read = fopen($name_entities . '.php', 'c');
		fwrite($file_read, $start . $var . "\n}");
		
		array_push(Self::$models, 'app/models/' . $name_entities . '.php');
	}
	public static function database($db) {
		chdir(__DIR__ . '/../../../');
		$db = Yaml::read($db);
		foreach ($db as $name_database => $property) {
			echo 'database ' . $name_database . ' has been created' . "\n";
			$file = Self::php_start() . ucwords($name_database) . " extends \Choco\ActiveRecord {\n";
			if (isset($property['driver']) && isset($property['host']) && isset($property['user'])) {
				$file = $file . "\tprotected ";
				foreach ($property as $key => $value) {
					$file = $file . '$' . $key . ' = \'' . $value .'\', ' ;
				}
			}
			else
				continue;
			$file = trim($file, ', ');
			$file = $file . ";\n}";

			chdir(__DIR__ . '/../../../');
			if (is_dir('app/models/db'))
				chdir('app/models/db');
			else
				mkdir('app/models/db');

			if (file_exists($name_database . '.php'))
				unlink($name_database . '.php');
			$file_read = fopen($name_database . '.php', 'c');
			fwrite($file_read, $file);
			array_push(Self::$models, 'app/models/db/' . $name_database . '.php');
		}
	}
	public static function autoloader() {
		$file = "<?php\n";
		foreach (Self::$models as $key => $value) {
			$file = $file . 'require_once \'' . $value . '\'' . ";\n";
		}
		chdir(__DIR__ . '/../../../');
		if (is_dir('config/'))
			chdir('config/');
		else
			mkdir('config/');

		if (file_exists('autoloader.php'))
			unlink('autoloader.php');
		$file_read = fopen('autoloader.php', 'c');
		fwrite($file_read, $file);
	}
	public static function sql($config) {

		// database
		$path = $config . '/database/'; 
		$filenames = scandir($path);
		$num = count($filenames);
		$db = '';
		$driver = '';
		$host = '';
		$user = '';
		$pass = '';
		$name_database = '';
		for ($i = 2; $i < $num; $i++) { 
			$db = Yaml::read($path . $filenames[$i]);
			foreach ($db as $name_database => $property) {
				$$name_database = $name_database;
				if (isset($property['driver']) && isset($property['host']) && isset($property['user'])) {
					foreach ($property as $key => $value) {
						$$key = $value;
					}
				}
			}
			try {
				$db = new PDO($driver . ':host=' . $host . ';dbname=' . $name_database . ';', $user, $pass);
				echo 'Connected to database';
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
			
			
		}

		// entities
		$path = $config . '/entities/'; 
		$filenames = scandir($path);
		$num = count($filenames);
		$sql = '';
		$delete = '';
		for ($i = 2; $i < $num; $i++) { 
			$entities = Yaml::read($path . $filenames[$i]);
			foreach ($entities as $name_database => $property) {
				foreach ($property as $name_entities => $value) {
					
					$sql = $sql . 'CREATE TABLE ' . $name_database . '.' . $name_entities . ' (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, ';
					$delete = $delete . 'DROP TABLE IF EXISTS '. $name_database . '.' . $name_entities . ';';
					foreach ($value as $k => $v) {
						$sql = $sql . $k . ' ';
						if ($v['type'] == 'varchar')
							$sql = $sql . $v['type'] . '(' . $v['size'] . ') ';
						else
							$sql = $sql . $v['type'] . ' ';
						if (isset($v['required']) && $v['required'] == true) 
							$sql = $sql . 'NOT NULL , ';
						else
							$sql = $sql . ' , ';
					}
					$sql = trim($sql, ', ');
					$sql = $sql . ");\n";
					var_dump($delete . $sql);
					try {
						$db->query($delete . $sql);
						echo $name_database . '.' . $name_entities . ' has been created' . "\n";
					} catch(PDOException $e) {
						echo $e->getMessage();
					}
					$sql = '';
					$delete = '';
				}
			}
		}


/*
		$sql = '';
		$delete = '';
		foreach($model as $database=>$entities) {
			foreach($entities as $name_entities=>$values) {
				$sql = $sql . 'CREATE TABLE ' . $name_entities . ' (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, ';
				$delete = $sql . 'DROP TABLE IF EXISTS ' . $name_entities . ';';
				foreach ($values as $name_value => $property) {
					var_dump($property);
					$sql = $sql . $name_value;
					//foreach($property as $name_property=>$value_final) {

						// - $value = $value . '\'' . $name_property . '\' => \'' . $value_final . '\', ';
						//$map = $map . '\'' . $name_property . '\' => \'' . $value_final . '\', ';
					//}
				}
				//$value = trim($value, ', ');
				//$map = $map . $value . '], ';
			}
		}
/*
		CREATE TABLE hotel (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    activo TINYINT(1) DEFAULT '1' NOT NULL,
    url VARCHAR(255),
    UNIQUE INDEX url_idx (url)) DEFAULT CHARACTER SET utf8
    COLLATE utf8_general_ci ENGINE = InnoDB;*/
/*
		CREATE TABLE IF NOT EXIST `CMDNNA`.`a` ( `id` INT NOT NULL AUTO_INCREMENT , `a` INT NOT NULL , `b` DATE NOT NULL , `c` VARCHAR(12) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
		*/
	}
	private static function php_start() {
		return 
'<?php 
/* generated by Choco ORM
 * docs:
 * Author: Jeferson De Freitas
 * licence:
 */

class ';
	}
	private static $models = [];
}
