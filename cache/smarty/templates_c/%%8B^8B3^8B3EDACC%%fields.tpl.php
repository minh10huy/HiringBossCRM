<?php /* Smarty version 2.6.11, created on 2012-09-06 00:59:46
         compiled from modules/ModuleBuilder/tpls/MBModule/fields.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'modules/ModuleBuilder/tpls/MBModule/fields.tpl', 51, false),)), $this); ?>
<div id='studiofields'>
<input type='button' name='addfieldbtn' value='<?php echo $this->_tpl_vars['mod_strings']['LBL_BTN_ADDFIELD']; ?>
' class='button' onclick='ModuleBuilder.moduleLoadField("");'>&nbsp;
<?php if ($this->_tpl_vars['editLabelsMb'] == '1'): ?>
<input type='button' name='addfieldbtn' value='<?php echo $this->_tpl_vars['mod_strings']['LBL_BTN_EDLABELS']; ?>
' class='button' onclick='ModuleBuilder.moduleLoadLabels("mb");'>
<?php else: ?>
<input type='button' name='addfieldbtn' value='<?php echo $this->_tpl_vars['mod_strings']['LBL_BTN_EDLABELS']; ?>
' class='button' onclick='ModuleBuilder.moduleLoadLabels("studio");'>
<?php endif;  $_from = $this->_tpl_vars['module']->mbvardefs->vardefs['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group'] => $this->_tpl_vars['fields']):
?>
<hr>
<h2><?php echo $this->_tpl_vars['title'][$this->_tpl_vars['group']]; ?>
</h2>
    <table width='100%'>
    <colgroup span='3' width='33%'>
    <tr>
    <?php echo smarty_function_counter(array('name' => 'items','assign' => 'items','start' => 0), $this);?>

    <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['def']):
?>
            <?php if ($this->_tpl_vars['items'] % 3 == 0 && $this->_tpl_vars['items'] != 0): ?>
                        </tr><tr>
            <?php endif; ?>
            <td>
            <a class='mbLBLL' href='javascript:void(0)' onclick='ModuleBuilder.moduleLoadField("<?php echo $this->_tpl_vars['name']; ?>
")'><?php echo $this->_tpl_vars['name']; ?>
</a>
            </td>
            <?php echo smarty_function_counter(array('name' => 'items'), $this);?>

    <?php endforeach; endif; unset($_from); ?>
    <?php if ($this->_tpl_vars['items'] == 0): ?>
        <td class='mbLBLL'><?php echo $this->_tpl_vars['mod_strings']['LBL_NONE']; ?>
</td>
    <?php elseif ($this->_tpl_vars['items'] % 3 == 1): ?>
        <td>&nbsp;</td><td>&nbsp;</td>
    <?php elseif ($this->_tpl_vars['items'] % 3 == 2): ?>
        <td>&nbsp;</td>
    <?php endif; ?>
    </tr>
    </table>
<?php endforeach; endif; unset($_from); ?>
<script>
ModuleBuilder.module = '<?php echo $this->_tpl_vars['module']->name; ?>
';
ModuleBuilder.MBpackage = '<?php echo $this->_tpl_vars['package']->name; ?>
';
ModuleBuilder.helpRegisterByID('studiofields', 'input');
<?php if ($this->_tpl_vars['package']->name != 'studio'): ?>
ModuleBuilder.helpSetup('fieldsEditor','mbDefault');
<?php else: ?>
ModuleBuilder.helpSetup('fieldsEditor','default');
<?php endif; ?>
</script>