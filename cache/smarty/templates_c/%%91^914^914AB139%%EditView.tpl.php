<?php /* Smarty version 2.6.11, created on 2012-09-06 08:54:11
         compiled from cache/modules/Calls/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/Calls/EditView.tpl', 43, false),array('function', 'counter', 'cache/modules/Calls/EditView.tpl', 48, false),array('function', 'sugar_translate', 'cache/modules/Calls/EditView.tpl', 52, false),array('function', 'html_options', 'cache/modules/Calls/EditView.tpl', 90, false),array('function', 'sugar_getimagepath', 'cache/modules/Calls/EditView.tpl', 116, false),array('modifier', 'default', 'cache/modules/Calls/EditView.tpl', 49, false),array('modifier', 'strip_semicolon', 'cache/modules/Calls/EditView.tpl', 60, false),)), $this); ?>


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
<input type="hidden" name="isSaveAndNew" value="false">   
<input type="hidden" name="send_invites">   
<input type="hidden" name="user_invitees">   
<input type="hidden" name="lead_invitees">   
<input type="hidden" name="contact_invitees">   
<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="fill_invitees();document.EditView.action.value='Save'; document.EditView.return_action.value='DetailView'; <?php if (isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true'): ?>document.EditView.return_id.value=''; <?php endif; ?>formSubmitCheck();;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
">
<?php if (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $_REQUEST['return_id'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="window.location.href='index.php?action=DetailView&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'; return false;" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" type="button" id="CANCEL"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $this->_tpl_vars['fields']['id']['value'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="window.location.href='index.php?action=DetailView&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'; return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php elseif (empty ( $_REQUEST['return_action'] ) || empty ( $_REQUEST['return_id'] ) && ! empty ( $this->_tpl_vars['fields']['id']['value'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="window.location.href='index.php?action=index&module=Calls'; return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="window.location.href='index.php?action=index&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'; return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php endif; ?>
<input title="<?php echo $this->_tpl_vars['MOD']['LBL_SEND_BUTTON_TITLE']; ?>
" class="button" onclick="document.EditView.send_invites.value='1';fill_invitees();document.EditView.action.value='Save';document.EditView.return_action.value='EditView';document.EditView.return_module.value='<?php echo $_REQUEST['return_module']; ?>
';formSubmitCheck();;" type="button" name="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_SEND_BUTTON_LABEL']; ?>
">
<?php if ($this->_tpl_vars['fields']['status']['value'] != 'Held'): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_AND_CREATE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_AND_CREATE_BUTTON_KEY']; ?>
" class="button" onclick="fill_invitees(); document.EditView.status.value='Held'; document.EditView.action.value='Save'; document.EditView.return_module.value='Calls'; document.EditView.isDuplicate.value=true; document.EditView.isSaveAndNew.value=true; document.EditView.return_action.value='EditView'; document.EditView.return_id.value='<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'; formSubmitCheck();" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_AND_CREATE_BUTTON_LABEL']; ?>
"><?php endif;  if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Calls", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="submit" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?>
</td>
<td align='right'>
<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="EditView_tabs"
>
<div >
<div id="LBL_CALL_INFORMATION">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="<?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view') : smarty_modifier_default($_tmp, 'edit view')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CALL_INFORMATION','module' => 'Calls'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='name_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBJECT','module' => 'Calls'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' size='30' 
maxlength='50' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='100' > 
<td valign="top" id='status_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_STATUS','module' => 'Calls'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<select name="<?php echo $this->_tpl_vars['fields']['status']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['status']['name']; ?>
" 
title='' tabindex="101"  
>
<?php if (isset ( $this->_tpl_vars['fields']['status']['value'] ) && $this->_tpl_vars['fields']['status']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['status']['options'],'selected' => $this->_tpl_vars['fields']['status']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['status']['options'],'selected' => $this->_tpl_vars['fields']['status']['default']), $this);?>

<?php endif; ?>
</select>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='date_start_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_TIME','module' => 'Calls'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<table border="0" cellpadding="0" cellspacing="0" class="dateTime">
<tr valign="middle">
<td nowrap>
<input autocomplete="off" type="text" id="<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_date" value="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['date_start']['name']]['value']; ?>
" size="11" maxlength="10" title='' tabindex="102" onblur="combo_<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
.update(); SugarWidgetScheduler.update_time();" onchange="combo_<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
.update(); SugarWidgetScheduler.update_time();">
<img border="0" src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'jscalendar.gif'), $this);?>
" alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" id="<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_trigger" name="<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_trigger" align="absmiddle">&nbsp;
</td>
<td nowrap>
<div id="<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_time_section"></div>
</td>
</tr>
</table>
<input type="hidden" class="DateTimeCombo" id="<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['date_start']['name']]['value']; ?>
">
<script type="text/javascript" src="include/SugarFields/Fields/Datetimecombo/Datetimecombo.js"></script>
<script type="text/javascript">
var combo_<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
 = new Datetimecombo("<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['fields']['date_start']['name']]['value']; ?>
", "<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
", "<?php echo $this->_tpl_vars['TIME_FORMAT']; ?>
", "102", '', false, true);
//Render the remaining widget fields
text = combo_<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
.html('SugarWidgetScheduler.update_time();');
document.getElementById('<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_time_section').innerHTML = text;

//Call eval on the update function to handle updates to calendar picker object
eval(combo_<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
.jsscript('SugarWidgetScheduler.update_time();'));

//bug 47718: this causes too many addToValidates to be called, resulting in the error messages being displayed multiple times
//    removing it here to mirror the Datetime SugarField, where the validation is not added at this level
//addToValidate('<?php echo $this->_tpl_vars['form_name']; ?>
',"<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_date",'date',false,"<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
");
addToValidateBinaryDependency('<?php echo $this->_tpl_vars['form_name']; ?>
',"<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_hours", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_HOURS']; ?>
" ,"<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_date");
addToValidateBinaryDependency('<?php echo $this->_tpl_vars['form_name']; ?>
', "<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_minutes", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_MINUTES']; ?>
" ,"<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_date");
addToValidateBinaryDependency('<?php echo $this->_tpl_vars['form_name']; ?>
', "<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_meridiem", 'alpha', false, "<?php echo $this->_tpl_vars['APP']['ERR_MISSING_REQUIRED_FIELDS']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_MERIDIEM']; ?>
","<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_date");

YAHOO.util.Event.onDOMReady(function()
{

	Calendar.setup ({
	onClose : update_<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
,
	inputField : "<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_date",
	ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
	daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
	button : "<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
_trigger",
	singleClick : true,
	step : 1,
	weekNumbers: false,
	comboObject: combo_<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>

	});
	
	//Call update for first time to round hours and minute values
	combo_<?php echo $this->_tpl_vars['fields']['date_start']['name']; ?>
.update(false);

}); 
</script>
<td valign="top" id='parent_name_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_RELATED_TO','module' => 'Calls'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<select name='parent_type' tabindex="103" id='parent_type' title='' 
onchange='document.<?php echo $this->_tpl_vars['form_name']; ?>
.<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
.value="";document.<?php echo $this->_tpl_vars['form_name']; ?>
.parent_id.value=""; <?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
changeQS(); checkParentType(document.<?php echo $this->_tpl_vars['form_name']; ?>
.parent_type.value, document.<?php echo $this->_tpl_vars['form_name']; ?>
.btn_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
);'>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['parent_name']['options'],'selected' => $this->_tpl_vars['fields']['parent_type']['value'],'sortoptions' => true), $this);?>

</select>
<?php if (empty ( $this->_tpl_vars['fields']['parent_name']['options'][$this->_tpl_vars['fields']['parent_type']['value']] )):  $this->assign('keepParent', 0);  else:  $this->assign('keepParent', 1);  endif; ?>
<input type="text" name="<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" class="sqsEnabled" tabindex="103" 
size="" <?php if ($this->_tpl_vars['keepParent']): ?>value="<?php echo $this->_tpl_vars['fields']['parent_name']['value']; ?>
"<?php endif; ?> autocomplete="off"><input type="hidden" name="<?php echo $this->_tpl_vars['fields']['parent_id']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['parent_id']['name']; ?>
"  
<?php if ($this->_tpl_vars['keepParent']): ?>value="<?php echo $this->_tpl_vars['fields']['parent_id']['value']; ?>
"<?php endif; ?>>
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" tabindex="103" 
title="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_KEY']; ?>
" class="button firstChild" value="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
" 
onclick='open_popup(document.<?php echo $this->_tpl_vars['form_name']; ?>
.parent_type.value, 600, 400, "", true, false, <?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name"}}'; ?>
, "single", true);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" tabindex="103" title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_KEY']; ?>
" class="button lastChild" onclick="this.form.<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
.value = ''; this.form.<?php echo $this->_tpl_vars['fields']['parent_id']['name']; ?>
.value = '';" value="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
function <?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
changeQS() <?php echo '{
'; ?>

	new_module = document.forms["<?php echo $this->_tpl_vars['form_name']; ?>
"].elements["parent_type"].value;
<?php echo '
	if(typeof(disabledModules[new_module]) != \'undefined\') {
'; ?>

		sqs_objects["<?php echo $this->_tpl_vars['form_name']; ?>
_parent_name"]["disable"] = true;
		document.forms["<?php echo $this->_tpl_vars['form_name']; ?>
"].elements["parent_name"].readOnly = true;
<?php echo '
	} else {
'; ?>

		sqs_objects["<?php echo $this->_tpl_vars['form_name']; ?>
_parent_name"]["disable"] = false;
		document.forms["<?php echo $this->_tpl_vars['form_name']; ?>
"].elements["parent_name"].readOnly = false;
<?php echo '
	}
'; ?>

	sqs_objects["<?php echo $this->_tpl_vars['form_name']; ?>
_parent_name"]["modules"] = new Array(new_module);
	if(typeof QSProcessedFieldsArray != 'undefined')
<?php echo '
    {
'; ?>

	   QSProcessedFieldsArray["<?php echo $this->_tpl_vars['form_name']; ?>
_parent_name"] = false;
<?php echo '
	}	
'; ?>
    
    enableQS(false);
<?php echo '
}
'; ?>

</script>
<?php echo '
<script>var disabledModules=[];</script>
'; ?>

<?php echo '
<script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'EditView_parent_name\']={"form":"EditView","method":"query","modules":["';  if (! empty ( $this->_tpl_vars['fields']['parent_type']['value'] )):  echo $this->_tpl_vars['fields']['parent_type']['value'];  else: ?>Accounts<?php endif;  echo '"],"group":"or","field_list":["name","id"],"populate_list":["parent_name","parent_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>
'; ?>

</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='duration_hours_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DURATION','module' => 'Calls'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<?php echo '<script type="text/javascript">function isValidDuration() { form = document.getElementById(\'EditView\'); if ( form.duration_hours.value + form.duration_minutes.value <= 0 ) { alert(\'';  echo $this->_tpl_vars['MOD']['NOTICE_DURATION_TIME'];  echo '\'); return false; } return true; }</script>'; ?>
<input tabindex="104"  id="duration_hours" name="duration_hours" tabindex="1" size="2" maxlength="2" type="text" value="<?php echo $this->_tpl_vars['fields']['duration_hours']['value']; ?>
" onkeyup="SugarWidgetScheduler.update_time();"/><?php echo $this->_tpl_vars['fields']['duration_minutes']['value']; ?>
&nbsp;<span class="dateFormat"><?php echo $this->_tpl_vars['MOD']['LBL_HOURS_MINUTES']; ?>
</span>
<td valign="top" id='reminder_time_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REMINDER','module' => 'Calls'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<?php if ($this->_tpl_vars['fields']['reminder_checked']['value'] == '1'):  $this->assign('REMINDER_TIME_DISPLAY', 'inline');  $this->assign('REMINDER_CHECKED', 'checked');  else:  $this->assign('REMINDER_TIME_DISPLAY', 'none');  $this->assign('REMINDER_CHECKED', "");  endif; ?><input tabindex="105"  name="reminder_checked" type="hidden" value="0"><input tabindex="105"  name="reminder_checked" onclick='toggleDisplay("should_remind_list");' type="checkbox" class="checkbox" value="1" <?php echo $this->_tpl_vars['REMINDER_CHECKED']; ?>
><div id="should_remind_list" style="display:<?php echo $this->_tpl_vars['REMINDER_TIME_DISPLAY']; ?>
"><?php echo $this->_tpl_vars['fields']['reminder_time']['value']; ?>
</div>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='description_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Calls'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (empty ( $this->_tpl_vars['fields']['description']['value'] )):  $this->assign('value', $this->_tpl_vars['fields']['description']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['description']['value']);  endif; ?>  
<textarea  id='<?php echo $this->_tpl_vars['fields']['description']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['description']['name']; ?>
'
rows="6" 
cols="80" 
title='' tabindex="107" ><?php echo $this->_tpl_vars['value']; ?>
</textarea>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_CALL_INFORMATION").style.display='none';</script>
<?php endif; ?>
<div id="LBL_PANEL_ASSIGNMENT">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="<?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view') : smarty_modifier_default($_tmp, 'edit view')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PANEL_ASSIGNMENT','module' => 'Calls'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='assigned_user_name_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'Calls'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" class="sqsEnabled" tabindex="108" id="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" tabindex="108" title="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_KEY']; ?>
" class="button firstChild" value="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
" 
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['assigned_user_name']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" tabindex="108" title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_KEY']; ?>
" class="button lastChild" 
onclick="this.form.<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
.value = ''; this.form.<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
.value = '';" 
value="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
<!--
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
"] = false;
	

enableQS(false);
-->	
</script>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_PANEL_ASSIGNMENT").style.display='none';</script>
<?php endif; ?>
</div></div>

</form>
<?php echo $this->_tpl_vars['set_focus_block']; ?>

<!-- Begin Meta-Data Javascript -->
<script type="text/javascript"><?php echo $this->_tpl_vars['JSON_CONFIG_JAVASCRIPT']; ?>
</script>
<script type="text/javascript" src="include/javascript/jsclass_base.js?s=<?php echo $this->_tpl_vars['SUGAR_VERSION']; ?>
&c=<?php echo $this->_tpl_vars['JS_CUSTOM_VERSION']; ?>
"></script>
<script type="text/javascript" src="include/javascript/jsclass_async.js?s=<?php echo $this->_tpl_vars['SUGAR_VERSION']; ?>
&c=<?php echo $this->_tpl_vars['JS_CUSTOM_VERSION']; ?>
"></script>
<script type="text/javascript" src="modules/Meetings/jsclass_scheduler.js?s=<?php echo $this->_tpl_vars['SUGAR_VERSION']; ?>
&c=<?php echo $this->_tpl_vars['JS_CUSTOM_VERSION']; ?>
"></script>
<script>toggle_portal_flag();function toggle_portal_flag()  { <?php echo $this->_tpl_vars['TOGGLE_JS']; ?>
 } 
function formSubmitCheck(){if(check_form('EditView') && isValidDuration()){document.EditView.submit();}}</script>
<!-- End Meta-Data Javascript -->
<div class="h3Row" id="scheduler"></div>
<script type="text/javascript">
<?php echo '
function fill_invitees() { 
	if (typeof(GLOBAL_REGISTRY) != \'undefined\')  {    
		SugarWidgetScheduler.fill_invitees(document.EditView);
	} 
}
'; ?>


var root_div = document.getElementById('scheduler');
var sugarContainer_instance = new SugarContainer(document.getElementById('scheduler'));
sugarContainer_instance.start(SugarWidgetScheduler);
<?php echo '
if ( document.getElementById(\'save_and_continue\') ) {
    var oldclick = document.getElementById(\'save_and_continue\').attributes[\'onclick\'].nodeValue;
    document.getElementById(\'save_and_continue\').onclick = function(){
        fill_invitees();
        eval(oldclick);
    }
}
'; ?>

</script>
</form>
<form >
<div class="buttons">
<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="fill_invitees();document.EditView.action.value='Save'; document.EditView.return_action.value='DetailView'; <?php if (isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true'): ?>document.EditView.return_id.value=''; <?php endif; ?>formSubmitCheck();;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
">
<?php if (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $_REQUEST['return_id'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="window.location.href='index.php?action=DetailView&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'; return false;" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" type="button" id="CANCEL"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $this->_tpl_vars['fields']['id']['value'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="window.location.href='index.php?action=DetailView&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'; return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php elseif (empty ( $_REQUEST['return_action'] ) || empty ( $_REQUEST['return_id'] ) && ! empty ( $this->_tpl_vars['fields']['id']['value'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="window.location.href='index.php?action=index&module=Calls'; return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="window.location.href='index.php?action=index&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'; return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php endif; ?>
<input title="<?php echo $this->_tpl_vars['MOD']['LBL_SEND_BUTTON_TITLE']; ?>
" class="button" onclick="document.EditView.send_invites.value='1';fill_invitees();document.EditView.action.value='Save';document.EditView.return_action.value='EditView';document.EditView.return_module.value='<?php echo $_REQUEST['return_module']; ?>
';formSubmitCheck();;" type="button" name="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_SEND_BUTTON_LABEL']; ?>
">
<?php if ($this->_tpl_vars['fields']['status']['value'] != 'Held'): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_AND_CREATE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_AND_CREATE_BUTTON_KEY']; ?>
" class="button" onclick="fill_invitees(); document.EditView.status.value='Held'; document.EditView.action.value='Save'; document.EditView.return_module.value='Calls'; document.EditView.isDuplicate.value=true; document.EditView.isSaveAndNew.value=true; document.EditView.return_action.value='EditView'; document.EditView.return_id.value='<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'; formSubmitCheck();" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE_AND_CREATE_BUTTON_LABEL']; ?>
"><?php endif;  if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Calls", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="submit" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?>
</div>
</form> <?php echo $this->_tpl_vars['overlibStuff']; ?>

<script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () { initEditView(document.forms.EditView) });
//window.setTimeout(, 100);
window.onbeforeunload = function () { return onUnloadEditView(); };
</script><?php echo '
<script type="text/javascript">
addToValidate(\'EditView\', \'id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ID','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'name\', \'name\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBJECT','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'EditView\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'EditView\', \'modified_user_id\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'modified_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'description\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'deleted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_id\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'duration_hours\', \'int\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DURATION_HOURS','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'duration_minutes\', \'int\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DURATION_MINUTES','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'date_start_date\', \'date\', true,\'Start Date\' );
addToValidate(\'EditView\', \'date_end_date\', \'date\', false,\'Date End\' );
addToValidate(\'EditView\', \'parent_type\', \'parent_type\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PARENT_TYPE','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'parent_name\', \'parent\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_RELATED_TO','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'status\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_STATUS','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'direction\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DIRECTION','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'parent_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_RELATED_TO_ID','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'reminder_checked\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REMINDER','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'reminder_time\', \'int\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_REMINDER_TIME','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'outlook_id\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OUTLOOK_ID','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'accept_status\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBJECT','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'set_accept_links\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBJECT','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'contact_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT_NAME','module' => 'Calls','for_js' => true), $this); echo '\' );
addToValidateBinaryDependency(\'EditView\', \'assigned_user_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Calls','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Calls','for_js' => true), $this); echo '\', \'assigned_user_id\' );
</script><script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'EditView_parent_name\']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["parent_name","parent_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_assigned_user_name\']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script>'; ?>
