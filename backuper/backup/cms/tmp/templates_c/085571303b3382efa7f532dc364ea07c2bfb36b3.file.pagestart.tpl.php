<?php /* Smarty version Smarty-3.1.14, created on 2013-12-17 19:50:39
         compiled from "/var/www/phonerate.dk/public_html/cms/install/templates/pagestart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138534307352b09cfff09ac0-12229998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '085571303b3382efa7f532dc364ea07c2bfb36b3' => 
    array (
      0 => '/var/www/phonerate.dk/public_html/cms/install/templates/pagestart.tpl',
      1 => 1379716980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138534307352b09cfff09ac0-12229998',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'lang' => 0,
    'release_notes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52b09d00166946_96197212',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b09d00166946_96197212')) {function content_52b09d00166946_96197212($_smarty_tpl) {?><h2>Thanks for choosing CMS Made Simple</h2>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>
?sessiontest=1" method="post" name="pagestartform" id="pagestartform">
<table class="settings" border="0">
	<thead class="tbcaption">
	    <tr>
	    	<td style="font-size: 0.8em; text-align:center;">Choose the language you would prefer to use<br /><em>This setting affects the install process and sets your initial admin user preference</em></td>
	    </tr>
    </thead>
	<tbody>
		<tr>
			<td align="center">
				<select name="default_cms_lang">
	<?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value){
$_smarty_tpl->tpl_vars['lang']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
</option>
	<?php } ?>
				</select>
			</td>
		</tr>
	</tbody>
</table>

<?php if (isset($_smarty_tpl->tpl_vars['release_notes']->value)){?>
<table class="settings" border="0">
	<thead class="tbcaption">
		<tr>
			<td style="font-size: 0.8em; text-align:center;">This version contains release notes necessary for properly upgrading (English only).  <em>Please read them before proceeding</em>.</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td align="center">
				<textarea cols="80" rows="6"><?php echo $_smarty_tpl->tpl_vars['release_notes']->value;?>
</textarea>
			</td>
		</tr>
	</tbody>
</table>
<?php }?>

<div class="continue">
	<input type="submit" name="submit" value="Submit" />
</div>

</form>
<?php }} ?>