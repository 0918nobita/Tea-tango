<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-25 04:13:08
         compiled from "C:\xampp\htdocs\Tea-tango\templetes\profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1493455ae1e1710d039-08526270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3eb059284e4ad7f2843b6c89b934995e83daf9a4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Tea-tango\\templetes\\profile.tpl',
      1 => 1437790305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1493455ae1e1710d039-08526270',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55ae1e17157a08_73651956',
  'variables' => 
  array (
    'screen_name' => 0,
    'name' => 0,
    'myName' => 0,
    'profile' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae1e17157a08_73651956')) {function content_55ae1e17157a08_73651956($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>効果的に暗記するならTea-tango！</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="main">
	<p><font size="5em"><?php echo $_smarty_tpl->tpl_vars['screen_name']->value;?>
</font><br /><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
<p>
	<?php if ($_smarty_tpl->tpl_vars['myName']->value==$_smarty_tpl->tpl_vars['name']->value) {?>
		<p><a href="profile_edit.php"><input type="button" value="プロフィールを編集する"></a></p>
	<?php }?>
	<p><?php echo $_smarty_tpl->tpl_vars['profile']->value;?>
</p>
</div>
</body>
</html><?php }} ?>
