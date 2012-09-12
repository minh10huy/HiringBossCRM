<div id="statsPanel">
	<ul id="statsPanel">
   		<li class="leftFlat {if $namemodule == 'Company'}blue{/if}">&nbsp;</li>
   		<li class="{if $namemodule == 'Company'}blue{/if} status_101 announced first middle" style='width: 137.714px'>
   			<a href="index.php?action=index&module=Accounts&saved=5598d292&blue=Company">
	   			<div class="total">{$tcom}</div>
     			<div class="navLabel">
	     			<div class="pillRight"></div>
	     			<div class="pillLeft"></div>
	     			<div class="pillMiddle">
	     				<div class="chevronLabel">
	     					<a id="moduleTab_Calls" href="index.php?action=index&module=Accounts&saved=5598d292&blue=Company">Company</a>
	     				</div>
	     			</div>
     			</div>
     		</a>
     			<div class="statusCount">
     				<div style="text-align: center; width: 85px;padding-left: 20px;color: #FFFF01">
	     				<br style="clear: both; height: 0px; width: 0px; display: inline;">
     				</div>
					<br style="clear: both; height: 0px; width: 0px; display: inline;">
		</li>
			<li class="rightArrow {if $namemodule == 'Company'}blue{/if}">&nbsp;</li>
				
   			<li class="leftArrow {if $namemodule == 'ColdCalls'}blue{/if}">&nbsp;</li>
			<li class="{if $namemodule == 'ColdCalls'}blue{/if} status_102 middle" style="width: 137.714px;">
				<a href="index.php?action=index&module=Home&saved=570c0afa&blue=ColdCalls">
   				<div class="total">{$tcc}/{$tcct}</div>
				<div class="navLabel">
					<div class="pillRight"></div>
					<div class="pillLeft"></div>
					<div class="pillMiddle">
						<div class="chevronLabel">
							<a id="moduleTab_Contacts" href="index.php?action=index&module=Home&saved=570c0afa&blue=ColdCalls">Cold Calls</a>
						</div>
					</div>
				</div>
				<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$tccr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$tcco}</div>
	     					
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$tccg}</div>
	     					
	     				</div>
	     			</div>
					<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'ColdCalls'}blue{/if}">&nbsp;</li>
   			
   			<li class="leftArrow {if $namemodule == 'Contacts'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'Contacts'}blue{/if} status_103 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=ee9f21d5&blue=Contacts">
   				<div class="total">{$tct}/{$tcontactt}</div>
     			<div class="navLabel">
     				<div class="pillRight"></div>
     				<div class="pillLeft"></div>
     				<div class="pillMiddle">
     					<div class="chevronLabel">
     						<a id="moduleTab_Leads" href="index.php?action=index&module=Home&saved=ee9f21d5&blue=Contacts">Contacts</a>
     					</div>
     				</div>
     			</div>
     			<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$tctr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$tcto}</div>	     
	     								
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$tctg}</div>
	     					
	     				</div>
	     			</div>
     				<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'Contacts'}blue{/if}">&nbsp;</li>
				
   			<li class="leftArrow {if $namemodule == 'Leads'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'Leads'}blue{/if} status_104 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=d237174d&blue=Leads">
   				<div class="total">{$tom}/{$tleadt}</div>
     			<div class="navLabel">
	     			<div class="pillRight"></div>
	     			<div class="pillLeft"></div>
	     			<div class="pillMiddle">
	     				<div class="chevronLabel">
	     					<a id="moduleTab_Opportunities" href="index.php?action=index&module=Home&saved=d237174d&blue=Leads">Leads</a>
	     				</div>
	     			</div>
     			</div>
     			<div class="statusCount">
					<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$tomr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$tomo}</div>
	     					
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$tomg}</div>
	     					
	     				</div>
	     			</div>
     				<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'Leads'}blue{/if}">&nbsp;</li>
				
   			<li class="leftArrow {if $namemodule == 'Opportunities'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'Opportunities'}blue{/if} status_105 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=86826629&blue=Opportunities">
   				<div class="total">{$topp}</div>
     			<div class="navLabel"><div class="pillRight"></div>
	     			<div class="pillLeft"></div>
	     			<div class="pillMiddle">
	     				<div class="chevronLabel">
	     					<a id="moduleTab_Meetings" href="index.php?action=index&module=Home&saved=86826629&blue=Opportunities">Opportunities</a>
	     				</div>
	     			</div>
     			</div>
     			<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$toppr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$toppo}</div>
	     					
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$toppg}</div>
	     					
	     				</div>
	     			</div>
     				<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'Opportunities'}blue{/if}">&nbsp;</li>


   			<li class="leftArrow {if $namemodule == 'Negotiation'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'Negotiation'}blue{/if} status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=Negotiation">
   				<div class="total">{$ttm}</div>
     			<div class="navLabel">
     				<div class="pillRight"></div>
     				<div class="pillLeft"></div>
     				<div class="pillMiddle">
     					<div class="chevronLabel">
     						<a id="moduleTab_Accounts" href="index.php?action=index&module=Home&saved=2ac7796e&blue=Negotiation">Negotiation</a>
     					</div>
     				</div>
     			</div>
     			<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmo}</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmg}</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'Negotiation'}blue{/if}">&nbsp;</li>
			
			
   			<li class="leftArrow {if $namemodule == 'Accounts'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'Accounts'}blue{/if} status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=71cb0f85&blue=Accounts">
   				<div class="total">{$tacc}</div>
     			<div class="navLabel">
     				<div class="pillRight"></div>
     				<div class="pillLeft"></div>
     				<div class="pillMiddle">
     					<div class="chevronLabel">
     						<a id="moduleTab_Cases" href="index.php?action=index&module=Home&saved=71cb0f85&blue=Accounts">Accounts</a>
     					</div>
     				</div>
     			</div>
     			<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$taccr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$tacco}</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$taccg}</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'Accounts'}blue{/if}">&nbsp;</li>
{* Customer Services *}

   			<li class="leftArrow {if $namemodule == 'Implementation'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'Implementation'}blue{/if} status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=Implementation">
   				<div class="total">0</div>
     			<div class="navLabel">
     				<div class="pillRight"></div>
     				<div class="pillLeft"></div>
     				<div class="pillMiddle">
     					<div class="chevronLabel">
     						<a id="moduleTab_Accounts" href="index.php?action=index&module=Home&saved=2ac7796e&blue=Contract_Signed">Implementation</a>
     					</div>
     				</div>
     			</div>
     			<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">0</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">0</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">0</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'Implementation'}blue{/if}">&nbsp;</li>

   			<li class="leftArrow {if $namemodule == 'Training'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'Training'}blue{/if} status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=Training">
   				<div class="total">{$ttm}</div>
     			<div class="navLabel">
     				<div class="pillRight"></div>
     				<div class="pillLeft"></div>
     				<div class="pillMiddle">
     					<div class="chevronLabel">
     						<a id="moduleTab_Accounts" href="index.php?action=index&module=Home&saved=2ac7796e&blue=Training">Training</a>
     					</div>
     				</div>
     			</div>
     			<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmo}</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmg}</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'Training'}blue{/if}">&nbsp;</li>			

   			<li class="leftArrow {if $namemodule == 'UAT'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'UAT'}blue{/if} status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=UAT">
   				<div class="total">{$ttm}</div>
     			<div class="navLabel">
     				<div class="pillRight"></div>
     				<div class="pillLeft"></div>
     				<div class="pillMiddle">
     					<div class="chevronLabel">
     						<a id="moduleTab_Accounts" href="index.php?action=index&module=Home&saved=2ac7796e&blue=UAT">UAT</a>
     					</div>
     				</div>
     			</div>
     			<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmo}</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmg}</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'UAT'}blue{/if}">&nbsp;</li>
			

   			<li class="leftArrow {if $namemodule == 'GoLive'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'GoLive'}blue{/if} status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=GoLive">
   				<div class="total">{$ttm}</div>
     			<div class="navLabel">
     				<div class="pillRight"></div>
     				<div class="pillLeft"></div>
     				<div class="pillMiddle">
     					<div class="chevronLabel">
     						<a id="moduleTab_Accounts" href="index.php?action=index&module=Home&saved=2ac7796e&blue=GoLive">Go Live</a>
     					</div>
     				</div>
     			</div>
     			<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmo}</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmg}</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'GoLive'}blue{/if}">&nbsp;</li>


   			<li class="leftArrow {if $namemodule == 'HealthCheck'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'HealthCheck'}blue{/if} status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=HealthCheck">
   				<div class="total">{$ttm}</div>
     			<div class="navLabel">
     				<div class="pillRight"></div>
     				<div class="pillLeft"></div>
     				<div class="pillMiddle">
     					<div class="chevronLabel">
     						<a id="moduleTab_Accounts" href="index.php?action=index&module=Home&saved=2ac7796e&blue=HealthCheck">Health Check</a>
     					</div>
     				</div>
     			</div>
     			<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmo}</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmg}</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'HealthCheck'}blue{/if}">&nbsp;</li>


   			<li class="leftArrow {if $namemodule == 'UpSell'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'UpSell'}blue{/if} status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=UpSell">
   				<div class="total">{$ttm}</div>
     			<div class="navLabel">
     				<div class="pillRight"></div>
     				<div class="pillLeft"></div>
     				<div class="pillMiddle">
     					<div class="chevronLabel">
     						<a id="moduleTab_Accounts" href="index.php?action=index&module=Home&saved=2ac7796e&blue=UpSell">Up Sell</a>
     					</div>
     				</div>
     			</div>
     			<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmo}</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$ttmg}</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow {if $namemodule == 'UpSell'}blue{/if}">&nbsp;</li>															
			
   			<li class="leftArrow {if $namemodule == 'Renewals'}blue{/if}">&nbsp;</li>
   			<li class="{if $namemodule == 'Renewals'}blue{/if} status_110 hired middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=71cb0f85&blue=Renewals">
   				<div class="total">{$tacc}</div>
     			<div class="navLabel">
     				<div class="pillRight"></div>
     				<div class="pillLeft"></div>
     				<div class="pillMiddle">
     					<div class="chevronLabel">
     						<a id="moduleTab_Cases" href="index.php?action=index&module=Home&saved=71cb0f85&blue=Renewals">Renewals</a>
     					</div>
     				</div>
     			</div>
     			<div class="statusCount">
     				<div style="text-align: center; width: 120px;padding-left: 20px;color: #FFFF01">
	     				<div class="fail">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$taccr}</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$tacco}</div>
	     					
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue">{$taccg}</div>
	     					
	     				</div>
	     			</div>     				
     			</div>
   				<br style="clear: both; height: 0px; width: 0px; display: inline;">
   				</a>
   			</li>
   			<li class="rightFlat {if $namemodule == 'Renewals'}blue{/if}">&nbsp;</li>
 			<br style="clear: both; height: 0px; width: 0px; display: inline;">
	</ul>
</div>
<script type='text/javascript'>
  RecoverDivScroll.init("", "statsPanel");
  RecoverDivScroll.persist( 30 );
  RecoverDivScroll.save('statsPanel');
  RecoverDivScroll.restore('statsPanel');
</script>
<script type='text/javascript'>
  new DragDivScroll( 'statsPanel', "TOGGLE MOUSEWHEELX");
</script>