<?php
	
	session_start();

	require("inc/SQL.php");

	if(isset($_SESSION["rewarded"]))
	{

		$sql=new SQL();

		$player=$_SESSION["user"];

		$player_health=$sql->user_health($player);

		$player_coins=$sql->user_coins($player);

		$player_exp=$sql->user_exp($player);

		$player_str=$sql->user_strength($player);
		$player_agi=$sql->user_agility($player);
		$player_int=$sql->user_intelligence($player);
		$player_vit=$sql->user_vitality($player);

		$player_last_enemy=$sql->user_last_enemy($player);

		// monster reward

		$monster_id=$sql->monster_id($player_last_enemy);
		$monster_coins_min_reward=$sql->monster_coins_min_reward($monster_id);
		$monster_coins_max_reward=$sql->monster_coins_max_reward($monster_id);
		$monster_exp_reward=$sql->monster_exp_reward($monster_id);

		$monster_coins_reward=rand($monster_coins_min_reward, $monster_coins_max_reward);

		// overall reward

		$monster_overall_exp=$monster_exp_reward+$player_exp;
		$monster_overall_coins=$monster_coins_reward+$player_coins;

		if(isset($_POST["leave"]))
		{
			$sql->fight_exp_reward($monster_overall_exp, $player);
			$sql->fight_coins_reward($monster_overall_coins, $player);

			unset($_SESSION["rewarded"]);

			header("location: logged.php");
		}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<title>Victory!</title>
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
<body class="bg-dark text-light bg_gif_3">
<form method="post">
	<div class="container-fluid v">
		<div class="m-auto">
			<div class="row d-flex justify-content-center text-dark">
				<label class="h3">
					You found loot!
				</label>
			</div>
			<div class="row d-flex justify-content-center">
				<table class="table table-sm table-dark table-bordered text-center">
					<thead>
						<tr class="d-flex justify-content-center">
							<th class="col-sm" scope="col">
								<label>
									Coins
								</label>
							</th>
							<th class="col-sm" scope="col">
								<label>
									Experience
								</label>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr class="d-flex justify-content-center">
							<td class="col-sm" scope="row">
								<label>
									<?php echo $monster_coins_reward." coins"; ?>
								</label>
							</td>
							<td class="col-sm" scope="row">
								<label>
									<?php echo $monster_exp_reward." xp"; ?>
								</label>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row d-flex justify-content-center">
				<button type="submit" name="leave" class="btn btn-success font-weight-bold">
					Return
				</button>
			</div>
		</div>
	</div>
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