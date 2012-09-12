<?php

$job_strings[] = 'ReviewOpportunities';

function ReviewOpportunities(){

	$GLOBALS['log']->info('----->Start Scheduler job of type reviewOpportunities()');

 	$op = new Opportunity();
	$query = "select ac.twom_c, ac.id_c, o.id from accounts_cstm ac join accounts_opportunities ao on ac.id_c=ao.account_id join opportunities o on ao.opportunity_id=o.id where datediff(current_date(), o.date_entered) >= 30";
	$GLOBALS['log']->info('----->Start Scheduler job of type reviewOpportunities()-1111');
 	$r = $op->db->query($query);
 	$GLOBALS['log']->info('----->Start Scheduler job of type reviewOpportunities()-2222');
 	while($a = $op->db->fetchByAssoc($r)){ 
 		$twom_c = $a['twom_c'];
 		$id_c = $a['id_c'];
 		$o_id = $a['id'];
 		$GLOBALS['log']->info('----->Start Scheduler job of type reviewOpportunities()-33333'.$o_id);
	 	if($twom_c == '_none'){
		 	$op->db->query("update accounts_cstm set opplist_c = 'osred' where id_c ='".$id_c."'");
		 	$query = "UPDATE opportunities_cstm SET opplist_c = 'osred' WHERE id_c in ('".$o_id."')";
			$op->db->query($query);
	 	}
	 	if($twom_c == 'tmorange'){
	 		$query = "update accounts_cstm set twom_c = 'tmsred' where id_c ='".$id_c."'";
	 		$op->db->query($query);
	 		$query = "update meetings_cstm set twom_c = 'tmsred' where id_c in (select m.id from meetings m join accounts a on m.parent_id=a.id where a.id ='".$id_c."')";
	 		$op->db->query($query);
	 	}
 	}
 	$GLOBALS['log']->info('----->End Scheduler job of type reviewOpportunities()');

	return true;
}
?>