<?php
	
	class Register
	{

		public $sql;
		public $success;

		function __construct()
		{
			$this->sql=new SQL();
		}

		function register($user, $pwd)
		{
			$result=$this->sql->check($user);
			if(!$result)
			{
				if(strlen($user)<5)
				{
					throw new Exception("Username must be at least 5 characters!", 1);
				}
				else if(strlen($user)>30)
				{
					throw new Exception("Username must be shorter than 30 characters!", 1);
				}
				else if(!ctype_alnum($user))
				{
					throw new Exception("Username must be only letters and numbers!", 1);
				}
				else
				{
					if(strlen($pwd)<6)
					{
						throw new Exception("Password must be atleast 6 characters long!", 1);
					}
					else if(strlen($pwd)>30)
					{
						throw new Exception("Password must be shorter than 30 characters!", 1);
					}
					else if(!ctype_alnum($pwd))
					{
						throw new Exception("Password must be only letters and numbers!", 1);
					}
					else
					{
						$pwd=hash("SHA1", $pwd);
						$this->sql->regin($user, $pwd);
						$this->success="Registration successful";
					}
				}
				
			}
			else
			{
				throw new Exception("Name already exists!", 1);
				
			}
		}

	}

?>