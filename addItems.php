<!DOCTYPE html>
<html>
<head>
<title>Add Item</title>
<!-- Meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
<link rel="STYLESHEET" type="text/css" href="codebase/dhtmlx.css">
<script src="codebase/dhtmlx.js" type="text/javascript"></script>

<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
</head>
<body style='background-color: #9999cc;'>
	<div style="display: table;position: absolute;height: 100%;width: 100%;">
<div class="form" style="display: table-cell;vertical-align: middle;">
	<div class="form-content">
		<form action="#" method="post">
			<div class="form-info">
				<h2 style="color: white;">Add Item</h2>
			</div>
			<div class="name">
				<label>Item Name</label>
				<input class="input1" type="text" id="name" required="">
			</div>
			<div class="signup">
				<input type="button" value="ADD" onclick="add()" style="background-color:#9999cc;">
			</div>
		</form>

		<div class="form-info">
				<h2 style="color: white;">Delete Item</h2>
			</div>
			<div class="name">
				<label>Item Name</label>
				<select class="input1" id="tipe">
					<option selected="true" disabled> --- </option>
					<?php
						include "connect.php";
						$res = mysqli_query($con,"SELECT * FROM tipe");
						$count = 1;
						while ($row = mysqli_fetch_row($res)){
							if($count==1)
							{
								echo "<option value=".$row[0].">".$row[1]."</option>";
							}else
							{
								echo "<option value=".$row[0].">".$row[1]."</option>";
							}
							$count++;
						}
					?>
				</select>
			</div>
			<div class="signup">
				<input type="button" value="DELETE" onclick="del()" style="background-color:#9999cc;">
			</div>
	</div>
</div>
</div>
<script type="text/javascript">
	var types = [], name;
	function del()
	{
		var e = document.getElementById("tipe");
		var idTipe = e.options[e.selectedIndex].value;
		delTypes(idTipe);
	}
	function add()
	{
		name = document.getElementById('name').value;
		if(name == "")
		{
			dhtmlx.alert({
					    title:"Alert",
					    type:"alert-error",
					    text:"Field is empty"
					});
		}else
		{
			getTypes();
		}
	}
	function delTypes(id)
	{
		$.ajax({
	        url     : "deleteTipe.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1,
	        	id: id
	        },
	        success : function(res)
	        {
	        	dhtmlx.alert({
			    title:"Success",
			    type:"alert",
			    text:"Item has been successfully deleted"
			});
	        	window.location.href = "./index.php?v=d";
	        }
 		});
	}
	function getTypes()
	{
		
		$.ajax({
	        url     : "getTipe.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1
	        },
	        success : function(res)
	        {
	        	types = res;
	        	check();
	        }
 		});
	}
	function check()
	{
		var found = false;
		var upper = name.toUpperCase();
			for(var x in types)
			{
				var now = types[x]["nama_tipe"];
				now = now.toUpperCase();
				if (now == upper){
					found = true;
					dhtmlx.alert({
					    title:"Alert",
					    type:"alert-error",
					    text:"Item already exists"
					});
				}
			}
			if(found == false)
			{
				addType(name);
			}
		
	}
	function addType(name)
	{
		$.ajax({
	        url     : "addType.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1,
	        	nama: name
	        },
	        success : function(res)
	        {
	        	dhtmlx.alert({
			    title:"Success",
			    type:"alert",
			    text:"Item has been successfully added"
			});
	        	window.location.href = "./index.php?v=a";
	        }
 		});
	}
</script>
</body>
</html><!DOCTYPE html>
<html>
<head>
<title>Add Item</title>
<!-- Meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
<link rel="STYLESHEET" type="text/css" href="codebase/dhtmlx.css">
<script src="codebase/dhtmlx.js" type="text/javascript"></script>

<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
</head>
<body style='background-color: #9999cc;'>
	<div style="display: table;position: absolute;height: 100%;width: 100%;">
<div class="form" style="display: table-cell;vertical-align: middle;">
	<div class="form-content">
		<form action="#" method="post">
			<div class="form-info">
				<h2 style="color: white;">Add Item</h2>
			</div>
			<div class="name">
				<label>Item Name</label>
				<input class="input1" type="text" id="name" required="">
			</div>
			<div class="signup">
				<input type="button" value="ADD" onclick="add()" style="background-color:#9999cc;">
			</div>
		</form>

		<div class="form-info">
				<h2 style="color: white;">Delete Item</h2>
			</div>
			<div class="name">
				<label>Item Name</label>
				<select class="input1" id="tipe">
					<option selected="true" disabled> --- </option>
					<?php
						include "connect.php";
						$res = pg_query($con,"SELECT * FROM tipe");
						$count = 1;
						while ($row = pg_fetch_array($res,0)){
							if($count==1)
							{
								echo "<option value=".$row[0].">".$row[1]."</option>";
							}else
							{
								echo "<option value=".$row[0].">".$row[1]."</option>";
							}
							$count++;
						}
					?>
				</select>
			</div>
			<div class="signup">
				<input type="button" value="DELETE" onclick="del()" style="background-color:#9999cc;">
			</div>
	</div>
</div>
</div>
<script type="text/javascript">
	var types = [], name;
	function del()
	{
		var e = document.getElementById("tipe");
		var idTipe = e.options[e.selectedIndex].value;
		delTypes(idTipe);
	}
	function add()
	{
		name = document.getElementById('name').value;
		if(name == "")
		{
			dhtmlx.alert({
					    title:"Alert",
					    type:"alert-error",
					    text:"Field is empty"
					});
		}else
		{
			getTypes();
		}
	}
	function delTypes(id)
	{
		$.ajax({
	        url     : "deleteTipe.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1,
	        	id: id
	        },
	        success : function(res)
	        {
	        	dhtmlx.alert({
			    title:"Success",
			    type:"alert",
			    text:"Item has been successfully deleted"
			});
	        	window.location.href = "./index.php?v=d";
	        }
 		});
	}
	function getTypes()
	{
		
		$.ajax({
	        url     : "getTipe.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1
	        },
	        success : function(res)
	        {
	        	types = res;
	        	check();
	        }
 		});
	}
	function check()
	{
		var found = false;
		var upper = name.toUpperCase();
			for(var x in types)
			{
				var now = types[x]["nama_tipe"];
				now = now.toUpperCase();
				if (now == upper){
					found = true;
					dhtmlx.alert({
					    title:"Alert",
					    type:"alert-error",
					    text:"Item already exists"
					});
				}
			}
			if(found == false)
			{
				addType(name);
			}
		
	}
	function addType(name)
	{
		$.ajax({
	        url     : "addType.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1,
	        	nama: name
	        },
	        success : function(res)
	        {
	        	dhtmlx.alert({
			    title:"Success",
			    type:"alert",
			    text:"Item has been successfully added"
			});
	        	window.location.href = "./index.php?v=a";
	        }
 		});
	}
</script>
</body>
</html>