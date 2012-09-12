<?php /* Smarty version 2.6.11, created on 2012-09-06 23:04:06
         compiled from cache/modules/zr2_ReportContainer/SearchFormFooter.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getimagepath', 'cache/modules/zr2_ReportContainer/SearchFormFooter.tpl', 11, false),)), $this); ?>

</form>
<?php echo '
<script>
function toggleInlineSearch()
{
    if (document.getElementById(\'inlineSavedSearch\').style.display == \'none\'){
        document.getElementById(\'showSSDIV\').value = \'yes\'		
        document.getElementById(\'inlineSavedSearch\').style.display = \'\';
'; ?>
			
        document.getElementById('up_down_img').src='<?php echo smarty_function_sugar_getimagepath(array('file' => "basic_search.gif"), $this);?>
';
<?php echo '
    }else{
'; ?>
			
        document.getElementById('up_down_img').src='<?php echo smarty_function_sugar_getimagepath(array('file' => "advanced_search.gif"), $this);?>
';
<?php echo '			
        document.getElementById(\'showSSDIV\').value = \'no\';		
        document.getElementById(\'inlineSavedSearch\').style.display = \'none\';		
    }
}
</script>
'; ?>