<?php

	require("inc/SQL.php");

	class Login
	{

		public $sql;

		function __construct()
		{
			$this->sql=new SQL();
		}

		function login($user, $pwd)
		{
			$pwd=hash("SHA1", $pwd);
			$result=$this->sql->login($user, $pwd);
			$user_id=$this->sql->user_id($user);
			if($result)
			{
				$_SESSION["logged"]=true;
				$_SESSION["user"]=$user;
				header("location: logged.php");
			}
			else
			{
				throw new Exception("Login error!", 1);
				
			}
		}

		
	}
?>