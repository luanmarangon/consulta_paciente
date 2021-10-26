<?php

// session_start();

class Conexao{
	
	private $con;
	
	public function __construct(){
		$this->con = new PDO("mysql:host=localhost; dbname=consulta", "root", "");		
	}

	public function getCon(){
		return $this->con;
	}
	

}

?>