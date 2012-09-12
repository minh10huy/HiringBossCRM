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


class PendingContactsDashlet extends DashletGeneric { 
    function PendingContactsDashlet($id, $def = null) {
        global $current_user, $app_strings;
		require('modules/Contacts/Dashlets/PendingContactsDashlet/PendingContactsDashlet.data.php');
        
        parent::DashletGeneric($id, $def);

        if(empty($def['title'])) $this->title = 'Pending Contacts';
        
        $this->searchFields = $dashletData['PendingContactsDashlet']['searchFields'];
        $this->columns = $dashletData['PendingContactsDashlet']['columns'];
                                                             
        $this->seedBean = new Contact();        
    }
    
    function process($lvsParams = array()) 
    {          
	     // Custom SQL
	     //$GLOBALS['log']->debug($_REQUEST['chevron']);
	     //$chevron = $_REQUEST['chevron'];
	
	     //$GLOBALS['log']->info('TTT');
	            
	     //$GLOBALS['log']->info($lvsParams);
	     if(isset($_GET['saved']) and !empty($_GET['saved'])){
	     	$savedselect = $_GET['saved'];
	     	switch ($savedselect) {
	     		case '570c0afa':
	     			$lvsParams = array(
	     				//'custom_from' => ' JOIN accounts_contacts ac ON ac.contact_id=contact.id',
	     		        'custom_where' => ' AND (contacts.id in (select ac.contact_id from accounts_contacts ac join accounts a on ac.account_id=a.id join accounts_cstm acstm on a.id=acstm.id_c and acstm.coldcalls_c in (\'ccforange\', \'ccsorange\')))',             
					); 
	     		break;
	     		case 'ee9f21d5':
	     			$lvsParams = array(
	     				//'custom_from' => ' JOIN accounts_contacts ac ON ac.contact_id=contact.id',
	     		        'custom_where' => ' AND (contacts.id in (select ac.contact_id from accounts_contacts ac join accounts a on ac.account_id=a.id join accounts_cstm acstm on a.id=acstm.id_c and acstm.contact_c in (\'contactforange\', \'contactsorange\', \'contacttorange\')))',             
					); 
	     		break;
	     		case 'd237174d':
	     			$lvsParams = array(
	     				//'custom_from' => ' JOIN accounts_contacts ac ON ac.contact_id=contact.id',
	     		        'custom_where' => ' AND (contacts.id in (select ac.contact_id from accounts_contacts ac join accounts a on ac.account_id=a.id join accounts_cstm acstm on a.id=acstm.id_c and acstm.onem_c in (\'onemforange\', \'onemsorange\')))',             
					); 
	     		break;
	     		case '86826629':
	     			$lvsParams = array(
	     				//'custom_from' => ' JOIN accounts_contacts ac ON ac.contact_id=contact.id',
	     		        'custom_where' => ' AND (contacts.id in (select ac.contact_id from accounts_contacts ac join accounts a on ac.account_id=a.id join accounts_cstm acstm on a.id=acstm.id_c and acstm.opplist_c in (\'oorange\')))',             
					); 
	     		break;
	     		case '2ac7796e':
	     			$lvsParams = array(
	     				//'custom_from' => ' JOIN accounts_contacts ac ON ac.contact_id=contact.id',
	     		        'custom_where' => ' AND (contacts.id in (select ac.contact_id from accounts_contacts ac join accounts a on ac.account_id=a.id join accounts_cstm acstm on a.id=acstm.id_c and acstm.twom_c in (\'tmorange\')))',             
					); 
	     		break;
	     		case '71cb0f85':
	     			$lvsParams = array(
	     				//'custom_from' => ' JOIN accounts_contacts ac ON ac.contact_id=contact.id',
	     		        'custom_where' => ' AND (contacts.id in (select ac.contact_id from accounts_contacts ac join accounts a on ac.account_id=a.id join accounts_cstm acstm on a.id=acstm.id_c and acstm.accsigned_c in (\'accorange\')))',             
					); 
	     		break;
	     		default:
	     			;
	     		break;
	     	}
	     }
	     
	     parent::process($lvsParams);
    }
}

?>
