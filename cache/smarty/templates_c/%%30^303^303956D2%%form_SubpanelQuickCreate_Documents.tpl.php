<?php /* Smarty version 2.6.11, created on 2012-09-07 02:03:46
         compiled from cache/modules/Documents/form_SubpanelQuickCreate_Documents.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/Documents/form_SubpanelQuickCreate_Documents.tpl', 40, false),array('function', 'counter', 'cache/modules/Documents/form_SubpanelQuickCreate_Documents.tpl', 45, false),array('function', 'sugar_translate', 'cache/modules/Documents/form_SubpanelQuickCreate_Documents.tpl', 51, false),array('function', 'html_options', 'cache/modules/Documents/form_SubpanelQuickCreate_Documents.tpl', 63, false),array('function', 'sugar_getimagepath', 'cache/modules/Documents/form_SubpanelQuickCreate_Documents.tpl', 109, false),array('function', 'sugar_image', 'cache/modules/Documents/form_SubpanelQuickCreate_Documents.tpl', 124, false),array('modifier', 'default', 'cache/modules/Documents/form_SubpanelQuickCreate_Documents.tpl', 46, false),array('modifier', 'strip_semicolon', 'cache/modules/Documents/form_SubpanelQuickCreate_Documents.tpl', 52, false),)), $this); ?>


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
<input type="hidden" name="old_id" value="<?php echo $this->_tpl_vars['fields']['document_revision_id']['value']; ?>
">   
<input type="hidden" name="parent_id" value="<?php echo $_REQUEST['parent_id']; ?>
">   
<input type="hidden" name="parent_type" value="<?php echo $_REQUEST['parent_type']; ?>
">   
<?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button" onclick="this.form.action.value='Save';if(check_form('form_SubpanelQuickCreate_Documents'))return SUGAR.subpanelUtils.inlineSave(this.form.id, 'Documents_subpanel_save_button');return false;" type="submit" name="Documents_subpanel_save_button" id="Documents_subpanel_save_button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"><?php endif; ?> 
<input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="return SUGAR.subpanelUtils.cancelCreate('Documents_subpanel_cancel_button');return false;" type="submit" name="Documents_subpanel_cancel_button" id="Documents_subpanel_cancel_button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
"> 
<input title="<?php echo $this->_tpl_vars['APP']['LBL_FULL_FORM_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_FULL_FORM_BUTTON_KEY']; ?>
" class="button" onclick="disableOnUnloadEditView(this.form); this.form.return_action.value='DetailView'; this.form.action.value='EditView'; if(typeof(this.form.to_pdf)!='undefined') this.form.to_pdf.value='0';" type="submit" name="Documents_subpanel_full_form_button" id="Documents_subpanel_full_form_button" value="<?php echo $this->_tpl_vars['APP']['LBL_FULL_FORM_BUTTON_LABEL']; ?>
"> <input type="hidden" name="full_form" value="full_form">
<?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Documents", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="submit" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?>
</td>
<td align='right'>
<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="form_SubpanelQuickCreate_Documents_tabs"
>
<div >
<div id="Default_<?php echo $this->_tpl_vars['module']; ?>
_Subpanel">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="<?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view') : smarty_modifier_default($_tmp, 'edit view')); ?>
">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='status_id_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DOC_STATUS','module' => 'Documents'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<select name="<?php echo $this->_tpl_vars['fields']['status_id']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['status_id']['name']; ?>
" 
title='' tabindex="100"  
>
<?php if (isset ( $this->_tpl_vars['fields']['status_id']['value'] ) && $this->_tpl_vars['fields']['status_id']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['status_id']['options'],'selected' => $this->_tpl_vars['fields']['status_id']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['status_id']['options'],'selected' => $this->_tpl_vars['fields']['status_id']['default']), $this);?>

<?php endif; ?>
</select>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='filename_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FILENAME','module' => 'Documents'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<script type="text/javascript" src='cache/include/externalAPI.cache.js?s=c09566f4951ffd56ce5296e560d540d1&c=1'></script>
<script type="text/javascript" src='include/SugarFields/Fields/File/SugarFieldFile.js?s=c09566f4951ffd56ce5296e560d540d1&c=1'></script>
<?php if (! empty ( $this->_tpl_vars['fields']['filename']['value'] )):  $this->assign('showRemove', true);  else:  $this->assign('showRemove', false);  endif;  if (! empty ( $this->_tpl_vars['fields']['filename']['value'] )):  $this->assign('showRemove', true);  $this->assign('noChange', true);  else:  $this->assign('noChange', false);  endif; ?>
<input type="hidden" name="deleteAttachment" value="0">
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['filename']['value']; ?>
">
<input type="hidden" name="doc_id" id="doc_id" value="<?php echo $this->_tpl_vars['fields']['doc_id']['value']; ?>
">
<input type="hidden" name="doc_url" id="doc_url" value="<?php echo $this->_tpl_vars['fields']['doc_url']['value']; ?>
">
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_old_doctype" id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_old_doctype" value="<?php echo $this->_tpl_vars['fields']['doc_type']['value']; ?>
">
<span id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_old" style="display:<?php if (! $this->_tpl_vars['showRemove']): ?>none;<?php endif; ?>">
<a href="index.php?entryPoint=download&id=<?php echo $this->_tpl_vars['fields']['document_revision_id']['value']; ?>
&type=<?php echo $this->_tpl_vars['module']; ?>
" class="tabDetailViewDFLink"><?php echo $this->_tpl_vars['fields']['filename']['value']; ?>
</a>
<?php if (isset ( $this->_tpl_vars['fields']['doc_type'] ) && ! empty ( $this->_tpl_vars['fields']['doc_type']['value'] ) && $this->_tpl_vars['fields']['doc_type']['value'] != 'Sugar' && ! empty ( $this->_tpl_vars['fields']['doc_url']['value'] )):  ob_start();  echo $this->_tpl_vars['fields']['doc_type']['value']; ?>
_image_inline.png
<?php $this->_smarty_vars['capture']['imageNameCapture'] = ob_get_contents();  $this->assign('imageName', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo $this->_tpl_vars['fields']['doc_url']['value']; ?>
" class="tabDetailViewDFLink" target="_blank"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => $this->_tpl_vars['imageName']), $this);?>
" border="0"></a>
<?php endif;  if (! $this->_tpl_vars['noChange']): ?>
<input type='button' class='button' value='<?php echo $this->_tpl_vars['APP']['LBL_REMOVE']; ?>
' onclick='SUGAR.field.file.deleteAttachment("<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
","doc_type",this);'>
<?php endif; ?>
</span>
<?php if (! $this->_tpl_vars['noChange']): ?>
<span id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_new" style="display:<?php if ($this->_tpl_vars['showRemove']): ?>none;<?php endif; ?>">
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_escaped">
<input id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_file" name="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_file" 
type="file" title='' size="30" 
maxlength="255"
>
<span id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_externalApiSelector" style="display:none;">
<br><h4 id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_externalApiLabel">
<span id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_more"><?php echo smarty_function_sugar_image(array('name' => 'advanced_search','width' => '8px','height' => '8px'), $this);?>
</span>
<span id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_less" style="display: none;"><?php echo smarty_function_sugar_image(array('name' => 'basic_search','width' => '8px','height' => '8px'), $this);?>
</span>
<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_EXTERNAL_API']; ?>
</h4>
<span id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_remoteNameSpan" style="display: none;">
<input type="text" class="sqsEnabled" name="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_remoteName" id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_remoteName" size="30" 
maxlength="255"
autocomplete="off" value="<?php if (! empty ( $this->_tpl_vars['fields'][$this->_sections['doc_id']['index']]['value'] )):  echo $this->_tpl_vars['fields']['filename']['name'];  endif; ?>">
<span class="id-ff multiple">
<button type="button" name="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_remoteSelectBtn" id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_remoteSelectBtn" tabindex="101" title="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_KEY']; ?>
" class="button firstChild" value="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
"
onclick="SUGAR.field.file.openPopup('<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
'); return false;"
><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button
><button type="button" name="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_remoteClearBtn" id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_remoteClearBtn" tabindex="101" title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_KEY']; ?>
" class="button lastChild" value="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
"
onclick="SUGAR.field.file.clearRemote('<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
'); return false;"
><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
</span>
<div style="display: none;" id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_securityLevelBox">
<b><?php echo $this->_tpl_vars['APP']['LBL_EXTERNAL_SECURITY_LEVEL']; ?>
: </b>
<select name="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_securityLevel" id="<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_securityLevel">
</select>
</div>
<script type="text/javascript">
YAHOO.util.Event.onDOMReady(function() {
SUGAR.field.file.setupEapiShowHide("<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
","doc_type","<?php echo $this->_tpl_vars['form_name']; ?>
");
});

if ( typeof(sqs_objects) == 'undefined' ) {
    sqs_objects = new Array;
}

sqs_objects["<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_remoteName"] = {
"form":"<?php echo $this->_tpl_vars['form_name']; ?>
",
"method":"externalApi",
"api":"",
"modules":["EAPM"],
"field_list":["name", "id", "url", "id"],
"populate_list":["<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_remoteName", "doc_id", "doc_url", "<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
"],
"required_list":["name"],
"conditions":[],
"no_match_text":"No Match"
};

if(typeof QSProcessedFieldsArray != 'undefined') {
	QSProcessedFieldsArray["<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_remoteName"] = false;
}
<?php if ($this->_tpl_vars['showRemove'] && strlen ( 'doc_type' ) > 0): ?>
document.getElementById("doc_type").disabled = true;
<?php endif; ?>
enableQS(false);
</script>
<?php else: ?>

<script type="text/javascript">
YAHOO.util.Event.onDOMReady(function() 
{
document.getElementById("doc_type").disabled = true;
});
</script>
<?php endif; ?>
<script type="text/javascript">

var <?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_setFileName = function()
<?php echo '
{
    var dom = YAHOO.util.Dom;
'; ?>
    
    sourceElement = "<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_file";
    targetElement = "document_name";
	src = new String(dom.get(sourceElement).value);
	target = new String(dom.get(targetElement).value);
<?php echo '
	if (target.length == 0) 
	{
		lastindex=src.lastIndexOf("/");
		if (lastindex == -1) {
			lastindex=src.lastIndexOf("\\\\");
		} 
		if (lastindex == -1) {
			dom.get(targetElement).value=src;
		} else {
			dom.get(targetElement).value=src.substr(++lastindex, src.length);
		}	
	}	
}
'; ?>


YAHOO.util.Event.onDOMReady(function() 
{
if(document.getElementById("document_name"))
{
YAHOO.util.Event.addListener('<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_file', 'change', <?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_setFileName);
YAHOO.util.Event.addListener(['<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_file', 'doc_type'], 'change', SUGAR.field.file.checkFileExtension,{ fileEl: '<?php echo $this->_tpl_vars['fields']['filename']['name']; ?>
_file', targEl: 'document_name'});
}
});
</script>
</span>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='document_name_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Documents'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['document_name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['document_name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['document_name']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['document_name']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['document_name']['name']; ?>
' size='30' 
maxlength='255' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='102' > 
<td valign="top" id='revision_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DOC_VERSION','module' => 'Documents'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['revision']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['revision']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['revision']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['revision']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['revision']['name']; ?>
' size='30' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='103' > 
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='active_date_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DOC_ACTIVE_DATE','module' => 'Documents'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="dateTime">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['active_date']['value']); ?>
<input class="date_input" autocomplete="off" type="text" name="<?php echo $this->_tpl_vars['fields']['active_date']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['active_date']['name']; ?>
" value="<?php echo $this->_tpl_vars['date_value']; ?>
" title=''  tabindex='104' size="11" maxlength="10" >
<img border="0" src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'jscalendar.gif'), $this);?>
" alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" id="<?php echo $this->_tpl_vars['fields']['active_date']['name']; ?>
_trigger" align="absmiddle" />
</span>
<script type="text/javascript">
Calendar.setup ({
inputField : "<?php echo $this->_tpl_vars['fields']['active_date']['name']; ?>
",
ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['fields']['active_date']['name']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
step : 1,
weekNumbers:false
}
);
</script>
<td valign="top" id='category_id_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SF_CATEGORY','module' => 'Documents'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<select name="<?php echo $this->_tpl_vars['fields']['category_id']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['category_id']['name']; ?>
" 
title='' tabindex="105"  
>
<?php if (isset ( $this->_tpl_vars['fields']['category_id']['value'] ) && $this->_tpl_vars['fields']['category_id']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['category_id']['options'],'selected' => $this->_tpl_vars['fields']['category_id']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['category_id']['options'],'selected' => $this->_tpl_vars['fields']['category_id']['default']), $this);?>

<?php endif; ?>
</select>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='description_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Documents'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (empty ( $this->_tpl_vars['fields']['description']['value'] )):  $this->assign('value', $this->_tpl_vars['fields']['description']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['description']['value']);  endif; ?>  
<textarea  id='<?php echo $this->_tpl_vars['fields']['description']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['description']['name']; ?>
'
rows="10" 
cols="120" 
title='' tabindex="106" ><?php echo $this->_tpl_vars['value']; ?>
</textarea>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("DEFAULT").style.display='none';</script>
<?php endif; ?>
</div></div>

<div class="buttons">
<?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button" onclick="this.form.action.value='Save';if(check_form('form_SubpanelQuickCreate_Documents'))return SUGAR.subpanelUtils.inlineSave(this.form.id, 'Documents_subpanel_save_button');return false;" type="submit" name="Documents_subpanel_save_button" id="Documents_subpanel_save_button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"><?php endif; ?> 
<input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="return SUGAR.subpanelUtils.cancelCreate('Documents_subpanel_cancel_button');return false;" type="submit" name="Documents_subpanel_cancel_button" id="Documents_subpanel_cancel_button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
"> 
<input title="<?php echo $this->_tpl_vars['APP']['LBL_FULL_FORM_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_FULL_FORM_BUTTON_KEY']; ?>
" class="button" onclick="disableOnUnloadEditView(this.form); this.form.return_action.value='DetailView'; this.form.action.value='EditView'; if(typeof(this.form.to_pdf)!='undefined') this.form.to_pdf.value='0';" type="submit" name="Documents_subpanel_full_form_button" id="Documents_subpanel_full_form_button" value="<?php echo $this->_tpl_vars['APP']['LBL_FULL_FORM_BUTTON_LABEL']; ?>
"> <input type="hidden" name="full_form" value="full_form">
<?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Documents", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="submit" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?>
</div>
</form>
<?php echo $this->_tpl_vars['set_focus_block']; ?>

<?php echo $this->_tpl_vars['overlibStuff']; ?>

<script type="text/javascript">
YAHOO.util.Event.onContentReady("form_SubpanelQuickCreate_Documents",
    function () { initEditView(document.forms.form_SubpanelQuickCreate_Documents) });
//window.setTimeout(, 100);
window.onbeforeunload = function () { return onUnloadEditView(); };
</script><?php echo '
<script type="text/javascript">
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ID','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'name\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'modified_user_id\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'modified_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'created_by\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'created_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'description\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'deleted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'assigned_user_id\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'assigned_user_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'document_name\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'doc_id\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DOC_ID','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'doc_type\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DOC_TYPE','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'doc_url\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DOC_URL','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'filename\', \'file\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FILENAME','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'active_date\', \'date\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DOC_ACTIVE_DATE','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'exp_date\', \'date\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DOC_EXP_DATE','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'category_id\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SF_CATEGORY','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'subcategory_id\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SF_SUBCATEGORY','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'status_id\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DOC_STATUS','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'status\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DOC_STATUS','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'document_revision_id\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LATEST_REVISION','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'revision\', \'varchar\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DOC_VERSION','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'last_rev_created_name\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LAST_REV_CREATOR','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'last_rev_mime_type\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LAST_REV_MIME_TYPE','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'latest_revision\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LATEST_REVISION','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'last_rev_create_date\', \'date\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LAST_REV_CREATE_DATE','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'related_doc_id\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RELATED_DOCUMENT_ID','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'related_doc_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DET_RELATED_DOCUMENT','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'related_doc_rev_id\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RELATED_DOCUMENT_REVISION_ID','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'related_doc_rev_number\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DET_RELATED_DOCUMENT_VERSION','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'is_template\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_IS_TEMPLATE','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'template_type\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEMPLATE_TYPE','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'latest_revision_name\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LASTEST_REVISION_NAME','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'selected_revision_name\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SELECTED_REVISION_NAME','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'contract_status\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTRACT_STATUS','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'contract_name\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTRACT_NAME','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'linked_id\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LINKED_ID','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'selected_revision_id\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SELECTED_REVISION_ID','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'latest_revision_id\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LATEST_REVISION_ID','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidate(\'form_SubpanelQuickCreate_Documents\', \'selected_revision_filename\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SELECTED_REVISION_FILENAME','module' => 'Documents','for_js' => true), $this); echo '\' );
addToValidateBinaryDependency(\'form_SubpanelQuickCreate_Documents\', \'assigned_user_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Documents','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Documents','for_js' => true), $this); echo '\', \'assigned_user_id\' );
</script>'; ?>
