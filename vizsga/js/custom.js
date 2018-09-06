$(function()
{

	var e=$("form");
	var profile=$("#profile_page_toggler");
	var contact=$("#contact_page_toggler");
	var home=$("#home_page_toggler");
	var fight=$("#fight");
	var leave_btn=$("#leave_btn");

	$("input[name$='login']").on("click", function(e)
	{
		empty_log(e);
	});

	$("input[name$='register']").on("click", function(e)
	{
		empty_reg(e);
	});

	stats_update();
	
	$(document).ready(function(e)
	{
		page_load(e);
		home_loader(e);
	});

	profile.on("click", function(e)
	{
		profile_loader(e);
	});

	contact.on("click", function(e)
	{
		contact_loader(e);
	});

	home.on("click", function(e)
	{
		home_loader(e);
	});

	// combat

	fight.on("click", function(e)
	{
		combat(e);
	});

	leave_btn.on("click", function(e)
	{
		reward_glitch(e);
	});

});

// validate inputs

function empty_log(e)
{
	if(!$("input:eq(0)").val())
	{
		$("input:eq(0)").css("border", "2px solid red");
		$("h5:eq(0)").text("Empty fields!");
		e.preventDefault();
	}
	if(!$("input:eq(1)").val())
	{
		$("input:eq(1)").css("border", "2px solid red");
		$("h5:eq(0)").text("Empty fields!");
		e.preventDefault();
	}
	if($("input:eq(0)").val())
	{
		$("input:eq(0)").css("border", "");
	}
	if($("input:eq(1)").val())
	{
		$("input:eq(1)").css("border", "");
	}
}

function empty_reg(e)
{
	if(!$("input[name$='name_reg']").val())
	{
		$("input[name$='name_reg']").css("border", "2px solid red");
		$("h5[name$='errorka']").text("Empty fields!");
		e.preventDefault();
	}
	if(!$("input[name$='pwd_reg']").val())
	{
		$("input[name$='pwd_reg']").css("border", "2px solid red");
		$("h5[name$='errorka']").text("Empty fields!");
		e.preventDefault();
	}
	if($("input[name$='name_reg']").val())
	{
		$("input[name$='name_reg']").css("border", "");
	}
	if($("input[name$='pwd_reg']").val())
	{
		$("input[name$='pwd_reg']").css("border", "");
	}

}

function stats_update()
{
	var stat_reset=$("#stat_reset");

	var str_plus=$("#str_plus");
	var user_str=$("#user_str");

	var agi_plus=$("#agi_plus");
	var user_agi=$("#user_agi");

	var int_plus=$("#int_plus");
	var user_int=$("#user_int");

	var vit_plus=$("#vit_plus");
	var user_vit=$("#user_vit");

	var s_points=$("#s_points");
	var counter=0;

	var temp_str=user_str.text();
	var temp_agi=user_agi.text();
	var temp_int=user_int.text();
	var temp_vit=user_vit.text();

	var user_str_check=$("input[name$='user_str_check']");
	var user_agi_check=$("input[name$='user_agi_check']");
	var user_int_check=$("input[name$='user_int_check']");
	var user_vit_check=$("input[name$='user_vit_check']");

	var user_str_temp=user_str_check.text();
	var user_agi_temp=user_agi_check.text();
	var user_int_temp=user_int_check.text();
	var user_vit_temp=user_vit_check.text();

	str_plus.on("click", function()
	{

		if(counter>=5)
		{
			str_plus.preventDefault();
		}
		else
		{
			counter++;
			user_str.text(parseInt(user_str.text())+1);
			s_points.text(parseInt(s_points.text())-1);
			user_str_check.val(parseInt(user_str_check.val())+1);
		}
	});

	agi_plus.on("click", function()
	{

		if(counter>=5)
		{
			agi_plus.preventDefault();
		}
		else
		{
			counter++;
			user_agi.text(parseInt(user_agi.text())+1);
			s_points.text(parseInt(s_points.text())-1);
			user_agi_check.val(parseInt(user_agi_check.val())+1);
		}
	});

	int_plus.on("click", function()
	{

		if(counter>=5)
		{
			int_plus.preventDefault();
		}
		else
		{
			counter++;
			user_int.text(parseInt(user_int.text())+1);
			s_points.text(parseInt(s_points.text())-1);
			user_int_check.val(parseInt(user_int_check.val())+1);
		}
	});

	vit_plus.on("click", function()
	{

		if(counter>=5)
		{
			vit_plus.preventDefault();
		}
		else
		{
			counter++;
			user_vit.text(parseInt(user_vit.text())+1);
			s_points.text(parseInt(s_points.text())-1);
			user_vit_check.val(parseInt(user_vit_check.val())+1);
		}
	});

	var level_up=$("#level_up");

	stat_reset.on("click", function()
	{
		counter=0;
		s_points.text(5);

		user_str.text(temp_str);
		user_agi.text(temp_agi);
		user_int.text(temp_int);
		user_vit.text(temp_vit);

		user_str_check.val(user_str_temp);
		user_agi_check.val(user_agi_temp);
		user_int_check.val(user_int_temp);
		user_vit_check.val(user_vit_temp);
	});
	
}

function profile_loader(e)
{
	var profile=$("#profile_page");
	var contact=$("#contact_page");
	var home=$("#home_page");
	var level=$("#level_page");
	var level_button=$("#leveled");
	var exp_check=$("input[name$='exp_check']");
	var level_check=$("input[name$='level_check']");

	contact.hide();
	home.hide();
	profile.show();
	level.show();

	// leveling up

	// 1-5
	if(level_check.val()==1 && exp_check.val()>=100)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==2 && exp_check.val()>=250)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==3 && exp_check.val()>=500)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==4 && exp_check.val()>=750)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==5 && exp_check.val()>=1000)
	{
		level_button.removeClass("invisible");
	}
	// 6-10
	if(level_check.val()==6 && exp_check.val()>=1500)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==7 && exp_check.val()>=2000)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==8 && exp_check.val()>=2500)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==9 && exp_check.val()>=3500)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==10 && exp_check.val()>=5000)
	{
		level_button.removeClass("invisible");
	}
	// 11-15
	if(level_check.val()==11 && exp_check.val()>=6500)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==12 && exp_check.val()>=8000)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==13 && exp_check.val()>=9500)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==14 && exp_check.val()>=12000)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==15 && exp_check.val()>=15000)
	{
		level_button.removeClass("invisible");
	}
	// 16-20
	if(level_check.val()==16 && exp_check.val()>=18000)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==17 && exp_check.val()>=22000)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==18 && exp_check.val()>=26000)
	{
		level_button.removeClass("invisible");
	}
	if(level_check.val()==19 && exp_check.val()>=30000)
	{
		level_button.removeClass("invisible");
	}

}

function contact_loader(e)
{
	var profile=$("#profile_page");
	var contact=$("#contact_page");
	var home=$("#home_page");
	var level=$("#level_page");

	level.hide();
	profile.hide();
	contact.show();
	home.hide();
}

function page_load(e)
{
	var profile=$("#profile_page");
	var contact=$("#contact_page");
	var home=$("#home_page");
	var level=$("#level_page");
	
	level.hide();
	profile.hide();
	contact.hide();
	home.show();
	
}

function home_loader(e)
{
	var profile=$("#profile_page");
	var contact=$("#contact_page");
	var home=$("#home_page");
	var welcome=$("#welcome_board");
	var level=$("#level_page");
	
	level.hide();
	profile.hide();
	contact.hide();
	home.show();

	welcome.stop().fadeOut(0);
	welcome.stop().fadeIn(1500);

}

// combat

function combat(e)
{
	var leave_btn=$("#leave_btn");

	var monster_health=$("#monster_health");
	var user_health=$("#user_health");

	var player_health=$("input[name$='player_health']");

	var player_str=$("#player_str");
	var enemy_str=$("#enemy_str");

	var power=2.12;

	if(monster_health.text()<=0)
	{
		alert("You won the battle, congratulations!");
		leave_btn.removeAttr("name");
		leave_btn.attr("name", "reward");
		e.preventDefault();
	}
	else if(user_health.text()<=0)
	{
		alert("You have lost the battle...");
		e.preventDefault();
	}
	else
	{
		user_health.text((parseFloat(user_health.text())-(parseFloat(enemy_str.text())*power)).toFixed(2));
		monster_health.text((parseFloat(monster_health.text())-(parseFloat(player_str.text())*power)).toFixed(2));
		player_health.val(user_health.text());
	}

}

function reward_glitch(e)
{
	var leave_btn=$("#leave_btn");

	var monster_health=$("#monster_health");
	var user_health=$("#user_health");

	if(monster_health.text()<0)
	{
		leave_btn.removeAttr("name");
		leave_btn.attr("name", "reward");
	}
}

