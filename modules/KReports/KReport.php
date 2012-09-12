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
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );

require_once ('modules/KReports/utils.php');
require_once ('modules/KReports/KReportQuery.php');
// require_once('modules/KReports/database/kreportMysqliManager.php');

// Task is used to store customer information.


global $dictionary;
if (array_key_exists('KReport', $dictionary) && $dictionary ['KReport'] ['edition'] == 'premium') {
	
	require_once ('modules/KReports/KFC/FusionCharts_Gen.php');
	require_once ('modules/KReports/KFC/KFC_Colors.php');
	require_once ('modules/KReports/BingMaps/BingMaps.php');
}

class KReport extends SugarBean {
	var $field_name_map;
	
	// Stored fields
	var $id;
	var $date_entered;
	var $date_modified;
	var $assigned_user_id;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
	var $report_module = '';
	var $reportoptions = '';
	var $team_id;
	
	var $description;
	var $name;
	var $status;
	var $assigned_user_name;
	
	var $team_name;
	
	var $table_name = "kreports";
	var $object_name = "KReport";
	var $module_dir = 'KReports';
	
	var $importable = true;
	// This is used to retrieve related fields from form posts.
	// var $additional_column_fields = Array('assigned_user_name', 'assigned_user_id', 'contact_name', 'contact_phone', 'contact_email', 'parent_name');
	

	/*
	//what we need to build the where join string
	var $tablePath;
	var $joinSegments;
	var $rootGuid;
	var $fromString;
	*/
	var $whereOverride;
	
	//2010-02-10 add Field name Mapping
	var $fieldNameMap;
	
	// the query Array
	var $kQueryArray;
	
	//2011-02-03 for the total values
	var $totalResult = '';
	
	// 2011-03-29 array for the formula evaluation
	var $formulaArray = '';
	
	// variable taht allows to turn off the evaluation of SQL Functions
	// needed if we let the Grid do this
	var $evalSQLFunctions = true;
	
	// varaible to hold the depth of the join tree
	var $maxDepth;
	
	// var to hold an array of all list fields with index fieldid
	var $listFieldArrayById = array ();
	
	// for the context handling
	var $hasContext = false;
	var $contextFields = array ();
	var $contexts = array ();
	
	function KReport() {
		parent::SugarBean ();
	}
	
	function bean_implements($interface) {
		switch ($interface) {
			case 'ACL' :
				return true;
		}
		return false;
	}
	
	function get_summary_text() {
		return $this->name;
	}
	
	function retrieve($id = -1, $encode = true, $deleted = true) {
		//return $this;
		
		parent::retrieve ( $id, $encode, $deleted );
		if ($this->id != '') {
			$arrayList = json_decode ( html_entity_decode ( $this->listfields, ENT_QUOTES ), true );
			foreach ( $arrayList as $listFieldData )
				$this->listFieldArrayById [$listFieldData ['fieldid']] = $listFieldData;
		
		}
		return $this;
	}
	
	/*
	 * Function to get the enum values for a field
	 */
	
	function getEnumValues($fieldId) {
		global $app_list_strings;
		
		// fix 2010-10-25 .. enums not found for charts
		// fix 2011-03-07 ... in a union scenario we might have different enums and need to merge them
		/*
		if(isset($this->fieldNameMap[$fieldId]['fields_name_map_entry']['options']))	
		{
			return $app_list_strings[$this->fieldNameMap[$fieldId]['fields_name_map_entry']['options']];
		}
		else
		{
			return '';
		}
		*/
		// loop over all kquery entries in teh query array and merge Options from the $app_list_strings
		$retArray = array ();
		foreach ( $this->kQueryArray->queryArray as $unionid => $unionkQuery ) {
			if (isset ( $unionkQuery ['kQuery']->fieldNameMap [$fieldId] ['fields_name_map_entry'] ['options'] )) {
				foreach ( $app_list_strings [$unionkQuery ['kQuery']->fieldNameMap [$fieldId] ['fields_name_map_entry'] ['options']] as $key => $value )
					$retArray [$key] = $value;
			}
		}
		
		if (count ( $retArray ) > 0)
			return $retArray;
		else
			return '';
	}
	
	function fill_in_additional_detail_fields() {
		parent::fill_in_additional_detail_fields ();
		if ($this->report_module != '') {
			//$sqlArray = $this->build_sql_string();
		

		//$this->sql_statement = $sqlArray['select'] . ' ' . $sqlArray['from'] . ' ' . $sqlArray['where'] . ' ' . $sqlArray['groupby'] . ' ' . $sqlArray['orderby'] ;
		}
	}
	
	/*
	 * Function to return the Fielname from a given Path
	 */
	function getFieldNameFromPath($pathName) {
		return substr ( $pathName, strrpos ( $pathName, "::" ) + 2, strlen ( $pathName ) );
	}
	
	/*
	 * Function to return the Pathname from a given Path
	 */
	function getPathNameFromPath($pathName) {
		return substr ( $pathName, 0, strrpos ( $pathName, "::" ) );
	}
	
	function get_report_main_sql_query($evalSQLFunctions = true, $additionalFilter = '', $additionalGroupBy = array(), $parameters = array()) {
		//global $db, $app_list_strings, $beanList, $beanFiles;
		

		// bugfix add ENT_QUOTES so we get proper translation of also single quotes 2010-25-12
		$arrayWhere = json_decode_kinamu ( html_entity_decode ( $this->whereconditions, ENT_QUOTES ) );
		$arrayList = json_decode_kinamu ( html_entity_decode ( $this->listfields, ENT_QUOTES ) );
		$arrayWhereGroups = json_decode_kinamu ( html_entity_decode ( $this->wheregroups, ENT_QUOTES ) );
		$arrayUnionList = json_decode_kinamu ( html_entity_decode ( $this->unionlistfields, ENT_QUOTES ) );
		
		// evaluate report Options and pass them along to the Query Array
		$reportOptions = json_decode_kinamu ( html_entity_decode ( $this->reportoptions, ENT_QUOTES ) );
		
		if (isset ( $reportOptions ['authCheck'] ))
			$paramsArray ['authChecklevel'] = $reportOptions ['authCheck'];
		if (isset ( $reportOptions ['showDeleted'] ))
			$paramsArray ['showDeleted'] = $reportOptions ['showDeleted'];
		
		// pass along the context of the report query for additional filtering of selection criteria
		if (isset ( $parameters ['context'] ))
			$paramsArray ['context'] = $parameters ['context'];
		if (isset ( $parameters ['parentbean'] ))
			$paramsArray ['parentbean'] = $parameters ['parentbean'];
		
		if (isset ( $parameters ['sortseq'] ))
			$paramsArray ['sortseq'] = $parameters ['sortseq'];
		if (isset ( $parameters ['sortid'] ))
			$paramsArray ['sortid'] = $parameters ['sortid'];
		
		if (isset ( $parameters ['exclusiveGrouping'] ))
			$paramsArray ['exclusiveGrouping'] = $parameters ['exclusiveGrouping'];
		
		$this->kQueryArray = new KReportQueryArray ( $this->report_module, $this->union_modules, $evalSQLFunctions, $arrayList, $arrayUnionList, $arrayWhere, $additionalFilter, $arrayWhereGroups, $additionalGroupBy, $paramsArray );
		$sqlString = $this->kQueryArray->build_query_strings ();
		$this->fieldNameMap = $this->kQueryArray->fieldNameMap;
		return $sqlString;
	
		// return array('select' => $this->kQueryArray->selectString, 'from' => $this->kQueryArray->fromString, 'where' => $this->kQueryArray->whereString ,'fields' => '', 'groupby' => $this->kQueryArray->groupbyString, 'having' => $this->kQueryArray->havingString , 'orderby' => $this->kQueryArray->orderbyString);
	}
	/*
	 * build the SQL String
	 * deprecated will be removed
	 */
	
	function build_sql_string() {
		global $db, $app_list_strings, $beanList, $beanFiles;
		
		$arrayWhere = json_decode_kinamu ( html_entity_decode ( $this->whereconditions ) );
		$arrayList = json_decode_kinamu ( html_entity_decode ( $this->listfields ) );
		$arrayWhereGroups = json_decode_kinamu ( html_entity_decode ( $this->wheregroups ) );
		
		$kQuery = new KReportQuery ( $this->report_module, $this->evalSQLFunctions, $arrayList, $arrayWhere, $arrayWhereGroups );
		
		$kQuery->build_query_strings ();
		$this->fieldNameMap = $kQuery->fieldNameMap;
		
		return array ('select' => $kQuery->selectString, 'from' => $kQuery->fromString, 'where' => $kQuery->whereString, 'fields' => '', 'groupby' => $kQuery->groupbyString, 'orderby' => $kQuery->orderbyString );
	
	}
	// 2010-12-18 added function for formatting based on FieldType
	function getFieldTypeById($fieldID) {
		if ($this->fieldNameMap == null)
			$this->get_report_main_sql_query ( '', true, '' );
		return $this->fieldNameMap [$fieldID] ['type'];
	}
	
	function buildLinks($fieldArray, $excludeFields = array()) {
		global $app_list_strings, $timedate;
		
		foreach ( $fieldArray as $fieldID => $fieldValue ) {
			if (isset ( $this->fieldNameMap [$fieldID] ) && $this->fieldNameMap [$fieldID] ['islink'] && ! in_array ( $fieldID, $excludeFields )) {
				// swith if we have aunion query
				if (isset ( $fieldArray ['unionid'] ))
					$fieldValue = '<a href="index.php?module=' . $this->kQueryArray->queryArray [$fieldArray ['unionid']] ['kQuery']->fieldNameMap [$fieldID] ['module'] . '&action=DetailView&record=' . $fieldArray [$this->kQueryArray->queryArray [$fieldArray ['unionid']] ['kQuery']->fieldNameMap [$fieldID] ['tablealias'] . 'id'] . '" target="_new" class="tabDetailViewDFLink">' . $fieldValue . '</a>';
				else
					$fieldValue = '<a href="index.php?module=' . $this->kQueryArray->queryArray ['root'] ['kQuery']->fieldNameMap [$fieldID] ['module'] . '&action=DetailView&record=' . $fieldArray [$this->fieldNameMap [$fieldID] ['tablealias'] . 'id'] . '" target="_new" class="tabDetailViewDFLink">' . $fieldValue . '</a>';
			}
			$returnArray [$fieldID] = $fieldValue;
		}
		return $returnArray;
	}
	
	function evaluateWidgets($fieldArray, $excludeFields = array()) {
		global $app_list_strings, $timedate;
		
		$listFieldArray = json_decode ( html_entity_decode ( $this->listfields ), true );
		
		foreach ( $fieldArray as $fieldID => $fieldValue ) {
			if (isset($this->listFieldArrayById [$fieldID] ['widget']) && $this->listFieldArrayById [$fieldID] ['widget'] != '') {
				require_once ('modules/KReports/KReporterWidgets/' . $this->listFieldArrayById [$fieldID] ['widget'] . '.php');
				$widgetClass = new $this->listFieldArrayById [$fieldID] ['widget'] ();
				$fieldValue = $widgetClass->renderField ( $fieldValue );
			}
			$returnArray [$fieldID] = $fieldValue;
		}
		return $returnArray;
	}
	
	function calculateValueOfTotal($fieldArray) {
		// set the returnarray
		$returnArray = $fieldArray;
		
		// this is ugly .. whould bring this to the front
		foreach ( $this->kQueryArray->queryArray ['root'] ['kQuery']->listArray as $thisFieldData ) {
			if ($thisFieldData ['valuetype'] != '' && $thisFieldData ['valuetype'] != '-' && isset ( $this->totalResult [$thisFieldData ['fieldid'] . '_total'] ) && $this->totalResult [$thisFieldData ['fieldid'] . '_total'] > 0) {
				$valuetypeArray = split ( 'OF', $thisFieldData ['valuetype'] );
				switch ($valuetypeArray [0]) {
					case 'P' :
						// calculate the value
						$returnArray [$thisFieldData ['fieldid']] = round ( ( double ) $returnArray [$thisFieldData ['fieldid']] / ( double ) $this->totalResult [$thisFieldData ['fieldid'] . '_total'] * 100, 2 );
						
						// set the format to float so we interpret this as number
						$this->fieldNameMap [$thisFieldData ['fieldid']] ['type'] = 'float';
						$this->fieldNameMap [$thisFieldData ['fieldid']] ['format_suffix'] = '%';
						break;
					case 'D' :
						// calculate the value
						$returnArray [$thisFieldData ['fieldid']] = round ( ( double ) $returnArray [$thisFieldData ['fieldid']] - ( double ) $this->totalResult [$thisFieldData ['fieldid'] . '_total'], 2 );
						break;
				
				}
			}
		}
		
		// return the Results
		return $returnArray;
	}
	
	function formatFields($fieldArray, $excludeFields = array(), $toPdf = false, $forceUTF8 = false) {
		require_once ('modules/Currencies/Currency.php');
		
		global $app_list_strings, $mod_strings, $timedate;
		
		// 2012-03-29 memorize the complete fields ... has issues with the currencies
		$completeFieldArray = $fieldArray;
		
		foreach ( $fieldArray as $fieldID => $fieldValue ) {
			// get the FieldDetails from the Query
			$fieldDetails = $this->kQueryArray->queryArray ['root'] ['kQuery']->get_listfieldentry_by_fieldid ( $fieldID );
			
			if (isset ( $this->fieldNameMap [$fieldID] ) && ! in_array ( $fieldID, $excludeFields ) && (! isset ( $fieldDetails ['customsqlfunction'] ) || (isset ( $fieldDetails ['customsqlfunction'] ) && $fieldDetails ['customsqlfunction'] == ''))) {
				switch ($this->fieldNameMap [$fieldID] ['type']) {
					case 'boolean':
					case 'bool':
						$fieldValue =  $fieldValue == '1' ? $mod_strings['LBL_BOOL_1'] : $mod_strings['LBL_BOOL_0'];
						break;
					case 'currency' :
						// 2012-06-26 add unformated field
						$returnArray[$fieldID . '_unformatted'] = $fieldValue;
						
						// 2010-12-16 right align the field if it is a currency field
						// 2011-03-27 if toPDF utf8 encode the currency symbol 
						// 2012-03-29 update regarding crrency ids in HTML dashlets 
						//            changed from referenbce to Field arry to complete field array
						//$fieldValue = (! $toPdf ? '<div style="text-align:right;">' : '') . ($forceUTF8 ?  currency_format_number ( $fieldValue, array ('currency_id' => $fieldArray [$fieldID . '_curid'], 'currency_symbol' => true) )  : currency_format_number ( $fieldValue, array ('currency_id' => $fieldArray [$fieldID . '_curid'], 'currency_symbol' => true ) )) . (! $toPdf ? '</div>' : '');
						$fieldValue = (! $toPdf ? '<div style="text-align:right;">' : '') . ($forceUTF8 ?  currency_format_number ( $fieldValue, array ('currency_id' => $completeFieldArray [$fieldID . '_curid'], 'currency_symbol' => true) )  : currency_format_number ( $fieldValue, array ('currency_id' => $completeFieldArray [$fieldID . '_curid'], 'currency_symbol' => true ) )) . (! $toPdf ? '</div>' : '');
						
						break;
					// 2011-03-11 int does not need format
					//case 'int': 
					case 'float' :
					case 'double' :
						// 2012-06-26 add unformated field
						$returnArray[$fieldID . '_unformatted'] = $fieldValue;
						
						// BUG 2010-10-29 diaplay number formatted properly
						// $fieldValue = format_number($fieldValue, 0, 0);
						$fieldValue = currency_format_number ( $fieldValue, array ('currency_symbol' => false ) );
						// see if we need to add a suffix (used for the percantage values)
						if (isset ( $this->fieldNameMap [$fieldID] ['format_suffix'] ))
							$fieldValue .= $this->fieldNameMap [$fieldID] ['format_suffix'];
						break;
					case 'enum' :
					case 'radioenum' :
						// 2011-03-07 add the orig value for the treeid
						$returnArray [$fieldID . '_val'] = $fieldValue;
						// bug 2011-03-07 fields might have different options if in a join
						//$fieldValue = $app_list_strings[$this->fieldNameMap[$fieldID]['fields_name_map_entry']['options']][$fieldValue];
						$fieldValue = $app_list_strings [$this->kQueryArray->queryArray [(isset ( $fieldArray ['unionid'] ) ? $fieldArray ['unionid'] : 'root')] ['kQuery']->fieldNameMap [$fieldID] ['fields_name_map_entry'] ['options']] [$fieldValue];
						
						// bug 2011-05-25
						// if value is empty we return the original value
						if($fieldValue == '') $fieldValue = $returnArray [$fieldID . '_val'];
						break;
					case 'multienum' :
						// do not format if we have a function (Count ... etc ... )
						if ($this->fieldNameMap [$fieldID] ['sqlFunction'] == '') {
							$fieldArray = preg_split ( '/\^,\^/', $fieldValue );
							//bugfix 2010-09-22 if only one value is selected 
							if (is_array ( $fieldArray ) && count ( $fieldArray ) > 1) {
								$fieldValue = '';
								foreach ( $fieldArray as $thisFieldValue ) {
									if ($fieldValue != '')
										$fieldValue .= ', ';
									
		//bugfix 2010-09-22 trim the prefix since this is starting and ending with 
									// bug 2011-03-07 fields might have different options if in a join
									// $fieldValue .= 	$app_list_strings[$this->fieldNameMap[$fieldID]['fields_name_map_entry']['options']][trim($thisFieldValue, '^')];
									$fieldValue .= $app_list_strings [$this->kQueryArray->queryArray [(isset ( $fieldArray ['unionid'] ) ? $fieldArray ['unionid'] : 'root')] ['kQuery']->fieldNameMap [$fieldID] ['fields_name_map_entry'] ['options']] [trim ( $thisFieldValue, '^' )];
								}
							} else {
								// bug 2011-03-07 fields might have different options if in a join
								//$fieldValue = $app_list_strings[$this->fieldNameMap[$fieldID]['fields_name_map_entry']['options']][trim($fieldValue, '^')];
								$fieldValue = $app_list_strings [$this->kQueryArray->queryArray [(isset ( $fieldArray ['unionid'] ) ? $fieldArray ['unionid'] : 'root')] ['kQuery']->fieldNameMap [$fieldID] ['fields_name_map_entry'] ['options']] [trim ( $fieldValue, '^' )];
							}
						}
						// $fieldValue = '<FONT style="COLOR: yellow"><B><I>' . $fieldValue . '</FONT></B></I>';
						break;
					case 'date' :
						// 2012-01-31 return empty value if value is emtpy
						$fieldValue = ($fieldValue != '' ? $timedate->to_display_date ( $fieldValue ) : '');
						//$fieldValue =  $timedate->to_display_date ( $fieldValue ) ;
						break;
					case 'datetime' :
					case 'datetimecombo' :
						// 2012-01-31 return empty value if value is emtpy
						$fieldValue = ($fieldValue != '' ?$timedate->to_display_date_time ( $fieldValue ) : '');
						//$fieldValue = $timedate->to_display_date_time ( $fieldValue );
						break;
				}
				/* removed since we build links separate
				// check if we have to establish a link
				if($buildlinks && $this->fieldNameMap[$fieldID]['islink'])
				{
					$fieldValue = '<a href="index.php?module=' . $this->fieldNameMap[$fieldID]['module'] . '&action=DetailView&record=' . $fieldArray[$this->fieldNameMap[$fieldID]['tablealias'] . 'id'] .'" target="_new" class="tabDetailViewDFLink">' . $fieldValue . '</a>';
				}
				*/
			}
			
			$returnArray [$fieldID] = $fieldValue;
		}
		
		return $returnArray;
	}
	
	/*
	 * only render enums to the language depended values - if we do not format
	 */
	function formatEnums($fieldArray, $excludeFields = array()) {
		require_once ('modules/Currencies/Currency.php');
		
		global $app_list_strings, $timedate;
		
		foreach ( $fieldArray as $fieldID => $fieldValue ) {
			// get the FieldDetails from the Query
			$fieldDetails = $this->kQueryArray->queryArray ['root'] ['kQuery']->get_listfieldentry_by_fieldid ( $fieldID );
			
			if (isset ( $this->fieldNameMap [$fieldID] ) && ! in_array ( $fieldID, $excludeFields ) && (! isset ( $fieldDetails ['customsqlfunction'] ) || (isset ( $fieldDetails ['customsqlfunction'] ) && $fieldDetails ['customsqlfunction'] == ''))) {
				switch ($this->fieldNameMap [$fieldID] ['type']) {
					
					case 'enum' :
					case 'radioenum' :
						// 2011-03-07 add the orig value for the treeid
						$returnArray [$fieldID . '_val'] = $fieldValue;
						// bug 2011-03-07 fields might have different options if in a join
						//$fieldValue = $app_list_strings[$this->fieldNameMap[$fieldID]['fields_name_map_entry']['options']][$fieldValue];
						if($fieldValue != '' && isset($this->kQueryArray->queryArray [(isset ( $fieldArray ['unionid'] ) ? $fieldArray ['unionid'] : 'root')] ['kQuery']->fieldNameMap [$fieldID] ['fields_name_map_entry'] ['options']))
							$fieldValue = $app_list_strings [$this->kQueryArray->queryArray [(isset ( $fieldArray ['unionid'] ) ? $fieldArray ['unionid'] : 'root')] ['kQuery']->fieldNameMap [$fieldID] ['fields_name_map_entry'] ['options']] [$fieldValue];
						
						// bug 2011-05-25
						// if value is empty we return the original value
						if($fieldValue == '') $fieldValue = $returnArray [$fieldID . '_val'];
						break;
					case 'multienum' :
						// do not format if we have a function (Count ... etc ... )
						if ($this->fieldNameMap [$fieldID] ['sqlFunction'] == '') {
							$fieldArray = preg_split ( '/\^,\^/', $fieldValue );
							//bugfix 2010-09-22 if only one value is selected 
							if (is_array ( $fieldArray ) && count ( $fieldArray ) > 1) {
								$fieldValue = '';
								foreach ( $fieldArray as $thisFieldValue ) {
									if ($fieldValue != '')
										$fieldValue .= ', ';
									
		//bugfix 2010-09-22 trim the prefix since this is starting and ending with 
									// bug 2011-03-07 fields might have different options if in a join
									//$fieldValue .= 	$app_list_strings[$this->fieldNameMap[$fieldID]['fields_name_map_entry']['options']][trim($thisFieldValue, '^')];
									$fieldValue .= $app_list_strings [$this->kQueryArray->queryArray [(isset ( $fieldArray ['unionid'] ) ? $fieldArray ['unionid'] : 'root')] ['kQuery']->fieldNameMap [$fieldID] ['fields_name_map_entry'] ['options']] [trim ( $thisFieldValue, '^' )];
								}
							} else {
								// bug 2011-03-07 fields might have different options if in a join
								// $fieldValue = $app_list_strings[$this->fieldNameMap[$fieldID]['fields_name_map_entry']['options']][trim($fieldValue, '^')];
								$fieldValue = $app_list_strings [$this->kQueryArray->queryArray [(isset ( $fieldArray ['unionid'] ) ? $fieldArray ['unionid'] : 'root')] ['kQuery']->fieldNameMap [$fieldID] ['fields_name_map_entry'] ['options']] [trim ( $fieldValue, '^' )];
							}
						}
						break;
				}
			}
			
			$returnArray [$fieldID] = $fieldValue;
		}
		
		return $returnArray;
	}
	
	/*
	 * 2011-12-07 added fuinction to format dates properly adjusting to the users timezone
	 */
	function formatDates($fieldArray, $excludeFields = array()) {
		
		global $app_list_strings, $timedate;
		
		foreach ( $fieldArray as $fieldID => $fieldValue ) {
			// get the FieldDetails from the Query
			$fieldDetails = $this->kQueryArray->queryArray ['root'] ['kQuery']->get_listfieldentry_by_fieldid ( $fieldID );
			
			if (isset ( $this->fieldNameMap [$fieldID] ) && ! in_array ( $fieldID, $excludeFields ) && (! isset ( $fieldDetails ['customsqlfunction'] ) || (isset ( $fieldDetails ['customsqlfunction'] ) && $fieldDetails ['customsqlfunction'] == ''))) {
				switch ($this->fieldNameMap [$fieldID] ['type']) {
					case 'date' :
					case 'datetime' :
					case 'datetimecombo' :						
						$fieldValue = ($fieldValue != '' ? $timedate->handle_offset ( $fieldValue, $timedate->get_db_date_time_format(), true) : '');
						// $fieldValue =  $timedate->handle_offset ( $fieldValue, $timedate->get_db_date_time_format(), true) ;
						break;
				}
			}
			
			$returnArray [$fieldID] = $fieldValue;
		}
		
		return $returnArray;
	}	
	
	/*
	 * only render time Fields
	 */
	function formateDateTime($fieldArray, $excludeFields = array()) {
		
		global $app_list_strings, $timedate;
		
		foreach ( $fieldArray as $fieldID => $fieldValue ) {
			// get the FieldDetails from the Query
			$fieldDetails = $this->kQueryArray->queryArray ['root'] ['kQuery']->get_listfieldentry_by_fieldid ( $fieldID );
			
			if (isset ( $this->fieldNameMap [$fieldID] ) && ! in_array ( $fieldID, $excludeFields ) && (! isset ( $fieldDetails ['customsqlfunction'] ) || (isset ( $fieldDetails ['customsqlfunction'] ) && $fieldDetails ['customsqlfunction'] == ''))) {
				switch ($this->fieldNameMap [$fieldID] ['type']) {
					
					case 'datetime' :
					case 'datetimecombo' :
						// 2012-01-31 return empty value if value is emtpy
						$fieldValue = $timedate->to_display_date_time ( $fieldValue );
						break;
					
				}
			}
			
			$returnArray [$fieldID] = $fieldValue;
		}
		
		return $returnArray;
	}
	
	function getXtypeRenderer($fieldType, $fieldID = '') {
		global $current_user, $mod_strings;
		
		// check if we have a custom SQL function -- then reset the value .. we do  not know how to format
		$listFieldArray = $this->kQueryArray->queryArray ['root'] ['kQuery']->get_listfieldentry_by_fieldid ( $fieldID );
		
		// manage switching of Fieldtypes 
		// TODO: this is ugly here but currently required - no better solution available
		if (isset($listFieldArray['sqlfunction']) && $listFieldArray ['sqlfunction'] == 'COUNT')
			$fieldType = 'int';
		if (isset($listFieldArray ['customsqlfunction']) && $listFieldArray ['customsqlfunction'] != '')
			$fieldType = '';
		if (isset($listFieldArray ['valuetype']) && $listFieldArray ['valuetype'] != '-' && $listFieldArray ['valuetype'] != '' && substr ( $listFieldArray ['valuetype'], 0, 1 ) == 'P')
			$fieldType = 'percentage';
		
		// process thee fieldtypes
		switch ($fieldType) {
			case 'currency' :
				// 2011-04-14 replaced handling for specific Characters
				$numberFormat = '0';
				// check if we have a 1000 separator
				if ($_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] != '')
					$numberFormat .= ',' . '000';
				
				//check if we hav significant digits
				if ($_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['default_currency_significant_digits'] > 0) {
					$numberFormat .= '.';
					for($i = 0; $i < $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['default_currency_significant_digits']; $i ++)
						$numberFormat .= '0';
				}
				// add a custom renderer for the currency
				return ', renderer: function(value, metadata, record){if(value != null){if(record.data.' . $fieldID . '_curid == undefined) record.data.' . $fieldID . '_curid = -99; return Ext.util.Format.number(value, kreport_currencies[record.data.' . $fieldID . '_curid] + \'' . $numberFormat . '\').replace(/\\,/g, \'' . '#' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] . '#' . '\').replace(/\\./g, \'' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['dec_sep'] . '\').replace(/' . '#' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] . '#' . '/g, \'' .  $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] .  '\'); }else return value;}, css: \'text-align:right;\'';
				break;
			case 'percentage' :
				// BUG 2011-05-18 make sure we render dec dec seperator properly
				//return ', renderer: function(value, metadata, record){if(value != null) return value + \'%\'; else return value;}, css: \'text-align:center;\'';
				
				$numberFormat = '0';
				// check if we have a 1000 separator
				if ($_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] != '')
					$numberFormat .= ',' . '000';
				
				//check if we hav significant digits
				if ($_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['default_currency_significant_digits'] > 0) {
					$numberFormat .= '.';
					for($i = 0; $i < $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['default_currency_significant_digits']; $i ++)
						$numberFormat .= '0';
				}
				// add a custom renderer for the currency
				return ', renderer: function(value, metadata, record){if(value != null) return Ext.util.Format.number(value, \'' . $numberFormat . '\').replace(/\\,/g, \'' . '#' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] . '#' . '\').replace(/\\./g, \'' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['dec_sep'] . '\').replace(/' . '#' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] . '#' . '/g, \'' .  $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] .  '\') + \'%\'; else return value;}, css: \'text-align:center;\'';

				break;
			// bug 2011-03-25 format douple & float properly
			case 'double' :
			case 'float' :
				$numberFormat = '0';
				// check if we have a 1000 separator
				if ($_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] != '')
					$numberFormat .= ',' . '000';
				
				//check if we hav significant digits
				if ($_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['default_currency_significant_digits'] > 0) {
					$numberFormat .= '.';
					for($i = 0; $i < $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['default_currency_significant_digits']; $i ++)
						$numberFormat .= '0';
				}
				// add a custom renderer for the currency
				return ', renderer: function(value, metadata, record){if(value != null) return Ext.util.Format.number(value, \'' . $numberFormat . '\').replace(/\\,/g, \'' . '#' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] . '#' . '\').replace(/\\./g, \'' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['dec_sep'] . '\').replace(/' . '#' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] . '#' . '/g, \'' .  $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] .  '\'); else return value;}, css: \'text-align:right;\'';
				break;
			case 'int' :
				return ', css: \'text-align:center;\'';
				break;
			case 'date' :
				//bug 2011-03-11 replace format from 201-3-11 to 2011/3/11 for the lovely IE
				return ', renderer: function(value){if(value != null){return Ext.util.Format.date(value.replace(/-/g, \'/\'), \'' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['datef'] . '\'); }else return value;}';
				//return ', xtype: \'datecolumn\', format: \'' . $_SESSION[$current_user->user_name . '_PREFERENCES']['global']['datef'] . '\', css: \'text-align:center;\'';
				break;
			case 'datetime' :
			case 'datetimecombo' :
				// for date tiem we need a custom renderer
				//bug 2011-03-11 replace format from 201-3-11 to 2011/3/11 for the lovely IE
				//bug 2012-04-10 replace "" with properly escaped characters
				return ', renderer: function(value){if(value != null && value != \'\'){return Ext.util.Format.date(value.replace(/-/g, \'/\').split(\' \')[0], \'' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['datef'] . '\') + \' \' + value.split(\' \')[1]; }else return value;}';
				break;
			case 'bool' :
				// 2011-04-02 render translated label
				//return ', renderer: function(value){if(value == \'0\') return \'false\'; else return \'true\';}';
				// 2011-2011-04-12 change to l from language gettext to match obfuscation!!
				// 2011-06-10 Change to match the translation in PHP already and not in JS - saves the hassle of obfuscation
				return ', renderer: function(value){if(value == \'0\') return \''.$mod_strings['LBL_BOOL_0'].'\'; else return \''.$mod_strings['LBL_BOOL_1'].'\';}';
				break;
			case 'text' : 
				return ', renderer: function(value){if(value != null) return \'<div style="white-space: normal;">\' + value +\'</div>\'; else return \'\';}';
				break;
			default :
				return '';
				break;
		}
		
		// if we end up here we return an empty string
		return '';
	}
	
	/* 
 	 * returns a rednerer Function starting with R + fieldid + Renderer that passes back the proper value
 	 */
	function getRendererFunction($fieldType, $fieldID = '') {
		global $current_user;
		
		// check if we have a custom SQL function -- then reset the value .. we do  not know how to format
		$listFieldArray = $this->kQueryArray->queryArray ['root'] ['kQuery']->get_listfieldentry_by_fieldid ( $fieldID );
		
		// manage switching of Fieldtypes
		if ($listFieldArray ['sqlfunction'] == 'COUNT')
			$fieldType = 'int';
		if ($listFieldArray ['customsqlfunction'] != '')
			$fieldType = '';
		if ($listFieldArray ['valuetype'] != '-' && $listFieldArray ['valuetype'] != '')
			$fieldType = 'percentage';
		
		// process thee fieldtypes
		switch ($fieldType) {
			case 'currency' :
				$numberFormat = '0';
				// check if we have a 1000 separator
				if ($_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] != '')
					$numberFormat .= ',' . '000';
				
		//check if we hav significant digits
				if ($_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['default_currency_significant_digits'] > 0) {
					$numberFormat .= '.';
					for($i = 0; $i < $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['default_currency_significant_digits']; $i ++)
						$numberFormat .= '0';
				}
				// add a custom renderer for the currency
				return 'R' . $fieldID . 'Renderer = function(value){if(value != null) return Ext.util.Format.number(value, kreport_currencies[-99] + \'' . $numberFormat . '\').replace(/\\,/g, \'' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['num_grp_sep'] . '\').replace(/\\./g, \'' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['dec_sep'] . '\'); else return value;};';
				// return ', renderer: function(value, metadata, record){alert(value + \'/\' + record.data.' . $fieldID .'_curid);}, css: \'text-align:right;\'';
				// return '';
				break;
			case 'percentage' :
				return ', renderer: function(value, metadata, record){if(value != null) return value + \'%\'; else return value;}, css: \'text-align:center;\'';
				break;
			case 'date' :
				return 'R' . $fieldID . 'Renderer = function(value){if(value != null){alert(value); return Ext.util.Format.date(value, \'' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['datef'] . '\'); }else return value;};';
				break;
			case 'double' :
			case 'int' :
			case 'float' :
				//return ''; 
				return 'R' . $fieldID . 'Renderer = function(value){return value;};';
				// return ', css: \'text-align:center;\'';
				break;
			case 'datetime' :
			case 'datetimecombo' :
				// for date tiem we need a custom renderer
				return 'R' . $fieldID . 'Renderer = function(value){if(value != null && value != \'\'){alert(value.split(\' \')[0]); return Ext.util.Format.date(value.split(\' \')[0], \'' . $_SESSION [$current_user->user_name . '_PREFERENCES'] ['global'] ['datef'] . '\') + \' \' + value.split(\' \')[1];} else return value;};';
				break;
			default :
				return 'R' . $fieldID . 'Renderer = function(value){return value;};';
				break;
		}
		
		// if we end up here we return an empty string
		return 'R' . $fieldID . 'Renderer = function(value){return value;};';
	}
	
	function takeSnapshot() {
		global $db;
		
		$snapshotID = create_guid ();
		
		// go get the results
		$results = $this->getSelectionResults ( array ('toPDF' => true, 'noFormat' => true ) );
		
		$i = 0;
		foreach ( $results as $resultsrow ) {
			$query = 'INSERT INTO kreportsnapshotsdata SET record_id=\'' . $i . '\', snapshot_id = \'' . $snapshotID . '\', data=\'' . json_encode_kinamu ( $resultsrow ) . '\'';
			$db->query ( $query );
			$i ++;
		}
		
		// create the snapshot record
		$query = 'INSERT INTO kreportsnapshots SET id=\'' . $snapshotID . '\', snapshotdate =\'' . gmdate ( 'Y-m-d H:i:s' ) . '\', report_id=\'' . $this->id . '\'';
		$db->query ( $query );
	}
	
	function createCSV() {
		global $current_user;
		
		$header = '';
		$rows = '';
		
		// see if we need to filter dynamically	  
		$results = $this->getSelectionResults ( array ('toCSV' => true ), isset ( $_REQUEST ['snapshotid'] ) ? $_REQUEST ['snapshotid'] : '0' );
		
		//handel the selection parameters for Excel
		$selParam = '';
		$whereSelectionArray = $this->kQueryArray->get_where_array();
		foreach($whereSelectionArray as $thisArrayEntry)
		{
				$selParam .= $thisArrayEntry['name'] . '/' . $thisArrayEntry['operator'] . '/' .  $thisArrayEntry['value'] ;
				$selParam .= "\n";
		}
		
		$selParam .= "\n";
		
		$arrayList = json_decode_kinamu ( html_entity_decode ( $this->listfields ) );
		
	    //see if we have dynamic cols in the Request ... 
        $dynamicolsOverrid = array();
        if(isset($_REQUEST['dynamicols']) && $_REQUEST['dynamicols'] != '')
        {
              	$dynamicolsOverride = json_decode_kinamu(html_entity_decode($_REQUEST['dynamicols']));
              	$overrideMap = array();
              	foreach($dynamicolsOverride as $thisOverrideKey => $thisOverrideEntry)
              	{
              		$overrideMap[$thisOverrideEntry['dataIndex']] = $thisOverrideKey;
              	}
              	
              	//loop over the listfields
              	for($i = 0; $i < count($arrayList); $i++)
              	{
              		if(isset($overrideMap[$arrayList[$i]['fieldid']]))
              		{
              			// set the display flag
              			if($dynamicolsOverride[$overrideMap[$arrayList[$i]['fieldid']]]['isHidden'] == 'true')
              				$arrayList[$i]['display'] = 'no';
              			else
              				$arrayList[$i]['display'] = 'yes';
              				
              			// set the width
              			$arrayList[$i]['width'] = $dynamicolsOverride[$overrideMap[$arrayList[$i]['fieldid']]]['width'];
              			
              			// set the sequence
              			$arrayList[$i]['sequence'] = $dynamicolsOverride[$overrideMap[$arrayList[$i]['fieldid']]]['sequence'];
              		}
              	}
              	
              	// resort the array
              	usort($arrayList, 'sortFieldArrayBySequence');
        }
		
		$fieldArray = '';
		$fieldIdArray = array ();
		foreach ( $arrayList as $thisList ) {
			if ($thisList ['display'] == 'yes') {
				$fieldArray [] = array ('label' => utf8_decode ( $thisList ['name'] ), 'width' => (isset ( $thisList ['width'] ) && $thisList ['width'] != '' && $thisList ['width'] != '0') ? $thisList ['width'] : '100', 'display' => $thisList ['display'] );
				$fieldIdArray [] = $thisList ['fieldid'];
			}
		}
		
		if (count ( $results > 0 )) {
			foreach ( $results as $record ) {
				$getHeader = ($header == '') ? true : false;
				foreach ( $record as $key => $value ) {
					
					//if($key != 'sugarRecordId')
					$arrayIndex = array_search ( $key, $fieldIdArray );
					if (array_search ( $key, $fieldIdArray ) !== false) {
						if ($getHeader) {
							foreach ( $arrayList as $fieldId => $fieldArray )
								if ($fieldArray ['fieldid'] == $key)
									$header .= iconv ( "UTF-8", $current_user->getPreference ( 'default_export_charset' ), $fieldArray ['name'] ) . $current_user->getPreference ( 'export_delimiter' );
						}
						
						$rows .= '"' . iconv ( "UTF-8", $current_user->getPreference ( 'default_export_charset' ) . '//IGNORE', preg_replace(array('/"/'), array('""'),html_entity_decode ($value, ENT_QUOTES ) )) . '"' . $current_user->getPreference ( ('export_delimiter') );
					}
				}
				if ($getHeader)
					$header .= "\n";
				$rows .= "\n";
			}
		
		}
		
		return $selParam . $header . $rows;
	}
	
	function createTargeList($listname) {
		global $current_user;
		
		$results = $this->getSelectionResults ();
		
		if (count ( $results > 0 )) {
			require_once ('modules/ProspectLists/ProspectList.php');
			$newProspectList = new ProspectList ();
			
			$newProspectList->name = $listname;
			$newProspectList->list_type = 'default';
			$newProspectList->assigned_user_id = $current_user->id;
			$newProspectList->save ();
			
			// fill with results: 
			$newProspectList->load_relationships ();
			
			$linkedFields = $newProspectList->get_linked_fields ();
			
			foreach ( $linkedFields as $linkedField => $linkedFieldData ) {
				if ($newProspectList->$linkedField->_relationship->rhs_module == $this->report_module) {
					// success
					foreach ( $results as $thisRecord ) {
						$newProspectList->$linkedField->add ( $thisRecord ['sugarRecordId'] );
					}
				}
			}
		}
	}
	
	/*
	 * function to fetch Selection Results based on switch of Context
	 */
	function getContextselectionResult($parameters, $getcount = false, $additionalFilter = '', $additionalGroupBy = array()) {
		
		global $db;
		/*
		$db = new MysqliManager();
		
		// switch the db
		$db->connect(array (
		    'db_host_name' => '192.168.1.128',
		    'db_user_name' => 'root',
		    'db_password' => 'root',
		    'db_name' => '01_master_6_1_ce',
		    'db_type' => 'mysql',
		  ));
		 */
		
		// retun an empty array
		$retArray = array ();
		
		// process the list
		if (isset ( $parameters ['grouping'] ) && $parameters ['grouping'] == 'off') {
			$query = $this->get_report_main_sql_query ( false, $additionalFilter, $additionalGroupBy, $parameters );
		
		//$query = $sqlArray['select'] . ' ' . $sqlArray['from'] . ' ' . $sqlArray['where'] . ' ' . $sqlArray['having'] . ' ' . $sqlArray['orderby'];
		} else {
			$query = $this->get_report_main_sql_query ( true, $additionalFilter, $additionalGroupBy, $parameters );
		
		//$query = $sqlArray['select'] . ' ' . $sqlArray['from'] . ' ' . $sqlArray['where'] . ' ' . $sqlArray['groupby'] . ' ' . $sqlArray['having'] . ' ' . $sqlArray['orderby'];
		}
		
		// cehck if we only need the count than we shortcut here
		if ($getcount) {
			// limit the query if a limit is set ... 
			switch ($this->selectionlimit) {
				case 'top10' :
					return $db->getRowCount ( $db->limitquery ( $query, 0, 10 ) );
					break;
				case 'top20' :
					return $db->getRowCount ( $queryResults = $db->limitquery ( $query, 0, 20 ) );
					break;
				case 'top50' :
					return $db->getRowCount ( $queryResults = $db->limitquery ( $query, 0, 50 ) );
					break;
				case 'top250' :
					return $db->getRowCount ( $queryResults = $db->limitquery ( $query, 0, 250 ) );
					break;
				default :
					if ($this->kQueryArray->countSelectString != '') {
						$queryResults = $db->fetchByAssoc ( $db->query ( $this->kQueryArray->countSelectString ) );
						return $queryResults ['totalCount'];
					} else
						return $db->getRowCount ( $queryResults = $db->query ( $query ) );
					break;
			}
		
		//return $this->db->getRowCount($db->query($query));
		}
		
		// process seleciton limit and run the main query
		switch ($this->selectionlimit) {
			case 'top10' :
				$topLimit = 10;
				if (isset ( $parameters ['limit'] ) && $parameters ['limit'] != '' && isset ( $parameters ['start'] ))
					if ($parameters ['limit'] < $topLimit)
						$topLimit = $parameters ['limit'];
				$queryResults = $db->limitquery ( $query, $parameters ['start'], $topLimit );
				break;
			case 'top20' :
				$topLimit = 20;
				if (isset ( $parameters ['limit'] ) && $parameters ['limit'] != '' && isset ( $parameters ['start'] ))
					if ($parameters ['limit'] < $topLimit)
						$topLimit = $parameters ['limit'];
				$queryResults = $db->limitquery ( $query, $parameters ['start'], $topLimit );
				break;
			case 'top50' :
				$topLimit = 50;
				if (isset ( $parameters ['limit'] ) && $parameters ['limit'] != '' && isset ( $parameters ['start'] ))
					if ($parameters ['limit'] < $topLimit)
						$topLimit = $parameters ['limit'];
				$queryResults = $db->limitquery ( $query, $parameters ['start'], $topLimit );
				break;
			case 'top250' :
				$topLimit = 250;
				if (isset ( $parameters ['limit'] ) && $parameters ['limit'] != '' && isset ( $parameters ['start'] ))
					if ($parameters ['limit'] < $topLimit)
						$topLimit = $parameters ['limit'];
				$queryResults = $db->limitquery ( $query, $parameters ['start'], $topLimit );
				break;
			default :
				if (isset ( $parameters ['limit'] ) && $parameters ['limit'] != '' && isset ( $parameters ['start'] )) {
					$queryResults = $db->limitquery ( $query, $parameters ['start'], $parameters ['limit'] );
				} else {
					$queryResults = $db->query ( $query );
				}
				//$queryResults = $this->db->limitquery($query, $parameters['start'], $parameters['limit']);
				break;
		}
		
		// 2011-02-03 added for percentage calculation of total
		//see if we need to query the totals
		if ($this->kQueryArray->totalSelectString != '') {
			$this->totalResult = $db->fetchByAssoc ( $db->query ( $this->kQueryArray->totalSelectString ) );
		}
		
		// preprocess Formulas
		$this->preProcessFormulas ();
		
		// get the restul rows and process them			
		while ( $queryRow = $db->fetchByAssoc ( $queryResults ) ) {
			// process formulas
			$this->processFormulas ( $queryRow );
			
			// just the basic Row
			$formattedRow = $queryRow;
			
			// calculate the percentage or dealtavalues
			if ($this->totalResult != '')
				$formattedRow = $this->calculateValueOfTotal ( $formattedRow );
			
			// format the Fields
			if (! isset ( $parameters ['noFormat'] ) || (isset ( $parameters ['noFormat'] ) && ! $parameters ['noFormat']))
				$formattedRow = $this->formatFields ( $formattedRow, isset ( $parameters ['dontFormat'] ) ? $parameters ['dontFormat'] : array (), isset ( $parameters ['toPDF'] ) || isset ( $parameters ['toCSV'] ) ? true : false, isset ( $parameters ['toPDF'] ) ? true : false );
			else {
				// bug 2011-03-07 ... for charts enums should not be translated - Chart is handling this
				if (! isset ( $parameters ['noEnumTranslation'] ) || (isset ( $parameters ['noEnumTranslation'] ) && ! $parameters ['noEnumTranslation']))
					$formattedRow = $this->formatEnums ( $formattedRow, isset ( $parameters ['dontFormat'] ) ? $parameters ['dontFormat'] : array () );
					
				// 2011-12-07 translate times to local time per usersetting
				$formattedRow = $this->formatDates ( $formattedRow,  isset ( $parameters ['dontFormat'] ) ? $parameters ['dontFormat'] : array ());
			}
			
			//build the links 
			//bugfix 2011-05-18 for links in export .. changed || to &&
			if ((! isset ( $parameters ['toPDF'] ) || (isset ( $parameters ['toPDF'] ) && ! $parameters ['toPDF'])) && (! isset ( $parameters ['toCSV'] ) || (isset ( $parameters ['toCSV'] ) && ! $parameters ['toCSV'])))
				$formattedRow = $this->buildLinks ( $formattedRow, isset ( $parameters ['dontFormat'] ) ? $parameters ['dontFormat'] : array () );
			
		    // widget formatting
			$formattedRow = $this->evaluateWidgets ( $formattedRow );
			
			// return the formatted row
			$retArray [] = $formattedRow;
		}
		$db->connect();
		return $retArray;
	}
	
	/*
	 * Parameters:  
	 * 	- grouping: set to off to not have grouping
	 *  - start: start from record
	 *  - limit: limit to n records from start
	 *  - addSQLFunction: array with fields and custom function that should be used to 
	 *    add/override the basic sql functions
	 *  - noFormat: no formatting done
	 *  - toPDF: formatting is doen but no links are built (not useful in PDF)
	 *  - dontFormat: array with fieldids that should not be formatted when returing 
	 *    e.g. nbeeded for geocoding
	 */
	function getSelectionResults($parameters, $snapshotid = '0', $getcount = false, $additionalFilter = '', $additionalGroupBy = array()) {
		
		// parameter overrid listtype used for Charts
		global $db;
		
		// set a configurable time limit ... 
		//set_time_limit(10);
		
		// return an empty array if we have nothing else
		$retArray = array ();
		
		// get the sql array or retrieve from snapshot if set
		if ($snapshotid == '0' || $snapshotid == 'current') {
			$retArray = $this->getContextselectionResult ( $parameters, $getcount, $additionalFilter, $additionalGroupBy );
		} else {
			$query = 'SELECT data FROM kreportsnapshotsdata WHERE snapshot_id = \'' . $snapshotid . '\'';
			
			// check if we only need the count than we shortcut here
			if ($getcount)
				return $this->db->getRowCount ( $db->query ( $query ) );
			
		// limit the query if requested
			if (isset ( $parameters ['start'] ) && $parameters ['start'] != '') {
				$query .= ' AND record_id >= ' . $parameters ['start'];
			}
			
			if (isset ( $parameters ['limit'] ) && $parameters ['limit'] != '') {
				$query .= ' AND record_id < ' . ($parameters ['start'] + $parameters ['limit']);
			}
			
			$query .= ' ORDER BY record_id ASC';
			
			$snapshotResults = $db->query ( $query );
			
			// still need to process this to have all teh setting for theformat
			$sqlArray = $this->get_report_main_sql_query ( '', true, '' );
			
			while ( $snapshotRecordData = $db->fetchByAssoc ( $snapshotResults ) ) {
				// just the basic Row
				$formattedRow = json_decode_kinamu ( html_entity_decode ( $snapshotRecordData ['data'] ) );
				
				// format the Fields
				if (! isset ( $parameters ['noFormat'] ) || (isset ( $parameters ['noFormat'] ) && ! $parameters ['noFormat']))
					$formattedRow = $this->formatFields ( $formattedRow, isset ( $parameters ['dontFormat'] ) ? $parameters ['dontFormat'] : array () );
				
		//build the links unless we can conserve the ids with the snapshot this will not work ... 
				//if(!isset($parameters['toPDF']) || (isset($parameters['toPDF']) && !$parameters['toPDF']))
				//	$formattedRow = $this->buildLinks($formattedRow, isset($parameters['dontFormat']) ? $parameters['dontFormat'] : array());    
				

				// return the formatted row
				$retArray [] = $formattedRow;
			}
		}
		return $retArray;
	
	}
	
	/*
	 * evaluate if we have listfields with a context
	 */
	function reportHasContextFields() {
		$hasContext = false;
		
		$arrayList = json_decode_kinamu ( html_entity_decode ( $this->listfields, ENT_QUOTES ) );
		foreach ( $arrayList as $thisListEntry ) {
			if ($thisListEntry ['context'] != '') {
				// make sure we set that we have context
				$hasContext = true;
				
				// set the field context and the context settings
				$this->contextFields [$thisListEntry ['fieldid']] = $thisListEntry ['context'];
				// sett the context we found ... replacing spaces as we handle it later on
				$this->contexts [preg_replace ( '/ /', '', $thisListEntry ['context'] )] = preg_replace ( '/ /', '', $thisListEntry ['context'] );
			}
		}
		
		return $hasContext;
	}
	
	/*
	 * Preprocessor for Formulas
	 */
	function preProcessFormulas($arrayName = 'row') {
		$arrayList = json_decode_kinamu ( html_entity_decode ( $this->listfields, ENT_QUOTES ) );
		
		$logicalNameToIdMap = array ();
		
		// map the fields to ids
		foreach ( $arrayList as $thisListEntry ) {
			if (isset ( $thisListEntry ['assigntovalue'] ) && $thisListEntry ['assigntovalue'] != '')
				$logicalNameToIdMap [$thisListEntry ['assigntovalue']] = $thisListEntry ['fieldid'];
		}
		
		$sequencedFormulas = array ();
		$unsequencedFormulas = array ();
		
		// get the formulas
		foreach ( $arrayList as $thisListEntry ) {
			if (isset ( $thisListEntry ['formulavalue'] ) && $thisListEntry ['formulavalue'] != '') {
				// parse the fieldids into the formula
				$formulaRaw = $thisListEntry ['formulavalue'];
				foreach ( $logicalNameToIdMap as $valuekey => $fieldid ) {
					$formulaRaw = preg_replace ( '/\{' . $valuekey . '\}/', '\$' . $arrayName . '[\'' . $fieldid . '\']', $formulaRaw );
				}
				
				// add the target field id
				$formulaRaw = '$' . $arrayName . '[\'' . $thisListEntry ['fieldid'] . '\'] = ' . $formulaRaw;
				
				// make sure all expressions are matched
				if (preg_match ( '/\{/', $formulaRaw ) == 0 && preg_match ( '/\}/', $formulaRaw ) == 0) {
					if (isset ( $thisListEntry ['formulasequence'] ) && $thisListEntry ['formulasequence'] != '')
						$sequencedFormulas [$thisListEntry ['formulasequence']] = $formulaRaw;
					else
						$unsequencedFormulas [] = $formulaRaw;
				}
			}
		}
		
		// sort and merge the array
		ksort ( $sequencedFormulas );
		$this->formulaArray = array_merge ( $sequencedFormulas, $unsequencedFormulas );
	}
	
	/*
	 * process the variious functions for a row
	 */
	function processFormulas(&$row) {
		if (is_array ( $this->formulaArray )) {
			foreach ( $this->formulaArray as $sequence => $formula ) {
				eval ( $formula . ';' );
			}
		}
	}
	
	function getSnapshots() {
		$query = 'SELECT id, snapshotdate FROM kreportsnapshots WHERE report_id = \'' . $this->id . '\' ORDER BY snapshotdate DESC';
		
		$snapShotsResults = $this->db->query ( $query );
		
		$retArray [] = array ('snapshot' => '0', 'description' => 'current' );
		
		while ( $thisSnapshot = $this->db->fetchByAssoc ( $snapShotsResults ) ) {
			$retArray [] = array ('snapshot' => $thisSnapshot ['id'], 'description' => $thisSnapshot ['snapshotdate'] );
		}
		return $retArray;
	}
	
	function getListFields() {
		
		// anlyze all the pathes we have
		//$this->build_path();
		

		// build the from clause and all join segments
		//$this->build_joinsegments();
		

		$arrayList = json_decode_kinamu ( html_entity_decode ( $this->listfields ) );
		
		$retArray [] = array ('fieldid' => '-', 'fieldname' => '-' );
		
		if (is_array ( $arrayList )) {
			foreach ( $arrayList as $thisList ) {
				//$pathName = $this->getPathNameFromPath($thisList['path']);
				//$fieldName = explode(':', $this->getFieldNameFromPath($thisList['path']));
				//if($this->joinSegments[$pathName]['object']->field_name_map[$fieldname[1]]->type == 'currency')
				$retArray [] = array ('fieldid' => $thisList ['fieldid'], 'fieldname' => $thisList ['name'] );
			}
		} else {
			$retArray = '';
		}
		
		return $retArray;
	}
	
	function getListFieldsArray() {
		$fieldArray = json_decode_kinamu ( html_entity_decode ( $this->listfields ) );
		
		foreach ( $fieldArray as $fieldCount => $fieldData )
			$returnArray [$fieldData ['fieldid']] = $fieldData;
		
		return $returnArray;
	}
	/*
	function getGroupLevelId($groupLevel){
		$arrayList =  json_decode_kinamu( html_entity_decode_utf8($this->listfields));
		
		if(is_array($arrayList))
		{
			foreach($arrayList as $thisList)
			{
				//manage the damned primary clause
				if($thisList['groupby'] == 'primary') $thisList['groupby'] = '1';
				
				if($thisList['groupby'] == $groupLevel)
				    return 	$thisList['fieldid'];
			}
	
		}	
	
		// not an array or not found
		return  '';
		
	}
	
	function getMaxGroupLevel(){
		$arrayList =  json_decode_kinamu( html_entity_decode_utf8($this->listfields));
		
		$maxGroupLevel = '';
		
		if(is_array($arrayList))
		{
			foreach($arrayList as $thisList)
			{
				//manage the damned primary clause
				if($thisList['groupby'] == 'primary') $thisList['groupby'] = '1';
				
				if($thisList['groupby'] != 'no' && $thisList['groupby'] != 'yes' && $thisList['groupby'] > $maxGroupLevel )
						$maxGroupLevel = $thisList['groupby'];
			}
		}	
	
		// not an array or not found
		return  $maxGroupLevel;
		
	}
	*/
	// for the GeoCoding
	function massGeoCode() {
		global $app_list_strings, $mod_strings, $beanList, $beanFiles;
		
		require_once ('modules/KReports/BingMaps/BingMaps.php');
		
		// flag to memorize if we hjave different beans for longitude and latiitude
		// not sure when this would happen buit it could happen
		$longlatDiff = false;
		
		// get the map details for the report
		$mapDetails = json_decode ( html_entity_decode ( $this->mapoptions ) );
		
		$serverName = dirname ( $_SERVER ['HTTP_HOST'] . $_SERVER ['SCRIPT_NAME'] );
		
		// get the report results
		$results = $this->getSelectionResults ();
		
		// get the ids for longitude and latitude
		$long_bean_id = $this->kQueryArray->queryArray ['root'] ['kQuery']->joinSegments [$this->kQueryArray->fieldNameMap [$mapDetails->longitude] ['path']] ['alias'];
		$lat_bean_id = $this->kQueryArray->queryArray ['root'] ['kQuery']->joinSegments [$this->kQueryArray->fieldNameMap [$mapDetails->latitude] ['path']] ['alias'];
		
		// get the beans
		$long_bean = $this->kQueryArray->queryArray ['root'] ['kQuery']->joinSegments [$this->kQueryArray->fieldNameMap [$mapDetails->longitude] ['path']] ['object'];
		if ($long_bean_id != $lat_bean_id) {
			$longlatDiff = true;
			$lat_bean = $this->kQueryArray->queryArray ['root'] ['kQuery']->joinSegments [$this->kQueryArray->fieldNameMap [$mapDetails->latitude] ['path']] ['object'];
		}
		
		if (count ( $results ) > 0) {
			
			$mapService = new kReportBingMaps ();
			require_once ('modules/Accounts/Account.php');
			
			foreach ( $results as $thisResult ) {
				if (($thisResult [$mapDetails->latitude] == '' || $thisResult [$mapDetails->latitude] == null || $thisResult [$mapDetails->latitude] == '0,00') || ($thisResult [$mapDetails->longitude] == '' || $thisResult [$mapDetails->longitude] == null || $thisResult [$mapDetails->longitude] == '0,00')) {
					
					//$query = $thisResult[$mapDetails->geocodeStreet] . ', ' .  $thisResult[$mapDetails->geocodePostalcode] . ' ' .  $thisResult[$mapDetails->geocodeCity] . ' ' .  $thisResult[$mapDetails->geocodeCountry];
					$addressArray = array ('AddressLine' => $thisResult [$mapDetails->geocodeStreet], 'PostalCode' => $thisResult [$mapDetails->geocodePostalcode], 'Locality' => $thisResult [$mapDetails->geocodeCity], 'CountryRegion' => $thisResult [$mapDetails->geocodeCountry] );
					$geoCodeResult = $mapService->geocode ( $addressArray );
					
					// update object 
					$long_bean->retrieve ( $thisResult [$long_bean_id . 'id'] );
					$long_bean->{$this->kQueryArray->fieldNameMap [$mapDetails->longitude] [fieldname]} = $geoCodeResult ['longitude'];
					
					//2010-12-6 format numbers after mass geocode
					$long_bean->format_field ( $long_bean->field_defs [$this->kQueryArray->fieldNameMap [$mapDetails->longitude] [fieldname]] );
					
					// see if we have different beans
					// should be the exceptionbut we never know
					if (! $longlatDiff) {
						$long_bean->{$this->kQueryArray->fieldNameMap [$mapDetails->latitude] [fieldname]} = $geoCodeResult ['latitude'];
						
						//2010-12-6 format numbers after mass geocode
						$long_bean->format_field ( $long_bean->field_defs [$this->kQueryArray->fieldNameMap [$mapDetails->latitude] [fieldname]] );
					} else {
						$lat_bean->retrieve ( $thisResult [$lat_bean_id . 'id'] );
						$lat_bean->{$this->kQueryArray->fieldNameMap [$mapDetails->latitude] [fieldname]} = $geoCodeResult ['latitude'];
						
						//2010-12-6 format numbers after mass geocode
						$lat_bean->format_field ( $lat_bean->field_defs [$this->kQueryArray->fieldNameMap [$mapDetails->latitude] [fieldname]] );
						
						$lat_bean->save ();
					}
					
					$long_bean->save ();
				}
			}
		}
	
	}
	
	function getGeoCodes() {
		global $app_list_strings, $mod_strings;
		
		$mapDetails = json_decode ( html_entity_decode ( $this->mapoptions ) );
		// $jsonerror = json_last_error();
		
		//build an array with the field value and the image name if we have entries set
		if($mapDetails->imageMap != '')
		{
		$imageMapArray = json_decode($mapDetails->imageMap, true);
		foreach($imageMapArray as $imageMapentry)
			$imageMapRecArray[$imageMapentry['value']] = $imageMapentry['image'];
		}

		// an empty array to return
		$returnArray = array ();
		
		// get the report results
		$results = $this->getSelectionResults ( array ('dontFormat' => array ($mapDetails->longitude, $mapDetails->latitude ) ) );
		
		$categoryArray = array ();
		$categoryCount = 1;
		
		$mapBounds = array ('topLeft' => array ('x' => 0, 'y' => 0 ), 'bottomRight' => array ('x' => 0, 'y' => 0 ) );
		
		if (count ( $results > 0 )) {
			foreach ( $results as $thisRecord ) {
				//see if we have a category
				
				if (isset ( $mapDetails->typeimages ) && $mapDetails->typeimages == 'true' && isset ( $thisRecord [$mapDetails->type] ) && $thisRecord [$mapDetails->type] != '') {
			//	if (isset ( $mapDetails->type ) && $mapDetails->type != '' && isset ( $thisRecord [$mapDetails->type] ) && $thisRecord [$mapDetails->type] != '') {
					if (! isset ( $categoryArray [$thisRecord [$mapDetails->type]] )) {
						$categoryArray [$thisRecord [$mapDetails->type]] = $categoryCount;
						$categoryCount ++;
					}
					$returnArray ['data'] [] = array ('id' => $thisRecord ['sugarRecordId'], 'geox' => $thisRecord [$mapDetails->longitude], 'geoy' => $thisRecord [$mapDetails->latitude], 'category_id' => ( string ) $categoryArray [$thisRecord [$mapDetails->type]], 'category' => $thisRecord [$mapDetails->type], 'image' => $imageMapRecArray[$thisRecord [$mapDetails->type]],'line1' => /*$thisRecord[$mapDetails->longitude] . '/' . $thisRecord[$mapDetails->latitude] . '<br>' .*/
	  								   $thisRecord [$mapDetails->line1] . '<br>' . $thisRecord [$mapDetails->line2] . '<br>' . $thisRecord [$mapDetails->line3] . '<br>' . $thisRecord [$mapDetails->line4] . '<br>' );
				} else {
					// $elementRecord[] = $thisRecord['sugarRecordId'];
					$returnArray ['data'] [] = array ('id' => $thisRecord ['sugarRecordId'], 'geox' => $thisRecord [$mapDetails->longitude], 'geoy' => $thisRecord [$mapDetails->latitude], 'category' => '', 'image' => '', 'line1' => /*$thisRecord[$mapDetails->longitude] . '/' . $thisRecord[$mapDetails->latitude] . '<br>' .*/
	  				 				   $thisRecord [$mapDetails->line1] . '<br>' . $thisRecord [$mapDetails->line2] . '<br>' . $thisRecord [$mapDetails->line3] . '<br>' . $thisRecord [$mapDetails->line4] . '<br>' );
				}
				
				// set bounds
				if (floatval ( $thisRecord [$mapDetails->longitude] ) != 0 && floatval ( $thisRecord [$mapDetails->latitude] ) != 0) {
					if ($mapBounds ['topLeft'] ['x'] == 0 || floatval ( $thisRecord [$mapDetails->longitude] ) < floatval ( $mapBounds ['topLeft'] ['x'] ))
						$mapBounds ['topLeft'] ['x'] = floatval ( $thisRecord [$mapDetails->longitude] );
					
					if ($mapBounds ['topLeft'] ['y'] == 0 || floatval ( $thisRecord [$mapDetails->latitude] ) > floatval ( $mapBounds ['topLeft'] ['y'] ))
						$mapBounds ['topLeft'] ['y'] = floatval ( $thisRecord [$mapDetails->latitude] );
					
					if ($mapBounds ['bottomRight'] ['x'] == 0 || floatval ( $thisRecord [$mapDetails->longitude] ) > floatval ( $mapBounds ['bottomRight'] ['x'] ))
						$mapBounds ['bottomRight'] ['x'] = floatval ( $thisRecord [$mapDetails->longitude] );
					
					if ($mapBounds ['bottomRight'] ['y'] == 0 || floatval ( $thisRecord [$mapDetails->latitude] ) < floatval ( $mapBounds ['bottomRight'] ['y'] ))
						$mapBounds ['bottomRight'] ['y'] = floatval ( $thisRecord [$mapDetails->latitude] );
				}
			}
			
			// add two record for the bounds
			$returnArray ['data'] [] = array ('id' => 'topLeft', 'geox' => $mapBounds ['topLeft'] ['x'], 'geoy' => $mapBounds ['topLeft'] ['y'], 'category' => 'TL', 'line1' => 'topLeft' . $mapBounds ['topLeft'] ['x'] . '/' . $mapBounds ['topLeft'] ['y'] );
			
			$returnArray ['data'] [] = array ('id' => 'bottomRight', 'geox' => $mapBounds ['bottomRight'] ['x'], 'geoy' => $mapBounds ['bottomRight'] ['y'], 'category' => 'BR', 'line1' => 'bottomRight' . $mapBounds ['bottomRight'] ['x'] . '/' . $mapBounds ['bottomRight'] ['y'] );
		}
		
		return json_encode ( $returnArray );
	
	}
	
	/*
     * funtion to tranbslate certain operators if required to switch values at runtime
     */
	function get_runtime_wherefilters() {
		// return Array
		$editableWhereFields = array ();
		
		// get the Where Fields
		$whereFieldsList = json_decode_kinamu ( html_entity_decode ( $this->whereconditions, ENT_QUOTES ) );
		
		// loop over the Fields
		foreach ( $whereFieldsList as $whereFieldKey => $whereField ) {
			if ($whereField ['usereditable'] != 'no') {
				// 2011-03-10 for values where pe parse for the editview differently 
				// special handling for specific types
				switch ($whereField ['operator']) {
					case 'lastnddays' :
						switch($whereField['type']){
							case 'datetimecombo': 
							case 'datetime':
								$origValue = $whereField ['value'];
								$whereField ['value'] = date ( $GLOBALS ['timedate']->get_date_format() , gmmktime () - $origValue * 86400 ) . ' 00:00:00';
								$whereField ['valuekey'] = date ( $GLOBALS ['timedate']->get_db_date_format() , gmmktime () - $origValue * 86400 ) . ' 00:00:00';
								break;
							default:
								$origValue = $whereField ['value'];
								$whereField ['value'] = date ( $GLOBALS ['timedate']->get_date_format (), gmmktime () - $origValue * 86400 );
								$whereField ['valuekey'] = date ( $GLOBALS ['timedate']->get_db_date_format (), gmmktime () - $origValue * 86400 );
								break;
						}
						break;
					case 'nextnddays' :
						switch($whereField['type']){
							case 'datetimecombo': 
							case 'datetime':
								$origValue = $whereField ['value'];
								$whereField ['value'] = date ( $GLOBALS ['timedate']->get_date_format() , gmmktime () + $origValue * 86400 ) . ' 00:00:00';
								$whereField ['valuekey'] = date ( $GLOBALS ['timedate']->get_db_date_format() , gmmktime () + $origValue * 86400 ) . ' 00:00:00';
								break;
							default:
								$origValue = $whereField ['value'];
								$whereField ['value'] = date ( $GLOBALS ['timedate']->get_date_format (), gmmktime () + $origValue * 86400 );
								$whereField ['valuekey'] = date ( $GLOBALS ['timedate']->get_db_date_format (), gmmktime () + $origValue * 86400 );
								break;
						}
						break;
					case 'betwnddays' :
						switch($whereField['type']){
							case 'datetimecombo': 
							case 'datetime':
									$origValue = $whereField ['value']; $origValueto = $whereField ['valueto']; 
									$whereField ['value'] = date ( $GLOBALS ['timedate']->get_date_format () , gmmktime () + $origValue * 86400 ). ' 00:00:00';
									$whereField ['valuekey'] = date ( $GLOBALS ['timedate']->get_db_date_format () , gmmktime () + $origValue * 86400 ). ' 00:00:00';
									$whereField ['valueto'] = date ( $GLOBALS ['timedate']->get_date_format () , gmmktime () + $origValueto * 86400 ). ' 00:00:00';
									$whereField ['valuetokey'] = date ( $GLOBALS ['timedate']->get_db_date_format () , gmmktime () + $origValueto * 86400 ). ' 00:00:00';
								break;
							default:
									$origValue = $whereField ['value']; $origValueto = $whereField ['valueto']; 
									$whereField ['value'] = date ( $GLOBALS ['timedate']->get_date_format (), gmmktime () + $origValue * 86400 );
									$whereField ['valuekey'] = date ( $GLOBALS ['timedate']->get_db_date_format (), gmmktime () + $origValue * 86400 );
									$whereField ['valueto'] = date ( $GLOBALS ['timedate']->get_date_format (), gmmktime () + $origValueto * 86400 );
									$whereField ['valuetokey'] = date ( $GLOBALS ['timedate']->get_db_date_format (), gmmktime () + $origValueto * 86400 );

								break;
						}
						break;
  					case 'lastndays':
					case 'lastnfdays':
					case 'lastnweeks':
					case 'lastnfweeks':
					case 'nextndays':
					case 'nextnweeks':
					case 'betwndays': 
						break;
					default: 
						// handle date formating for datetime fields
						switch($whereField['type']){
							case 'datetimecombo': 
							case 'datetime':
								if(isset($whereField ['valuekey'])) 
								{
									$valKeyArray = split(' ', $whereField ['valuekey']);
									$whereField ['value'] = $GLOBALS ['timedate']->to_display_date($valKeyArray[0]) . ' ' . $valKeyArray[1];
								}
								if(isset($whereField ['valuetokey']))
								{ 
									$valKeyArray = split(' ', $whereField ['valuetokey']);
									$whereField ['valueto'] = $GLOBALS ['timedate']->to_display_date($valKeyArray[0]) . ' ' . $valKeyArray[1];
								}
								break;	
							case 'date': 
								if(isset($whereField ['valuekey'])) 
									$whereField ['value'] = $GLOBALS ['timedate']->to_display_date($whereField ['valuekey']);
						}				
						break;
				}
				
				// return the Fields
				$editableWhereFields [] = $whereField;
			}
		}
		
		return $editableWhereFields;
	}
	
	/* 
	 * function to return values for the Dashlet Where Clause
	 * parsed afterwards dynamically into a toolbar in the Dashlet
	 */
	function getDashletWhereClause() {
		//generic return array
		$returnArray = array ();
		
		// get the where fields
		$arrayWhere = $this->get_runtime_wherefilters (); // json_decode_kinamu( html_entity_decode($this->whereconditions, ENT_QUOTES));
		

		//parse them
		foreach ( $arrayWhere as $thisWhereField ) {
			if (isset ( $thisWhereField ['dashleteditable'] ) && $thisWhereField ['dashleteditable'] != 'no') {
				// reset '---'
				if ($thisWhereField ['valuekey'] == '---')
					$thisWhereField ['valuekey'] = '';
				if ($thisWhereField ['value'] == '---')
					$thisWhereField ['value'] = '';
				
		// if needed switch the type for the dashlet
				switch ($thisWhereField ['operator']) {
					case 'lastndays' :
					case 'nextndays' :
						$thisWhereField ['type'] = 'int';
						break;
				}
				
				// get a return array
				$returnArray [] = array ('fieldid' => $thisWhereField ['fieldid'], 'operator' => $thisWhereField ['operator'], 'sequence' => isset ( $thisWhereField ['sequence'] ) ? $thisWhereField ['sequence'] : '', 'options' => in_array ( $thisWhereField ['type'], array ('enum', 'radioenum', 'multienum', 'user_name', 'assigned_user_name' ) ) ? $this->get_enum_from_path ( $thisWhereField ['path'] ) : '', 'type' => $thisWhereField ['type'], 'renderType' => $thisWhereField ['usereditable'] == 'yo1' || $thisWhereField ['usereditable'] == 'yo2' ? 'checkbox' : '', 'name' => $thisWhereField ['name'], 'value' => (isset ( $thisWhereField ['valuekey'] ) && $thisWhereField ['valuekey'] != '' ? $thisWhereField ['valuekey'] : $thisWhereField ['value']) );
			}
		}
		
		return $returnArray;
	}
	
	function get_enum_from_path($path) {
		
		global $app_list_strings, $beanFiles, $beanList, $db;
		
		// explode the path
		$pathArray = explode ( '::', $path );
		
		// get Field and Module from the path
		$fieldArray = explode ( ':', $pathArray [count ( $pathArray ) - 1] );
		$moduleArray = explode ( ':', $pathArray [count ( $pathArray ) - 2] );
		
		// load the parent module
		require_once ($beanFiles [$beanList [$moduleArray [1]]]);
		$parentModule = new $beanList [$moduleArray [1]] ();
		
		if ($moduleArray [0] == 'link') {
			// load the Relationshop to get the module
			$parentModule->load_relationship ( $moduleArray [2] );
			
			// load the Module
			$thisModuleName = $parentModule->$moduleArray [2]->getRelatedModuleName ();
			require_once ($beanFiles [$beanList [$parentModule->$moduleArray [2]->getRelatedModuleName ()]]);
			$thisModule = new $beanList [$parentModule->$moduleArray [2]->getRelatedModuleName ()] ();
			
			// pars the otpions into the return array
			switch ($thisModule->field_name_map [$fieldArray [1]] ['type']) {
				case 'enum' :
				case 'radioenum' :
				case 'multienum' :
					foreach ( $app_list_strings [$thisModule->field_name_map [$fieldArray [1]] ['options']] as $value => $text ) {
						$returnArray [] = array ('value' => $value, 'text' => $text );
					}
					break;
				case 'user_name' :
				case 'assigned_user_name' :
					$returnArray [] = array ('value' => 'current_user_id', 'text' => 'active user' );
					$usersResult = $db->query ( 'SELECT id, user_name FROM users WHERE deleted = \'0\' AND status = \'Active\'' );
					while ( $userRecord = $db->fetchByAssoc ( $usersResult ) ) {
						// bugfix 2010-09-28 since id was asisgned and not user name ..  no properly evaluates active user
						$returnArray [] = array ('value' => $userRecord ['user_name'], 'text' => $userRecord ['user_name'] );
					}
					break;
			}
		
		} else {
			// we have the root module
			switch ($parentModule->field_name_map [$fieldArray [1]] ['type']) {
				case 'enum' :
				case 'radioenum' :
				case 'multienum' :
					foreach ( $app_list_strings [$parentModule->field_name_map [$fieldArray [1]] ['options']] as $value => $text ) {
						$returnArray [] = array ('value' => $value, 'text' => $text );
					}
					break;
				case 'user_name' :
				case 'assigned_user_name' :
					$returnArray [] = array ('value' => 'current_user_id', 'text' => 'active user' );
					$usersResult = $db->query ( 'SELECT id, user_name FROM users WHERE deleted = \'0\' AND status = \'Active\'' );
					while ( $userRecord = $db->fetchByAssoc ( $usersResult ) ) {
						// bugfix 2010-09-28 since id was asisgned and not user name ..  no properly evaluates active user
						$returnArray [] = array ('value' => $userRecord ['user_name'], 'text' => $userRecord ['user_name'] );
					}
					break;
			}
		}
		
		return $returnArray;
	}
	
	/*
     * Function that adds all related reports that are published as subpanels
     * for a specific module to the layoutdefs
     * 
     * gets called from SubPanelDefinition.php
     */
	static function addToLayoutDefs(&$layout_defs, $layout_def_key) {
		global $db;
		
		$queryRes = $db->query ( "SELECT id, name, publishoptions FROM kreports WHERE deleted='0' AND publishoptions LIKE '%\"publishSubpanelModule\":\"" . $layout_def_key . "\"%'" );
		if ($db->getRowCount ( $queryRes ) > 0) {
			while ( $thisReportDetails = $db->fetchByAssoc ( $queryRes ) ) {
				$publishOptions = json_decode_kinamu ( html_entity_decode ( $thisReportDetails ['publishoptions'] ), true );
				
				if ($publishOptions ['publishSubpanelGrid']) {
					$layout_defs ['subpanel_setup'] ['kreporter' . $thisReportDetails ['id']] = array ('top_buttons' => array(), 'subpanel_name' => 'default', 'order' => $publishOptions ['publishSubpanelOrder'], 'module' => 'KReports', 'title_key' => $thisReportDetails ['name'] );
				
		// add to the subpanel
				}
				
				if ($publishOptions ['publishSubpanelChart']) {
					$layout_defs ['subpanel_setup'] ['krepchart' . $thisReportDetails ['id']] = array ('top_buttons' => array(), 'subpanel_name' => 'default', 'order' => $publishOptions ['publishSubpanelOrder'], 'module' => 'KReports', 'title_key' => $thisReportDetails ['name'] );
				
		// add to the subpanel
				}
			}
		}
	}
	
	/*
	 * function that sorts subpanels into tabs
	 */
	static function addToTabs(&$tabs, &$groups, &$found ,&$tabStructure) {
		global $db;
		
		foreach($tabs as $tabId)
		{
			if(strstr($tabId, 'kreporter') !== false || strstr($tabId, 'krepchart') !== false)
			{
				$queryRes = $db->query ( "SELECT id, name, publishoptions FROM kreports WHERE deleted='0' AND id = '" . substr($tabId, 9) . "'" );
				if ($db->getRowCount ( $queryRes ) > 0) {
					$thisReportDetails = $db->fetchByAssoc ( $queryRes ) ;
					$publishOptions = json_decode ( html_entity_decode ( $thisReportDetails ['publishoptions'] ), true );
					if(isset($publishOptions['publishSubpanelTab']) && $publishOptions['publishSubpanelTab'] != '')
					{
						$groups[translate($publishOptions['publishSubpanelTab'])]['modules'][] = $tabId ;
						$found[$tabId] = true;
					}
					
				}
			}
		}
	}
	/*
     * render the subpanel
     */
	function renderSubPanel($panelId, $parentBean) {
		
		$return_string = '';
		$y = substr ( $panelId, 0, 9 );
		switch (substr ( $panelId, 0, 9 )) {
			case 'kreporter' :
				$return_string = '<script type="text/javascript" src="modules/KReports/views/view.detail.html.js"></script>';
				$return_string .= '<span id="' . str_replace ( 'kreporter', '', $panelId ) . 'reportDashletDiv">';
				$return_string .= reportResultsToHTML ( str_replace ( 'kreporter', '', $panelId ) . "reportDashletDiv", $this, array ('parentbean' => $parentBean, 'start' => 0, 'limit' => 10, 'dashletLinks' => true ) );
				$return_string .= '</span>';
				break;
			case 'krepchart' :
				require_once ('modules/KReports/KReportChart.php');
				$thisChartArray = new KReportChartArray ( $this, json_decode_kinamu ( html_entity_decode ( $this->chart_params_new ) ), $this->chart_height, $this->chart_layout );
				$thisChartArray->parentBean = $parentBean;
				$return_string = '<SCRIPT LANGUAGE="Javascript" SRC="modules/KReports/KFC/FusionCharts.js"></SCRIPT>';
				$return_string .= $thisChartArray->renderCharts ( $this->chart_height );
				break;
		
		}
		
		return $return_string;
	}
	
	/*
     * function that gets report_id & reportname as an array for the dashlet config
     */
	static function getDashletReports($scope) {
		global $db;
		
		$thisReport = new KReport();
		
		$reportsArray = array ();
		
		switch ($scope) {
			case 'Report' :
				$repQuery = "select kreports.id, name from kreports ";
				if($GLOBALS['sugar_flavor'] == 'PRO') $thisReport->add_team_security_where_clause($repQuery, 'kreports');
				$repQuery .= " where kreports.deleted = false and publishoptions like '%\"publishDashletGrid\":true%'";
				$reportsObj = $db->query ( $repQuery );
				break;
			case 'Chart' :
				$repQuery = "select kreports.id, name from kreports " ;
				if($GLOBALS['sugar_flavor'] == 'PRO') $thisReport->add_team_security_where_clause($repQuery, 'kreports');
				$repQuery .= " where kreports.deleted = false and publishoptions like '%\"publishDashletChart\":true%'";
				$reportsObj = $db->query ( $repQuery );
				break;
		}
		
		while ( $report = $db->fetchByAssoc ( $reportsObj ) ) {
			$reportsArray [$report ['id']] = $report ['name'];
		}
		
		return $reportsArray;
	
	}
	
	static function getMenuReports($module, &$module_menu) {
		global $db;
		
		$thisReport = new KReport();
		
		$reportsArray = array ();
		

		$repQuery = "select kreports.id, name from kreports ";
		if($GLOBALS['sugar_flavor'] == 'PRO') $thisReport->add_team_security_where_clause($repQuery, 'kreports');
		$repQuery .= " where kreports.deleted = false and publishoptions like '%\"publishMenuModule\":\"" . $module . "\"%'";
		$reportsObj = $db->query ( $repQuery );

		
		while ( $report = $db->fetchByAssoc ( $reportsObj ) ) {
			$module_menu[] = array(
				"index.php?module=KReports&action=DetailView&record=" . $report['id'], 
				$report['name'],
				"KReports", 
				'KReports');
		}
		
		return true;
	
	}	
	
	// for the listing (exclude utility Reports unless we ae admin
	function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean=null, $singleSelect = false)
	{
		$ret_array = parent::create_new_list_query($order_by, $where,$filter,$params, $show_deleted ,$join_type, true,$parentbean, $singleSelect);
		
		// add selection clause to $ret:array['where']
		
		if($return_array)
        {
            return $ret_array;
        }
        return  $ret_array['select'] . $ret_array['from'] . $ret_array['where']. $ret_array['order_by'];
		
	}
}