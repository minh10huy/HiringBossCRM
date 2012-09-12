 <?php
require_once('include/MVC/Controller/SugarController.php'); 

class AccountsController extends SugarController { 
    function action_editview(){ 
        global $app_list_strings; 
         
        $this->view = 'edit'; 
        $GLOBALS['view'] = $this->view; 

        require_once('modules/Leads/Lead.php');
        
        $lead_bean = new Lead();
        $lead_list = $lead_bean->get_list('', "leads.account_id = '{$this->bean->id}'");
        
        if(count($lead_list['list']) > 0) {
            $lead = array_shift($lead_list['list']);
            
            $this->bean->status = $lead->status;
        }
    }
    
    
     function action_detailview(){ 
        global $app_list_strings; 
         
        $this->view = 'detail'; 
        $GLOBALS['view'] = $this->view; 
         
        require_once('modules/Leads/Lead.php');
        
        $lead_bean = new Lead();
        $lead_list = $lead_bean->get_list('', "leads.account_id = '{$this->bean->id}'");
        
        if(count($lead_list['list']) > 0) {
            $lead = array_shift($lead_list['list']);
            
            $this->bean->status = $lead->status;
        }
    }
}  
 ?> 