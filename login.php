<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign In</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">

<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
</head>
<body style='background-color: #AED5FF;'>
	<div style="display: table;position: absolute;height: 100%;width: 100%;">
<div class="form" style="display: table-cell;vertical-align: middle;">
	<div class="form-content" style="padding-bottom: 28px;">
			<div class="form-info">
				<h2 style="color: white;">Sign In</h2>
			</div>
			<div class="name">
				<label>Initials</label>
				<input class="input1" type="text" id="name" required="">
			</div>
			<div class="pass1">
				<label>Password</label>
				<input class="input1" type="password" id="pass" required="" maxlength="6">
			</div>
			<div class="signup">
				<input type="submit" value="SIGN IN" onclick="login()" style="background-color: #AED5FF;">
			</div>
			<div class="noacc" style="text-align: center;width: 100%;color:white; padding-top: 5%;">
				 Don't have an account? <span style="color:#7BC5FF;" onclick="signup()"> Sign up </span>
			</div>
	</div>
</div>
</div>
<script type="text/javascript">
	var users = [], name, pass;

	function signup()
	{
		if(!navigator.onLine) {
	   		alert('This feature is not available offline');
	   } else {
	   		window.location.href = "./signup.php";
	   }
	}
	function login()
	{
		var online;
		if(!navigator.onLine) {
		   		online=false;
		   } else {
		   		online=true;
		   }
		name = document.getElementById('name').value;
		name = name.toUpperCase();
		pass = document.getElementById('pass').value;

		if(name == "" || pass == "")
		{
			alert("Field is empty");
		}else
		{
			if(online==true)
			{
				checkUser(name, pass);
			}else{
				alert('This feature is not available offline');
			}
		}
	}

	function check()
	{
		for(var x in users)
		{
			if (users[x]["name"] == name){
				if(users[x]["password"] == pass)
				{	
					if(users[x]["idUser"]==1)
					{
						<?php 
							unset($_SESSION['status']);
							$_SESSION['status'] = 2;
						?>

						window.location.href = "./index.php?v=" + users[x]["idUser"];

					}else{
						<?php 
							unset($_SESSION['status']);
							$_SESSION['status'] = 1;
						?>

						window.location.href = "./index.php?v=" + users[x]["idUser"];
					}
				}
			}
		}			
	}

	function notfound()
	{
		alert("Initials/Password doesn't match");
		location.reload();
	}

	function getUser()
	{
		$.ajax({
	        url     : "getUsers.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1
	        },
	        success : function(res)
	        {
	        	users = res;
	        	check();
	        }
 		});
	}

	function checkUser(initial, password)
	{
		$.ajax({
	        url     : "cekLogin.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1,
	        	name: initial,
	        	pass: password

	        },
	        success : function(res)
	        {
	        	var a = parseInt(res);
	        	if(a == 1)
	        	{
	        		getUser();
	        	}else{
	        		notfound();
	        	}
	        }
 		});
	}

</script>
</body>
</html>