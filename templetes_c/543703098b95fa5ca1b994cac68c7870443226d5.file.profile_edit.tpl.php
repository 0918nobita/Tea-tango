<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-21 16:05:43
         compiled from "C:\xampp\htdocs\Tea-tango\templetes\profile_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:630155ae4ea8aca2b1-16852588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '543703098b95fa5ca1b994cac68c7870443226d5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Tea-tango\\templetes\\profile_edit.tpl',
      1 => 1437487542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '630155ae4ea8aca2b1-16852588',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55ae4ea8b0c192_56105254',
  'variables' => 
  array (
    'screen_name' => 0,
    'profile' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae4ea8b0c192_56105254')) {function content_55ae4ea8b0c192_56105254($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>効果的に暗記するならTea-tango！</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="main">
	<h1>設定</h1>
	<form action="" method="POST">
		<p>名前：　<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['screen_name']->value;?>
" /></p>
		<p>自己紹介</p>
		<textarea name="profile" style="width:100%;height:200px"><?php echo $_smarty_tpl->tpl_vars['profile']->value;?>
</textarea>
		<input type="button" value="キャンセル" onClick="history.back();"> <input type="submit" value="保存">
	</form>
</div>
</body>
</html><?php }} ?>
