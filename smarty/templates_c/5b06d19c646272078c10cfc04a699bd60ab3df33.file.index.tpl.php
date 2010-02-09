<?php /* Smarty version Smarty3-b7, created on 2010-02-09 14:48:36
         compiled from "smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15514834134b7167b40ee7b6-25444009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b06d19c646272078c10cfc04a699bd60ab3df33' => 
    array (
      0 => 'smarty/templates/index.tpl',
      1 => 1265723313,
    ),
  ),
  'nocache_hash' => '15514834134b7167b40ee7b6-25444009',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
  <title>digital whispers</title>
  
  <link href="css/format.css" media="screen" rel="Stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" src="js/ajaxupload.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>	

</head>
<body>
	<div id="wrap">
		<a id="upload_button">your file</a>
		
	<div id="loader"></div>	

	Hello, <?php echo $_smarty_tpl->getVariable('name')->value;?>
!


	</div>
</body>