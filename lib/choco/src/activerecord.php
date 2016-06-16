<?php
namespace Choco;
use \PDO;

interface ActiveRecord {
	public function save();
	public function delete();
	public function find();
	public function select();
}