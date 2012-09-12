<?php
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
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');
require_once('include/utils.php');
require_once('modules/KReports/utils.php');

global $dictionary;
if (array_key_exists('KReport', $dictionary) && $dictionary ['KReport'] ['edition'] == 'premium') {
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
	    eval($out . ';');
	    return $x;
	}  
	
	 function display() {

        global $app_list_stings, $mod_strings, $current_language, $current_user;
		
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
 		}	
 		
       	//$fieldArray .= trim($fieldArray, ',');
      	$fieldArray .= "]";
 		$this->ss->assign('listfieldarray', $fieldArray);
      	
 		
 		// same for the column model
 		reset($arrayList);
 		
 		$columnModelArray = '[';
 		foreach($arrayList as $thisList){
 		//	if($thisList['display'] == 'yes')
 		//	{
 		    if($this->bean->listtype != 'grptree' || ($this->bean->listtype == 'grptree' && ($thisList['groupby'] == 'no' || $thisList['groupby'] == 'yes' || $thisList['groupby'] == $this->bean->getMaxGroupLevel())))
 		    {
 		    	if($columnModelArray != '[') $columnModelArray .= ',';
 				$columnModelArray .= '{header : \'' . trim($thisList['name'], ':') 
 				    . '\', width: ' . ((isset($thisList['width']) && $thisList['width'] != ''  && $thisList['width'] != '0') ? $thisList['width'] : '150') .
 				    ', sortable: false, dataIndex: \'' . trim($thisList['fieldid'], ':') . 
 				    ((isset($thisList['sqlfunction']) && $thisList['sqlfunction'] != '-' ) ? '\', summaryType:\'' . $thisList['sqlfunction'] : '') 
 				    . '\'' . ($thisList['display'] != 'yes' ? ', hidden: true': '')
 					. '}';
 		    }
 		//	}
 		}
 		
 		// close the Array
 		$columnModelArray .= "]";

 		$this->ss->assign('columnmodeldarray', $columnModelArray);
 		
 		// dynamic Select Options
 		$whereFieldsList =  $this->json_decode_kinamu( html_entity_decode($this->bean->whereconditions));
 		
 		foreach($whereFieldsList as $whereFieldKey =>$whereField)
 		{
 			if($whereField['usereditable'] == 'yes')
 			{
 				$editableWhereFields[] = $whereField;
 			}
 		}

 	
 		$jsonWhereOptions = str_replace("\"", "'", json_encode_kinamu($editableWhereFields));
 		if(count($editableWhereFields) > 0)
 			$this->ss->assign('dynamicoptions', $jsonWhereOptions);
 		else
 			$this->ss->assign('dynamicoptions', '');
 			
 		$mapDetails = json_decode(html_entity_decode($this->bean->mapoptions), true);
		if(isset($mapDetails['hasMap']) && $mapDetails['hasMap'] == true )
		{
			$this->ss->assign('hasmap', 'X');
			
			global $sugar_config;
			$this->ss->assign('bingmapskey', $sugar_config['bing_maps_key']);
		}
 		
 		// KINAMUPRO begin
 		if(isset($this->bean->chart_layout) && $this->bean->chart_layout != '-' && $this->bean->chart_layout != '')
 		{
 			$this->ss->assign('haschart', 'X');
 			$thisChartArray = new KReportChartArray($this->bean, $this->json_decode_kinamu(html_entity_decode($this->bean->chart_params_new)), $this->bean->chart_height, $this->bean->chart_layout);
 			$this->ss->assign('chartdata', $thisChartArray->renderCharts($this->bean->chart_height));
 		}
 		else
 		{
 			$this->ss->assign('haschart', 'N');
 		}
 		// KINAMUPRO end	
 		
 		// set the view js
 		if($this->bean->listtype == '') $this->bean->listtype = 'standard';
 		$this->ss->assign('viewJS', '<script type="text/javascript" src="modules/KReports/views/view.detail.' .  $this->bean->listtype . /* @ObfsProperty@ */'.js"></script>');
 		
 		switch($this->bean->listtype)
 		{
 			case 'grptree': 
 			     $jsInclude =  '<link rel="stylesheet" type="text/css" href="custom/kinamu/extjs/ux/treegrid/treegrid.css" rel="stylesheet" />
						        <script type="text/javascript" src="custom/kinamu/extjs/ux/treegrid/TreeGridSorter.js"></script>
						        <script type="text/javascript" src="custom/kinamu/extjs/ux/treegrid/TreeGridColumnResizer.js"></script>
						        <script type="text/javascript" src="custom/kinamu/extjs/ux/treegrid/TreeGridNodeUI.js"></script>
						        <script type="text/javascript" src="custom/kinamu/extjs/ux/treegrid/TreeGridLoader.js"></script>
						        <script type="text/javascript" src="custom/kinamu/extjs/ux/treegrid/TreeGridColumns.js"></script>
						        <script type="text/javascript" src="custom/kinamu/extjs/ux/treegrid/TreeGrid.js"></script>';
 				$this->ss->assign('addViewJS', $jsInclude);
 				break;
 			case 'pivot': 
 		 		$listTypeProperties =  $this->json_decode_kinamu( html_entity_decode($this->bean->listtypeproperties));
		 		if(is_array($listTypeProperties))
		 		{
		 			$xAxis = $this->json_decode_kinamu($listTypeProperties[0]);
		 			$xAxisArray = '[';
		 			foreach($xAxis as $xAxisField)
		 			{
		 				if($xAxisArray != '[') $xAxisArray .= ',';
		 				$xAxisArray .= '{ width: 150, dataIndex: \'' . $xAxisField['fieldid'] . '\'}';
		 			}
		 			$xAxisArray .= ']';
		 		
		 			$yAxis = $this->json_decode_kinamu($listTypeProperties[1]);
		 			$yAxisArray = '[';
		 			foreach($yAxis as $yAxisField)
		 			{
		 				if($yAxisArray != '[') $yAxisArray .= ',';
		 				$yAxisArray .= '{ dataIndex: \'' . $yAxisField['fieldid'] . '\'}';
		 			}
		 			$yAxisArray .= ']';
		 			
		 			$jsInclude =  '<script type="text/javascript">
		 								var kreportPivotGridMeasure = ' . $listTypeProperties[2] . ';
		 								var kreportPivotGridXaxis = ' . $xAxisArray . ';
		 								var kreportPivotGridYaxis = ' . $yAxisArray . ';
		 						  </script>';
		 			
		 			$this->ss->assign('addViewJS', $jsInclude);
		 		}
 				break;
 		}
 		
		parent::display();
 	}
	
}
?>
