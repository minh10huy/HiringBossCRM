<?php /* Smarty version 2.6.11, created on 2012-09-06 03:29:10
         compiled from include/MySugar/tpls/submenu.tpl */ ?>
<div id="statsPanel">
	<ul id="statsPanel">
   		<li class="leftFlat <?php if ($this->_tpl_vars['namemodule'] == 'Company'): ?>blue<?php endif; ?>">&nbsp;</li>
   		<li class="<?php if ($this->_tpl_vars['namemodule'] == 'Company'): ?>blue<?php endif; ?> status_101 announced first middle" style='width: 137.714px'>
   			<a href="index.php?action=index&module=Accounts&saved=5598d292&blue=Company">
	   			<div class="total"><?php echo $this->_tpl_vars['tcom']; ?>
</div>
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
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'Company'): ?>blue<?php endif; ?>">&nbsp;</li>
				
   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'ColdCalls'): ?>blue<?php endif; ?>">&nbsp;</li>
			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'ColdCalls'): ?>blue<?php endif; ?> status_102 middle" style="width: 137.714px;">
				<a href="index.php?action=index&module=Home&saved=570c0afa&blue=ColdCalls">
   				<div class="total"><?php echo $this->_tpl_vars['tcc']; ?>
/<?php echo $this->_tpl_vars['tcct']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['tccr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['tcco']; ?>
</div>
	     					
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['tccg']; ?>
</div>
	     					
	     				</div>
	     			</div>
					<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'ColdCalls'): ?>blue<?php endif; ?>">&nbsp;</li>
   			
   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'Contacts'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'Contacts'): ?>blue<?php endif; ?> status_103 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=ee9f21d5&blue=Contacts">
   				<div class="total"><?php echo $this->_tpl_vars['tct']; ?>
/<?php echo $this->_tpl_vars['tcontactt']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['tctr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['tcto']; ?>
</div>	     
	     								
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['tctg']; ?>
</div>
	     					
	     				</div>
	     			</div>
     				<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'Contacts'): ?>blue<?php endif; ?>">&nbsp;</li>
				
   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'Leads'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'Leads'): ?>blue<?php endif; ?> status_104 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=d237174d&blue=Leads">
   				<div class="total"><?php echo $this->_tpl_vars['tom']; ?>
/<?php echo $this->_tpl_vars['tleadt']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['tomr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['tomo']; ?>
</div>
	     					
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['tomg']; ?>
</div>
	     					
	     				</div>
	     			</div>
     				<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'Leads'): ?>blue<?php endif; ?>">&nbsp;</li>
				
   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'Opportunities'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'Opportunities'): ?>blue<?php endif; ?> status_105 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=86826629&blue=Opportunities">
   				<div class="total"><?php echo $this->_tpl_vars['topp']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['toppr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['toppo']; ?>
</div>
	     					
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['toppg']; ?>
</div>
	     					
	     				</div>
	     			</div>
     				<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'Opportunities'): ?>blue<?php endif; ?>">&nbsp;</li>


   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'Negotiation'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'Negotiation'): ?>blue<?php endif; ?> status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=Negotiation">
   				<div class="total"><?php echo $this->_tpl_vars['ttm']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmo']; ?>
</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmg']; ?>
</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'Negotiation'): ?>blue<?php endif; ?>">&nbsp;</li>
			
			
   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'Accounts'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'Accounts'): ?>blue<?php endif; ?> status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=71cb0f85&blue=Accounts">
   				<div class="total"><?php echo $this->_tpl_vars['tacc']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['taccr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['tacco']; ?>
</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['taccg']; ?>
</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'Accounts'): ?>blue<?php endif; ?>">&nbsp;</li>

   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'Implementation'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'Implementation'): ?>blue<?php endif; ?> status_109 middle" style="width: 137.714px;">
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
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'Implementation'): ?>blue<?php endif; ?>">&nbsp;</li>

   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'Training'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'Training'): ?>blue<?php endif; ?> status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=Training">
   				<div class="total"><?php echo $this->_tpl_vars['ttm']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmo']; ?>
</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmg']; ?>
</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'Training'): ?>blue<?php endif; ?>">&nbsp;</li>			

   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'UAT'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'UAT'): ?>blue<?php endif; ?> status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=UAT">
   				<div class="total"><?php echo $this->_tpl_vars['ttm']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmo']; ?>
</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmg']; ?>
</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'UAT'): ?>blue<?php endif; ?>">&nbsp;</li>
			

   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'GoLive'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'GoLive'): ?>blue<?php endif; ?> status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=GoLive">
   				<div class="total"><?php echo $this->_tpl_vars['ttm']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmo']; ?>
</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmg']; ?>
</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'GoLive'): ?>blue<?php endif; ?>">&nbsp;</li>


   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'HealthCheck'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'HealthCheck'): ?>blue<?php endif; ?> status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=HealthCheck">
   				<div class="total"><?php echo $this->_tpl_vars['ttm']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmo']; ?>
</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmg']; ?>
</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'HealthCheck'): ?>blue<?php endif; ?>">&nbsp;</li>


   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'UpSell'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'UpSell'): ?>blue<?php endif; ?> status_109 middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=2ac7796e&blue=UpSell">
   				<div class="total"><?php echo $this->_tpl_vars['ttm']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmo']; ?>
</div>
		     				
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['ttmg']; ?>
</div>
	     					
	     				</div>
	     			</div>
     					<br style="clear: both; height: 0px; width: 0px; display: inline;">
     			</div>
				<br style="clear: both; height: 0px; width: 0px; display: inline;">
				</a>
			</li>
			<li class="rightArrow <?php if ($this->_tpl_vars['namemodule'] == 'UpSell'): ?>blue<?php endif; ?>">&nbsp;</li>															
			
   			<li class="leftArrow <?php if ($this->_tpl_vars['namemodule'] == 'Renewals'): ?>blue<?php endif; ?>">&nbsp;</li>
   			<li class="<?php if ($this->_tpl_vars['namemodule'] == 'Renewals'): ?>blue<?php endif; ?> status_110 hired middle" style="width: 137.714px;">
   				<a href="index.php?action=index&module=Home&saved=71cb0f85&blue=Renewals">
   				<div class="total"><?php echo $this->_tpl_vars['tacc']; ?>
</div>
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
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['taccr']; ?>
</div>
	     					
	     				</div>
	     				<div class="pending">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['tacco']; ?>
</div>
	     					
	     				</div>
	     				<div class="success">
	     					
		     					<div class="statusIcon"></div>
		     					<div class="statusCountValue"><?php echo $this->_tpl_vars['taccg']; ?>
</div>
	     					
	     				</div>
	     			</div>     				
     			</div>
   				<br style="clear: both; height: 0px; width: 0px; display: inline;">
   				</a>
   			</li>
   			<li class="rightFlat <?php if ($this->_tpl_vars['namemodule'] == 'Renewals'): ?>blue<?php endif; ?>">&nbsp;</li>
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