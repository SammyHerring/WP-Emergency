<?php
function shutdown()
{
    echo 'Error. Access not permitted.', PHP_EOL;
}

$allowed_ip = array("*.*.*.*"); //allowed IPs in array format (Set for your usuage prior to upload via FTP)
$password = "123456"; //Password for Secondary Authentication

if(!in_array($_SERVER['REMOTE_ADDR'], $allowed_ip) && !in_array($_SERVER["HTTP_X_FORWARDED_FOR"], $allowed_ip)) {
    register_shutdown_function('shutdown');
    exit();
}
?>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>$.fn.notify = function(settings_overwrite){
    settings = {
        placement:"top",
        default_class: ".message",
        delay:0
    };
    $.extend(settings, settings_overwrite);
    
    $(settings.default_class).each(function(){$(this).hide();});
    
    $(this).show().css(settings.placement, -$(this).outerHeight());
    obj = $(this);
    
    if(settings.placement == "bottom"){
        setTimeout(function(){obj.animate({bottom:"0"}, 500)},settings.delay);
    }
    else{
        setTimeout(function(){obj.animate({top:"0"}, 500)},settings.delay);
    }
}

/** begin notification alerts
-------------------------------------**/
$(document).ready(function ($) {
    $('.message').on('click', (function () {
        $(this).fadeTo('slow', 0, function() {
            $(this).slideUp("slow", function() {
                $(this).remove();
            });
        });
    }));
});

$(document).ready(function(){

    $("a.info_trigger").click(function(){
        $("#notify_info").notify({
            placement:"top"
        });
        return false;
    });
    
    $("a.warning_trigger").click(function(){
        $("#notify_warning").notify();
        
        return false;
    });
    $("a.error_trigger").click(function(){
        $("#notify_error").notify();
        return false;
    });
    $("a.success_trigger").click(function(){
        $("#notify_success").notify();
        return false;
    });
 
$("#notify_autopop").notify({
        delay:500
    });
    
setTimeout(
  function() 
  {
    $("#notify_autopop").slideUp(500)
  }, 5000);
    
});          
</script>


<html>
<head>
	<title>WP Emergency Script</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT Sans">
	<style type="text/css">
		P { FONT-SIZE: 12pt; COLOR: #000000;}
		
		TD { FONT-SIZE: 12pt; COLOR: #000000;}
		
		body {
       	 font-family: 'PT Sans', serif;
      	}
      	
      	H1 {
	      	padding-top: 75px;
	      	
      	}
      
	  	.message
	  	{
		-webkit-background-size: 40px 40px;
		-moz-background-size: 40px 40px;
		background-size: 40px 40px;			
		background-image: -webkit-gradient(linear, left top, right bottom,
								color-stop(.25, rgba(255, 255, 255, .05)), color-stop(.25, transparent),
								color-stop(.5, transparent), color-stop(.5, rgba(255, 255, 255, .05)),
								color-stop(.75, rgba(255, 255, 255, .05)), color-stop(.75, transparent),
								to(transparent));
		background-image: -webkit-linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);
		background-image: -moz-linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);
		background-image: -ms-linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);
		background-image: -o-linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);
		background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);
								
		 -moz-box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);
		 -webkit-box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);		
		 box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);
		 width: 100%;
		 border: 1px solid;
		 color: #fff;
		 padding: 15px;
		 position: fixed;
		 _position: absolute;
		 text-shadow: 0 1px 0 rgba(0,0,0,.5);
		 -webkit-animation: animate-bg 5s linear infinite;
		 -moz-animation: animate-bg 5s linear infinite;
		}

		.info
		{
		 background-color: #4ea5cd;
		 border-color: #3b8eb5;
		}

		.error
		{
		 background-color: #de4343;
		 border-color: #c43d3d;
		}
		 
		.warning
		{
		 background-color: #eaaf51;
		 border-color: #d99a36;
		}

		.success
		{
		 background-color: #61b832;
		 border-color: #55a12c;
		}

		.message h3
		{
		 margin: 0 0 5px 0;													 
		}

		.message p
		{
		 margin: 0;													 
		}

		.message span.icon {
		display: inline-block;
		width: 16px;
		height: 16px;
		position: absolute;
		left: 7px;
		top: 50%;
		margin-top: -8px;
		}


		.message.success span.icon {
		background: url(success.png);
		}


		.message.error span.icon {
		background: url(error.png);
		}

		.message.warning span.icon {
		background: url(warning.png);
		}

		.message.info span.icon {
		background: url(info.png);
		}

@-webkit-keyframes animate-bg
{
    from {
        background-position: 0 0;
    }
    to {
       background-position: -80px 0;
    }
}


@-moz-keyframes animate-bg
{
    from {
        background-position: 0 0;
    }
    to {
       background-position: -80px 0;
    }
}

	</style>

</head>
<body>

<div class="info message" id="notify_autopop">
         <span class="icon"></span><h3>Notifier Enabled</h3>
         <p>WP Emergency Script should be used as a last resort by an admin. Please enter password authentication to proceed.</p>
</div>

<div class="info message" id="notify_info">
         <span class="icon"></span> <h3>FYI, something just happened!</h3>
         <p>This is just an info notification message.</p>

</div>

<div class="error message" id="notify_error">
        <span class="icon"></span><h3>Oops, an error ocurred</h3>
         <p>This is just an error notification message.</p>
</div>

<div class="warning message" id="notify_warning">
         <span class="icon"></span><h3>Wait, I must warn you!</h3>
         <p>This is just a warning notification message.</p>
 
</div>

<div class="success message" id="notify_success">
       <span class="icon"></span>   <h3>Congrats, you did it!</h3>
         <p>This is just a success notification message.</p>
        
</div>


<?php 
print "<h1 align=\"center\">WP Emergency Access Script</h1>";
// If password is valid let the user get access
if (isset($_POST["password"]) && ($_POST["password"]=="$password")) {
	require './wp-blog-header.php';
	function meh() {
		global $wpdb;
		if ( isset( $_POST['update'] ) ) {
			$user_login = ( empty( $_POST['e-name'] ) ? '' : sanitize_user( $_POST['e-name'] ) );
			$user_pass  = ( empty( $_POST[ 'e-pass' ] ) ? '' : $_POST['e-pass'] );
			$answer = ( empty( $user_login ) ? '<div id="message" class="updated fade"><p><strong>The user name field is empty.</strong></p></div>' : '' );
			$answer .= ( empty( $user_pass ) ? '<div id="message" class="updated fade"><p><strong>The password field is empty.</strong></p></div>' : '' );
			if ( $user_login != $wpdb->get_var( "SELECT user_login FROM $wpdb->users WHERE ID = '1' LIMIT 1" ) ) {
				$answer .="<div id='message' class='updated fade'><p><strong>That is not the correct administrator username.</strong></p></div>";
				}
				if ( empty( $answer ) ) {
				$wpdb->query( "UPDATE $wpdb->users SET user_pass = MD5('$user_pass'), user_activation_key = '' WHERE user_login = '$user_login'" );
				$plaintext_pass = $user_pass;
				$message = __( 'Someone, hopefully you, has reset the Administrator password for your WordPress blog. Details follow:' ). "\r\n";
				$message  .= sprintf( __( 'Username: %s' ), $user_login ) . "\r\n";
				$message .= sprintf( __( 'Password: %s' ), $plaintext_pass ) . "\r\n";
				@wp_mail( get_option( 'admin_email' ), sprintf( __( '[%s] Your WordPress administrator password has been changed!' ), 	get_option( 'blogname' ) ), $message );
				$answer="<div id='message' class='updated fade'><p><strong>Your password has been successfully changed</strong></p><p><strong>An e-mail with this information has been dispatched to the WordPress blog administrator</strong></p><p><strong>You should now delete this file off your server. DO NOT LEAVE IT UP FOR SOMEONE ELSE TO FIND!</strong></p></div>";
				}
				}
				return empty( $answer ) ? false : $answer;
	}
	$answer = meh();
?>
<body>
	<div class="wrap">
		<form method="post" action="">
			<h2>WordPress Emergency Password Reset</h2>
			<p><strong>Your use of this script is at your sole risk. All code is provided "as -is", without any warranty, whether express or implied, of its accuracy, completeness. Further, I shall not be liable for any damages you may sustain by using this script, whether direct, indirect, special, incidental or consequential.</strong></p>
			<p>This script is intended to be used as <strong>a last resort</strong> by WordPress administrators that are unable to access the database.
				Usage of this script requires that you know the Administrator's user name for the WordPress install. (For most installs, that is going to be "admin" without the quotes.) Delete immediately after usage - if left this is a security risk.</p>
			<?php
			echo $answer;
			?>
			<p class="submit"><input type="submit" name="update" value="Update Options" /></p>

			<fieldset class="options">
				<legend>WordPress Administrator</legend>
				<label><?php _e( 'Enter Username:' ) ?><br />
					<input type="text" name="e-name" id="e-name" class="input" value="<?php echo attribute_escape( stripslashes( $_POST['e-name'] ) ); ?>" size="20" tabindex="10" /></label>
				</fieldset>
				<fieldset class="options">
					<legend>Password</legend>
					<label><?php _e( 'Enter New Password:' ) ?><br />
					<input type="text" name="e-pass" id="e-pass" class="input" value="<?php echo attribute_escape( stripslashes( $_POST['e-pass'] ) ); ?>" size="25" tabindex="20" /></label>
				</fieldset>

				<p class="submit"><input type="submit" name="update" value="Update Options" /></p>
			</form>
		</div>
	</body>

<?php 
}
else
{
// Wrong password or no password entered display this message
if (isset($_POST['password']) || $password == "") {
	if(!in_array($_SERVER['REMOTE_ADDR'], $allowed_ip) && !in_array($_SERVER["HTTP_X_FORWARDED_FOR"], $allowed_ip)) {
    	register_shutdown_function('shutdown');
		exit();
	}
  print "<p align=\"center\"><font color=\"red\"><b>Incorrect Password</b><br>Please enter the correct password</font></p>";}
  print "<form method=\"post\"><p align=\"center\">Please enter your password for access<br>";
  print "<input name=\"password\" type=\"password\" size=\"25\" maxlength=\"10\"><input value=\"Login\" type=\"submit\"></p></form>";
}
  
?>
<BR>
</body>
</html>
