<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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





require_once('include/Dashlets/DashletGeneric.php');


class PendingNegotiationAccountsDashlet extends DashletGeneric { 
    function PendingNegotiationAccountsDashlet($id, $def = null) {
		global $current_user, $app_strings;
		require('modules/Accounts/Dashlets/PendingNegotiationAccountsDashlet/PendingNegotiationAccountsDashlet.data.php');

        parent::DashletGeneric($id, $def);

        if(empty($def['title'])) $this->title = 'Pending Negotiation';

        $this->searchFields = $dashletData['PendingNegotiationAccountsDashlet']['searchFields'];
        $this->columns = $dashletData['PendingNegotiationAccountsDashlet']['columns'];
        $this->seedBean = new Account();        
    }
    
    /**
     * Overrides the generic process to include custom logic for email addresses,
     * since they are no longer stored in  a list view friendly manner.
     * (A record may have an undetermined number of email addresses).
     *
     * @param array $lvsParams
     */
     
	function process($lvsParams = array()) {
    	/*if (isset($this->displayColumns) && array_search('email1', $this->displayColumns) !== false) {
	    	$lvsParams['custom_select'] = ', email_address as email1';
	    	$lvsParams['custom_from'] = ' LEFT JOIN email_addr_bean_rel eabr ON eabr.deleted = 0 AND bean_module = \'Accounts\''
	    							  . ' AND eabr.bean_id = accounts.id AND primary_address = 1'
	    							  . ' LEFT JOIN email_addresses ea ON ea.deleted = 0 AND ea.id = eabr.email_address_id';
    	}
    	
        if (isset($this->displayColumns) && array_search('parent_name', $this->displayColumns) !== false) {
	    	$lvsParams['custom_select'] = empty($lvsParams['custom_select']) ? ', a1.name as parent_name ' : $lvsParams['custom_select'] . ', a1.name as parent_name ';
	    	$lvsParams['custom_from'] = empty($lvsParams['custom_from']) ? ' LEFT JOIN accounts a1 on a1.id = accounts.parent_id' : $lvsParams['custom_from'] . ' LEFT JOIN accounts a1 on a1.id = accounts.parent_id';
    	}    */	
		if(isset($_GET['saved']) and $_GET['saved'] == '2ac7796e'){
		$lvsParams = array(
	     				//'custom_from' => ' JOIN accounts_contacts ac ON ac.contact_id=contact.id',
	     		        'custom_where' => ' AND (accounts.id in (select acstm.id_c from accounts_cstm acstm where acstm.twom_c in (\'tmorange\')))',             
					); 
		}
    		parent::process($lvsParams);
		
    }
}

?>
