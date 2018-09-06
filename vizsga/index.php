<?php

	session_start();

	require("inc/login.php");
	require("inc/register.php");

	$user="";
	$error="";
	$success="";

	if(isset($_POST["login"]))
	{
		$login=new Login();
		$user=trim($_POST["user"]);
		$pwd=trim($_POST["pwd"]);
		try
		{
			$login->login($user, $pwd);
		}
		catch (Exception $e)
		{
			$error=$e->getMessage();
		}
	}

	if(isset($_POST["register"]))
	{
		$register=new Register();
		$user_reg=trim($_POST["name_reg"]);
		$pwd_reg=trim($_POST["pwd_reg"]);
		try
		{
			$register->register($user_reg, $pwd_reg);
			$success=$register->success;
		}
		catch (Exception $e)
		{
			$error=$e->getMessage();
		}
	}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<title>Index</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="icon" type="image/png" href="favicon-chrome.png" sizes="192x192">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon-apple.png">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body class="text-light bg_gif_1">
<div class="container-fluid v">
	<div class="m-auto">
		<div class="row d-flex justify-content-center">
			<div class="h3 font-weight-bold text-dark col-sm-12">
				<label>Welcome dear adventurer!</label>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<form method="post" class="form-group bg-dark p-5 rounded text-light text-center font-weight-bold">
				<h5 class="text-center text-danger font-weight-bold" name="error">
					<?php 
						if($error)
						{
							echo $error;
						}
					?>
				</h5>
				<h5 class="text-center text-success font-weight-bold">
					<?php
						if($success)
						{
							echo $success;
						}
					?>
				</h5>
				<label>Name:</label>
				<input type="text" name="user" value="<?php echo $user; ?>" class="form-control">
				<label>Password:</label>
				<input type="password" name="pwd" class="form-control mb-3">
				<input type="submit" name="login" value="Login" class="btn btn-success font-weight-bold">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#bmodal">Register</button>
				<div class="modal fade" id="bmodal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title text-dark"><label>Registration</label></h3>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group text-dark">
									<h5 class="text-center text-danger font-weight-bold" name="errorka"></h5>
									<label>Name</label>
									<input type="text" name="name_reg" class="form-control">
									<label>Password</label>
									<input type="password" name="pwd_reg" class="form-control">
								</div>
								<br/>
								<input type="submit" value="Register" name="register" class="btn btn-success btn-block font-weight-bold">
								<input type="reset" class="btn btn-danger btn-block font-weight-bold" value="Reset">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<?php
	
	


	/*
	//		level-up-stuff	
	echo "<div id='level_up'><label id='s_points'>5</label>"."<br/>";

	echo "Strength: <label id='user_str'>$player_str</label>".
	"<button class='btn btn-dark' id='str_plus'> + </button>";

	echo "Agility: <label id='user_agi'>$player_agi</label>".
	"<button id='agi_plus' class='btn btn-dark'> + </button>";

	echo "Intelligence: <label id='user_int'>$player_int</label>".
	"<button id='int_plus' class='btn btn-dark'> + </button>";

	echo "Vitality: <label id='user_vit'>$player_vit</label>".
	"<button id='vit_plus' class='btn btn-dark'> + </button>";

	echo "<button id='stat_reset' class='btn btn-primary'>Reset</button></div>";
	*/

?>