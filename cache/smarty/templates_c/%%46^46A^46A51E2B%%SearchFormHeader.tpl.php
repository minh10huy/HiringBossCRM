<?php /* Smarty version 2.6.11, created on 2012-09-07 05:56:51
         compiled from cache/modules/Opportunities/SearchFormHeader.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'cache/modules/Opportunities/SearchFormHeader.tpl', 3, false),)), $this); ?>

<div class='listViewBody'>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'include/javascript/popup_parent_helper.js'), $this);?>
"></script>
<?php echo $this->_tpl_vars['TABS']; ?>

<form name='search_form' id='search_form' class='search_form' method='post' action='index.php?module=<?php echo $this->_tpl_vars['module']; ?>
&action=<?php echo $this->_tpl_vars['action']; ?>
'>
<input type='hidden' name='searchFormTab' value='<?php echo $this->_tpl_vars['displayView']; ?>
'/>
<input type='hidden' name='module' value='<?php echo $this->_tpl_vars['module']; ?>
'/>
<input type='hidden' name='action' value='<?php echo $this->_tpl_vars['action']; ?>
'/> 
<input type='hidden' name='query' value='true'/>
<?php $_from = $this->_tpl_vars['TAB_ARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tabIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tabIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tabkey'] => $this->_tpl_vars['tabData']):
        $this->_foreach['tabIteration']['iteration']++;
?>
<div id='<?php echo $this->_tpl_vars['module'];  echo $this->_tpl_vars['tabData']['name']; ?>
_searchSearchForm' style='<?php echo $this->_tpl_vars['tabData']['displayDiv']; ?>
' class="edit view search <?php echo $this->_tpl_vars['tabData']['name']; ?>
"><?php if ($this->_tpl_vars['tabData']['displayDiv']):  else:  echo $this->_tpl_vars['return_txt'];  endif; ?></div>
<?php endforeach; endif; unset($_from); ?>
<div id='<?php echo $this->_tpl_vars['module']; ?>
saved_viewsSearchForm' style='display: none';><?php echo $this->_tpl_vars['saved_views_txt']; ?>
</div>