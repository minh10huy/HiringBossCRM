<?php /* Smarty version 2.6.11, created on 2012-09-06 00:50:30
         compiled from include/SubPanel/tpls/singletabmenu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getimagepath', 'include/SubPanel/tpls/singletabmenu.tpl', 84, false),)), $this); ?>


<script>
	SUGAR.subpanelUtils.currentSubpanelGroup = '<?php echo $this->_tpl_vars['startSubPanel']; ?>
';
	
	SUGAR.subpanelUtils.subpanelMoreTab = '<?php echo $this->_tpl_vars['moreTab']; ?>
';
	
	SUGAR.subpanelUtils.subpanelMaxSubtabs = '<?php echo $this->_tpl_vars['maxSubtabs']; ?>
';
	
	SUGAR.subpanelUtils.subpanelHtml = new Array();
	
	SUGAR.subpanelUtils.loadedGroups = Array();
	SUGAR.subpanelUtils.loadedGroups.push('<?php echo $this->_tpl_vars['startSubPanel']; ?>
');
	
	SUGAR.subpanelUtils.subpanelSubTabs = new Array();
	SUGAR.subpanelUtils.subpanelGroups = new Array();
<?php $_from = $this->_tpl_vars['othertabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tab']):
 $this->assign('notFirst', '0'); ?>
	SUGAR.subpanelUtils.subpanelGroups['<?php echo $this->_tpl_vars['tab']['key']; ?>
'] = [<?php $_from = $this->_tpl_vars['tab']['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subtab']):
 if ($this->_tpl_vars['notFirst'] != 0): ?>, <?php else:  $this->assign('notFirst', '1');  endif; ?>'<?php echo $this->_tpl_vars['subtab']['key']; ?>
'<?php endforeach; endif; unset($_from);  $_from = $this->_tpl_vars['otherMoreSubMenu'][$this->_tpl_vars['tab']['key']]['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subtab']):
?>, '<?php echo $this->_tpl_vars['subtab']['key']; ?>
'<?php endforeach; endif; unset($_from); ?>];
<?php endforeach; endif; unset($_from); ?>

<?php $this->assign('notFirst', '0'); ?>
	SUGAR.subpanelUtils.subpanelTitles = {<?php $_from = $this->_tpl_vars['othertabs']['All']['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subtab']):
 if ($this->_tpl_vars['notFirst'] != 0): ?>, <?php else:  $this->assign('notFirst', '1');  endif; ?>'<?php echo $this->_tpl_vars['subtab']['key']; ?>
':'<?php echo $this->_tpl_vars['subtab']['label']; ?>
'<?php endforeach; endif; unset($_from);  $_from = $this->_tpl_vars['otherMoreSubMenu']['All']['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subtab']):
?>, '<?php echo $this->_tpl_vars['subtab']['key']; ?>
':'<?php echo $this->_tpl_vars['subtab']['label']; ?>
'<?php endforeach; endif; unset($_from); ?>};

	SUGAR.subpanelUtils.tabCookieName = get_module_name() + '_sp_tab';
	
	SUGAR.subpanelUtils.showLinks = <?php echo $this->_tpl_vars['showLinks']; ?>
;
	
	SUGAR.subpanelUtils.requestUrl = 'index.php?to_pdf=1&module=MySettings&action=LoadTabSubpanels&loadModule=<?php echo $_REQUEST['module']; ?>
&record=<?php echo $_REQUEST['record']; ?>
&subpanels=';
</script>


<?php if (! empty ( $this->_tpl_vars['sugartabs'] )): ?>
<ul id="groupTabs" class="subpanelTablist">
<?php $_from = $this->_tpl_vars['sugartabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tab']):
?>
	<li id="<?php echo $this->_tpl_vars['tab']['label']; ?>
_sp_tab">
		<a class="<?php echo $this->_tpl_vars['tab']['type']; ?>
" href="javascript:SUGAR.subpanelUtils.loadSubpanelGroup('<?php echo $this->_tpl_vars['tab']['label']; ?>
');"><?php echo $this->_tpl_vars['tab']['label']; ?>
</a>
	</li>
<?php endforeach; endif; unset($_from);  if (! empty ( $this->_tpl_vars['moreMenu'] )): ?>
	<li>
		<div id='MorePanelHandle' onmouseover='SUGAR.subpanelUtils.menu.tbspButtonMouseOver(this.id,"","",0);'>
			<img src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'blank.gif'), $this);?>
" alt="more" border="0" height="16" width="16" />
		</div>
	</li>
<?php endif; ?>
</ul>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="subpanelTabForm">
	<tr>
		<td>
<?php endif; ?>

<?php if ($this->_tpl_vars['showLinks'] == 'true'): ?>
<table cellpadding="0" cellspacing="0" width='100%'>
	<tr height="20">
		<td class="subpanelSubTabBar" colspan="100" id="subpanelSubTabs">
			<table border="0" cellpadding="0" cellspacing="0" height="20" width="100%" class="subTabs">
				<tbody>
				<tr>
<?php $_from = $this->_tpl_vars['subtabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tab']):
 if (! empty ( $this->_tpl_vars['notFirst'] ) && ( $this->_tpl_vars['notFirst'] != 0 ) && ( $this->_tpl_vars['notFirst'] != 1 )): ?>
					<td width='1'> | </td>
<?php else:  $this->assign('notFirst', '2');  endif; ?>
					<td nowrap="nowrap">
						<a href='#<?php echo $this->_tpl_vars['tab']['key']; ?>
' class='subTabLink'><?php echo $this->_tpl_vars['tab']['label']; ?>
</a>
					</td>
<?php endforeach; endif; unset($_from);  if (! empty ( $this->_tpl_vars['otherMoreSubMenu'][$this->_tpl_vars['moreSubMenuName']]['tabs'] )): ?>
					<td nowrap="nowrap"> | &nbsp;<span class="subTabMore" id="MoreSub<?php echo $this->_tpl_vars['moreSubMenuName']; ?>
PanelHandle" style="margin-left:2px; cursor: pointer; cursor: hand;" align="absmiddle" onmouseover="SUGAR.subpanelUtils.menu.tbspButtonMouseOver(this.id,'','',0);">&gt;&gt;</span></td>
<?php endif; ?>
					<td width='100%'>&nbsp;</td>
				</tr>
				</tbody>
			</table>
		</td>
	</tr>
</table>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['moreMenu'] )): ?>
<div id="MorePanelMenu" class="menu">
<?php $_from = $this->_tpl_vars['moreMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tab']):
?>
	<a href="javascript:SUGAR.subpanelUtils.loadSubpanelGroupFromMore('<?php echo $this->_tpl_vars['tab']['label']; ?>
');" class="menuItem" id="<?php echo $this->_tpl_vars['tab']['label']; ?>
_sp_mm" parentid="MorePanelMenu" onmouseover="hiliteItem(this,'yes'); closeSubMenus(this);" onmouseout="unhiliteItem(this);"><?php echo $this->_tpl_vars['tab']['label']; ?>
</a>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['otherMoreSubMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
 if (! empty ( $this->_tpl_vars['group']['tabs'] )): ?>
<div id="MoreSub<?php echo $this->_tpl_vars['group']['key']; ?>
PanelMenu" class="menu">
<?php $_from = $this->_tpl_vars['group']['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subtab']):
?>
	<a href="#<?php echo $this->_tpl_vars['subtab']['key']; ?>
" class="menuItem" parentid="MoreSub<?php echo $this->_tpl_vars['group']['key']; ?>
PanelMenu" onmouseover="hiliteItem(this,'yes'); closeSubMenus(this);" onmouseout="unhiliteItem(this);"><?php echo $this->_tpl_vars['subtab']['label']; ?>
</a>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif;  endforeach; endif; unset($_from); ?>

