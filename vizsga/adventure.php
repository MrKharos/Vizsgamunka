<?php
	
	session_start();

	require("inc/SQL.php");

	if(isset($_SESSION["logged"]))
	{

		$sql=new SQL();

		$user=$_SESSION["user"];
		$monster_stat_id=$sql->monster_id(rand(1,2));

		unset($_SESSION["rewarded"]);

		if(isset($_POST["leave"]))
		{
			$sql->current_health_up($_POST["player_health"], $user);
			header("location: logged.php");
		}

		if(isset($_POST["reward"]))
		{
			$sql->last_enemy_id_up($monster_stat_id, $user);
			$sql->current_health_up($_POST["player_health"], $user);
			$_SESSION["rewarded"]=true;
			header("location: reward.php");
		}


?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<title>Prepare yourself!</title>
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
<?php

	

	// user stats
	$user_stat_level=$sql->user_level($user);
	$user_stat_exp=$sql->user_exp($user);

	$user_stat_health=$sql->user_health($user);
	$user_stat_max_health=$sql->user_max_health($user);

	$user_stat_coins=$sql->user_coins($user);

	$user_stat_strength=$sql->user_strength($user);
	$user_stat_agility=$sql->user_agility($user);
	$user_stat_intelligence=$sql->user_intelligence($user);
	$user_stat_vitality=$sql->user_vitality($user);
	
	$user_stat_attacks=$sql->user_attacks($user);
	
	// monster stats
	
	$monster_stat_name=$sql->monster_name($monster_stat_id);

	$monster_stat_level=$sql->monster_level($monster_stat_id);

	$monster_stat_max_health=$sql->monster_max_health($monster_stat_id);
	$monster_stat_strength=$sql->monster_strength($monster_stat_id);

	$monster_stat_agility=$sql->monster_agility($monster_stat_id);
	$monster_stat_intelligence=$sql->monster_intelligence($monster_stat_id);
	$monster_stat_vitality=$sql->monster_vitality($monster_stat_id);

	$monster_stat_attacks=$sql->monster_attacks($monster_stat_id);
	
?>
<body class="bg-dark text-light bg_gif_4">
<form method="post">
<div class="container-fluid v">
	<div class="m-auto">
		<div class="row d-flex justify-content-center">
			<label class="h3">
			<?php
				echo $user." encounters with ".$monster_stat_name;
			?>
			</label>
		</div>
		<div class="row d-flex justify-content-center">
			<table class="table table-sm table-dark table-bordered text-center">
				<thead>
					<tr class="d-flex justify-content-center">
						<th scope="col" class="col-sm">
							<label>
								Stats
							</label>
						</th>
						<th scope="col" class="col-sm">
							<label>
								<?php echo $user; ?>
							</label>
						</th>
						<th scope="col" class="col-sm">
							<label>
								<?php echo $monster_stat_name; ?>
							</label>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr class="d-flex justify-content-center">
						<td class="col-sm" scope="row">
							<label>
								Level:
							</label>
						</td>
						<td class="col-sm" scope="row">
							<label>
								<?php echo $user_stat_level; ?>		
							</label>
						</td>
						<td class="col-sm" scope="row">
							<label>
								<?php echo $monster_stat_level; ?>
							</label>
						</td>
					</tr>
					<tr class="d-flex justify-content-center">
						<td class="col-sm" scope="row">
							<label>
								Strength:
							</label>
						</td>
						<td class="col-sm" scope="row">
							<label id="player_str">
								<?php echo $user_stat_strength; ?>
							</label>
						</td>
						<td class="col-sm" scope="row">
							<label id="enemy_str">
								<?php echo $monster_stat_strength; ?>
							</label>
						</td>
					</tr>
					<tr class="d-flex justify-content-center">
						<td class="col-sm" scope="row">
							<label>
								Agility:
							</label>
						</td>
						<td class="col-sm" scope="row">
							<label>
								<?php echo $user_stat_agility; ?>
							</label>
						</td>
						<td class="col-sm" scope="row">
							<label>
								<?php echo $monster_stat_agility; ?>
							</label>
						</td>
					</tr>
					<tr class="d-flex justify-content-center">
						<td class="col-sm" scope="row">
							<label>
								Intelligence:
							</label>
						</td>
						<td class="col-sm" scope="row">
							<label>
								<?php echo $user_stat_intelligence; ?>
							</label>
						</td>
						<td class="col-sm" scope="row">
							<label>
								<?php echo $monster_stat_intelligence; ?>
							</label>
						</td>
					</tr>
					<tr class="d-flex justify-content-center">
						<td class="col-sm" scope="row">
							<label>
								Vitality:
							</label>
						</td>
						<td class="col-sm" scope="row">
							<label>
								<?php echo $user_stat_vitality; ?>
							</label>
						</td>
						<td class="col-sm" scope="row">
							<label>
								<?php echo $monster_stat_vitality; ?>
							</label>
						</td>
					</tr>
					<tr class="d-flex justify-content-center">
						<td class="col-sm" scope="row">
							<label>
								Health:
							</label>
						</td>
						<td class="col-sm" scope="row">
							<li class="list-unstyled" id="user_health">
								<label class="form-control-label">
									<?php echo $user_stat_health; ?>
								</label>
							</li>
						</td>
						<td class="col-sm" scope="row">
							<label id="monster_health">
								<?php echo $monster_stat_max_health; ?>
							</label>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="row d-flex justify-content-center">
			<button type="button" class="btn btn-secondary text-light mr-1" id="fight">
				Fight
			</button>
			<button type="submit" name="leave" class="btn btn-danger ml-1" id="leave_btn">
				Leave
			</button>
		</div>
	</div>
</div>
<input type="hidden" name="player_health" value="<?php echo $user_stat_health; ?>">
</form>
</body>
</html>
<?php
	
	}
	else
	{
		header("location: logged.php");
	}

?>