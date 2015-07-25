<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-25 16:54:50
         compiled from "C:\xampp\htdocs\Tea-tango\templetes\card.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2234355ae1a540a1a15-55820735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab95ea6390c0c03d67fb55c1b84ecab47cc32425' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Tea-tango\\templetes\\card.tpl',
      1 => 1437836088,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2234355ae1a540a1a15-55820735',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55ae1a540e5115_40369534',
  'variables' => 
  array (
    'card_list' => 0,
    'array' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae1a540e5115_40369534')) {function content_55ae1a540e5115_40369534($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>効果的に暗記するならTea-tango！</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="main">
	<?php  $_smarty_tpl->tpl_vars['array'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['array']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['card_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['array']->key => $_smarty_tpl->tpl_vars['array']->value) {
$_smarty_tpl->tpl_vars['array']->_loop = true;
?>
		<p><?php echo $_smarty_tpl->tpl_vars['array']->value['front'];?>
 : <?php echo $_smarty_tpl->tpl_vars['array']->value['back'];?>
 : <a href="index.php?page=profile&name=<?php echo $_smarty_tpl->tpl_vars['array']->value['author'];?>
"><?php echo $_smarty_tpl->tpl_vars['array']->value['author'];?>
</a> : <?php echo $_smarty_tpl->tpl_vars['array']->value['created'];?>
</p>
	<?php } ?>
</div>
</body>
</html><?php }} ?>
