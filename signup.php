<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
<link rel="STYLESHEET" type="text/css" href="codebase/dhtmlx.css">
<script src="codebase/dhtmlx.js" type="text/javascript"></script>

<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
</head>
<body style='background-color: #ffcc66;'>
	<div style="display: table;position: absolute;height: 100%;width: 100%;">
<div class="form" style="display: table-cell;vertical-align: middle;">
	<div class="form-content" style="padding-bottom: 28px;">
			<div class="form-info">
				<h2 style="color:white;">Sign Up</h2>
			</div>
			<div class="name">
				<label>Initials</label>
				<input class="input1" type="text" id="name" required="" placeholder="AAA" maxlength="3">
			</div>
			<div class="pass1">
				<label>Password</label>
				<input class="input1" type="password" id="pass" required="" placeholder="******" maxlength="6">
			</div>
			<div class="pass2">
				<label>Re-Password</label>
				<input class="input1" type="password" id="cpass" required="" placeholder="******" maxlength="6">
			</div>
			<div class="signup">
				<input type="button" value="SIGN UP" onclick="add()" style="background-color: #ffcc66;">
			</div>
			<div class="noacc" style="text-align: center;width: 100%;color:white; padding-top: 5%;">
				 Already have an account? <span style="color:#ffcc66;" onclick="signin()"> Sign in </span>
			</div>
	</div>
</div>
</div>
<script type="text/javascript">

	var name, pass1, users= [];

	function signin()
	{
		if(!navigator.onLine) {
	   		alert('This feature is not available offline');
	   } else {
	   		window.location.href = "./login.php";
	   }
	}

	function add()
	{
		name = document.getElementById('name').value;
		pass1 = document.getElementById('pass').value;
		var pass2 = document.getElementById('cpass').value;

		if(name == "" || pass1 == "" || pass2 == "")
		{
			alert("Field is empty");
		}else
		{
			if(name.length==3)
			{
				if(pass1.length==6)
				{
					if(pass1 == pass2)
					{
						getUser();
					}else
					{
						dhtmlx.alert({
						    title:"Alert",
						    type:"alert-error",
						    text:"Password does not match"
						});
					}
				}else{
					dhtmlx.alert({
						    title:"Alert",
						    type:"alert-error",
						    text:"Password must be 6 characters long"
						});
				}
			}else{
				dhtmlx.alert({
						    title:"Alert",
						    type:"alert-error",
						    text:"Initials must be 3 characters long"
						});
			}
		}
	}

	function check()
	{
		var found = false;

		name = name.toUpperCase();

		for(var x in users)
		{
			if (users[x]["name"] == name){
				found = true;
				dhtmlx.alert({
						    title:"Alert",
						    type:"alert-error",
						    text:"User already exists"
						});
			}
		}

		if(found == false)
		{
			addToDB(name, pass1);
		}
	}

	function getUser(initial, password)
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

	function addToDB(initial, password)
	{
		$.ajax({
	        url     : "addUser.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1,
	        	nama: initial,
	        	passw: password
	        },
	        success : function(res)
	        {
	        	window.location.href = "./index.php?status=1";
	        }
 		});
	}

</script>
</body>
</html>