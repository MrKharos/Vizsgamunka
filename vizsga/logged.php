<?php

	session_start();
	
	require("inc/SQL.php");

	if(isset($_SESSION["logged"]))
	{
		$sql=new SQL();

		// level up values
		$user=$_SESSION["user"];

		$user_stat_health=$sql->user_health($user);
		$user_stat_max_health=$sql->user_max_health($user);

		unset($_SESSION["rewarded"]);

		if(isset($_POST["exit"]))
		{
			session_destroy();
			header("location: index.php");
		}

		if(isset($_POST["adventure"]))
		{
			header("location: adventure.php");
		}

		if(isset($_POST["level_done"]))
		{
			$user_str_up=$_POST["user_str_check"];
			$user_agi_up=$_POST["user_agi_check"];
			$user_int_up=$_POST["user_int_check"];
			$user_vit_up=$_POST["user_vit_check"];

			$user_lvl_check=$_POST["user_lvl_check"];
			$user_exp_up=$_POST["exp_check"];
			// lvlup+1
			$lvlup=$user_lvl_check+1;

			// 1-5
			$lvl_one=$user_exp_up-100;
			$lvl_two=$user_exp_up-250;
			$lvl_three=$user_exp_up-500;
			$lvl_four=$user_exp_up-750;
			$lvl_five=$user_exp_up-1000;
			// 6-10
			$lvl_six=$user_exp_up-1500;
			$lvl_seven=$user_exp_up-2000;
			$lvl_eight=$user_exp_up-2500;
			$lvl_nine=$user_exp_up-3500;
			$lvl_ten=$user_exp_up-5000;
			// 11-15
			$lvl_eleven=$user_exp_up-6500;
			$lvl_twelve=$user_exp_up-8000;
			$lvl_thirteen=$user_exp_up-9500;
			$lvl_fourteen=$user_exp_up-12000;
			$lvl_fifteen=$user_exp_up-15000;
			// 16-20
			$lvl_sixteen=$user_exp_up-18000;
			$lvl_seventeen=$user_exp_up-22000;
			$lvl_eighteen=$user_exp_up-26000;
			$lvl_nineteen=$user_exp_up-30000;
			$lvl_twenty=$user_exp_up-35000;

			// level update if lvl equals

			// 1-5
			if($user_lvl_check==1)
			{
				$sql->level_lvl_update($lvlup, $lvl_one, $user);
			}
			else if($user_lvl_check==2)
			{
				$sql->level_lvl_update($lvlup, $lvl_two, $user);
			}
			else if($user_lvl_check==3)
			{
				$sql->level_lvl_update($lvlup, $lvl_three, $user);
			}
			else if($user_lvl_check==4)
			{
				$sql->level_lvl_update($lvlup, $lvl_four, $user);
			}
			else if($user_lvl_check==5)
			{
				$sql->level_lvl_update($lvlup, $lvl_five, $user);
			}
			// 6-10
			else if($user_lvl_check==6)
			{
				$sql->level_lvl_update($lvlup, $lvl_six, $user);
			}
			else if($user_lvl_check==7)
			{
				$sql->level_lvl_update($lvlup, $lvl_seven, $user);
			}
			else if($user_lvl_check==8)
			{
				$sql->level_lvl_update($lvlup, $lvl_eight, $user);
			}
			else if($user_lvl_check==9)
			{
				$sql->level_lvl_update($lvlup, $lvl_nine, $user);
			}
			else if($user_lvl_check==10)
			{
				$sql->level_lvl_update($lvlup, $lvl_ten, $user);
			}
			// 11-15
			else if($user_lvl_check==11)
			{
				$sql->level_lvl_update($lvlup, $lvl_eleven, $user);
			}
			else if($user_lvl_check==12)
			{
				$sql->level_lvl_update($lvlup, $lvl_twelve, $user);
			}
			else if($user_lvl_check==13)
			{
				$sql->level_lvl_update($lvlup, $lvl_thirteen, $user);
			}
			else if($user_lvl_check==14)
			{
				$sql->level_lvl_update($lvlup, $lvl_fourteen, $user);
			}
			else if($user_lvl_check==15)
			{
				$sql->level_lvl_update($lvlup, $lvl_fifteen, $user);
			}
			// 16-20
			else if($user_lvl_check==16)
			{
				$sql->level_lvl_update($lvlup, $lvl_sixteen, $user);
			}
			else if($user_lvl_check==17)
			{
				$sql->level_lvl_update($lvlup, $lvl_seventeen, $user);
			}
			else if($user_lvl_check==18)
			{
				$sql->level_lvl_update($lvlup, $lvl_eighteen, $user);
			}
			else if($user_lvl_check==19)
			{
				$sql->level_lvl_update($lvlup, $lvl_nineteen, $user);
			}

			$sql->level_stats_update($user_stat_max_health, $user_str_up, $user_agi_up, $user_int_up, $user_vit_up, $user);
		}
	
?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<title>Welcome!</title>
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
<body class="bg-dark text-light bg_gif_2">
<form method="post" class="navbar-form">
	<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
		<label class="navbar-brand">
			Welcome
			<?php
				echo $user;
			?>
			!
		</label>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<button type="button" class="btn btn-dark  text-light ml-1 mb-1" id="home_page_toggler">
						Home
					</button>
				</li>
				<li class="nav-item active">
					<div class="input-group-btn">
						<button type="submit" class="btn btn-dark  text-light ml-1 mb-1" name="adventure">
							Adventure
						</button>
					</div>
				</li>
				<li class="nav-item active">
					<button type="button" class="btn btn-dark  text-light ml-1 mb-1" id="profile_page_toggler">
						Profile
					</button>
				</li>
				<li class="nav-item active">
					<button type="button" class="btn btn-dark  text-light ml-1 mb-1" id="contact_page_toggler">
						Contact
					</button>
				</li>
				<li class="nav-item active">
					<div class="input-group-btn">
						<button type="submit" name="exit" class="btn btn-danger font-weight-bold ml-1">
							Exit
						</button>
					</div>
				</li>
			</ul>
		</div>
		<label class="navbar-brand">
			<h4>
		        <div id="timer"><?php echo date("H:i:s"); ?></div>
		    </h4>
		    
		</label>
	</nav>
<script>
    setInterval(function() {
        var ido = new Date ( );    
        var ora = ido.getHours ( );   
        var perc = ido.getMinutes ( );   
        var masodp = ido.getSeconds ( );
        perc = ( perc < 10 ? "0" : "" ) + perc;   
        masodp = ( masodp < 10 ? "0" : "" ) + masodp;  
        ora = ( ora > 24 ) ? ora - 24 : ora;
        ora = ( ora == 0 ) ? 24 : ora;
        ora = ( ora <10 ? "0" : "" ) + ora;
        var forma = ora + ":" + perc + ":" + masodp;
        document.getElementById("timer").innerHTML = forma;
    }, 1000);
</script>
<div id="profile_page">

	<?php
	
	// user stats

	$user_stat_level=$sql->user_level($user);
	$user_stat_exp=$sql->user_exp($user);

	$user_stat_coins=$sql->user_coins($user);

	$user_stat_strength=$sql->user_strength($user);
	$user_stat_agility=$sql->user_agility($user);
	$user_stat_intelligence=$sql->user_intelligence($user);
	$user_stat_vitality=$sql->user_vitality($user);

	$user_stat_attacks=$sql->user_attacks($user);

	echo "<table class='table table-sm table-dark table-bordered text-center'>
			<thead>
				<tr class='d-flex justify-content-center'>
					<th scope='col' class='col-sm-3'>
						Attributes
					</th>
					<th scope='col' class='col-sm-3'>
						Values
					</th>
				</tr>
			</thead>
			<tbody>
				<tr class='d-flex justify-content-center'>
					<th scope='row' class='col-sm-3'>
						Level:
					</th>
					<td class='col-sm-3'>
						$user_stat_level
					</td>
				</tr>
				<tr class='d-flex justify-content-center'>
					<th scope='row' class='col-sm-3'>
						Experience:
					</th>
					<td class='col-sm-3'>
						$user_stat_exp
					</td>
				</tr>
				<tr class='d-flex justify-content-center'>
					<th scope='row' class='col-sm-3'>
						Current health:
					</th>
					<td class='col-sm-3'>
						$user_stat_health
					</td>
				</tr>
				<tr class='d-flex justify-content-center'>
					<th scope='row' class='col-sm-3'>
						Maximum health:
					</th>
					<td class='col-sm-3'>
						$user_stat_max_health
					</td>
				</tr>
				<tr class='d-flex justify-content-center'>
					<th scope='row' class='col-sm-3'>
						Coins:
					</th>
					<td class='col-sm-3'>
						$user_stat_coins
					</td>
				</tr>
				<tr class='d-flex justify-content-center'>
					<th scope='row' class='col-sm-3'>
						Strength:
					</th>
					<td class='col-sm-3'>
						$user_stat_strength
					</td>
				</tr>
				<tr class='d-flex justify-content-center'>
					<th scope='row' class='col-sm-3'>
						Agility:
					</th>
					<td class='col-sm-3'>
						$user_stat_agility
					</td>
				</tr>
				<tr class='d-flex justify-content-center'>
					<th scope='row' class='col-sm-3'>
						Intelligence:
					</th>
					<td class='col-sm-3'>
						$user_stat_intelligence
					</td>
				</tr>
				<tr class='d-flex justify-content-center'>
					<th scope='row' class='col-sm-3'>
						Vitality:
					</th>
					<td class='col-sm-3'>
						$user_stat_vitality
					</td>
				</tr>
			</tbody>
		</table>";
	?>
	<div class="d-flex justify-content-center">
		<button type="button" id="leveled" class="btn btn-info mt-3 invisible" data-toggle="modal" data-target="#bmodal">LEVEL-UP</button>
	</div>
</div>
<div id="contact_page">
	<table class="table table-sm table-dark table-bordered text-center">
		<tbody>
			<tr class='d-flex justify-content-center'>
				<th scope='row' class='col-sm-3' colspan='2'>
					E-mail:
				</th>
				<td class='col-sm-3'>
					<a href="mailto:bloodlust_09@freemail.hu"hr>bloodlust_09@freemail.hu</a>
				</td>
			</tr>
			<tr class='d-flex justify-content-center'>
				<th scope='row' class='col-sm-3' colspan='2'>
					Phone:
				</th>
				<td class='col-sm-3'>
					06/30-XX-XX-XXX
				</td>
			</tr>
			<tr class='d-flex justify-content-center'>
				<th scope='row' class='col-sm-3' colspan='2'>
					Facebook:
				</th>
				<td class='col-sm-3'>
					<a href="http://facebook.com/kharos1" target="_blank">http://facebook.com/kharos1</a>
				</td>
			</tr>
	</table>
</div>
<div id="home_page">
	<div class="container-fluid p-5">
		<div class="m-auto">
			<div class="row d-flex justify-content-center">
				<div class="text-warning bg-dark rounded p-3" id="welcome_board">
					<label class="h1 font-weight-bold">Welcome to Z-eggs!</label>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="level_page">
	<div class="modal fade" id="bmodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-light bg-dark">
					<h3 class="modal-title">
						<label>Next level: LVL <?php echo $user_stat_level+1; ?></label>
					</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body text-light bg-dark">
					<div class="row d-flex justify-content-center">
						<div class="level_up">
								<table class="table table-sm-12 text-center">
								<tr class="d-flex"><th class="col-sm-6" scope="col"><label>Points:</label></th>
									<th class="col-sm-6" scope="col">
										<label id="s_points">5</label></br>
								</th></tr><tr class="d-flex"><td class="col-sm-4" scope="row">
									<label>Strength:</label>
								</td><td class='col-sm-4'><label id="user_str">
										<?php echo $user_stat_strength; ?>
									</label></td><td class='col-sm-4'>
									<button type="button" id="str_plus" class="btn btn-dark"> + </button></br>
								</td></tr><tr class="d-flex"><td class="col-sm-4" scope="row">
									<label>Agility:</label>
								</td><td class='col-sm-4'><label id="user_agi">
										<?php echo $user_stat_agility; ?>
									</label></td><td class='col-sm-4'>
									<button type="button" id="agi_plus" class="btn btn-dark"> + </button></br>
								</td></tr><tr class="d-flex"><td class="col-sm-4" scope="row">
									<label>Intelligence:</label>
								</td><td class='col-sm-4'><label id="user_int">
										<?php echo $user_stat_intelligence; ?>
									</label></td><td class='col-sm-4'>
									<button type="button" id="int_plus" class="btn btn-dark"> + </button></br>
								</td></tr><tr class="d-flex"><td class="col-sm-4" scope="row">
									<label>Vitality:</label>
								</td><td class='col-sm-4'><label id="user_vit">
										<?php echo $user_stat_vitality; ?>
									</label></td><td class='col-sm-4'>
									<button type="button" id="vit_plus" class="btn btn-dark"> + </button></br>
								</td></tr><tr class="d-flex"><td class="col-sm-6" scope="row">
									<button type="reset" id="stat_reset" class="btn btn-primary">Reset</button>
								</td><td class="col-sm-6">
									<button type="submit" name="level_done" class="btn btn-success font-weight-bold">
										DING!
									</button>
								</td></tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="text" name="exp_check" value="<?php echo $user_stat_exp; ?>" class="invisible">
<input type="text" name="level_check" value="<?php echo $user_stat_level; ?>" class="invisible">
<input type="text" name="user_str_check" value="<?php echo $user_stat_strength; ?>" class="invisible">
<input type="text" name="user_agi_check" value="<?php echo $user_stat_agility; ?>" class="invisible">
<input type="text" name="user_int_check" value="<?php echo $user_stat_intelligence; ?>" class="invisible">
<input type="text" name="user_vit_check" value="<?php echo $user_stat_vitality; ?>" class="invisible">
<input type="text" name="user_lvl_check" value="<?php echo $user_stat_level; ?>" class="invisible">
</form>
</body>
</html>
<?php
	
	}
	else
	{
		header("location: index.php");
	}

?>