<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-07 14:30:48
         compiled from "C:\www\users\ttan5\public_html\templetes\profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29923554af88817c151-55831697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a203cff43ba3ae138a76be50143dbef17f9455e6' => 
    array (
      0 => 'C:\\www\\users\\ttan5\\public_html\\templetes\\profile.tpl',
      1 => 1430974920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29923554af88817c151-55831697',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'screen_name' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_554af88848a0e6_23078862',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_554af88848a0e6_23078862')) {function content_554af88848a0e6_23078862($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>効果的に暗記するならTea-tango！</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="main">
	<h1><?php echo $_smarty_tpl->tpl_vars['screen_name']->value;?>
さんのプロフィール</h1>
	<p>ユーザーネーム：　<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</p>
</div>
</body>
</html><?php }} ?>
