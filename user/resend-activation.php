<?php
/*
	Version: 1.3
	http://usercake.com
	
	Developed by: Adam Davis
*/
	require_once("models/config.php");
	
	//Prevent the user visiting the lost password page if he/she is already logged in
	if(isUserLoggedIn()) { header("Location: account.php"); die; }
?>
<?php
	/* 
		Below process a new activation link for a user, as they first activation email may have never arrived.
	*/
	
$errors = array();
$success_message = "";

//Forms posted
//----------------------------------------------------------------------------------------------
if(!empty($_POST) && $emailActivation)
{
		$email = $_POST["email"];
		$username = $_POST["username"];
		
		//Perform some validation
		//Feel free to edit / change as required
		
		if(trim($email) == "")
		{
			$errors[] = "Username is required.";
		}
		//Check to ensure email is in the correct format / in the db
		else if(!isValidEmail($email) || !emailExists($email))
		{
			$errors[] = "Invalid email address.";
		}
		
		if(trim($username) == "")
		{
			$errors[] = "Email is required.";
		}
		else if(!usernameExists($username))
		{
			$errors[] = "Invalid username";
		}
		
		
		if(count($errors) == 0)
		{
			//Check that the username / email are associated to the same account
			if(!emailUsernameLinked($email,$username))
			{
				$errors[] = "Username / Email have no association.";
			}
			else
			{
				$userdetails = fetchUserDetails($username);
			
				//See if the user's account is activation
				if($userdetails["Active"]==1)
				{
					$errors[] = "Your account is already active.";
				}
				else
				{
					$hours_diff = round((time()-$userdetails["LastActivationRequest"]) / (3600*$resend_activation_threshold),0);

					if($resend_activation_threshold!=0 && $hours_diff <= $resend_activation_threshold)
					{
						$errors[] = "An activation email has already been sent to this email address in the last ".$resend_activation_threshold." hour(s).";
					}
					else
					{
						//For security create a new activation url;
						$new_activation_token = generateActivationToken();
						
						if(!updateLastActivationRequest($new_activation_token,$username,$email))
						{
							$errors[] = "SQL error, unable to handle this request.";
						}
						else
						{
							$mail = new userCakeMail();
							
							$activation_url = "<a href='".$websiteUrl."activate-account.php?token=".$new_activation_token."'>Activate my account!</a>";
						
							//Setup our custom hooks
							$hooks = array(
								"searchStrs" => array("#ACTIVATION-URL","#USERNAME#"),
								"subjectStrs" => array($activation_url,$userdetails["Username"])
							);
							
							if(!$mail->newTemplateMsg("resend-activation.txt",$hooks))
							{
								$errors[] = "Error building email template.";
							}
							else
							{
								if(!$mail->sendMail($userdetails["Email"],"Activate your UserCake Account"))
								{
									$errors[] = "Fatal error attempting mail, contact your server administrator";
								}
								else
								{
									//Success, user details have been updated in the db now mail this information out.
									$success_message = "We have emailed you a new activation link, please check your email.";
								}
							}
						}
					}
				}
			}
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resend Activation</title>
<link href="cakestyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<div id="logo"></div>
 
    <?php
    if(!empty($_POST) || !empty($_GET["confirm"]) || !empty($_GET["deny"]))
    {
        if(count($errors) > 0) {
        $list="";  
           foreach($errors as $issue) $list.="<li>".$issue."</li>";
    ?> 
     
    <div id="errors">
        <ol> 
        <?php echo $list; ?>
        </ol>
    </div>
    
    <?php }  else {  ?> 
    <div id="success">
    
       <p><?php echo $success_message; ?></p>
       
    </div>
    <?php } } ?>
    
    <div id="regbox">
	
	<?php 
    
    if(!$emailActivation)
    { 
        echo "<strong><p style=\"text-align:center\">This feature is currently disabled</strong></p>";
    }
	else
	{
    ?>
        <form name="resendActivation" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        
            <label for="user">Username:</label> <input type="text" name="username" /><br />
            <label for="pass">Email:</label> <input type="text" name="email" /><br />
    
            <input type="submit" value="Login" class="submit" />
            
        </form>

	 <? } ?> 
     </div>      
         <div style="text-align:center; padding-top:15px;">
         	<a href="index.php">Home</a> | <a href="login.php">Login</a> | <a href="forgot-password.php">Forgot Password</a> | <a href="register.php">Register</a><br />
		<a href="resend-activation.php">Resend Activation Email</a>
         </div>
     
</div>
</body>
</html>
<?php include("models/clean_up.php"); ?>

