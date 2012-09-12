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


require_once('include/MVC/View/views/view.list.php');

class AccountsViewList extends ViewList
{
 	public function preDisplay()
 	{
 		parent::preDisplay();
 		$this->lv->targetList = true;
 	}
 	var $where0 = "accounts_cstm.company_c in ('cogreen') and accounts_cstm.id_c in (select id from accounts where deleted = 0)";
 	/*End Company*/
 	var $where1 = "accounts_cstm.company_c in ('cogreen') and accounts_cstm.coldcalls_c in ('ccredf', 'ccreds', 'ccforange', 'ccsorange', 'ccgreen') and accounts_cstm.id_c in (select a.id from accounts a join calls c on a.id=c.parent_id where a.deleted = 0 and c.deleted = 0)";
	var $where2 = "accounts_cstm.company_c in ('cogreen') and accounts_cstm.coldcalls_c in ('ccredf', 'ccreds') and accounts_cstm.id_c in (select a.id from accounts a join calls c on a.id=c.parent_id where a.deleted = 0 and c.deleted = 0)";
	var $where3 = "accounts_cstm.company_c in ('cogreen') and accounts_cstm.coldcalls_c in ('ccforange', 'ccsorange') and accounts_cstm.id_c in (select a.id from accounts a join calls c on a.id=c.parent_id where a.deleted = 0 and c.deleted = 0)";
	var $where4 = "accounts_cstm.company_c in ('cogreen') and accounts_cstm.coldcalls_c in ('ccgreen') and accounts_cstm.id_c in (select a.id from accounts a join calls c on a.id=c.parent_id where a.deleted = 0 and c.deleted = 0)";
	/*End Cold Calls*/
	var $where5 = "accounts_cstm.coldcalls_c in ('ccfgreen', 'ccsgreen', 'cctgreen') and accounts_cstm.contact_c in ('contactred', 'contactforange', 'contactsorange', 'contactgreen') and accounts_cstm.id_c in (select id from accounts where deleted = 0)";
	var $where6 = "accounts_cstm.coldcalls_c in ('ccfgreen', 'ccsgreen', 'cctgreen') and accounts_cstm.contact_c in ('contactred') and accounts_cstm.id_c in (select id from accounts where deleted = 0)";
	var $where7 = "accounts_cstm.coldcalls_c in ('ccfgreen', 'ccsgreen', 'cctgreen') and accounts_cstm.contact_c in ('contactforange', 'contactsorange') and accounts_cstm.id_c in (select id from accounts where deleted = 0)";
	var $where8 = "accounts_cstm.coldcalls_c in ('ccfgreen', 'ccsgreen', 'cctgreen') and accounts_cstm.contact_c in ('contactgreen') and accounts_cstm.id_c in (select id from accounts where deleted = 0)";
	/*End Contact*/
	var $where9 = "accounts_cstm.contact_c in ('contactgreen') and accounts_cstm.onem_c in ('onemfred', 'onemsred', 'onemforange', 'onemsorange', 'onemgreen') and accounts_cstm.id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted =0)";
	var $where10 = "accounts_cstm.contact_c in ('contactgreen') and accounts_cstm.onem_c in ('onemfred', 'onemsred') and accounts_cstm.id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted =0)";
	var $where11 = "accounts_cstm.contact_c in ('contactgreen') and accounts_cstm.onem_c in ('onemforange', 'onemsorange') and accounts_cstm.id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted =0)";
	var $where12 = "accounts_cstm.contact_c in ('contactgreen') and accounts_cstm.onem_c in ('onemgreen') and accounts_cstm.id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted =0)";
	/*End 1st Meetings*/
	var $where13 = "accounts_cstm.onem_c='onemgreen' and accounts_cstm.opplist_c in ('ofred', 'osred', 'oorange', 'ofgreen', 'osgreen') and accounts_cstm.id_c in (select a.id from accounts a join accounts_opportunities ao on a.id=ao.account_id join opportunities o on ao.opportunity_id=o.id where o.deleted = 0 and a.deleted = 0)";
	var $where14 = "accounts_cstm.onem_c='onemgreen' and accounts_cstm.opplist_c in ('ofred', 'osred') and accounts_cstm.id_c in (select a.id from accounts a join accounts_opportunities ao on a.id=ao.account_id join opportunities o on ao.opportunity_id=o.id where o.deleted = 0 and a.deleted = 0)";
	var $where15 = "accounts_cstm.onem_c='onemgreen' and accounts_cstm.opplist_c in ('oorange') and accounts_cstm.id_c in (select a.id from accounts a join accounts_opportunities ao on a.id=ao.account_id join opportunities o on ao.opportunity_id=o.id where o.deleted = 0 and a.deleted = 0)";
	var $where16 = "accounts_cstm.onem_c='onemgreen' and accounts_cstm.opplist_c in ('ofgreen', 'osgreen') and accounts_cstm.id_c in (select a.id from accounts a join accounts_opportunities ao on a.id=ao.account_id join opportunities o on ao.opportunity_id=o.id where o.deleted = 0 and a.deleted = 0)";
	/*End Opportunities*/
	var $where17 = "accounts_cstm.opplist_c in ('ofgreen', 'osgreen') and accounts_cstm.twom_c in ('tmfred', 'tmsred', 'tmorange', 'tmgreen') and accounts_cstm.id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted = 0)";
	var $where18 = "accounts_cstm.opplist_c in ('ofgreen', 'osgreen') and accounts_cstm.twom_c in ('tmfred', 'tmsred') and accounts_cstm.id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted = 0)";
	var $where19 = "accounts_cstm.opplist_c in ('ofgreen', 'osgreen') and accounts_cstm.twom_c in ('tmorange') and accounts_cstm.id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted = 0)";
	var $where20 = "accounts_cstm.opplist_c in ('ofgreen', 'osgreen') and accounts_cstm.twom_c in ('tmgreen') and accounts_cstm.id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted = 0)";
	/*End 2nd Meetings*/
	var $where21 = "accounts_cstm.twom_c in ('tmgreen') and accounts_cstm.accsigned_c in ('accfred', 'accsred', 'accorange', 'accgreen') and accounts_cstm.id_c in (select id from accounts where deleted = 0)";
	var $where22 = "accounts_cstm.twom_c in ('tmgreen') and accounts_cstm.accsigned_c in ('accfred', 'accsred') and accounts_cstm.id_c in (select id from accounts where deleted = 0)";
	var $where23 = "accounts_cstm.twom_c in ('tmgreen') and accounts_cstm.accsigned_c in ('accorange') and accounts_cstm.id_c in (select id from accounts where deleted = 0)";
	var $where24 = "accounts_cstm.twom_c in ('tmgreen') and accounts_cstm.accsigned_c in ('accgreen') and accounts_cstm.id_c in (select id from accounts where deleted = 0)";
	/*End Accounts signed*/
	var $where25 = "";
 	var $where26 = "";
 	var $where27 = "";
	//var $where10 = "accounts.signed = '1'";
	/*function AccountsViewList()
    {
        parent::ViewList();
    }*/
   function listViewProcess(){
        $this->processSearchForm();
        $this->lv->searchColumns = $this->searchForm->searchColumns;
		//unset($this->searchForm->searchdefs['layout']['advanced_search']);
        if(!$this->headers)
            return;
        if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false){
            $this->lv->ss->assign("SEARCH",true);
            if(isset($_GET['return_module']) and isset($_GET['return_action'])){
	            if($_GET['return_module'] == 'Accounts' and $_GET['return_action'] == 'DetailView'){
	            	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
		            echo $this->lv->display();
	            }
            }
            if(isset($_REQUEST['saved_search_select_name'])){
	            if($this->where != '' or $_REQUEST['saved_search_select_name'] != ''){
		            $this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
		            echo $this->lv->display();
	            }
            }
            if(isset($_GET['parentTab']) and $_GET['module'] == 'Accounts'){
	    		$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
			    echo $this->lv->display();
	    	}
	    	if(!isset($_GET['parentTab']) and !empty($_GET['saved'])){
		    	$savedselect = $_GET['saved'];
		    	switch ($savedselect) {
		    		//Company
		    		case '5598d292':
			    		$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where0, $this->params);
						echo $this->lv->display();
		    		break;
		    		//Cold Calls
		    		case '570c0afa':
		    			//$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where1, $this->params);
			        	//echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where3, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where2, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where4, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case '12f485ab':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where2, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case '277c20b7':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where3, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case '6e52a85b':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where4, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		//Contacts
		    		case 'ee9f21d5':
		    			//$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where5, $this->params);
			        	//echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where7, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where6, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where8, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case 'b491d3d3':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where6, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case '2f844f1a':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where7, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case '626e8d14':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where8, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		//1st Meetings
		    		case 'd237174d':
		    			//$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where9, $this->params);
			        	//echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where11, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where10, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where12, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case '87d94471':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where10, $this->params);
			        	echo $this->lv->display();
		    		break;		
		    		case '44986da6':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where11, $this->params);
			        	echo $this->lv->display();
		    		break;		
		    		case 'ede24a7f':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where12, $this->params);
			        	echo $this->lv->display();
		    		break;	
		    		//Opportunities
		    		case '86826629':
		    			//$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where13, $this->params);
			        	//echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where15, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where14, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where16, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case '7655c329':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where14, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case '3da8aedf':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where15, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case 'a1d73ed7':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where16, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		//2nd Meetings
		    		case '2ac7796e':
		    			//$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where17, $this->params);
			        	//echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where19, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where18, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where20, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case '1f8b1640':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where18, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case '97fb7028':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where19, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case 'a4de80ca':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where20, $this->params);
			        	echo $this->lv->display();
		    		break;	
		    		//Accounts signed
		    		case '71cb0f85':
		    			//$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where21, $this->params);
			        	//echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where23, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where22, $this->params);
			        	echo $this->lv->display();
			        	$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where24, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case 'f1c3e53e':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where22, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case 'd02dc25a':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where23, $this->params);
			        	echo $this->lv->display();
		    		break;
		    		case 'a4dec989':
		    			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where24, $this->params);
			        	echo $this->lv->display();
		    		break;	
		    		
		    	}
	    	}
        }
        
    }
	function listViewPrepare() {
        $oldRequest = $_REQUEST;
        parent::listViewPrepare();
        $_REQUEST = $oldRequest;
    }
    
}
