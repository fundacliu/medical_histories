<?php
namespace Choco;
use \PDO;

class ActiveRecord {
	function __construct() {
		if (isset($this->pass)) {
			try {
				$this->conn = new PDO($this->driver . ':host=' . $this->host . ';dbname=' . $this->db . ';charset=utf8mb4', $this->user, $this->pass);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch (PDOException $e) {
				print "¡Error!: " . $e->getMessage() . "<br/>";
				die();
			}
		}
		else {
			try {
				$this->conn = new PDO($this->driver . ':host=' . $this->host . ';dbname=' . $this->db . ';charset=utf8mb4', $this->user, '');
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				print "¡Error!: " . $e->getMessage() . "<br/>";
				die();
			}
		}
	}
	protected function query($query) {
		try {
			foreach($this->conn->query($query) as $fila) {
				print_r($fila);
			}
		} catch (PDOException $e) {
			print "¡Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	public function save() {
		$this->query('select * from medical_histories;');

	}
	public function delete() {
		
	}
	public function find() {
		
	}
	public function findBy() {
		
	}
	private $conn = null;
}