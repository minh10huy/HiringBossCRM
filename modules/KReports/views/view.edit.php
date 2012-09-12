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
require_once('include/json_config.php');
require_once('include/MVC/View/views/view.edit.php');
require_once('modules/KReports/utils.php');

global $dictionary;
if($dictionary['KReport']['edition'] == 'premium')
{
	require_once('modules/KReports/KReportChart.php');
}

class KReportsViewEdit extends ViewEdit {
   
 	function KReportsViewEdit(){
 		parent::ViewEdit();
 	}
 	
/*
 * 
 * Ovveride the Display to pass along the Language Strings
 * 
 */
 	function display() {
        global $app_list_strings, $mod_strings, $current_language, $dictionary;
		
        // set the edition
        $this->ss->assign("kreporteredition", $dictionary['KReport']['edition']);
        
		$mod_lang = return_module_language($current_language, 'KReports');
		
		foreach($mod_lang as $id => $value)
		{
			$returnArray[] = array('lblid' => $id, 'value' => $value);
		}
		
		// add the app list array we need
		foreach($this->bean->field_defs as $fieldId => $fieldDetails)
		{
			if(isset($fieldDetails['options']))
			{
				$thisString = jarray_encode_kinamu($app_list_strings[$fieldDetails['options']]);
				$returnArray[] = array('lblid' => $fieldId . '_options', 'value' => jarray_encode_kinamu($app_list_strings[$fieldDetails['options']]));
			}
		}
		
		// set the language
		$langJson = json_encode_kinamu($returnArray);
		$this->ss->assign('jsonlanguage', json_encode_kinamu($returnArray));
		
		// if we are in the premium Edition set the color schema
		if($dictionary['KReport']['edition'] == 'premium')
			$this->ss->assign('colorschema', json_encode_kinamu(KReportChartArray::getColorSchema()));
		
		// see if we have a return id
		if(!isset($_REQUEST['return_id']) || $_REQUEST['return_id'] == '')
			$_REQUEST['return_id'] = $this->bean->id;
		
		// and go
		parent::display();
 	}
 	
}

?>
