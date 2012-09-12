{*
/*********************************************************************************
 * This file is part of KReporter. KReporter is an enhancement developed
 * by Christian Knoll. All rights are (c) 2012 by Christian Knoll
 *
 * This Version of the KReporter is licensed software and may only be used in
 * alignment with the License Agreement received with this Software.
 * This Software is copyrighted and may not be further distributed without
 * witten consent of Christian Knoll
 *
 * You can contact Christian Knoll at info@kreporter.org
 *
 ********************************************************************************/
*}
<input type='hidden' name='whereconditions' id='whereconditions' value='{$fields.whereconditions.value}'>
<input type='hidden' name='wheregroups' id='wheregroups' value='{$fields.wheregroups.value}'>
<input type='hidden' name='listfields' id='listfields' value='{$fields.listfields.value}'>
<input type='hidden' name='mapoptions' id='mapoptions' value='{$fields.mapoptions.value}'>
<input type='hidden' name='unionlistfields' id='unionlistfields' value='{$fields.unionlistfields.value}'>
<input type='hidden' name='listtype' id='listtype' value='{$fields.listtype.value}'>
<input type='hidden' name='listtypeproperties' id='listtypeproperties' value='{$fields.listtypeproperties.value}'>
<input type='hidden' name='jsonlanguage' id='jsonlanguage' value='{$jsonlanguage}'>
<input type='hidden' name='selectionlimit' id='selectionlimit' value='{$fields.selectionlimit.value}'>
<input type='hidden' name='pdforientation' id='pdforientation' value='{$fields.pdforientation.value}'>
<input type='hidden' name='pdfoptions' id='pdfoptions' value='{$fields.pdfoptions.value}'>
<input type='hidden' name='chart_type' id='chart_type' value='{$fields.chart_type.value}'>
<input type='hidden' name='chart_layout' id='chart_layout' value='{$fields.chart_layout.value}'>
<input type='hidden' name='chart_height' id='chart_height' value='{$fields.chart_height.value}'>
<input type='hidden' name='chart_params' id='chart_params' value='{$fields.chart_params.value}'>
<input type='hidden' name='chart_params_new' id='chart_params_new' value='{$fields.chart_params_new.value}'>
<input type='hidden' name='colorschema' id='colorschema' value='{$colorschema}'>
<input type='hidden' name='linestyles' id='linestyles' value='{$linestyles}'>
<input type='hidden' name='chartstyles' id='chartstyles' value='{$chartstyles}'>
<input type="hidden" name="kreporteredition" id="kreporteredition" value="{$kreporteredition}">
<input type='hidden' name='report_module' id='report_module' value='{$fields.report_module.value}'>
<input type='hidden' name='reportoptions' id='reportoptions' value='{$fields.reportoptions.value}'>
<input type='hidden' name='publishoptions' id='publishoptions' value='{$fields.publishoptions.value}'>
<input type='hidden' name='union_modules' id='union_modules' value='{$fields.union_modules.value}'>
<input type='hidden' name='name' id='name' value='{$fields.name.value}'>
<input type='hidden' name='description' id='description' value='{$fields.description.value}'>
<input type='hidden' name='report_status' id='report_status' value='{$fields.report_status.value}'>
<input type='hidden' name='assigned_user_name' id='assigned_user_name' value='{$fields.assigned_user_name.value}'>
<input type='hidden' name='assigned_user_id' id='assigned_user_id' value='{$fields.assigned_user_id.value}'>
<input type='hidden' name='team_name' id='team_name' value='{$fields.team_name.value}'>
<input type='hidden' name='team_id' id='team_id' value='{$fields.team_id.value}'>

<div id="toolbarArea"></div>
<link rel="stylesheet" type="text/css" href="custom/kinamu/extjs/resources/css/ext-all-notheme.css" />
<link rel="stylesheet" type="text/css" href="custom/kinamu/extjs/resources/css/xtheme-gray.css" />

<script type="text/javascript" src="custom/kinamu/extjs/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="custom/kinamu/extjs/ext-all.js"></script>

<script type="text/javascript" src="modules/KReports/EditView.basic.js"></script>

<div id='toolbarArea' style='margin-bottom: 5px;'></div>
<div id="layoutregion"></div>
