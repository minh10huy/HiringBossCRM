

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
<input type="hidden" name="withchart" id="withchart" value="no"><input type="hidden" name="to_pdf" id="to_pdf" value=""><input type="hidden" name="dynamicoptions" id="dynamicoptions" value="{$dynamicoptions}"><input type="hidden" name="groupby" id="groupby" value=""><input type="hidden" name="dynamicols" id="dynamicols" value="">
</form>
</td>
<td class="buttons" align="left" NOWRAP>
{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=KReports", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="submit" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}
</td>
<td align="right" width="100%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="KReports_detailview_tabs"
>
<div >
</div></div>

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