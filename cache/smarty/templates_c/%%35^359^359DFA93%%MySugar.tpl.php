<?php /* Smarty version 2.6.11, created on 2012-09-06 03:30:29
         compiled from include/MySugar/tpls/MySugar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'include/MySugar/tpls/MySugar.tpl', 65, false),array('function', 'counter', 'include/MySugar/tpls/MySugar.tpl', 122, false),)), $this); ?>
<?php echo '
<style>
.menu{
	z-index:100;
}

.subDmenu{
	z-index:100;
}


li.active a img.deletePageImg {
   display: inline !important;
   margin-bottom: 2px;
}

div.moduleTitle {
height: 10px;
	}
</style>
'; ?>


<!-- begin includes for overlib -->
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'include/javascript/sugar_grp_overlib.js'), $this);?>
"></script>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000"></div>
<!-- end includes for overlib -->

<script type="text/javascript">
var activePage = <?php echo $this->_tpl_vars['activePage']; ?>
;
var theme = '<?php echo $this->_tpl_vars['theme']; ?>
';
current_user_id = '<?php echo $this->_tpl_vars['current_user']; ?>
';
jsChartsArray = new Array();
var moduleName = '<?php echo $this->_tpl_vars['module']; ?>
';
document.body.setAttribute("class", "yui-skin-sam");
</script>

<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'include/javascript/sugar_grp_yui_widgets.js'), $this);?>
"></script>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'include/javascript/dashlets.js'), $this);?>
"></script>
<script type='text/javascript' src="<?php echo smarty_function_sugar_getjspath(array('file' => 'include/MySugar/javascript/MySugar.js'), $this);?>
"></script>
<link rel='stylesheet' href="<?php echo smarty_function_sugar_getjspath(array('file' => 'include/ytree/TreeView/css/folders/tree.css'), $this);?>
">


<?php echo $this->_tpl_vars['chartResources']; ?>

<?php echo $this->_tpl_vars['mySugarChartResources']; ?>



<div class="clear"></div>
<div id="pageContainer" class="yui-skin-sam">
<div id="pageNum_<?php echo $this->_tpl_vars['activePage']; ?>
_div">
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 5px;">
 	<tr>
	 	<td align='right' colspan = '2'>
			<?php if (! $this->_tpl_vars['lock_homepage']): ?><input id="add_dashlets" class="button" type="button" value="<?php echo $this->_tpl_vars['lblAddDashlets']; ?>
" onclick="return SUGAR.mySugar.showDashletsDialog();"/><?php endif; ?>
		</td>
		</tr>
	<tr style="border: 1px;"><td valign='top' width='100%'>
	
	
	<ul class='noBullet' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
				<li class='noBullet' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
'>
					<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
' class='dashletPanel'>
						
                  </div> 
				</li>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
	</td></tr>
		<?php if ($this->_tpl_vars['mySavedStatus'] == '570c0afa'): ?>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == '5802be57-6fbd-167c-bd39-5047607d5b88'): ?>
					<li class='noBullet' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
' class='dashletPanel'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == 'd4dfbe5b-da22-83e7-8785-5047604898eb'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == 'd4e27c1a-d858-7169-79bc-5047601ee633'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<?php endif; ?>
		<?php if ($this->_tpl_vars['mySavedStatus'] == 'ee9f21d5'): ?>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == '5db94220-93a8-8b96-221a-50476ff6d183'): ?>
					<li class='noBullet' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
' class='dashletPanel'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == 'dd2c7655-ece6-0554-94ed-50476f6aac03'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == 'd966af46-2ab9-43fc-e4e7-50476ffaf606'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<?php endif; ?>
		<?php if ($this->_tpl_vars['mySavedStatus'] == 'd237174d'): ?>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == '17f94698-c8b2-ed33-b1a5-504772aced14'): ?>
					<li class='noBullet' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
' class='dashletPanel'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == '9174327c-b696-8b86-5542-504772ac1cf4'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == '5b80e83e-712b-1174-080b-50477211cbdc'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<?php endif; ?>
		<?php if ($this->_tpl_vars['mySavedStatus'] == '86826629'): ?>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == 'bbfbc033-7833-283f-4fdb-504773262cc5'): ?>
					<li class='noBullet' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
' class='dashletPanel'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == 'bf367507-2870-bf67-1b00-504773778d70'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == 'cd07a797-2eb4-1f32-2e66-5047730086d1'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<?php endif; ?>
		<?php if ($this->_tpl_vars['mySavedStatus'] == '2ac7796e'): ?>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == '1f2d6b36-3120-32be-d82d-504773bb60ec'): ?>
					<li class='noBullet' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
' class='dashletPanel'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == '3f46b22f-1167-41cf-583c-504773d51703'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == '8d700a08-c90a-f406-310a-504773bc3854'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<?php endif; ?>
		<?php if ($this->_tpl_vars['mySavedStatus'] == '71cb0f85'): ?>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == '12e47281-79d7-40a3-58f3-504774fa2595'): ?>
					<li class='noBullet' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
' class='dashletPanel'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == '7b3d17b5-5d4e-9824-7908-5047749441af'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
_1'>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
		        <?php if ($this->_tpl_vars['id'] == '5f011f73-dd29-8f1f-86d6-504774b720db'): ?>
					<li class='noBullet1' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
_1'>
						<div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
_1' class='dashletPanel1'>
							<?php echo $this->_tpl_vars['dashlet']['script']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

							<?php echo $this->_tpl_vars['dashlet']['display']; ?>

	                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

	                  	</div> 
					</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<?php echo smarty_function_counter(array(), $this);?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<?php endif; ?>
	</table>
	</div>
	
	<?php $_from = $this->_tpl_vars['divPages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['divPageIndex'] => $this->_tpl_vars['divPageNum']):
?>
	<div id="pageNum_<?php echo $this->_tpl_vars['divPageNum']; ?>
_div" style="display:none;">
	</div>
	<?php endforeach; endif; unset($_from); ?>

	
	
	<div id="dashletsDialog" style="display:none;">
		<div class="hd" id="dashletsDialogHeader"><a href="javascript:void(0)" onClick="javascript:SUGAR.mySugar.closeDashletsDialog();">
			<div class="container-close">&nbsp;</div></a><?php echo $this->_tpl_vars['lblAdd']; ?>

		</div>	
		<div class="bd" id="dashletsList">
			<form></form>
		</div>
		
	</div>
				
	
</div>

<?php echo '
<script type="text/javascript">
SUGAR.mySugar.maxCount = 	';  echo $this->_tpl_vars['maxCount'];  echo ';
SUGAR.mySugar.homepage_dd = new Array();
SUGAR.mySugar.init = function () {
	j = 0;
	
	'; ?>

	dashletIds = <?php echo $this->_tpl_vars['dashletIds']; ?>
;
	
	<?php if (! $this->_tpl_vars['lock_homepage']): ?>
	<?php echo '
	for(i in dashletIds) {
		SUGAR.mySugar.homepage_dd[j] = new ygDDList(\'dashlet_\' + dashletIds[i]);
		SUGAR.mySugar.homepage_dd[j].setHandleElId(\'dashlet_header_\' + dashletIds[i]);
		SUGAR.mySugar.homepage_dd[j].onMouseDown = SUGAR.mySugar.onDrag;  
		SUGAR.mySugar.homepage_dd[j].afterEndDrag = SUGAR.mySugar.onDrop;
		j++;
	}
	for(var wp = 0; wp <= ';  echo $this->_tpl_vars['hiddenCounter'];  echo '; wp++) {
	    SUGAR.mySugar.homepage_dd[j++] = new ygDDListBoundary(\'page_\'+activePage+\'_hidden\' + wp);
	}

	YAHOO.util.DDM.mode = 1;
	'; ?>

	<?php endif; ?>
	<?php echo '
	SUGAR.mySugar.renderDashletsDialog();
	SUGAR.mySugar.sugarCharts.loadSugarCharts(activePage);
}

</script>
'; ?>


<script type="text/javascript">
	YAHOO.util.Event.addListener(window, 'load', SUGAR.mySugar.init); 
</script>