<?php

	require("inc/database.php");

	class SQL extends Database
	{

		function __construct()
		{
			parent::__construct();
		}

		function login($user, $pwd)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, password FROM account_info WHERE name=? AND password=?");
			$res->bindParam(1, $user);
			$res->bindParam(2, $pwd);
			$result=$res->execute();
			$result=$res->fetchAll();

			return $result;
		}

		function regin($user, $pwd)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("INSERT INTO account_info(id, name, password, level, exp, health, max_health, coins, strength, agility, intelligence, vitality, attacks, last_enemy_id) VALUES (NULL, ?, ?, '1', '0', '100', '100', '10', '1', '1', '1', '1', '', '0');");
			$res->bindParam(1, $user);
			$res->bindParam(2, $pwd);
			$res->execute();
		}

		function check($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, password FROM account_info WHERE name=?");
			$res->bindParam(1, $user);
			$result=$res->execute();
			$result=$res->fetchAll();

			return $result;
		}

		// profile stats
		function user_id($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, id FROM account_info WHERE name=?");
			$res->bindParam(1, $user);	
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function user_level($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, level FROM account_info WHERE name=?");
			$res->bindParam(1, $user);	
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function user_exp($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, exp FROM account_info WHERE name=?");
			$res->bindParam(1, $user);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function user_health($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, health FROM account_info WHERE name=?");
			$res->bindParam(1, $user);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function user_max_health($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, max_health FROM account_info WHERE name=?");
			$res->bindParam(1, $user);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function user_coins($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, coins FROM account_info WHERE name=?");
			$res->bindParam(1, $user);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function user_strength($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, strength FROM account_info WHERE name=?");
			$res->bindParam(1, $user);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function user_agility($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, agility FROM account_info WHERE name=?");
			$res->bindParam(1, $user);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function user_intelligence($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, intelligence FROM account_info WHERE name=?");
			$res->bindParam(1, $user);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function user_vitality($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, vitality FROM account_info WHERE name=?");
			$res->bindParam(1, $user);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function user_attacks($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, attacks FROM account_info WHERE name=?");
			$res->bindParam(1, $user);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function user_last_enemy($user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT name, last_enemy_id FROM account_info WHERE name=?");
			$res->bindParam(1, $user);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		// monster stats

		function monster_id($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);
			$res->execute();
			$result=$res->fetchColumn(0);

			return $result;
		}

		function monster_name($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id, name FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function monster_level($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id, level FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);	
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function monster_max_health($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id, max_health FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function monster_strength($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id, strength FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function monster_agility($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id, agility FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function monster_intelligence($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id, intelligence FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function monster_vitality($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id, vitality FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function monster_attacks($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id, attacks FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function monster_coins_min_reward($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id, coins_min_reward FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function monster_coins_max_reward($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id, coins_max_reward FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		function monster_exp_reward($monster)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("SELECT id, exp_reward FROM monsters WHERE id=?");
			$res->bindParam(1, $monster);
			$res->execute();
			$result=$res->fetchColumn(1);

			return $result;
		}

		// fight sessions

		function last_enemy_id_up($monster_id, $user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("UPDATE account_info SET last_enemy_id=? WHERE name=?");
			$res->bindParam(1, $monster_id);
			$res->bindParam(2, $user);
			$res->execute();
		}

		function current_health_up($health, $user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("UPDATE account_info SET health=? WHERE name=?");
			$res->bindParam(1, $health);
			$res->bindParam(2, $user);
			$res->execute();
		}

		function fight_exp_reward($exp, $user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("UPDATE account_info SET exp=? WHERE name=?");
			$res->bindParam(1, $exp);
			$res->bindParam(2, $user);
			$res->execute();
		}

		function fight_coins_reward($coins, $user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("UPDATE account_info SET coins=? WHERE name=?");
			$res->bindParam(1, $coins);
			$res->bindParam(2, $user);
			$res->execute();
		}

		// update user stats

		function level_stats_update($health, $str, $agi, $int, $vit, $user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("UPDATE account_info SET health=?, strength=?, agility=?, intelligence=?, vitality=? WHERE name=?");
			$res->bindParam(1, $health);
			$res->bindParam(2, $str);
			$res->bindParam(3, $agi);
			$res->bindParam(4, $int);
			$res->bindParam(5, $vit);
			$res->bindParam(6, $user);
			$res->execute();
		}

		function level_lvl_update($level, $exp, $user)
		{
			$con=parent::connect("accounts");
			$res=$con->prepare("UPDATE account_info SET level=?, exp=? WHERE name=?");
			$res->bindParam(1, $level);
			$res->bindParam(2, $exp);
			$res->bindParam(3, $user);
			$res->execute();
		}

	}
?>