<?php
setcookie('count',1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<link href="bootstrap.css" rel="stylesheet">
	<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
      </style>
      <script type="text/javascript" src="http://cdn.gigya.com/js/socialize.js?apiKey=3_DZvzeEP2HHtWtgJ1osM1uv-WH0YIVCj5_vt3P5X2uVqosbbjBkuKy4XbyBsVCi5q">
		{
			enabledProviders: 'facebook,twitter,linkedin,yahoo,messenger,myspace,foursquare,orkut,vkontakte,renren,kaixin,mixi,skyrock'
		}
	</script>
	<script type="text/javascript">
			var urlParamsArr = {};
			window.onload = function(){
				// Parse the URL parameters into urlParamsArr
				var urlParams = document.location.search.substr(1).split("&");

				for (var i = 0; i < urlParams.length; i++) {
					var ret = urlParams[i].toString().split("=");
					urlParamsArr[ret[0]] = decodeURIComponent(ret[1]);
				}

				// Inject the user's nickname
				document.getElementById('nickname').innerHTML = urlParamsArr["nickname"];

				// Inject the login provider
				document.getElementById('loginProvider').innerHTML = urlParamsArr["loginProvider"];
				
				// Inject the email 
				document.getElementById('email').innerHTML = urlParamsArr["email"];
				
				// Inject the country 
				document.getElementById('country').innerHTML = urlParamsArr["country"];
				
				// Inject the state 
				document.getElementById('state').innerHTML = urlParamsArr["state"];
				
				// Inject the photo url
				document.getElementById('photoURL').src = urlParamsArr["photoURL"]; 
				
			}	
	</script>
	
	
	<script type="text/javascript">
			
			function showShareUI(operationMode) 
			{
		    	var act = new gigya.socialize.UserAction();
		    	
			var params = 
			{
			     userAction: act  
				,operationMode: operationMode
			    ,snapToElementID: "btnShare" 
				,onError: onError  
			    ,onSendDone: onSendDone 
			                        
				,context: operationMode			
				,showMoreButton: true 
				,showEmailButton: true 

			};

			// Show the "Share" dialog
			gigya.socialize.showShareUI(params);	
			}
			
			function onError(event) 
			{
           		 alert('An error has occured' + ': ' + event.errorCode + '; ' + event.errorMessage);

        	}
        	
        	function onSendDone(event)
			{
		    document.getElementById('status').style.color = "green";
			switch(event.context)
			{
				
				case 'simpleShare':
					document.getElementById('status').innerHTML = 'Clicked '  + event.providers;
					break;
				default:
					document.getElementById('status').innerHTML = 'Share onSendDone' ;
			}
		}

		
			//function to display the added provider
			function DisplayEventMessage(eventObj) 
			{
    			alert(eventObj.provider + " added");
			}
 			
			gigya.socialize.addEventHandlers(
			{ 
    			onConnectionAdded:DisplayEventMessage,
    			onLogout:NavigatePage
   			}
   			);
   			
   			//function to navigate to the next page
   			function NavigatePage()
   			{
   				window.location='index.php';
   			}
   			
   			//function to print logout details
   			function printResponse(response) 
   			{    
    			if ( response.errorCode == 0 ) 
    			{               	 
        			alert('Successful Logout');  
    			}  
    			else 
    			{  
        			alert('Error :' + response.errorMessage);  
    			}  
			}	 
			
			function logout()
			{
				gigya.socialize.logout({callback:printResponse});
				
			}
   
		</script>
</head>
<body>


<script type="text/javascript">
		var connect_params=
		{
			showTermsLink: 'false'
			,showEditLink: 'false'
			,height: 70
			,width: 175
			,containerID: 'componentDiv'
		}
	</script>
	<div class="container">
	
		<div class="hero-unit">
		
				Welcome, <h2><span id="nickname"></span>!</h2>
				<div class="row">
		<?php 
			if (!isset($_COOKIE['count']))
    		{
       	 ?> 
			&nbsp;&nbsp;&nbsp;&nbsp;->Welcome! This is the first time you have viewed this page. 
		<?php 
        $cookie = 1;
        setcookie("count", $cookie);
    	}
    	else
    	{
        $cookie = ++$_COOKIE['count'];
        setcookie("count", $cookie);
        ?> 
			&nbsp;&nbsp;&nbsp;&nbsp;-> You have logged in <?= $_COOKIE['count'] ?> times. 
		<?php  }?> 
		</div>
				<div class="row">
					<div class="span2"><img id="photoURL"/> </div>
				</div>
				<p>-> You authenticated with <span id="loginProvider"></span></p>
				<!-- code to get the number of times the user has logged in --!>
		
				<p>-> Your Email address is <span id="email"></span></p>
				<p>-> You currently live in <span id="state">,<span id="country"></span></p>

		<p>-> To add any social site click on the links below </p>
		<div id="componentDiv"></div>
		<script type="text/javascript">
   			gigya.socialize.showAddConnectionsUI(connect_params);
		</script>
	
		<div class="row" style="margin-left:20px"> 
			<a href="#" id="btnShare" onclick="javascript:showShareUI('simpleShare')" value="Share" class="btn btn-primary">Share</a>
        	<a href="#" onclick="logout()" class="btn btn-primary">Logout</a>
        </div>
      </div>
	</div>
</body>
</html>