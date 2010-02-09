<?php
/*
	Version: 1.3
	http://usercake.com
	
	Developed by: Adam Davis
*/
	require_once("models/config.php");
	
	//Prevent the user visiting the logged in page if he/she is already logged in
	if(isUserLoggedIn()) { header("Location: account.php"); die; }
?>
<?php
	/* 
		Activate a users account
	*/

//Get token param
if(!empty($_GET["token"]))
{
		$errors = array();
		$token = $_GET["token"];
		
		if($token =="")
		{
			$errors[] = "Invalid token";
		}
		else if(!validateActivationToken($token)) //Check for a valid token. Must exist and active must be = 0
		{
			$errors[] = "Token does not exist / Account is already activated";
		}
		else
		{
			//Activate the users account
			if(!setUserActive($token))
			{
				$errors[] = "Fatel SQL error attempting to update user.";
			}
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Account Activation</title>
<link href="cakestyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<div id="logo"></div>
<?php
if(!empty($_GET))
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
 
<?php } else { 
?> 
<div id="success">

   <p>Your account has now been activated, you may now <a href="login.php">login</a>.</p>
   
</div>
<?php } } ?>

	 

	 <div style="text-align:center; padding-top:15px;">
       	<a href="index.php">Home</a> | <a href="login.php">Login</a> | <a href="forgot-password.php">Forgot Password</a> | <a href="register.php">Register</a><br />
		<a href="resend-activation.php">Resend Activation Email</a>
     </div>

</div>
</body>
</html>
<?php include("models/clean_up.php"); ?>
