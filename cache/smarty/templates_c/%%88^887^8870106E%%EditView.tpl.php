<?php /* Smarty version 2.6.11, created on 2012-09-07 01:15:18
         compiled from cache/modules/KReports/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/KReports/EditView.tpl', 33, false),array('function', 'sugar_translate', 'cache/modules/KReports/EditView.tpl', 85, false),)), $this); ?>


<div class="clear"></div>
<form action="index.php" method="POST" name="<?php echo $this->_tpl_vars['form_name']; ?>
" id="<?php echo $this->_tpl_vars['form_id']; ?>
" <?php echo $this->_tpl_vars['enctype']; ?>
>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="actionsContainer">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<?php if (isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true'): ?>
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php else: ?>
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php endif; ?>
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="<?php echo $_REQUEST['return_module']; ?>
">
<input type="hidden" name="return_action" value="<?php echo $_REQUEST['return_action']; ?>
">
<input type="hidden" name="return_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
<?php if (! empty ( $_REQUEST['return_module'] ) || ! empty ( $_REQUEST['relate_to'] )): ?>
<input type="hidden" name="relate_to" value="<?php if ($_REQUEST['return_relationship']):  echo $_REQUEST['return_relationship'];  elseif ($_REQUEST['relate_to'] && empty ( $_REQUEST['from_dcmenu'] )):  echo $_REQUEST['relate_to'];  elseif (empty ( $this->_tpl_vars['isDCForm'] ) && empty ( $_REQUEST['from_dcmenu'] )):  echo $_REQUEST['return_module'];  endif; ?>">
<input type="hidden" name="relate_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<?php endif; ?>
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
</td>
<td align='right'>
<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="EditView_tabs"
>
<div >
</div></div>

<input type='hidden' name='whereconditions' id='whereconditions' value='<?php echo $this->_tpl_vars['fields']['whereconditions']['value']; ?>
'>
<input type='hidden' name='wheregroups' id='wheregroups' value='<?php echo $this->_tpl_vars['fields']['wheregroups']['value']; ?>
'>
<input type='hidden' name='listfields' id='listfields' value='<?php echo $this->_tpl_vars['fields']['listfields']['value']; ?>
'>
<input type='hidden' name='mapoptions' id='mapoptions' value='<?php echo $this->_tpl_vars['fields']['mapoptions']['value']; ?>
'>
<input type='hidden' name='unionlistfields' id='unionlistfields' value='<?php echo $this->_tpl_vars['fields']['unionlistfields']['value']; ?>
'>
<input type='hidden' name='listtype' id='listtype' value='<?php echo $this->_tpl_vars['fields']['listtype']['value']; ?>
'>
<input type='hidden' name='listtypeproperties' id='listtypeproperties' value='<?php echo $this->_tpl_vars['fields']['listtypeproperties']['value']; ?>
'>
<input type='hidden' name='jsonlanguage' id='jsonlanguage' value='<?php echo $this->_tpl_vars['jsonlanguage']; ?>
'>
<input type='hidden' name='selectionlimit' id='selectionlimit' value='<?php echo $this->_tpl_vars['fields']['selectionlimit']['value']; ?>
'>
<input type='hidden' name='pdforientation' id='pdforientation' value='<?php echo $this->_tpl_vars['fields']['pdforientation']['value']; ?>
'>
<input type='hidden' name='pdfoptions' id='pdfoptions' value='<?php echo $this->_tpl_vars['fields']['pdfoptions']['value']; ?>
'>
<input type='hidden' name='chart_type' id='chart_type' value='<?php echo $this->_tpl_vars['fields']['chart_type']['value']; ?>
'>
<input type='hidden' name='chart_layout' id='chart_layout' value='<?php echo $this->_tpl_vars['fields']['chart_layout']['value']; ?>
'>
<input type='hidden' name='chart_height' id='chart_height' value='<?php echo $this->_tpl_vars['fields']['chart_height']['value']; ?>
'>
<input type='hidden' name='chart_params' id='chart_params' value='<?php echo $this->_tpl_vars['fields']['chart_params']['value']; ?>
'>
<input type='hidden' name='chart_params_new' id='chart_params_new' value='<?php echo $this->_tpl_vars['fields']['chart_params_new']['value']; ?>
'>
<input type='hidden' name='colorschema' id='colorschema' value='<?php echo $this->_tpl_vars['colorschema']; ?>
'>
<input type='hidden' name='linestyles' id='linestyles' value='<?php echo $this->_tpl_vars['linestyles']; ?>
'>
<input type='hidden' name='chartstyles' id='chartstyles' value='<?php echo $this->_tpl_vars['chartstyles']; ?>
'>
<input type="hidden" name="kreporteredition" id="kreporteredition" value="<?php echo $this->_tpl_vars['kreporteredition']; ?>
">
<input type='hidden' name='report_module' id='report_module' value='<?php echo $this->_tpl_vars['fields']['report_module']['value']; ?>
'>
<input type='hidden' name='reportoptions' id='reportoptions' value='<?php echo $this->_tpl_vars['fields']['reportoptions']['value']; ?>
'>
<input type='hidden' name='publishoptions' id='publishoptions' value='<?php echo $this->_tpl_vars['fields']['publishoptions']['value']; ?>
'>
<input type='hidden' name='union_modules' id='union_modules' value='<?php echo $this->_tpl_vars['fields']['union_modules']['value']; ?>
'>
<input type='hidden' name='name' id='name' value='<?php echo $this->_tpl_vars['fields']['name']['value']; ?>
'>
<input type='hidden' name='description' id='description' value='<?php echo $this->_tpl_vars['fields']['description']['value']; ?>
'>
<input type='hidden' name='report_status' id='report_status' value='<?php echo $this->_tpl_vars['fields']['report_status']['value']; ?>
'>
<input type='hidden' name='assigned_user_name' id='assigned_user_name' value='<?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
'>
<input type='hidden' name='assigned_user_id' id='assigned_user_id' value='<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
'>
<input type='hidden' name='team_name' id='team_name' value='<?php echo $this->_tpl_vars['fields']['team_name']['value']; ?>
'>
<input type='hidden' name='team_id' id='team_id' value='<?php echo $this->_tpl_vars['fields']['team_id']['value']; ?>
'>
<div id="toolbarArea"></div>
<link rel="stylesheet" type="text/css" href="custom/kinamu/extjs/resources/css/ext-all-notheme.css" />
<link rel="stylesheet" type="text/css" href="custom/kinamu/extjs/resources/css/xtheme-gray.css" />
<script type="text/javascript" src="custom/kinamu/extjs/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="custom/kinamu/extjs/ext-all.js"></script>
<script type="text/javascript" src="modules/KReports/EditView.basic.js"></script>
<div id='toolbarArea' style='margin-bottom: 5px;'></div>
<div id="layoutregion"></div><?php echo $this->_tpl_vars['overlibStuff']; ?>

<script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () { initEditView(document.forms.EditView) });
//window.setTimeout(, 100);
window.onbeforeunload = function () { return onUnloadEditView(); };
</script><?php echo '
<script type="text/javascript">
addToValidate(\'EditView\', \'id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ID','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'name\', \'name\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'EditView\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'EditView\', \'modified_user_id\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'modified_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'description\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'deleted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_id\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'report_module\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODULE','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'report_status\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REPORT_STATUS','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'report_source\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REPORT_SOURCE','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'reportoptions\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REPORTOPTIONS','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'listtype\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LISTTYPE','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'selectionlimit\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SELECTIONLIMIT','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'pdforientation\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PDFORIENTATION','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'pdfoptions\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PDFOPTIONS','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'values_column\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_VALUES','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'values_function\', \'multienum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_VALUES_FUNCTION','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'categories\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CATEGORIES','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'chart_layout\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CHART_LAYOUTS','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'chart_params\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CHART_PARAMS','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'chart_params_new\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CHART_PARAMS','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'chart_height\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CHART_HEIGHT','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'wheregroups\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_WHEREGROUPS','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'whereconditions\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_WHERECONDITION','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'listfields\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LISTFIELDS','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'unionlistfields\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_UNIONLISTFIELDS','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'mapoptions\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MAPOPTIONS','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'publishoptions\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PUBLISHOPTIONS','module' => 'KReports','for_js' => true), $this); echo '\' );
addToValidateBinaryDependency(\'EditView\', \'assigned_user_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'KReports','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'KReports','for_js' => true), $this); echo '\', \'assigned_user_id\' );
</script>'; ?>
