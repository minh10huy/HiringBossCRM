<?php /* Smarty version 2.6.11, created on 2012-09-06 00:50:28
         compiled from include/DetailView/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_button', 'include/DetailView/header.tpl', 62, false),array('function', 'counter', 'include/DetailView/header.tpl', 66, false),)), $this); ?>
{*
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2012 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

*}
<?php if ($this->_tpl_vars['preForm']): ?>
	<?php echo $this->_tpl_vars['preForm']; ?>

<?php endif; ?>
<table cellpadding="1" cellspacing="0" border="0" width="100%" class="actionsContainer">
<tr>
<td class="buttons" align="left" NOWRAP>
<form action="index.php" method="post" name="DetailView" id="form">
<input type="hidden" name="module" value="{$module}">
<input type="hidden" name="record" value="{$fields.id.value}">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="{$offset}">
<input type="hidden" name="action" value="EditView">
<?php if (isset ( $this->_tpl_vars['form']['hidden'] )):  $_from = $this->_tpl_vars['form']['hidden']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
 echo $this->_tpl_vars['field']; ?>

<?php endforeach; endif; unset($_from);  endif; ?>

<?php if (! isset ( $this->_tpl_vars['form']['buttons'] )):  echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'EDIT','view' => ($this->_tpl_vars['view'])), $this);?>

<?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'DUPLICATE','view' => 'EditView'), $this);?>

<?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'DELETE','view' => ($this->_tpl_vars['view'])), $this);?>

<?php else: ?>
	<?php echo smarty_function_counter(array('assign' => 'num_buttons','start' => 0,'print' => false), $this);?>

	<?php $_from = $this->_tpl_vars['form']['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['button']):
?>
	  <?php if (! is_array ( $this->_tpl_vars['button'] ) && in_array ( $this->_tpl_vars['button'] , $this->_tpl_vars['built_in_buttons'] )): ?>
	     <?php echo smarty_function_counter(array('print' => false), $this);?>

	     <?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => ($this->_tpl_vars['button']),'view' => 'EditView'), $this);?>

	  <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php if (isset ( $this->_tpl_vars['closeFormBeforeCustomButtons'] )): ?>
	</form>
	</td>
	<?php endif; ?>
	<?php if (count ( $this->_tpl_vars['form']['buttons'] ) > $this->_tpl_vars['num_buttons']): ?>
			<?php $_from = $this->_tpl_vars['form']['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val'] => $this->_tpl_vars['button']):
?>
			  <?php if (is_array ( $this->_tpl_vars['button'] ) && $this->_tpl_vars['button']['customCode']): ?>
              <?php if (isset ( $this->_tpl_vars['closeFormBeforeCustomButtons'] )): ?>
              <td class="buttons" align="left" NOWRAP>
              <?php endif; ?>
			  <?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => ($this->_tpl_vars['button']),'view' => 'EditView'), $this);?>

              <?php if (isset ( $this->_tpl_vars['closeFormBeforeCustomButtons'] )): ?>
              </td>
              <?php endif; ?>
			  <?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
	<?php endif;  endif;  if (! isset ( $this->_tpl_vars['closeFormBeforeCustomButtons'] )): ?>
</form>
</td>
<?php endif;  if (empty ( $this->_tpl_vars['form']['hideAudit'] ) || ! $this->_tpl_vars['form']['hideAudit']): ?>
<td class="buttons" align="left" NOWRAP>
<?php echo smarty_function_sugar_button(array('module' => ($this->_tpl_vars['module']),'id' => 'Audit','view' => 'EditView'), $this);?>

</td>
<?php endif; ?>
<td align="right" width="100%">{$ADMIN_EDIT}
	<?php if ($this->_tpl_vars['panelCount'] == 0): ?>
	    		<?php if ($this->_tpl_vars['SHOW_VCR_CONTROL']): ?>
			{$PAGINATION}
		<?php endif; ?>
		<?php echo smarty_function_counter(array('name' => 'panelCount','print' => false), $this);?>

	<?php endif; ?>
</td>
<?php if (! empty ( $this->_tpl_vars['form'] ) && isset ( $this->_tpl_vars['form']['links'] )): ?>
	<td align="right" width="10%">&nbsp;</td>
	<td align="right" width="100%" NOWRAP>
	<?php $_from = $this->_tpl_vars['form']['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
	    <?php echo $this->_tpl_vars['link']; ?>
&nbsp;
	<?php endforeach; endif; unset($_from); ?>
	</td>
<?php endif; ?>
</tr>
</table>