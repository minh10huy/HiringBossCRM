

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
{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="this.form.return_module.value='Opportunities'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$id}'; this.form.action.value='EditView';" type="submit" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} 
{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="this.form.return_module.value='Opportunities'; this.form.return_action.value='DetailView'; this.form.isDuplicate.value=true; this.form.action.value='EditView'; this.form.return_id.value='{$id}';" type="submit" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} 
{if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="this.form.return_module.value='Opportunities'; this.form.return_action.value='ListView'; this.form.action.value='Delete'; return confirm('{$APP.NTC_DELETE_CONFIRMATION}');" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if} 
{if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" accessKey="M" class="button" onclick="this.form.return_module.value='Opportunities'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$id}'; this.form.action.value='Step1'; this.form.module.value='MergeRecords';" type="submit" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if} 
</form>
</td>
<td class="buttons" align="left" NOWRAP>
{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Opportunities", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="submit" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}
</td>
<td align="right" width="100%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="Opportunities_detailview_tabs"
>
<div >
<div id='DEFAULT' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table id='detailpanel_1' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OPPORTUNITY_NAME' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if} 
<span class="sugar_field" id="{$fields.name.name}">{$fields.name.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.account_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNT_NAME' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.account_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.account_id.value)}<a href="index.php?module=Accounts&action=DetailView&record={$fields.account_id.value}">{/if}
<span id="account_id" class="sugar_field">{$fields.account_name.value}</span>
{if !empty($fields.account_id.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.amount.hidden}
{capture name="label" assign="label"}{$MOD.LBL_AMOUNT} ({$CURRENCY}){/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.amount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.amount.name}'>
{sugar_number_format var=$fields.amount.value }
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.date_closed.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_CLOSED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_closed.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.date_closed.value) <= 0}
{assign var="value" value=$fields.date_closed.default_value }
{else}
{assign var="value" value=$fields.date_closed.value }
{/if} 
<span class="sugar_field" id="{$fields.date_closed.name}">{$fields.date_closed.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.sales_stage.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SALES_STAGE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.sales_stage.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.sales_stage.options)}
<input type="hidden" class="sugar_field" id="{$fields.sales_stage.name}" value="{ $fields.sales_stage.options }">
{ $fields.sales_stage.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.sales_stage.name}" value="{ $fields.sales_stage.value }">
{ $fields.sales_stage.options[$fields.sales_stage.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.opportunity_type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.opportunity_type.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.opportunity_type.options)}
<input type="hidden" class="sugar_field" id="{$fields.opportunity_type.name}" value="{ $fields.opportunity_type.options }">
{ $fields.opportunity_type.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.opportunity_type.name}" value="{ $fields.opportunity_type.value }">
{ $fields.opportunity_type.options[$fields.opportunity_type.value]}
{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.probability.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PROBABILITY' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.probability.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.probability.name}">
{sugar_number_format precision=0 var=$fields.probability.value}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.lead_source.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LEAD_SOURCE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.lead_source.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.lead_source.options)}
<input type="hidden" class="sugar_field" id="{$fields.lead_source.name}" value="{ $fields.lead_source.options }">
{ $fields.lead_source.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.lead_source.name}" value="{ $fields.lead_source.value }">
{ $fields.lead_source.options[$fields.lead_source.value]}
{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.next_step.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NEXT_STEP' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.next_step.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.next_step.value) <= 0}
{assign var="value" value=$fields.next_step.default_value }
{else}
{assign var="value" value=$fields.next_step.value }
{/if} 
<span class="sugar_field" id="{$fields.next_step.name}">{$fields.next_step.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.campaign_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CAMPAIGN' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.campaign_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.campaign_id.value)}<a href="index.php?module=Campaigns&action=DetailView&record={$fields.campaign_id.value}">{/if}
<span id="campaign_id" class="sugar_field">{$fields.campaign_name.value}</span>
{if !empty($fields.campaign_id.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.opplist_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OPPLIST' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.opplist_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.opplist_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.opplist_c.name}" value="{ $fields.opplist_c.options }">
{ $fields.opplist_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.opplist_c.name}" value="{ $fields.opplist_c.value }">
{ $fields.opplist_c.options[$fields.opplist_c.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">
{$fields.description.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}
</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
<div id='LBL_PANEL_ASSIGNMENT' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_PANEL_ASSIGNMENT' module='Opportunities'}</h4>
<table id='detailpanel_2' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.assigned_user_name.hidden}
{counter name="panelFieldCount"}

<span id="assigned_user_id" class="sugar_field">{$fields.assigned_user_name.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.date_modified.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_MODIFIED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_modified.hidden}
{counter name="panelFieldCount"}
<span id="date_modified" class="sugar_field">{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.date_entered.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.date_entered.hidden}
{counter name="panelFieldCount"}
<span id="date_entered" class="sugar_field">{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_PANEL_ASSIGNMENT").style.display='none';</script>
{/if}
<div id='LBL_DETAILVIEW_PANEL1' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_DETAILVIEW_PANEL1' module='Opportunities'}</h4>
<table id='detailpanel_3' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.q1_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_Q1' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.q1_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.q1_c.name}"><p>Q1. Did you find what you were looking for?</p></span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.a1_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_A1' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.a1_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.a1_c.value) <= 0}
{assign var="value" value=$fields.a1_c.default_value }
{else}
{assign var="value" value=$fields.a1_c.value }
{/if} 
<span class="sugar_field" id="{$fields.a1_c.name}">{$fields.a1_c.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.q2_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_Q2' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.q2_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.q2_c.name}"><p>Q2. If not, were we helpful in recommending how to find what you were looking for?</p></span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.a2_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_A2' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.a2_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.a2_c.value) <= 0}
{assign var="value" value=$fields.a2_c.default_value }
{else}
{assign var="value" value=$fields.a2_c.value }
{/if} 
<span class="sugar_field" id="{$fields.a2_c.name}">{$fields.a2_c.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.q3_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_Q3' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.q3_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.q3_c.name}"><p>Q3. How can we make your experience here more valuable/meaningful to you?</p></span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.a3_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_A3' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.a3_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.a3_c.value) <= 0}
{assign var="value" value=$fields.a3_c.default_value }
{else}
{assign var="value" value=$fields.a3_c.value }
{/if} 
<span class="sugar_field" id="{$fields.a3_c.name}">{$fields.a3_c.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.q4_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_Q4' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.q4_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.q4_c.name}"><p>Q4. Was our online store and online check-out process simple?</p></span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.a4_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_A4' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.a4_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.a4_c.value) <= 0}
{assign var="value" value=$fields.a4_c.default_value }
{else}
{assign var="value" value=$fields.a4_c.value }
{/if} 
<span class="sugar_field" id="{$fields.a4_c.name}">{$fields.a4_c.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.q5_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_Q5' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.q5_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.q5_c.name}"><p>Q5. When you gave us feedback, did we respond in a way that appreciated what you had to contribute?</p></span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.a5_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_A5' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.a5_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.a5_c.value) <= 0}
{assign var="value" value=$fields.a5_c.default_value }
{else}
{assign var="value" value=$fields.a5_c.value }
{/if} 
<span class="sugar_field" id="{$fields.a5_c.name}">{$fields.a5_c.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_DETAILVIEW_PANEL1").style.display='none';</script>
{/if}
</div></div>

</form>