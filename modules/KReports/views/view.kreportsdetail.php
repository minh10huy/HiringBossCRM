<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * This file is part of KReporter. KReporter is an enhancement developed
 * by Christian Knoll. All rights are (c) 2012 by Christian Knoll
 *
 * This Version of the KReporter is licensed software and may only be used in
 * alignment with the License Agreement received with this Software.
 * This Software is copyrighted and may not be further distributed without
 * witten consent of Christian Knoll
 *
 * You can contact Christian Knoll at info@kreporter.org
 *
 ********************************************************************************/
require_once('include/MVC/View/views/view.detail.php');
require_once('include/utils.php');
require_once('modules/KReports/utils.php');

global $dictionary;
if($dictionary['KReport']['edition'] == 'premium')
{
	require_once('modules/KReports/KReportChart.php');
}

class KReportsViewDetail extends ViewDetail {

 	function KReportsViewDetail(){
 		parent::ViewDetail();
 	}
 	
 	function json_decode_kinamu($json)
	{ 
	    // Author: walidator.info 2009
	    $comment = false;
	    $out = '$x=';
	   
	    for ($i=0; $i<strlen($json); $i++)
	    {
	        if (!$comment)
	        {
	            if ($json[$i] == '{' or $json[$i] == '[')        $out .= ' array(';
	            else if ($json[$i] == '}' or $json[$i] == ']')    $out .= ')';
	            else if ($json[$i] == ':')    $out .= '=>';
	            else                         $out .= $json[$i];           
	        }
	        else $out .= $json[$i];
	        if ($json[$i] == '"')    $comment = !$comment;
	    }
	    
	    if($out != '$x=')
	    {
	   		eval($out . ';');
	    	return $x;
	    }
	    else
	    	return '';
	}  
	
	 function display() {

        global $app_list_stings, $mod_strings, $current_language, $current_user, $dictionary;
		
        // set the edition
        $this->ss->assign("kreporteredition", $dictionary['KReport']['edition']);
        
        // 2010-07-18 put the current report into the session so we can open the tree agan 
        if(!isset($_REQUEST['favid'])) $_SESSION['KReports']['lastviewed'] = $this->bean->report_module . '::' . $this->bean->id;
        
        // 2010-07-21 write an update to the kreportsstats
        $GLOBALS['db']->query('INSERT INTO kreportstats SET id=\'' . create_guid() . '\', user_id=\'' . $current_user->id . '\', report_id=\'' . $this->bean->id . '\', date=\'' . $GLOBALS['timedate']->get_gmt_db_datetime() . '\'');

        // build the langiage strings
		$mod_lang = return_module_language($current_language, 'KReports');
		
		foreach($mod_lang as $id => $value)
		{
			$returnArray[] = array('lblid' => $id, 'value' => $value);
		}
		
		$this->ss->assign('jsonlanguage', json_encode_kinamu($returnArray));	 		
	 		
 		// build the Field List for the JSON Reader
 		$arrayList =  $this->json_decode_kinamu( html_entity_decode($this->bean->listfields));
 		$fieldArray  = '[';
 		
 		foreach($arrayList as $thisList){
 			if ($fieldArray != '[') $fieldArray .=  ',';
 			$fieldArray .= '{name : \'' . trim($thisList['fieldid'], ':') . '\'}';
 			
 			// see if we nee to add a field for the currency_id to the store 2010-12-25 
 			if($this->bean->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['type'] == 'currency' || (isset($this->bean->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['kreporttype']) &&  $this->bean->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['kreporttype'] == 'currency'))
 				$fieldArray .= ',{name : \'' . trim($thisList['fieldid'], ':') . '_curid\'}';
 		}	
 		
       	//$fieldArray .= trim($fieldArray, ',');
      	$fieldArray .= "]";
      	$fieldArray = htmlentities($fieldArray, ENT_QUOTES);
 		$this->ss->assign('listfieldarray', $fieldArray);
      	
 		// dynamic Select Options
 		/*
 		$whereFieldsList =  $this->json_decode_kinamu( html_entity_decode($this->bean->whereconditions));
 		
 		foreach($whereFieldsList as $whereFieldKey =>$whereField)
 		{
 			if($whereField['usereditable'] == 'yes')
 			{
 				// 2011-03-10 for values where pe parse for the editview differently 
 				// special handling for specific types
 				switch($whereField['operator'])
 				{
 					
 				}
 				
 				$editableWhereFields[] = $whereField;
 			}
 		}
*/
 		$editableWhereFields = $this->bean->get_runtime_wherefilters();
 		
 		$jsonWhereOptions = str_replace("\"", "'", json_encode_kinamu($editableWhereFields));
 		
 		
 		if(count($editableWhereFields) > 0)
 			$this->ss->assign('dynamicoptions', $jsonWhereOptions);
 		else
 			$this->ss->assign('dynamicoptions', '');
 		
 		// for the map and the Geocoding
 		$mapDetails = json_decode(html_entity_decode($this->bean->mapoptions), true);
		if(isset($mapDetails['hasMap']) && $mapDetails['hasMap'] == true )
		{
			$this->ss->assign('hasmap', 'X');
			
			global $sugar_config;
			$this->ss->assign('bingmapskey', $sugar_config['bing_maps_key']);
		}
 		
	 	if(isset($mapDetails['geocodeEnable']) && $mapDetails['geocodeEnable'] == true )
			$this->ss->assign('geocodeEnable', 'X');

 		// for the charts
 		if(isset($this->bean->chart_layout) && $this->bean->chart_layout != '-' && $this->bean->chart_layout != '')
 		{
 			$this->ss->assign('haschart', 'X');
 			$thisChartArray = new KReportChartArray($this->bean, $this->json_decode_kinamu(html_entity_decode($this->bean->chart_params_new)), $this->bean->chart_height, $this->bean->chart_layout);
 			$this->ss->assign('chartdata', $thisChartArray->renderCharts($this->bean->chart_height));
 			//$this->ss->assign('chartdata', $this->bean->renderCharts());
 		}
 		else
 		{
 			$this->ss->assign('haschart', 'N');
 		}	
 		
 		// set the view js
 		if($this->bean->listtype == '') $this->bean->listtype = 'standard';
 		$this->ss->assign('viewJS', $this->setFormatVars() . '<script type="text/javascript" src="modules/KReports/views/view.detail.' .  $this->bean->listtype . '.js" charset="utf-8"></script>');

 		// override the options settings if the user is the admin
 		$optionsJson =  json_decode(html_entity_decode($this->bean->reportoptions));
 		if($current_user->is_admin)
 		{
 			$optionsJson->showTools = true;
 			$optionsJson->showExport = true;
 			$optionsJson->showSnapshots = true;
 		}
 		$this->ss->assign('reportoptions', json_encode($optionsJson));
 		
 		// process the view
		parent::display();
 	}
	
 	function setFormatVars(){
 		global $current_user;
 		
 		$varJS  = '<script type="text/javascript">';
 		
 		$varJS .= 'kreport_default_currency_symbol = \'' . $GLOBALS['sugar_config']['default_currency_symbol'] .'\';';
 		$varJS .= 'kreport_dec_sep = \'' . $_SESSION[$current_user->user_name . '_PREFERENCES']['global']['dec_sep'] .'\';';
 		$varJS .= 'kreport_num_grp_sep = \'' . $_SESSION[$current_user->user_name . '_PREFERENCES']['global']['num_grp_sep'] .'\';';
 		$varJS .= 'kreport_default_currency_significant_digits = \'' . $_SESSION[$current_user->user_name . '_PREFERENCES']['global']['default_currency_significant_digits'] .'\';';
 		
 		// get currencies
 		$curResArray = $GLOBALS['db']->query('SELECT id, symbol FROM currencies WHERE deleted = \'0\'');
 		
 		$curArray = array();
 		$curArray['-99'] = $GLOBALS['sugar_config']['default_currency_symbol'];
 		while($thisCurEntry = $GLOBALS['db']->fetchByAssoc($curResArray))
 		{
 			$curArray[$thisCurEntry['id']] = $thisCurEntry['symbol'];
 		}
 		$varJS .= 'kreport_currencies = ' . json_encode($curArray) . ';';
 		$varJS .= '</script>';
 		
 		return $varJS;
 	}
}
?>
