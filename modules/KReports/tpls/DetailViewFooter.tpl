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

<input type="hidden" name="listfieldarray" id="listfieldarray" value="{$listfieldarray}">
<input type="hidden" name="listfields" id="listfields" value="{$fields.listfields.value}">
<input type="hidden" name="listtype" id="listtype" value="{$fields.listtype.value}">
<input type='hidden' name='listtypeproperties' id='listtypeproperties' value='{$fields.listtypeproperties.value}'>
<input type='hidden' name='reportoptions' id='reportoptions' value='{$fields.reportoptions.value}'>
<input type="hidden" name="columnmodeldarray" id="columnmodeldarray" value="{$columnmodeldarray}">
<input type='hidden' name='jsonlanguage' id='jsonlanguage' value='{$jsonlanguage}'>
<input type="hidden" name="recordid" id="recordid" value="{$fields.id.value}">
<input type="hidden" name="haschart" id="haschart" value="{$haschart}">
<input type="hidden" name="withchart" id="withchart" value="no">
<input type="hidden" name="exportedcount" id="exportedcount" value=0>
<input type="hidden" name="kreporteredition" id="kreporteredition" value="{$kreporteredition}">
<input type="hidden" name="chart_layout" id="chart_layout" value="{$fields.chart_layout.value}">
<input type='hidden' name='geocodeEnable' id='geocodeEnable' value='{$geocodeEnable}'>
<input title="targetlist_name" class="button" id="targetlist_name" name="targetlist_name" type="hidden" value="">

<link rel='stylesheet' type='text/css' href='custom/kinamu/extjs/resources/css/ext-all-notheme.css' />
<link rel='stylesheet' type='text/css' href='custom/kinamu/extjs/resources/css/xtheme-gray.css' />

<script type='text/javascript' src='custom/kinamu/extjs/adapter/ext/ext-base.js'></script>
<script type='text/javascript' src='custom/kinamu/extjs/ext-all.js'></script>

{$addViewJS}
{$viewJS}

<div id='reportMain' style="margin-left:0px; margin-right:10px">
<div id='toolbarArea'></div>
{if $dynamicoptions != ''}<div id='optionsArea' style='margin-top:5px;'></div>{/if}


<div id='reportGrid' style='margin-top:5px;'>{$reportData}</div><br>
</div>
<script type='text/javascript' src='modules/KReports/DetailView.{$kreporteredition}.js'></script>
