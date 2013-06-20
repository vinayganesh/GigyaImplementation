<?php
$expire=time()+60*60*24*30;
setcookie("user", "Alex Porter", $expire);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in &middot; with Gigya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Style for login box -->
    <link href="bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .signin .form-signin-heading,
      .signin .checkbox {
        margin-bottom: 10px;
      }
      .signin input[type="text"],
      .signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    
    <script type="text/javascript" src="http://cdn.gigya.com/js/socialize.js?apiKey=2_Y82PzwJ_chSFImHXaIDJClnLyJzmk-VFOavSsaNTzl6m901s_NNxRAS0xJ3bd3_N"></script>
		<script type="text/javascript">
		
				//function to check if email exists
				function getData(response)
				{
					var emailid =response.user.email;
					if(!emailid)
					{
							prompt("Please enter your email","");
							alert("Thanks!!!");
					}
					else
					{
						alert(" Email exists, Your Email address is" +" "+emailid);
					}
					
				}
				
				gigya.socialize.addEventHandlers({
					onLogin:getData
				});
				
     			//show social login 
				gigya.socialize.showLoginUI({containerID: "loginDiv", cid:'', width:220, height:60,
				redirectURL: "home.php",
				showTermsLink:false, hideGigyaLink:true 
				});
				
				function manuallogin()
				{
					alert("Please login through gigya");				
				}
	    </script>
</head>
<body>

    <div class="container">
      <div class="signin">
      <center><div id="loginDiv"></div></center>
        <h3 class="form-signin-heading">Please sign in</h3>
        <input type="text" id="email" class="input-block-level" placeholder="Email address">
        <input type="password" id="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button onClick="manuallogin()" class="btn btn-large btn-primary" type="submit">Sign in</button>
      </div>

    </div>
    
</body>