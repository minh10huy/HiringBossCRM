<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerReportTemplate/ReportTemplate.php');
require_once('modules/ZuckerReportParameter/ReportParameter.php');
require_once('modules/ZuckerReportParameterLink/ReportParameterLink.php');
require_once('include/ListView/ListView.php');

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;

$focus =& new ReportTemplate();

if(isset($_REQUEST['record'])) {
    $focus = $focus->retrieve($_REQUEST['record']);
	if ($focus == null) { echo "no access"; exit; }
}

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

echo "\n<p>\n";
echo get_module_title("ZuckerReportTemplate", $mod_strings['LBL_MODULE_NAME'].": ".$focus->name, false); 
echo "\n</p>\n";



$xtpl=new XTemplate ('modules/ZuckerReportTemplate/DetailView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("THEME", $theme);
$xtpl->assign("IMAGE_PATH", $image_path);
$xtpl->assign("ID", $focus->id);
$xtpl->assign("NAME",$focus->name);
$xtpl->assign("FILENAME",$focus->filename);
$xtpl->assign("URL",$focus->template_url);
$xtpl->assign("DESCRIPTION",$focus->description);
$xtpl->assign('assigned_user_name', $focus->assigned_user_name);
$xtpl->assign('TEAM', $focus->team_name);


$strings = $focus->get_export_array();
$xtpl->assign("EXPORT_TYPES", join("<br/>", $strings));

if ($focus->ACLAccess('edit')) $xtpl->parse("main.edit");
if ($focus->ACLAccess('delete')) $xtpl->parse("main.delete");

$xtpl->parse("main");
$xtpl->out("main");


include("modules/ZuckerReportParameter/ParameterView.php");

?>
