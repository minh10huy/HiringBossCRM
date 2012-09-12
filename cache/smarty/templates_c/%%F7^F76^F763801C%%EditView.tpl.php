<?php /* Smarty version 2.6.11, created on 2012-09-06 08:05:22
         compiled from cache/modules/Accounts/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/Accounts/EditView.tpl', 36, false),array('function', 'counter', 'cache/modules/Accounts/EditView.tpl', 41, false),array('function', 'sugar_translate', 'cache/modules/Accounts/EditView.tpl', 45, false),array('function', 'sugar_getjspath', 'cache/modules/Accounts/EditView.tpl', 133, false),array('function', 'html_options', 'cache/modules/Accounts/EditView.tpl', 304, false),array('function', 'sugar_getimagepath', 'cache/modules/Accounts/EditView.tpl', 543, false),array('modifier', 'default', 'cache/modules/Accounts/EditView.tpl', 42, false),array('modifier', 'strip_semicolon', 'cache/modules/Accounts/EditView.tpl', 53, false),)), $this); ?>


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
<?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="<?php if ($this->_tpl_vars['isDuplicate']): ?>this.form.return_id.value=''; <?php endif; ?>this.form.action.value='Save'; return check_form('EditView');" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" id="SAVE"><?php endif; ?> 
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
" class="button" onclick="window.location.href='index.php?action=index&module=Accounts'; return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="window.location.href='index.php?action=index&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'; return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php endif;  if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Accounts", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="submit" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
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
<div id="LBL_ACCOUNT_INFORMATION">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="<?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view') : smarty_modifier_default($_tmp, 'edit view')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCOUNT_INFORMATION','module' => 'Accounts'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='name_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
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
maxlength='150' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='100' > 
<td valign="top" id='phone_office_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_OFFICE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['phone_office']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['phone_office']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['phone_office']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['phone_office']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['phone_office']['name']; ?>
' size='30' maxlength='100' value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='101' class="phone" >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='website_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_WEBSITE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['website']['value'] )): ?>
<input type='text' name='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' size='30' 
maxlength='255' value='<?php echo $this->_tpl_vars['fields']['website']['value']; ?>
' title='' tabindex='102'>
<?php else: ?>
<input type='text' name='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' size='30' 
maxlength='255' 
<?php if ($this->_tpl_vars['displayView'] == 'advanced_search' || $this->_tpl_vars['displayView'] == 'basic_search'): ?>value=''<?php else: ?>value='http://'<?php endif; ?> title='' tabindex='102'>
<?php endif; ?>
<td valign="top" id='phone_fax_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FAX','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['phone_fax']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['phone_fax']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['phone_fax']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['phone_fax']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['phone_fax']['name']; ?>
' size='30' maxlength='100' value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='103' class="phone" >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='2'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<script type="text/javascript" src='<?php echo smarty_function_sugar_getjspath(array('file' => "include/SugarFields/Fields/Address/SugarFieldAddress.js"), $this);?>
'></script>
<fieldset id='BILLING_address_fieldset'>
<legend><?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS','module' => ''), $this);?>
</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="billing_address_street_label" width='25%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_STREET','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['billing_address_street']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td width="*">
<textarea id="billing_address_street" name="billing_address_street" maxlength="150" rows="2" cols="30" tabindex="104"><?php echo $this->_tpl_vars['fields']['billing_address_street']['value']; ?>
</textarea>
</td>
</tr>
<tr>
<td id="billing_address_city_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CITY','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['billing_address_city']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="billing_address_city" id="billing_address_city" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['billing_address_city']['value']; ?>
' tabindex="104">
</td>
</tr>
<tr>
<td id="billing_address_state_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_STATE','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['billing_address_state']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="billing_address_state" id="billing_address_state" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['billing_address_state']['value']; ?>
' tabindex="104">
</td>
</tr>
<tr>
<td id="billing_address_postalcode_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_POSTAL_CODE','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['billing_address_postalcode']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="billing_address_postalcode" id="billing_address_postalcode" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['billing_address_postalcode']['value']; ?>
' tabindex="104">
</td>
</tr>
<tr>
<td id="billing_address_country_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COUNTRY','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['billing_address_country']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="billing_address_country" id="billing_address_country" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['billing_address_country']['value']; ?>
' tabindex="104">
</td>
</tr>
<tr>
<td colspan='2' NOWRAP>&nbsp;</td>
</tr>
</table>
</fieldset>
<script type="text/javascript">
    var fromKey = '';
    var toKey = 'billing';
    var checkbox = toKey + "_checkbox";
    var obj = new TestCheckboxReady(checkbox);
</script>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='2'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<script type="text/javascript" src='<?php echo smarty_function_sugar_getjspath(array('file' => "include/SugarFields/Fields/Address/SugarFieldAddress.js"), $this);?>
'></script>
<fieldset id='SHIPPING_address_fieldset'>
<legend><?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS','module' => ''), $this);?>
</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="shipping_address_street_label" width='25%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_STREET','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['shipping_address_street']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td width="*">
<textarea id="shipping_address_street" name="shipping_address_street" maxlength="150" rows="2" cols="30" tabindex="105"><?php echo $this->_tpl_vars['fields']['shipping_address_street']['value']; ?>
</textarea>
</td>
</tr>
<tr>
<td id="shipping_address_city_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CITY','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['shipping_address_city']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="shipping_address_city" id="shipping_address_city" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['shipping_address_city']['value']; ?>
' tabindex="105">
</td>
</tr>
<tr>
<td id="shipping_address_state_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_STATE','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['shipping_address_state']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="shipping_address_state" id="shipping_address_state" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['shipping_address_state']['value']; ?>
' tabindex="105">
</td>
</tr>
<tr>
<td id="shipping_address_postalcode_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_POSTAL_CODE','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['shipping_address_postalcode']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="shipping_address_postalcode" id="shipping_address_postalcode" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['shipping_address_postalcode']['value']; ?>
' tabindex="105">
</td>
</tr>
<tr>
<td id="shipping_address_country_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COUNTRY','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['shipping_address_country']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="shipping_address_country" id="shipping_address_country" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['shipping_address_country']['value']; ?>
' tabindex="105">
</td>
</tr>
<tr>
<td scope='row' NOWRAP>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COPY_ADDRESS_FROM_LEFT','module' => ''), $this);?>
:
</td>
<td>
<input id="shipping_checkbox" name="shipping_checkbox" type="checkbox" onclick="syncFields('billing', 'shipping');">
</td>
</tr>
</table>
</fieldset>
<script type="text/javascript">
    var fromKey = 'billing';
    var toKey = 'shipping';
    var checkbox = toKey + "_checkbox";
    var obj = new TestCheckboxReady(checkbox);
</script>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='contact_c_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<select name="<?php echo $this->_tpl_vars['fields']['contact_c']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['contact_c']['name']; ?>
" 
title='' tabindex="106"  
>
<?php if (isset ( $this->_tpl_vars['fields']['contact_c']['value'] ) && $this->_tpl_vars['fields']['contact_c']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['contact_c']['options'],'selected' => $this->_tpl_vars['fields']['contact_c']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['contact_c']['options'],'selected' => $this->_tpl_vars['fields']['contact_c']['default']), $this);?>

<?php endif; ?>
</select>
<td valign="top" id='accsigned_c_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ACCSIGNED','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<select name="<?php echo $this->_tpl_vars['fields']['accsigned_c']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['accsigned_c']['name']; ?>
" 
title='' tabindex="107"  
>
<?php if (isset ( $this->_tpl_vars['fields']['accsigned_c']['value'] ) && $this->_tpl_vars['fields']['accsigned_c']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['accsigned_c']['options'],'selected' => $this->_tpl_vars['fields']['accsigned_c']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['accsigned_c']['options'],'selected' => $this->_tpl_vars['fields']['accsigned_c']['default']), $this);?>

<?php endif; ?>
</select>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='email1_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id='email1'>
<?php echo $this->_tpl_vars['fields']['email1']['value']; ?>
</span>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='description_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
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
title='' tabindex="109" ><?php echo $this->_tpl_vars['value']; ?>
</textarea>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_ACCOUNT_INFORMATION").style.display='none';</script>
<?php endif; ?>
<div id="LBL_PANEL_ADVANCED">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="<?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view') : smarty_modifier_default($_tmp, 'edit view')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PANEL_ADVANCED','module' => 'Accounts'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='account_type_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TYPE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<select name="<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
" 
title='' tabindex="110"  
>
<?php if (isset ( $this->_tpl_vars['fields']['account_type']['value'] ) && $this->_tpl_vars['fields']['account_type']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['account_type']['options'],'selected' => $this->_tpl_vars['fields']['account_type']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['account_type']['options'],'selected' => $this->_tpl_vars['fields']['account_type']['default']), $this);?>

<?php endif; ?>
</select>
<td valign="top" id='industry_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_INDUSTRY','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<select name="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
" 
title='' tabindex="111"  
>
<?php if (isset ( $this->_tpl_vars['fields']['industry']['value'] ) && $this->_tpl_vars['fields']['industry']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['industry']['options'],'selected' => $this->_tpl_vars['fields']['industry']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['industry']['options'],'selected' => $this->_tpl_vars['fields']['industry']['default']), $this);?>

<?php endif; ?>
</select>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='annual_revenue_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ANNUAL_REVENUE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['annual_revenue']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['annual_revenue']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['annual_revenue']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['annual_revenue']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['annual_revenue']['name']; ?>
' size='30' 
maxlength='100' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='112' > 
<td valign="top" id='employees_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_EMPLOYEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['employees']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['employees']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['employees']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['employees']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['employees']['name']; ?>
' size='30' 
maxlength='10' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='113' > 
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='sic_code_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SIC_CODE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['sic_code']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['sic_code']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['sic_code']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['sic_code']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['sic_code']['name']; ?>
' size='30' 
maxlength='10' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='114' > 
<td valign="top" id='ticker_symbol_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TICKER_SYMBOL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['ticker_symbol']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['ticker_symbol']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['ticker_symbol']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['ticker_symbol']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['ticker_symbol']['name']; ?>
' size='30' 
maxlength='10' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='115' > 
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='parent_name_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_OF','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" class="sqsEnabled" tabindex="116" id="<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['parent_name']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['parent_name']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['parent_name']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['parent_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" tabindex="116" title="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_KEY']; ?>
" class="button firstChild" value="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
" 
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['parent_name']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" tabindex="116" title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_KEY']; ?>
" class="button lastChild" 
onclick="this.form.<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
.value = ''; this.form.<?php echo $this->_tpl_vars['fields']['parent_name']['id_name']; ?>
.value = '';" 
value="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
<!--
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
"] = false;
	

enableQS(false);
-->	
</script>
<td valign="top" id='ownership_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_OWNERSHIP','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['ownership']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['ownership']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['ownership']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['ownership']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['ownership']['name']; ?>
' size='30' 
maxlength='100' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='117' > 
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='campaign_name_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" class="sqsEnabled" tabindex="118" id="<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['campaign_name']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['campaign_name']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['campaign_name']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['campaign_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" tabindex="118" title="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_KEY']; ?>
" class="button firstChild" value="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
" 
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['campaign_name']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"campaign_id","name":"campaign_name"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
" tabindex="118" title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_KEY']; ?>
" class="button lastChild" 
onclick="this.form.<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
.value = ''; this.form.<?php echo $this->_tpl_vars['fields']['campaign_name']['id_name']; ?>
.value = '';" 
value="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
<!--
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['campaign_name']['name']; ?>
"] = false;
	

enableQS(false);
-->	
</script>
<td valign="top" id='rating_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_RATING','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['rating']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['rating']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['rating']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['rating']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['rating']['name']; ?>
' size='30' 
maxlength='100' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='119' > 
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_PANEL_ADVANCED").style.display='none';</script>
<?php endif; ?>
<div id="LBL_PANEL_ASSIGNMENT">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="<?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view') : smarty_modifier_default($_tmp, 'edit view')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PANEL_ASSIGNMENT','module' => 'Accounts'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='assigned_user_name_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" class="sqsEnabled" tabindex="120" id="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
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
" tabindex="120" title="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_TITLE']; ?>
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
" tabindex="120" title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
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
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_PANEL_ASSIGNMENT").style.display='none';</script>
<?php endif; ?>
</div></div>

<div class="buttons">
<?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="<?php if ($this->_tpl_vars['isDuplicate']): ?>this.form.return_id.value=''; <?php endif; ?>this.form.action.value='Save'; return check_form('EditView');" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" id="SAVE"><?php endif; ?> 
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
" class="button" onclick="window.location.href='index.php?action=index&module=Accounts'; return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="window.location.href='index.php?action=index&module=<?php echo $_REQUEST['return_module']; ?>
&record=<?php echo $_REQUEST['return_id']; ?>
'; return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php endif;  if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Accounts", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="submit" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?>
</div>
</form>
<?php echo $this->_tpl_vars['set_focus_block']; ?>

<?php echo $this->_tpl_vars['overlibStuff']; ?>

<script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () { initEditView(document.forms.EditView) });
//window.setTimeout(, 100);
window.onbeforeunload = function () { return onUnloadEditView(); };
</script><?php echo '
<script type="text/javascript">
addToValidate(\'EditView\', \'id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ID','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'name\', \'name\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'EditView\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'EditView\', \'modified_user_id\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'modified_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'description\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'deleted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_id\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'account_type\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TYPE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'industry\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_INDUSTRY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'annual_revenue\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ANNUAL_REVENUE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'phone_fax\', \'phone\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_FAX','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_street\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_street_2\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET_2','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_street_3\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET_3','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_street_4\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET_4','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_city\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_CITY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_state\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STATE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_postalcode\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_POSTALCODE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_country\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_COUNTRY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'rating\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RATING','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'phone_office\', \'phone\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_OFFICE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'phone_alternate\', \'phone\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_ALT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'website\', \'url\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_WEBSITE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'ownership\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OWNERSHIP','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'employees\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMPLOYEES','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'ticker_symbol\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TICKER_SYMBOL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_street\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_street_2\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET_2','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_street_3\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET_3','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_street_4\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET_4','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_city\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_CITY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_state\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STATE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_postalcode\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_country\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_COUNTRY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'email1\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'parent_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PARENT_ACCOUNT_ID','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'sic_code\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SIC_CODE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'parent_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_OF','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'email_opt_out\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_OPT_OUT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'invalid_email\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_INVALID_EMAIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'email\', \'email\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ANY_EMAIL','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'contact_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT_NAME','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'campaign_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN_ID','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'campaign_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'accsigned_c\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ACCSIGNED','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'coldcalls_c\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_COLDCALLS','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'committed_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_COMMITTED','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'company_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_COMPANY','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'consultant_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONSULTANT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'contact_c\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'implementationfee_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_IMPLEMENTATIONFEE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'nextcontact_c_date\', \'date\', false,\'Next Contact Date\' );
addToValidate(\'EditView\', \'onem_c\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ONEM','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'opplist_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OPPLIST','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'product_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRODUCT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'result_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RESULT','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'subcriptionfee_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBCRIPTIONFEE','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'twom_c\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TWOM','module' => 'Accounts','for_js' => true), $this); echo '\' );
addToValidateBinaryDependency(\'EditView\', \'assigned_user_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Accounts','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Accounts','for_js' => true), $this); echo '\', \'assigned_user_id\' );
addToValidateBinaryDependency(\'EditView\', \'parent_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Accounts','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_OF','module' => 'Accounts','for_js' => true), $this); echo '\', \'parent_id\' );
addToValidateBinaryDependency(\'EditView\', \'campaign_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Accounts','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN','module' => 'Accounts','for_js' => true), $this); echo '\', \'campaign_id\' );
</script><script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'EditView_parent_name\']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["EditView_parent_name","parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["parent_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_campaign_name\']={"form":"EditView","method":"query","modules":["Campaigns"],"group":"or","field_list":["name","id"],"populate_list":["campaign_id","campaign_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["campaign_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_assigned_user_name\']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script>'; ?>
