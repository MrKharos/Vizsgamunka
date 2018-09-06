<?php

	class Database
	{
		public $user;
		public $pass;
		public $host;

		function __construct()
		{
			$this->user="root";
			$this->pass="";
			$this->host="localhost";
		}

		function connect($dbname)
		{
			
			$con=new PDO("mysql:host=$this->host;dbname=$dbname", $this->user, $this->pass);
			$con->exec("SET NAMES 'utf8'");
			
			return $con;
		}

	}
?>