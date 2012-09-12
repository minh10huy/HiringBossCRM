<?php /* Smarty version 2.6.11, created on 2012-09-05 05:36:43
         compiled from include/SugarFields/Fields/Link/ListView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_fetch', 'include/SugarFields/Fields/Link/ListView.tpl', 38, false),array('modifier', 'to_url', 'include/SugarFields/Fields/Link/ListView.tpl', 39, false),)), $this); ?>
<?php ob_start();  echo smarty_function_sugar_fetch(array('object' => $this->_tpl_vars['parentFieldArray'],'key' => $this->_tpl_vars['col']), $this); $this->_smarty_vars['capture']['getLink'] = ob_get_contents();  $this->assign('link', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('to_url', true, $_tmp) : smarty_modifier_to_url($_tmp)); ?>
" <?php if ($this->_tpl_vars['displayParams']['link_target']): ?>target='<?php echo $this->_tpl_vars['displayParams']['link_target']; ?>
'<?php elseif ($this->_tpl_vars['vardef']['link_target']): ?>target='<?php echo $this->_tpl_vars['vardef']['link_target']; ?>
'<?php endif; ?>><?php echo $this->_tpl_vars['link']; ?>
</a>