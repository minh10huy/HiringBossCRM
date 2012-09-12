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
{literal}
<style>
.menu{
	z-index:100;
}

.subDmenu{
	z-index:100;
}


li.active a img.deletePageImg {
   display: inline !important;
   margin-bottom: 2px;
}

div.moduleTitle {
height: 10px;
	}
</style>
{/literal}

<!-- begin includes for overlib -->
<script type="text/javascript" src="{sugar_getjspath file='include/javascript/sugar_grp_overlib.js'}"></script>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000"></div>
<!-- end includes for overlib -->

<script type="text/javascript">
var activePage = {$activePage};
var theme = '{$theme}';
current_user_id = '{$current_user}';
jsChartsArray = new Array();
var moduleName = '{$module}';
document.body.setAttribute("class", "yui-skin-sam");
</script>

<script type="text/javascript" src="{sugar_getjspath file='include/javascript/sugar_grp_yui_widgets.js'}"></script>
<script type="text/javascript" src="{sugar_getjspath file='include/javascript/dashlets.js'}"></script>
<script type='text/javascript' src="{sugar_getjspath file='include/MySugar/javascript/MySugar.js'}"></script>
<link rel='stylesheet' href="{sugar_getjspath file='include/ytree/TreeView/css/folders/tree.css'}">


{$chartResources}
{$mySugarChartResources}


<div class="clear"></div>
<div id="pageContainer" class="yui-skin-sam">
<div id="pageNum_{$activePage}_div">
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 5px;">
 	<tr>
	 	<td align='right' colspan = '2'>
			{if !$lock_homepage}<input id="add_dashlets" class="button" type="button" value="{$lblAddDashlets}" onclick="return SUGAR.mySugar.showDashletsDialog();"/>{/if}
		</td>
	{*
		<td rowspan="3">
				<img src='{sugar_getimagepath file='blank.gif'}' width='20' height='1' border='0'>
		</td>
		<td align='right'>
			{if !$lock_homepage}<input id="add_dashlets" class="button" type="button" value="{$lblAddDashlets}" onclick="return SUGAR.mySugar.showDashletsDialog();"/>{/if}
		</td>*}
	</tr>
	<tr style="border: 1px;"><td valign='top' width='100%'>
	
	
	<ul class='noBullet' id='col_{$activePage}_{$colNum}'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
				<li class='noBullet' id='dashlet_{$id}'>
					<div id='dashlet_entire_{$id}' class='dashletPanel'>
						
                  </div> 
				</li>
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
	</td></tr>
	{*Cold Call*}
	{if $mySavedStatus == '570c0afa'}
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_{$activePage}_{$colNum}'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == '5802be57-6fbd-167c-bd39-5047607d5b88'}
					<li class='noBullet' id='dashlet_{$id}'>
						<div id='dashlet_entire_{$id}' class='dashletPanel'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == 'd4dfbe5b-da22-83e7-8785-5047604898eb'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == 'd4e27c1a-d858-7169-79bc-5047601ee633'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	{/if}
	{*Contact*}
	{if $mySavedStatus == 'ee9f21d5'}
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_{$activePage}_{$colNum}'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == '5db94220-93a8-8b96-221a-50476ff6d183'}
					<li class='noBullet' id='dashlet_{$id}'>
						<div id='dashlet_entire_{$id}' class='dashletPanel'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == 'dd2c7655-ece6-0554-94ed-50476f6aac03'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == 'd966af46-2ab9-43fc-e4e7-50476ffaf606'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	{/if}
	{*Leads*}
	{if $mySavedStatus == 'd237174d'}
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_{$activePage}_{$colNum}'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == '17f94698-c8b2-ed33-b1a5-504772aced14'}
					<li class='noBullet' id='dashlet_{$id}'>
						<div id='dashlet_entire_{$id}' class='dashletPanel'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == '9174327c-b696-8b86-5542-504772ac1cf4'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == '5b80e83e-712b-1174-080b-50477211cbdc'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	{/if}
	{*Opportunities*}
	{if $mySavedStatus == '86826629'}
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_{$activePage}_{$colNum}'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == 'bbfbc033-7833-283f-4fdb-504773262cc5'}
					<li class='noBullet' id='dashlet_{$id}'>
						<div id='dashlet_entire_{$id}' class='dashletPanel'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == 'bf367507-2870-bf67-1b00-504773778d70'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == 'cd07a797-2eb4-1f32-2e66-5047730086d1'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	{/if}
	{*Negotiation*}
	{if $mySavedStatus == '2ac7796e'}
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_{$activePage}_{$colNum}'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == '1f2d6b36-3120-32be-d82d-504773bb60ec'}
					<li class='noBullet' id='dashlet_{$id}'>
						<div id='dashlet_entire_{$id}' class='dashletPanel'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == '3f46b22f-1167-41cf-583c-504773d51703'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == '8d700a08-c90a-f406-310a-504773bc3854'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	{/if}
	{*Account*}
	{if $mySavedStatus == '71cb0f85'}
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_{$activePage}_{$colNum}'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == '12e47281-79d7-40a3-58f3-504774fa2595'}
					<li class='noBullet' id='dashlet_{$id}'>
						<div id='dashlet_entire_{$id}' class='dashletPanel'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == '7b3d17b5-5d4e-9824-7908-5047749441af'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		<td valign='top' width='50%'>
			<ul class='noBullet1' id='col_{$activePage}_{$colNum}_1'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b_1' style='height: 5px; margin-top: 12px\9;' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {if $id == '5f011f73-dd29-8f1f-86d6-504774b720db'}
					<li class='noBullet1' id='dashlet_{$id}_1'>
						<div id='dashlet_entire_{$id}_1' class='dashletPanel1'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/if}
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}_1' style='height: 5px' class='noBullet1'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	{/if}
	{*
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='100%' colspan = '2'>
			<ul class='noBullet' id='col_{$activePage}_{$colNum}'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b' style='height: 5px; margin-top: 12px\9;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
		        {$id}
					<li class='noBullet' id='dashlet_{$id}'>
						<div id='dashlet_entire_{$id}' class='dashletPanel'>
							{$dashlet.script}
	                        {$dashlet.displayHeader}
							{$dashlet.display}
	                        {$dashlet.displayFooter}
	                  	</div> 
					</li>
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
	*}
</table>
	</div>
	
	{foreach from=$divPages key=divPageIndex item=divPageNum}
	<div id="pageNum_{$divPageNum}_div" style="display:none;">
	</div>
	{/foreach}

	
	
	<div id="dashletsDialog" style="display:none;">
		<div class="hd" id="dashletsDialogHeader"><a href="javascript:void(0)" onClick="javascript:SUGAR.mySugar.closeDashletsDialog();">
			<div class="container-close">&nbsp;</div></a>{$lblAdd}
		</div>	
		<div class="bd" id="dashletsList">
			<form></form>
		</div>
		
	</div>
				
	
</div>

{literal}
<script type="text/javascript">
SUGAR.mySugar.maxCount = 	{/literal}{$maxCount}{literal};
SUGAR.mySugar.homepage_dd = new Array();
SUGAR.mySugar.init = function () {
	j = 0;
	
	{/literal}
	dashletIds = {$dashletIds};
	
	{if !$lock_homepage}
	{literal}
	for(i in dashletIds) {
		SUGAR.mySugar.homepage_dd[j] = new ygDDList('dashlet_' + dashletIds[i]);
		SUGAR.mySugar.homepage_dd[j].setHandleElId('dashlet_header_' + dashletIds[i]);
		SUGAR.mySugar.homepage_dd[j].onMouseDown = SUGAR.mySugar.onDrag;  
		SUGAR.mySugar.homepage_dd[j].afterEndDrag = SUGAR.mySugar.onDrop;
		j++;
	}
	for(var wp = 0; wp <= {/literal}{$hiddenCounter}{literal}; wp++) {
	    SUGAR.mySugar.homepage_dd[j++] = new ygDDListBoundary('page_'+activePage+'_hidden' + wp);
	}

	YAHOO.util.DDM.mode = 1;
	{/literal}
	{/if}
	{literal}
	SUGAR.mySugar.renderDashletsDialog();
	SUGAR.mySugar.sugarCharts.loadSugarCharts(activePage);
}

</script>
{/literal}

<script type="text/javascript">
	YAHOO.util.Event.addListener(window, 'load', SUGAR.mySugar.init); 
</script>
