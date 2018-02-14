<?php
	session_start();
?>
<!doctype html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PBS Asset Management</title>

	<link rel="manifest" href="manifest.json">

	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="application-name" content="PBS AS">
	<meta name="apple-mobile-web-app-title" content="PBS AS">
	<meta name="theme-color" content="#ffffff">
	<meta name="msapplication-navbutton-color" content="#ffffff">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="msapplication-starturl" content="/">

	<!-- ganti sesuai url -->
	<link rel="canonical" href="https://pbs-am.herokuapp.com/">
  
	<link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">

	<script type="text/javascript" src="idb.js"></script>
	<script type='text/javascript' > 
	  var globalVar="";
	  var cont = false;
	  var jmlh = 0; 
	</script>
  	<script type="text/javascript" src="indexedDB.js"></script>
  	<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
	
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<script>
		if ('serviceWorker' in navigator) {
	      window.addEventListener('load', function() {
           navigator.serviceWorker.register('service-worker.js').then(function(registration) {
             console.log('Worker registration successful', registration.scope);
           }, function(err) {
             console.log('Worker registration failed', err);
           }).catch(function(err) {
             console.log(err);
           });
         });
       } else {
         console.log('Service Worker is not supported by browser.');
       }

       if(!('PushManager' in window))
       {
       	 console.log('Push messanging is not supported by browser.');
       }

        if (!('Notification' in window)) {
		  console.log('This browser does not support notifications!');
		}

        if (!('indexedDB' in window)) {
		  console.log('This browser doesn\'t support IndexedDB');
		}
	</script>

</head>
	<script src="codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
	<script src="codebase/ext/dhtmlxscheduler_container_autoresize.js"></script>
	<script src="codebase/ext/dhtmlxscheduler_quick_info.js" type="text/javascript" charset="utf-8"></script>
	<script src="codebase/ext/dhtmlxscheduler_readonly.js"></script>
	<script src="codebase/ext/dhtmlxscheduler_responsive.js" type="text/javascript" charset="utf-8"></script>
	<script src='codebase/ext/dhtmlxscheduler_minical.js' type="text/javascript"></script>
	<script src="codebase/ext/dhtmlxscheduler_collision.js" type="text/javascript" charset="utf-8"></script>
	

	<link rel="stylesheet" href="codebase/dhtmlxscheduler_flat.css" type="text/css" charset="utf-8">

	<link rel="STYLESHEET" type="text/css" href="codebase/dhtmlx.css">
	<link rel="STYLESHEET" type="text/css" href="codebase/dhtmlxscheduler_responsive.css">
	<script src="codebase/dhtmlx.js" type="text/javascript"></script>
	
<style type="text/css" >
	html, body{
		margin:0px;
		padding:0px;
		height:100%;
	}	
	.filters_wrapper {
		line-height: 12px;
		font-size: 12px;
	}
	.filters_wrapper span {
		font-weight: bold;
		padding-right: 5px;
	}
	.filters_wrapper label {
		padding-right: 3px;
	}

	select:focus {
  		outline: none;
  	}

  	.admin{
  		width:60px !important;
  		color:white;
  		height: 35px !important;
  		line-height: 35px !important; 
  		border: 2px white solid; 
  	}
  	/*hp*/
  	@media screen and (max-width: 767px) {
  		.headertab{
  			margin-top: 3% !important;
  			float:right; 
  			width:60px !important;
  			color:white; 
  			height: 35px !important;
  			line-height: 35px !important; 
  			border: 2px white solid;
  			margin-right:3% !important;
  		}
  		.dd{
  			margin-top: 2%; 
  			margin-bottom: 0;
  		}
  		.divheader{
  			padding-bottom: 2%;
  		}

  		.admin .signout{
  			margin-right:3% !important;
  		}
  		.headeradmin{
  			padding-top: 2% !important;
  		}
  	}

  	@media screen and (min-width: 768px) {
  		.headertab{
  			margin-top: 1% !important;
  			float:right; 
  			width:60px !important;
  			color:white; 
  			height: 35px !important;
  			line-height: 35px !important; 
  			border: 2px white solid;
  			margin-right:1% !important;
  		}
  		.dd{
  			margin-top: 1%; 
  			margin-bottom: 1%;
  		}
  		.divheader{
  			padding-bottom: 1%;
  		}

  		.admin{
  			margin-top: 2% !important;
  			margin-right: 1% !important;
  		}

  		.headeradmin{
  			padding-top: 0 !important;
  		}

  		.filters_wrapper{
  			margin-left: 0.6% !important;
  		}
  	}
</style>

<script>
	var filters_bool, filters_name = [], filters = [], ind, showLB, online=true, sumType, user, userId, initial, mine, users=[], timeNow, stop, doit, first, eve, reload, data = [], edit, sizeType, tEv, newEv, tId;

	//user
	// 0 - blm login
	// 1 - user biasa
	// 2 - admin
	
	$( document ).ready(function() {
		if(navigator.onLine) {
			getUser();

			var ti = getTypes();

			var select = document.getElementById('display');

			for(var j=0; j<ti.length; j++)
			{
				var opt = document.createElement('option');
		      	opt.value = ti[j].id;
		      	opt.innerHTML = ti[j].nama_tipe;
		      	select.appendChild(opt);
		  	}
		}else{
			idbApp.getTipeInternal();
			idbApp.countTypes();
		}
		newEv=false;
		first=true;
		stop=false;
		reload=false;
		edit=false;
		<?php
		if(isset($_SESSION['status'])){
	      if($_SESSION['status'] == 1) {
	        echo 'user=1;';
	        echo 'userId='.json_encode($_SESSION['idUser']).';';
	        echo 'initial='.json_encode($_SESSION['user']).';';
	      } else if($_SESSION['status'] == 2) {
	      	echo 'user=2;';  
	      }
	    }else{
	    	echo 'user=0;';
	    }

	    if(isset($_GET['ev']))
	    {
	    	echo 'eve='.json_encode($_GET['ev']).';';
	    	echo 'reload=true;';
	    }else{
	    	echo 'eve=0;';
	    }

	    ?>
	    Notification.requestPermission();
		intervals();
	});

	function intervals()
	{
		doStuff();
		var aut = setInterval(doStuff, 10000);
	}

	function init() 
	{
		if(!navigator.onLine) {
			online = false;
		}
		else{
			online = true;
		}
		showLB=true;
		initResponsive(scheduler);
		
		roundTime();

		function roundTime()
		{
			checkTime();
			//semenit internal check timenya
			doit = setInterval(checkTime,60000);
		}

		function checkTime()
		{
			timeNow = new Date();

			if(timeNow.getMinutes()==15 || timeNow.getMinutes()==45)
			{
				stop = true;
			}

			if(stop == true)
			{
				clearInterval(doit);
				intv();
			}
		}

		function intv()
		{
			notif();
			//30 mnt interval ceknya
			var not = setInterval(notif, 1800000);
		}

		function notif()
		{
			var now = new Date();
			var min = now.getMinutes();

			var nowYear = now.getFullYear();
			var nowMonth = now.getMonth();
			var nowDate = now.getDate();
			var nowHour = now.getHours();

			if(min>=45)
			{
				min='00';
				nowHour+=1;
			}else{
				min+=15;
			}
			
			var tanggal = nowYear + "-" + (nowMonth+1) + "-" + nowDate + " " + nowHour + ":" + min + ":00";

			var ha = new Date(tanggal);

			var evs = scheduler.getEvents();

			for(var i=0; i<evs.length; i++){
		       if(evs[i].idUser == userId)
		       {
			       if(evs[i].start_date.getTime() == ha.getTime())
			       {
			       		displayNotification(evs[i].id, 15);
			       }
			   }
			}

		}

		scheduler.attachEvent("onXLS", function (){
		    scheduler.config.readonly = true;
		});

		scheduler.config.lightbox.sections=[	
			{name:"Initial", height:40, map_to:"text", type:"textarea" , focus:true},
			{name:"Notes", height:40, type:"textarea", map_to:"desc" },
			{name:"Item", height:21, type:"select", map_to:"id_tipe", options:[
			    {key:"1", label:"Laptop Windows 7"},
			    {key:"2", label:"Laptop Windows 8"},
			    {key:"3", label:"Proyektor"},
			    {key:"4", label:"Macbook 1"},
			    {key:"5", label:"Macbook 2"}
			]},
			{name:"Time", height:72, type:"calendar_time", map_to:"auto"}
		];

		scheduler.ignore_week = function(date){
		    if (date.getDay() == 6 || date.getDay() == 0)
		        return true;
		};

		scheduler.config.first_hour = 8;
		scheduler.config.last_hour = 18;
		scheduler.config.start_on_monday = true;
		scheduler.config.limit_time_select = true;
		scheduler.config.details_on_create=true;
		scheduler.config.details_on_dblclick=true;
		scheduler.config.show_loading=true;
		scheduler.config.time_step = 30;
		scheduler.config.hour_size_px = 88;
		scheduler.config.drag_resize = false;
      	scheduler.config.drag_move = false;
      	scheduler.config.drag_create = false;

      	scheduler.config.icons_select = [];

		var setter = scheduler.form_blocks.time.set_value;

		scheduler.templates.quick_info_content = function(start, end, ev){ 
		       return ev.desc;
		};
		
		scheduler.attachEvent("onTemplatesReady", function(){
		    scheduler.templates.event_text=function(start,end,event){
		        return "<b> Initial : " + event.text + "</b><br><i> Notes : " + event.desc + "</i>";
		    }
		});

		scheduler.attachEvent("onXLE", function(){

			scheduler.config.readonly = false;

			if(first==true && reload==false)
			{
				var now = new Date();
				var min = now.getMinutes();
				var nextMin;
				var yes = false;

				var nowYear = now.getFullYear();
				var nowMonth = now.getMonth();
				var nowDate = now.getDate();

				var nowHour = now.getHours();

				if(min>15 && min<30)
				{
					nextMin = '30';
					min = 30-min;
					yes = true;
				}else if(min>45 && min<=59)
				{
					nowHour+=1;
					nextMin = '00';
					min=60-min;
					yes = true;
				}
				

				var tanggal = nowYear + "-" + (nowMonth+1) + "-" + nowDate + " " + nowHour + ":" + nextMin + ":00";
				if(yes==true)
				{
					var sekarang = new Date(tanggal);
					var evs = scheduler.getEvents();
					
					for(var i=0; i<evs.length; i++){
				       if(evs[i].idUser == userId)
				       {
				       		if(evs[i].start_date.getTime() == sekarang.getTime())
				       		{
				       			displayNotification(evs[i].id, min);
				       		}
				       }
					}
				}
				first=false;
			}

			if(eve!=0)
			{
				scheduler.showLightbox(eve);

			}

			if(reload == true)
			{
				reload=false;
			}
		});

		scheduler.attachEvent("onBeforeEventCreated", function (e){
		  var now = new Date();
		  var start_date = scheduler.getActionData(e).date;
		  
		  if(start_date.valueOf() < now.valueOf())
	      {
	      	return false;
	      }

		  return true;
		});

		var buttons = ["delete", "edit"];

		scheduler.attachEvent("onClick", function (id, e){
       		showLB=true;
       		
       		var cek = scheduler.getEvent(id);

       		if(online==true)
       		{
	       		if(cek.start_date < new Date())
	       		{
	       			scheduler.config.icons_select = ['icon_details'];
	       		}else{
	       			scheduler.config.icons_select = ['icon_details', 'icon_delete'];
	       		}
       		}else{
       			scheduler.config.icons_select = ['icon_details'];
       		}
		    return true;
		});

		scheduler.attachEvent("onAfterLightbox", function (){
			scheduler.config.first_hour = 8;

			if(newEv==true)
			{

	    		newEv = false;
				
				var nStart = new Date(tEv.start_date.getTime() + 60000);
				
				var end = convertDate(tEv.end_date);
				var start = convertDate(nStart);

				var waitTime = Math.random() * 3;
				waitTime+=1; 
				waitTime = waitTime*1000;
				setTimeout(function () {
			        checkEvents(start, end, tEv.id_tipe, tEv.idUser);

			    }, waitTime);
	   
	    	}

	    	newEv = false;

			showLB=true;
		});

		scheduler.attachEvent("onEventSave",function(id,ev,is_new){
			if(edit == true)
			{
				var ganti = false;

				if(ev.text != data[0])
				{
					ganti = true;
				}

				if(ev.desc != data[1])
				{
					ganti = true;
				}

				if(ev.id_tipe != data[2])
				{
					ganti = true;
				}

				if(ev.start_date.getTime() != data[3].getTime())
				{
					ganti = true;
				}

				if(ev.end_date.getTime() != data[4].getTime())
				{
					ganti = true;
				}

				if(ganti==false)
				{
					dhtmlx.alert({
					    title:"Alert",
					    type:"alert-error",
					    text:"There are no changes made"
					});
					return false;
				}	

				edit=false;
			}

			if(user==2)
			{
				var ada = false;
				for(var x in users)
				{
					if(users[x]["name"] == ev.text)
					{
						ev.idUser = users[x]["idUser"];
						ada = true;
					}
				}

				if(ada == false)
				{
					dhtmlx.alert({
				    title:"Alert",
				    type:"alert-error",
				    text:"Initial is not registered"
				});
					return false;
				}
			}else if(user==1){
				ev.idUser = userId;
			}
		    
		    if (!ev.text) {
		        dhtmlx.alert({
				    title:"Alert",
				    type:"alert-error",
				    text:"Initial cannot be empty"
				});
		        return false;
		    }

		    if (!ev.desc) {
		        dhtmlx.alert({
				    title:"Alert",
				    type:"alert-error",
				    text:"Notes cannot be empty"
				});
		        return false;
		    }else if(!ev.desc.match(/^[a-zA-Z,'-'' '\.0-9]+$/))
		    {
		    	dhtmlx.alert({
				    title:"Alert",
				    type:"alert-error",
				    text:"Special characters are not allowed"
				});
		        return false;
		    }

		    if (ev.text.length>3 || ev.text.length<3) {
		        dhtmlx.alert({
				    title:"Alert",
				    type:"alert-error",
				    text:"Invalid initials length"
				});
		        return false;
		    }

			if (ev.end_date < ev.start_date)
		    {
		    	dhtmlx.alert({
				    title:"Alert",
				    type:"alert-error",
				    text:"Invalid time interval"
				});
		    	return false;
		    }		 

		 	var checkevents = scheduler.getEvents(ev.start_date, ev.end_date);

		 	if(checkevents.length > 0)
		 	{
		 		for(var i=0; i<checkevents.length; i++)
		 		{
		 			if(checkevents[i].id_tipe == ev.id_tipe && checkevents[i].id != id)
		 			{
		 				dhtmlx.alert({
						    title:"Alert",
						    type:"alert-error",
						    text:"Time slot is not empty"
						});

						return false;
		 			}
		 		}		
		 	}

		    return true;
		});

		scheduler.attachEvent("onEventAdded", function(id,ev){
			tEv = ev;
			newEv = true;
			return true;
		});

		scheduler.attachEvent("onEventChanged",function(id,ev,is_new){
		 	dhtmlx.alert({
			    title:"Success",
			    type:"alert",
			    text:"Data has been successfully updated"
			});

		 	scheduler.updateView();

		    return true;
		});

	
		if(online == true)
		{
			var types = getTypes();

		for(var i = 0; i < types.length; i++)
		{
			filters_name[i] = i+1;
			filters[i]=false;
		}

		filters[0]=true;

		var dropdown = document.getElementById("display");
		
		for(var i=0; i<filters_name.length; i++) {
		
			dropdown.onchange = function() {
				var input_filter = dropdown.options[dropdown.selectedIndex].value;
				for(var x=0; x<filters_name.length; x++) {
					if(filters_name[x] == input_filter)
					{
						filters[filters_name[x]-1] = true;

					}else{
						filters[filters_name[x]-1] = false;
					}
				}

				scheduler.updateView();
			}
		}

		scheduler.filter_month = scheduler.filter_day = scheduler.filter_week = function(id, event) {

			if (filters[parseInt(event.id_tipe)-1]) {
				return true;
			}

			return false;
		};

			scheduler.attachEvent("onBeforeLightbox", function (id){

	    		var cek = scheduler.getEvent(id);
	    		
	    		var skrg = new Date();
	    		var wkt = skrg.getHours();

	    		if(user>0)
	    		{
		    		if(scheduler.getEvent(id).start_date < new Date())
		    		{
		    			if(scheduler.getEvent(id).idUser == null)
		    			{
		    				return false;
		    			}else{
		    				scheduler.config.readonly_form  = true;
		    			}
				    }
				    else
				    {
				    	if(user==1)
				    	{
				    		if(userId == scheduler.getEvent(id).idUser)
				    		{
				    			mine=true;
				    			edit=true;
				    			scheduler.config.readonly_form = false;

				    			data[0] = scheduler.getEvent(id).text;
				    			data[1] = scheduler.getEvent(id).desc;
				    			data[2] = scheduler.getEvent(id).id_tipe;
				    			data[3] = scheduler.getEvent(id).start_date;
				    			data[4] = scheduler.getEvent(id).end_date;	
				    				
				    		}else{
				    			if(scheduler.getEvent(id).idUser == null)
				    			{
				    				edit=false;
				    				scheduler.config.readonly_form = false;
				    				scheduler.getEvent(id).text = initial;
				    			}else{
				    				scheduler.config.readonly_form = true;
				    			}
				    		}
				    	}else if(user==2){
				    		scheduler.config.readonly_form = false;
				   			
				   			if(scheduler.getEvent(id).idUser == null)
		    				{
		    					edit=false;
		    					data[0] = scheduler.getEvent(id).text;
				    			data[1] = scheduler.getEvent(id).desc;
				    			data[2] = scheduler.getEvent(id).id_tipe;
				    			data[3] = scheduler.getEvent(id).start_date;
				    			data[4] = scheduler.getEvent(id).end_date;
		    				}
				    	}
				    }
				}else{
					
					scheduler.config.readonly_form  = true;
					
					if(scheduler.getEvent(id).idUser == null)
				    {
				    	dhtmlx.alert({
						    title:"Alert",
						    type:"alert-error",
						    text:"Please sign in enable this feature"
						});
				    	return;
				    }
					
				}
	    		
			    return true;
			});

			scheduler.attachEvent("onLightbox", function(){
				   if(user==1)
				   {
				   		var section = scheduler.formSection("Initial");
				   		
					   	section.control.disabled = true;

				   }else if(user==2)
				   {
				   		var section = scheduler.formSection("Initial");
				   		section.control.disabled = false;
				   }
			});
			
			scheduler.config.xml_date="%Y-%m-%d %H:%i:%s";
			scheduler.init('scheduler_here',new Date(),"week");
			scheduler.setLoadMode("week");
			scheduler.load("data/events.php");

			var dp;

			dp = new dataProcessor("data/events.php");

			dp.attachEvent("onFullSync", function(){
	    		scheduler.clearAll();
				scheduler.load("data/events.php");
			});

			dp.defineAction("invalid",function(sid,response){
				dhtmlx.alert({
						    title:"Alert",
						    type:"alert-error",
						    text:"Collision occured, please try again"
						});
				return false;
			});

			dp.attachEvent("onDBError", function(errorData){
				 if(errorData.details == "collision"){
				      dhtmlx.alert({
						    title:"Alert",
						    type:"alert-error",
						    text:"Collision occured, please try again"
						});
				 }
			});

			dp.attachEvent("onValidationError", function(id, details){
				if(details.details == "collision"){
				      dhtmlx.alert({
						    title:"Alert",
						    type:"alert-error",
						    text:"Collision occured, please try again"
						});
				 }
			});

			dp.init(scheduler);
		
			<?php
				$online = true;
			?>
		}else{
		idbApp.amountType().then(function(sum) {

		        for(var i = 0; i < sum; i++)
				{
					filters_name[i] = i+1;
					filters[i]=false;
				}

				filters[0]=true;

		var drop = document.getElementById("display");
		
		for(var i=0; i<filters_name.length; i++) {
		
			drop.onchange = function() {
				
				var input_filter = drop.options[drop.selectedIndex].value;
				
				for(var x=0; x<filters_name.length; x++) {
					if(filters_name[x] == input_filter)
					{
						filters[filters_name[x]-1] = true;

					}else{
						filters[filters_name[x]-1] = false;
					}
				}

				scheduler.updateView();
			}
		}

		scheduler.filter_month = scheduler.filter_day = scheduler.filter_week = function(id, event) {

			if (filters[parseInt(event.id_tipe)-1]) {
				return true;
			}

			return false;
		};
		    });

				scheduler.config.dblclick_create = false;

				scheduler.attachEvent("onDblClick", function (id){
					if(scheduler.getEvent(id).idUser == null)
				    {
						dhtmlx.alert({
						    title:"Alert",
						    type:"alert-error",
						    text:"This feature is not available offline"
						});
					}
				});

				scheduler.attachEvent("onBeforeLightbox", function (id){

	    		var cek = scheduler.getEvent(id);
	    		
	    		var skrg = new Date();
	    		var wkt = skrg.getHours();
	    		
	            scheduler.config.readonly_form  = true;
	    		
				    return true;
				});

			scheduler.config.xml_date="%Y-%m-%d %H:%i:%s";
			scheduler.init('scheduler_here',new Date(),"week");
			scheduler.setLoadMode("week");
			idbApp.fullEvents().then(function() {
		        scheduler.parse(globalVar, "json");
		    });
		}
	}

	function displayNotification(idEvent, min) {
	    if (Notification.permission == 'granted') {
	      navigator.serviceWorker.getRegistration().then(function(reg) {
	        var options = {
	        body: 'You have a reservation scheduled in ' + min + ' minutes',
	        icon: 'icons/fox512x512.png',
	        vibrate: [100, 50, 100],
	        data: {
	          dateOfArrival: Date.now(),
	          primaryKey: idEvent
	        }

	        };

	        reg.showNotification('Reminder', options);
	      });
	    }

	  }

	function getUser()
	{
		var result;

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
	        	users=res;
	        }
 		});

 		return result;
	}

	function getTipe()
	{
		var result=[];
		
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
	        	result = res;
	        	idbApp.clearDataType();
	        	idbApp.addTypes(result);
	        }
 		});

 		return result;
	}

	function getTypes()
	{
		var result=[];
		
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
	        	result = res;
	        }
 		});

 		return result;
	}

	function getEvents()
	{
		var result=[];
		
		$.ajax({
	        url     : "getEvents.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1
	        },
	        success : function(res)
	        {
	        	result = res;
	        	idbApp.clearDataCalendar();
	        	idbApp.addEvents(result);
	        }
 		});

 		return result;
	}

	function checkEvents(start, end, type, id)
	{
		$.ajax({
	        url     : "checkDouble.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1,
	        	start: start,
	        	end: end,
	        	type: type,
	        	id: id
	        },
	        success : function(res)
	        {
	        	var hasil = parseInt(res);
	        	if(hasil==1)
	        	{
	        		dhtmlx.alert({
					    title:"Alert",
					    type:"alert-error",
					    text:"Collision occured, Failed to add"
					});

	        		scheduler.clearAll();
					scheduler.load("data/events.php");
	        		
	        	}else{
	        		dhtmlx.alert({
					    title:"Success",
					    type:"alert",
					    text:"Data has been successfully added"
					});

	        		scheduler.clearAll();
					scheduler.load("data/events.php");
	        	}
	        }
 		});
	}

	function convertDate (now) {
	  year = "" + now.getFullYear();
	  month = "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
	  day = "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
	  hour = "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
	  minute = "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
	  second = "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
	  return year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;
	}

	function doStuff() {
	   if(!navigator.onLine) {
	   		online = false;
	   } else {
	   		online = true;
	   		getEvents();
	   		getTipe();
	   }
	}

</script>

<body onload="init();" style="background-color: #f6f6f6;">

	<div class="divheader" style="width:100%;background-color: #5780AD;">
		<div style="width:100%; height: 20px;" id='tabs'>
		<?php 
			if(isset($_SESSION['status'])) {
		      if($_SESSION['status'] == 1) {
		        echo '<div class="dhx_cal_tab headertab" onClick="signout()">Sign Out</div>';
		      } else if($_SESSION['status'] == 2) {
		        echo '<div class="row headeradmin" style="float:right;width:40%;"><div class="dhx_cal_tab admin signout" onClick="signout()">Sign Out</div><div class="dhx_cal_tab admin" onClick="addItem()">Manage</div></div>';
		      }
		    }else{
		    	echo '<div class="dhx_cal_tab headertab" onClick="signin()">Sign In</div>';
		    }
		?>
		</div>
		<!-- <div style="width:100%; margin-top: 4%; padding-bottom: 1%;"> -->
		<h3 style="font-family: arial; font-weight: normal;color: white; -webkit-margin-after:0.5em;-webkit-margin-before:0em; margin-left: 2% !important;">PBS Asset Management</h3>
		<!-- </div> -->
	</div>
	<div class="dd" style='height:20px; padding:5px;'>
		<div class="row">
		<div class="filters_wrapper" id="filters_wrapper">
			<span display="inline" style="font-family: arial; font-size: 14px;">Filter Item:</span>
			<label display="inline">
				<select class="tipe" name="display" id="display" style="font-family: arial; background-color: transparent; border: 0; border-bottom: #5780AD solid 0.5px;padding: 2px 0;">			
				</select>
			</label>
		</div>
	</div>
	</div>
	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
		<div class="dhx_cal_navline" style='height:100%; background-color: #f6f6f6 !important;'>
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button" style="background-color: #FFA200; color: white;"></div>
			<div class="dhx_cal_date"></div>

			<div class="dhx_cal_tab" name="day_tab" style="right:204px; border: 0.5px #5780AD solid;"></div>
			<div class="dhx_cal_tab" name="week_tab" style="right:140px; border: 0.5px #5780AD solid;"></div>
			<div class="dhx_cal_tab" name="month_tab" style="right:76px; border: 0.5px #5780AD solid;"></div>
		</div>
		<div class="dhx_cal_header">
		</div>
		<div class="dhx_cal_data">
		</div>		
	</div>
	<script type="text/javascript">
		function signin()
		{
			if(!navigator.onLine) {
				dhtmlx.alert({
				    title:"Success",
				    type:"alert",
				    text:"This feature is not available offline"
				});
			   } else {
			   		window.location.href = "./login.php";
			   }
		}

		function addItem()
		{
			window.location.href="./addItems.php";
		}

		function signout()
		{
			$.ajax({
	        url     : "signout.php",
	        type    : "POST",
	        async   : false,
	        data    :
	        {
	        	add: 1
	        },
	        success : function(res)
	        {
	        	window.location.href = "./login.php";
	        }
 		});
		}
	</script>
</body>
