<?php /* Smarty version 2.6.11, created on 2012-09-07 07:28:41
         compiled from cache/modules/KReports/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/KReports/DetailView.tpl', 26, false),)), $this); ?>


<table cellpadding="1" cellspacing="0" border="0" width="100%" class="actionsContainer">
<tr>
<td class="buttons" align="left" NOWRAP>
<form action="index.php" method="post" name="DetailView" id="form">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="withchart" id="withchart" value="no"><input type="hidden" name="to_pdf" id="to_pdf" value=""><input type="hidden" name="dynamicoptions" id="dynamicoptions" value="<?php echo $this->_tpl_vars['dynamicoptions']; ?>
"><input type="hidden" name="groupby" id="groupby" value=""><input type="hidden" name="dynamicols" id="dynamicols" value="">
</form>
</td>
<td class="buttons" align="left" NOWRAP>
<?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=KReports", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="submit" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?>
</td>
<td align="right" width="100%"><?php echo $this->_tpl_vars['ADMIN_EDIT']; ?>

<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="KReports_detailview_tabs"
>
<div >
</div></div>

<input type="hidden" name="listfieldarray" id="listfieldarray" value="<?php echo $this->_tpl_vars['listfieldarray']; ?>
">
<input type="hidden" name="listfields" id="listfields" value="<?php echo $this->_tpl_vars['fields']['listfields']['value']; ?>
">
<input type="hidden" name="listtype" id="listtype" value="<?php echo $this->_tpl_vars['fields']['listtype']['value']; ?>
">
<input type='hidden' name='listtypeproperties' id='listtypeproperties' value='<?php echo $this->_tpl_vars['fields']['listtypeproperties']['value']; ?>
'>
<input type='hidden' name='reportoptions' id='reportoptions' value='<?php echo $this->_tpl_vars['fields']['reportoptions']['value']; ?>
'>
<input type="hidden" name="columnmodeldarray" id="columnmodeldarray" value="<?php echo $this->_tpl_vars['columnmodeldarray']; ?>
">
<input type='hidden' name='jsonlanguage' id='jsonlanguage' value='<?php echo $this->_tpl_vars['jsonlanguage']; ?>
'>
<input type="hidden" name="recordid" id="recordid" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<input type="hidden" name="haschart" id="haschart" value="<?php echo $this->_tpl_vars['haschart']; ?>
">
<input type="hidden" name="withchart" id="withchart" value="no">
<input type="hidden" name="exportedcount" id="exportedcount" value=0>
<input type="hidden" name="kreporteredition" id="kreporteredition" value="<?php echo $this->_tpl_vars['kreporteredition']; ?>
">
<input type="hidden" name="chart_layout" id="chart_layout" value="<?php echo $this->_tpl_vars['fields']['chart_layout']['value']; ?>
">
<input type='hidden' name='geocodeEnable' id='geocodeEnable' value='<?php echo $this->_tpl_vars['geocodeEnable']; ?>
'>
<input title="targetlist_name" class="button" id="targetlist_name" name="targetlist_name" type="hidden" value="">
<link rel='stylesheet' type='text/css' href='custom/kinamu/extjs/resources/css/ext-all-notheme.css' />
<link rel='stylesheet' type='text/css' href='custom/kinamu/extjs/resources/css/xtheme-gray.css' />
<script type='text/javascript' src='custom/kinamu/extjs/adapter/ext/ext-base.js'></script>
<script type='text/javascript' src='custom/kinamu/extjs/ext-all.js'></script>
<?php echo $this->_tpl_vars['addViewJS']; ?>

<?php echo $this->_tpl_vars['viewJS']; ?>

<div id='reportMain' style="margin-left:0px; margin-right:10px">
<div id='toolbarArea'></div>
<?php if ($this->_tpl_vars['dynamicoptions'] != ''): ?><div id='optionsArea' style='margin-top:5px;'></div><?php endif; ?>
<div id='reportGrid' style='margin-top:5px;'><?php echo $this->_tpl_vars['reportData']; ?>
</div><br>
</div>
<script type='text/javascript' src='modules/KReports/DetailView.<?php echo $this->_tpl_vars['kreporteredition']; ?>
.js'></script>