<?php /* Smarty version 2.6.11, created on 2012-09-07 04:11:39
         compiled from themes/Sugar5/tpls/_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getimagepath', 'themes/Sugar5/tpls/_head.tpl', 52, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="SHORTCUT ICON" href="<?php echo $this->_tpl_vars['FAVICON_URL']; ?>
">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['APP']['LBL_CHARSET']; ?>
">
<title><?php echo $this->_tpl_vars['APP']['LBL_BROWSER_TITLE']; ?>
</title>
<?php echo $this->_tpl_vars['SUGAR_CSS']; ?>

<?php echo $this->_tpl_vars['SUGAR_JS']; ?>


<?php echo '
<script type="text/javascript">
<!--
SUGAR.themes.theme_name      = \'';  echo $this->_tpl_vars['THEME'];  echo '\';
SUGAR.themes.theme_ie6compat = ';  echo $this->_tpl_vars['THEME_IE6COMPAT'];  echo ';
SUGAR.themes.hide_image      = \'';  echo smarty_function_sugar_getimagepath(array('file' => "hide.gif"), $this); echo '\';
SUGAR.themes.show_image      = \'';  echo smarty_function_sugar_getimagepath(array('file' => "show.gif"), $this); echo '\';
SUGAR.themes.allThemes       = eval(';  echo $this->_tpl_vars['allThemes'];  echo ');
if ( YAHOO.env.ua )
    UA = YAHOO.env.ua;
-->
</script>

'; ?>

</head>
<a name="top"></a>