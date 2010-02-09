<?php
/*
	Version: 1.3
	http://usercake.com
	
	Developed by: Adam Davis
*/

	//General Settings
	//--------------------------------------------------------------------------
	
	//Database Information
	$dbtype = "mysql"; 
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "digitalwhispers";
	$db_port = "";
	$db_table_prefix = "";
	
	//Generic website variables
	$websiteName = "";
	$websiteUrl = "";

	//Do you wish usercake to send out emails for confirmation of registration?
	//We recommend this be set to true to prevent spam bots.
	//False = instant activation
	//If this variable is falses the resend-activation file not work.
	$emailActivation = false;

	//In hours, how long before usercake will allow a user to request another account activation email
	//Set to 0 to remove threshold
	$resend_activation_threshold = 1;
	
	//Tagged onto our outgoing emails
	$emailAddress = "noreply@iloveusercake.com";
	
	//Date format used on email's date hook
	$emailDate = date("l \\t\h\e jS");
	
	//Directory where txt files are stored for the email templates.
	$mail_templates_dir = "models/mail-templates/";
	
	$default_hooks = array("#WEBSITENAME#","#WEBSITEURL#","#DATE#");
	
	//Display more explicit error messages?
	$debug_mode = false;
	
	//---------------------------------------------------------------------------
?>