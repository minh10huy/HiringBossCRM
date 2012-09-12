<?php /* Smarty version 2.6.11, created on 2012-09-06 00:50:30
         compiled from include/SugarFields/Fields/Currency/ListView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_fetch', 'include/SugarFields/Fields/Currency/ListView.tpl', 38, false),array('function', 'sugar_currency_format', 'include/SugarFields/Fields/Currency/ListView.tpl', 40, false),)), $this); ?>
<?php echo smarty_function_sugar_fetch(array('object' => $this->_tpl_vars['parentFieldArray'],'key' => $this->_tpl_vars['col'],'assign' => 'amount'), $this);?>

<?php if (stripos ( strtoupper ( $this->_tpl_vars['col'] ) , '_USD' ) || empty ( $this->_tpl_vars['currency_id'] )):  echo smarty_function_sugar_currency_format(array('var' => $this->_tpl_vars['amount']), $this);?>

<?php else:  echo smarty_function_sugar_currency_format(array('var' => $this->_tpl_vars['amount'],'currency_id' => $this->_tpl_vars['currency_id']), $this);?>

<?php endif; ?>