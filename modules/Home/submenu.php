<?php
	$counts = new Account();
	$tcom = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where company_c in ('cogreen') and id_c in (select id from accounts where deleted = 0)", true);
	$sugar_smarty->assign('tcom', $tcom);
/*End Company*/
	$tcc = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where company_c in ('cogreen') and coldcalls_c in ('ccred', 'ccorange', 'ccfgreen', 'ccsgreen', 'cctgreen') and id_c in (select id from accounts where deleted = 0)", true);
	$sugar_smarty->assign('tcc', $tcc);
	//Count target sales
	$query = "select coldcallstarget_c, contacttarget_c, leadtarget_c from tasks_cstm where id_c='aa473797-c89b-20cd-d7cc-503deeef6c78'";
		$r = $counts->db->query($query);
		while($a = $counts->db->fetchByAssoc($r)){
	    	$b = $a['coldcallstarget_c'];
	    	$c = $a['contacttarget_c'];
	    	$d = $a['leadtarget_c'];
	    }
	if($b != NULL and trim($b) != ''){
		$sugar_smarty->assign('tcct', $b);
	}
	
	$tccr = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where company_c in ('cogreen') and coldcalls_c in ('ccred') and id_c in (select a.id from accounts a join calls c on a.id=c.parent_id where a.deleted = 0 and c.deleted = 0)", true);
	$sugar_smarty->assign('tccr', $tccr);
	
	$tcco = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where company_c in ('cogreen') and coldcalls_c in ('ccorange') and id_c in (select id from accounts where deleted = 0)", true);
	$sugar_smarty->assign('tcco', $tcco);
	
	$tccg = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where company_c in ('cogreen') and coldcalls_c in ('ccfgreen', 'ccsgreen', 'cctgreen') and id_c in (select a.id from accounts a join calls c on a.id=c.parent_id where a.deleted = 0 and c.deleted = 0)", true);
	$sugar_smarty->assign('tccg', $tccg);
/*End Cold calls*/
	$tct = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where coldcalls_c in ('ccfgreen', 'ccsgreen', 'cctgreen') and contact_c in ('contactred', 'contactforange', 'contactsorange', 'contacttorange', 'contactgreen') and id_c in (select id from accounts where deleted = 0)", true);
	$sugar_smarty->assign('tct', $tct);
	
	if($c != NULL and trim($c) != ''){
		$sugar_smarty->assign('tcontactt', $c);
	}
	
	$tctr = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where coldcalls_c in ('ccfgreen', 'ccsgreen', 'cctgreen') and contact_c in ('contactred') and id_c in (select id from accounts where deleted = 0)", true);
	$sugar_smarty->assign('tctr', $tctr);
	
	$tcto = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where coldcalls_c in ('ccfgreen', 'ccsgreen', 'cctgreen') and contact_c in ('contactforange', 'contactsorange', 'contacttorange') and id_c in (select id from accounts where deleted = 0)", true);
	$sugar_smarty->assign('tcto', $tcto);
	
	$tctg = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where coldcalls_c in ('ccfgreen', 'ccsgreen', 'cctgreen') and contact_c in ('contactgreen') and id_c in (select id from accounts where deleted = 0)", true);
	$sugar_smarty->assign('tctg', $tctg);
/*End Contact*/
	$tom = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where contact_c in ('contactgreen') and onem_c in ('onemfred', 'onemsred', 'onemforange', 'onemsorange', 'onemgreen') and id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted =0)", true);
	$sugar_smarty->assign('tom', $tom);
	
	if($d != NULL and trim($d) != ''){
		$sugar_smarty->assign('tleadt', $d);
	}
	
	$tomr = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where contact_c in ('contactgreen') and onem_c in ('onemfred', 'onemsred') and id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted =0)", true);
	$sugar_smarty->assign('tomr', $tomr);
	
	$tomo = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where contact_c in ('contactgreen') and onem_c in ('onemforange', 'onemsorange') and id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted =0)", true);
	$sugar_smarty->assign('tomo', $tomo);
	
	$tomg = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where contact_c in ('contactgreen') and onem_c in ('onemgreen') and id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted =0)", true);
	$sugar_smarty->assign('tomg', $tomg);
/*End 1st Meetings*/
	$topp = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where onem_c='onemgreen' and opplist_c in ('ofred', 'osred', 'oorange', 'ofgreen', 'osgreen') and id_c in (select a.id from accounts a join accounts_opportunities ao on a.id=ao.account_id join opportunities o on ao.opportunity_id=o.id where o.deleted = 0 and a.deleted = 0)", true);
	$sugar_smarty->assign('topp', $topp);
	
	$toppr = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where onem_c='onemgreen' and opplist_c in ('ofred', 'osred') and id_c in (select a.id from accounts a join accounts_opportunities ao on a.id=ao.account_id join opportunities o on ao.opportunity_id=o.id where o.deleted = 0 and a.deleted = 0)", true);
	$sugar_smarty->assign('toppr', $toppr);
	
	$toppo = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where onem_c='onemgreen' and opplist_c in ('oorange') and id_c in (select a.id from accounts a join accounts_opportunities ao on a.id=ao.account_id join opportunities o on ao.opportunity_id=o.id where o.deleted = 0 and a.deleted = 0)", true);
	$sugar_smarty->assign('toppo', $toppo);
	
	$toppg = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where onem_c='onemgreen' and opplist_c in ('ofgreen', 'osgreen') and id_c in (select a.id from accounts a join accounts_opportunities ao on a.id=ao.account_id join opportunities o on ao.opportunity_id=o.id where o.deleted = 0 and a.deleted = 0)", true);
	$sugar_smarty->assign('toppg', $toppg);
/*End Opportunities*/
	$ttm = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where opplist_c in ('ofgreen', 'osgreen') and twom_c in ('tmfred', 'tmsred', 'tmorange', 'tmgreen') and id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted = 0)", true);
	$sugar_smarty->assign('ttm', $ttm);
	
	$ttmr = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where opplist_c in ('ofgreen', 'osgreen') and twom_c in ('tmfred', 'tmsred') and id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted = 0)", true);
	$sugar_smarty->assign('ttmr', $ttmr);
	
	$ttmo = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where opplist_c in ('ofgreen', 'osgreen') and twom_c in ('tmorange') and id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted = 0)", true);
	$sugar_smarty->assign('ttmo', $ttmo);
	
	$ttmg = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where opplist_c in ('ofgreen', 'osgreen') and twom_c in ('tmgreen') and id_c in (select a.id from accounts a join meetings m on a.id=m.parent_id where a.deleted = 0 and m.deleted = 0)", true);
	$sugar_smarty->assign('ttmg', $ttmg);
/*End 2nd Meetings*/
	$tacc = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where twom_c in ('tmgreen') and accsigned_c in ('accfred', 'accsred', 'accorange', 'accgreen') and id_c in (select id from accounts where deleted = 0)", true);
	$sugar_smarty->assign('tacc', $tacc);
	
	$taccr = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where twom_c in ('tmgreen') and accsigned_c in ('accfred', 'accsred') and id_c in (select id from accounts where deleted = 0)", true);
	$sugar_smarty->assign('taccr', $taccr);
	
	$tacco = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where twom_c in ('tmgreen') and accsigned_c in ('accorange') and id_c in (select id from accounts where deleted = 0)", true);
	$sugar_smarty->assign('tacco', $tacco);
	
	$taccg = $counts->_get_num_rows_in_query("select count(*) from accounts_cstm where twom_c in ('tmgreen') and accsigned_c in ('accgreen') and id_c in (select id from accounts where deleted = 0)", true);
	$sugar_smarty->assign('taccg', $taccg);
/*End Accounts*/


	if(isset($_GET['parentTab']) and $_GET['module'] != 'Calls'){
		$_GET['blue'] = '';
		$takenamemodule = ' ';
	}
	if(isset($_GET['return_action'])){
		$_GET['blue'] = '';
		$takenamemodule = ' ';
	}
	if(isset($_GET['blue']) and !empty($_GET['blue'])){
		$takenamemodule = $_GET['blue']; 
		$sugar_smarty->assign('namemodule', $takenamemodule);
		$_GET['blue'] = '';
		//echo $takenamemodule;
		//echo $_GET['changeblue'];
	}
	echo $sugar_smarty->fetch('include/MySugar/tpls/submenu.tpl', true);
	
?>