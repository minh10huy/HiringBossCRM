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
 require_once('modules/KReports/KReport.php');
 require_once('include/MVC/Controller/SugarController.php');
 require_once('modules/Contacts/Contact.php');
 require_once('modules/KReports/utils.php');
 require_once('include/utils/db_utils.php');
 require_once('include/utils.php');


 class KReportsController extends SugarController
{

    /*
     * handle the views
     */
    function action_detailview(){
        // set the view controller
        if($this->bean->listtype == '') $this->bean->listtype = 'standard';
        $this->view = $this->bean->listtype . $GLOBALS['dictionary']['KReport']['edition'];
    }
    /*
     * Custom Action for Soap Call to get Modules List
     */
    function action_get_modules(){
        global $app_list_strings;

        if(file_exists('modules/KReports/kreportsConfig.php'))
        	include('modules/KReports/kreportsConfig.php');

        foreach($app_list_strings['moduleList'] as $module => $description)
        {
        	if(!in_array($module, $excludedModules))
            	$returnArray[] = array('module' => $module, 'description' => $description);
        }

        sort($returnArray);
        
        print json_encode_kinamu($returnArray);
    }

    function action_get_tabs(){
    	require_once('include/GroupedTabs/GroupedTabStructure.php');
    	foreach($GLOBALS['tabStructure'] as $tabItem)
    	{
    		$returnArray[] = array('tab' => $tabItem['label'], 'description' =>  translate($tabItem['label']));
    	}
    	 print json_encode_kinamu($returnArray);
    }
    
	function action_get_modulefields(){
		global $beanFiles, $beanList, $app_list_strings;

        $retarray = array();
        if(isset($_REQUEST['inputmodule']) && $_REQUEST['inputmodule'] != '')
        {
	        require_once($beanFiles[$beanList[$_REQUEST['inputmodule']]]);
	        $inputModule = new $beanList[$_REQUEST['inputmodule']];

            $langArray = return_module_language('en_us', $_REQUEST['inputmodule']);

	        foreach($inputModule->field_defs as $fieldname => $fielddefs)
	        {
                $retarray[] = array(
                    'field' => $fieldname,
                    'description' => isset($fielddefs['vname']) ? isset($langArray[$fielddefs['vname']]) ? $langArray[$fielddefs['vname']] : $fielddefs['vname'] : $fieldname
                );
	        }
        }
		print json_encode_kinamu($retarray);
	}

	function action_get_wherefunctions()
	{
		$retarray = array();
		$retarray[] = array(
	                    'field' => '',
	                    'description' => '-'
                	);

		include('modules/KReports/kreportsConfig.php');
		if($customFunctionInclude != '')
		{
			include($customFunctionInclude);
			if(is_array($kreportCustomFunctions) && count($kreportCustomFunctions) > 0)
			{
				foreach($kreportCustomFunctions as $functionname => $functiondescription)
				{
					$retarray[] = array(
	                    'field' => $functionname,
	                    'description' => $functiondescription
                	);
				}
			}
		}

		print json_encode_kinamu($retarray);
	}

    function action_get_reports(){
        global $app_list_strings, $db, $current_user;
        $queryArray = preg_split('/::/', $_REQUEST['node']);
            switch($queryArray[0])
            {
                case 'src':
                    $returnArray[] = array('id' => 'favorites', 'text' => 'Favorites', 'expanded' => true);
                    $returnArray[] = array('id' => 'modules', 'text' => 'by Module', 'expanded' => true);
                    break;
                case 'modules':
                    if(isset($_SESSION['KReports']['lastviewed'])) $lastViewedArray = preg_split('/::/', $_SESSION['KReports']['lastviewed']);
                    $modulesQuery = 'SELECT distinct report_module FROM kreports ';

                    // check if we have KINAMu orManagement Installed for Authorization Check
                    if(file_exists('modules/KOrgObjects/KOrgObject.php'))
                    {
                        require_once('modules/KOrgObjects/KOrgObject.php');
                        $thisKOrgObject = new KOrgObject();
                        $modulesQuery .=  $thisKOrgObject->getOrgunitJoin('kreports', 'KReport', 'kreports', '1') . ' ';
                    }

                    $modulesQuery .= 'WHERE deleted =  \'0\' ORDER BY report_module ASC';

                    $reportResults = $db->query($modulesQuery);

                    while($moduleEntry = $db->fetchByAssoc($reportResults))
                    {
                        $returnArray[] = array('id' => 'module::' . $moduleEntry['report_module'], 'text' => $app_list_strings['moduleList'][$moduleEntry['report_module']], 'expanded' => (isset($lastViewedArray[0]) && $lastViewedArray[0] == $moduleEntry['report_module'] ) ? true : false);
                    }
                    break;
                case 'module':
                    $moduleQuery = 'SELECT * FROM kreports ';

                    if(file_exists('modules/KOrgObjects/KOrgObject.php'))
                    {
                        require_once('modules/KOrgObjects/KOrgObject.php');
                        $thisKOrgObject = new KOrgObject();
                        $moduleQuery .=  $thisKOrgObject->getOrgunitJoin('kreports', 'KReport', 'kreports', '1') . ' ';
                    }

                    $moduleQuery .= 'WHERE report_module = \'' .  $queryArray[1] . '\' AND deleted =  \'0\' ORDER BY report_module ASC';

                    $reportResults = $db->query($moduleQuery);

                    while($moduleEntry = $db->fetchByAssoc($reportResults))
                    {
                        $returnArray[] = array('id' => $moduleEntry['id'], 'leaf' => true, 'text' => $moduleEntry['name'], 'href' => 'index.php?module=KReports&action=DetailView&record=' . $moduleEntry['id'] );
                    }
                    break;
                case 'favorites':
                    $returnArray[] = array('id' => 'last10', 'leaf' => false, 'text' => 'last 10');
                    $returnArray[] = array('id' => 'top10', 'leaf' => false, 'text' => 'top 10');

                    $reportResults = $db->query('SELECT * FROM kreportsfavorites WHERE user_id = \'' . $current_user->id . '\'  ORDER BY description ASC');
                    while($moduleEntry = $db->fetchByAssoc($reportResults))
                    {
                        $returnArray[] = array('id' => $moduleEntry['report_id'], 'leaf' => true, 'text' => $moduleEntry['description'], 'href' => 'index.php?module=KReports&action=DetailView&record=' . $moduleEntry['report_id'] . '&favid=' . $moduleEntry['report_id']);
                    }
                    break;
                case 'last10':
                    $reportResults = $db->query('SELECT report_id, name FROM kreportstats INNER JOIN kreports ON kreports.id = kreportstats.report_id  WHERE user_id = \'' . $current_user->id . '\' GROUP  BY report_id ORDER BY max(date) DESC');
                    while($moduleEntry = $db->fetchByAssoc($reportResults))
                    {
                        $returnArray[] = array('id' => $moduleEntry['report_id'], 'leaf' => true, 'text' => $moduleEntry['name'], 'href' => 'index.php?module=KReports&action=DetailView&record=' . $moduleEntry['report_id']);
                    }
                    break;
                case 'top10':
                    $reportResults = $db->query('SELECT report_id, name FROM kreportstats INNER JOIN kreports ON kreports.id = kreportstats.report_id  WHERE user_id = \'' . $current_user->id . '\' GROUP  BY report_id ORDER BY count(kreportstats.id) DESC');
                    while($moduleEntry = $db->fetchByAssoc($reportResults))
                    {
                        $returnArray[] = array('id' => $moduleEntry['report_id'], 'leaf' => true, 'text' => $moduleEntry['name'], 'href' => 'index.php?module=KReports&action=DetailView&record=' . $moduleEntry['report_id']);
                    }
                    break;
        }
        print json_encode_kinamu($returnArray);
    }
    /*
     * Custom Action for Soap Call to get Report Query
     */

    function action_get_new_sql(){
        require_once('modules/KReports/KReport.php');
        require_once('modules/KReports/KReportQuery.php');

        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['record']);

        if(isset($_REQUEST['whereConditions']))
        {
          $thisReport->whereOverride = json_decode_kinamu( html_entity_decode($_REQUEST['whereConditions']));
        }

        $sqlArray = $thisReport->get_report_main_sql_query();

        return $sqlArray['select'] . ' ' . $sqlArray['from'] . ' ' . $sqlArray['where'] . ' ' . $sqlArray['groupby'] . ' ' . $sqlArray['having'] . ' ' . $sqlArray['orderby'];

    }

    /*
     * Custom Action for Soap Call to get Sna�pshots for a Report
     */
    function action_get_snapshots(){
        require_once('modules/KReports/KReport.php');

        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['requester']);

        print json_encode_kinamu($thisReport->getSnapshots());
    }

    /*
     * Custom action to get schedules for Reports
     */
    function action_get_report_schedule(){
        global $db, $current_user;


        switch($_REQUEST['api'])
        {
            case 'read':
                $schedulesResults = $db->query('SELECT * FROM kreportschedules WHERE user_id = \'' . $current_user->id . '\' AND report_id = \'' . $_REQUEST['requester'] . '\' AND deleted = \'0\'');

                while($thisScheduledResultentry = $db->fetchByAssoc($schedulesResults))
                {
                    $resultArray['data'][] = array('jobid' => $thisScheduledResultentry['id'],
                                       'month' => $thisScheduledResultentry['month'],
                                       'dayofweek' => $thisScheduledResultentry['dayofweek'],
                                       'dayofmonth' => $thisScheduledResultentry['dayofmonth'],
                                       'hour' => $thisScheduledResultentry['hour'],
                                       'minutes' => $thisScheduledResultentry['minutes'],
                                       'action' => $thisScheduledResultentry['action'],
					                   'int_desc' => $thisScheduledResultentry['int_desc'],
					                   'ext_desc' => $thisScheduledResultentry['ext_desc'],
					                   'selvar' => $thisScheduledResultentry['selvar'],
                                       'receipients' => $thisScheduledResultentry['receipients']
                                );
                }

                // return the json encoded results
                print json_encode_kinamu($resultArray);
                break;
            case 'create':

            	$dataArray = array();
                $thisRecord = json_decode(html_entity_decode($_REQUEST['data']));
                if(is_array($thisRecord))
                {
                	foreach($thisRecord as $thisRecordEntry)
                	{
                			$newGuid = create_guid();
	
			                $db->query('INSERT INTO kreportschedules SET ' .
			                            "id='" . $newGuid . "', " .
			                            "user_id='" . $current_user->id . "', " .
			                            "report_id='" . $_REQUEST['requester'] . "', ".
			                            "month='" . $thisRecordEntry->month . "', ".
			                            "dayofmonth='" . $thisRecordEntry->dayofmonth . "', ".
			                            "dayofweek='" . $thisRecordEntry->dayofweek . "', ".
			                            "hour='" . $thisRecordEntry->hour . "', ".
			                            "minutes='" . $thisRecordEntry->minutes . "', ".
			                            "action='" . $thisRecordEntry->action . "', ".
						                "int_desc='" . $thisRecordEntry->int_desc . "', ".
						                "ext_desc='" . $thisRecordEntry->ext_desc . "', ".
						                "selvar='" . $thisRecordEntry->selvar . "', ".
			                            "receipients='" . $thisRecordEntry->receipients . "', ".
			                            "deleted = '0'"
			                );
			
			                // 2011-04-12 set intiial entry so scheduler does not run immediately but the next time required
			                // set initial entry
							require_once('modules/KReports/KReportScheduler.php');
							KReportSchedulerLog::writeNewEntry($newGuid);
							$dataArray[] = array('jobid' => $newGuid,
		                                       'month' => $thisRecordEntry->month,
		                                       'dayofmonth' => $thisRecordEntry->dayofmonth,
		                                       'dayofweek' => $thisRecordEntry->dayofweek,
		                                       'hour' => $thisRecordEntry->hour,
		                                       'minutes' => $thisRecordEntry->minutes,
		                                       'action' => $thisRecordEntry->action,
											   'int_desc' => $thisRecordEntry->int_desc,
						                       'ext_desc' => $thisRecordEntry->ext_desc,
						                       'selvar' => $thisRecordEntry->selvar,
		                                       'receipients' => $thisRecordEntry->receipients
		                                );
                	}
                	
                }
                else 
                {
	                $newGuid = create_guid();
	
	                $db->query('INSERT INTO kreportschedules SET ' .
	                            "id='" . $newGuid . "', " .
	                            "user_id='" . $current_user->id . "', " .
	                            "report_id='" . $_REQUEST['requester'] . "', ".
	                            "month='" . $thisRecord->month . "', ".
	                            "dayofmonth='" . $thisRecord->dayofmonth . "', ".
	                            "dayofweek='" . $thisRecord->dayofweek . "', ".
	                            "hour='" . $thisRecord->hour . "', ".
	                            "minutes='" . $thisRecord->minutes . "', ".
	                            "action='" . $thisRecord->action . "', ".
	                			"int_desc='" . $thisRecord->int_desc . "', ".
						        "ext_desc='" . $thisRecord->ext_desc . "', ".
						        "selvar='" . $thisRecord->selvar . "', ".
	                            "receipients='" . $thisRecord->receipients . "', ".
	                            "deleted = '0'"
	                );
	
	                // 2011-04-12 set intiial entry so scheduler does not run immediately but the next time required
	                // set initial entry
					require_once('modules/KReports/KReportScheduler.php');
					KReportSchedulerLog::writeNewEntry($newGuid);
					$dataArray[] = array('jobid' => $newGuid,
                                       'month' => $thisRecord->month,
                                       'dayofmonth' => $thisRecord->dayofmonth,
                                       'dayofweek' => $thisRecord->dayofweek,
                                       'hour' => $thisRecord->hour,
                                       'minutes' => $thisRecord->minutes,
                                       'action' => $thisRecord->action,
									   'int_desc' => $thisRecord->int_desc,
						               'ext_desc' => $thisRecord->ext_desc,
						               'selvar' => $thisRecord->selvar,
                                       'receipients' => $thisRecord->receipients
                                );
                }
				// send response
                print json_encode_kinamu(array('data' => $dataArray, 'success' => true));
                break;
            case 'update':
                $thisRecord = json_decode(html_entity_decode($_REQUEST['data']));
                if(is_array($thisRecord))
                {
                	foreach($thisRecord as $thisRecordEntry)
                	{
		                $db->query('UPDATE  kreportschedules SET ' .
		                            "month='" . $thisRecordEntry->month . "', ".
		                            "dayofmonth='" . $thisRecordEntry->dayofmonth . "', ".
		                            "dayofweek='" . $thisRecordEntry->dayofweek . "', ".
		                            "hour='" . $thisRecordEntry->hour . "', ".
		                            "minutes='" . $thisRecordEntry->minutes . "', ".
		                            "action='" . $thisRecordEntry->action . "', ".
		                			"int_desc='" . $thisRecordEntry->int_desc . "', ".
						       		"ext_desc='" . $thisRecordEntry->ext_desc . "', ".
						        	"selvar='" . $thisRecordEntry->selvar . "', ".
		                            "receipients='" . $thisRecordEntry->receipients . "' ".
		                            "WHERE id='" . $thisRecordEntry->jobid . "'"
		                );
                	}
                }
                else 
                {
	                $db->query('UPDATE  kreportschedules SET ' .
	                            "month='" . $thisRecord->month . "', ".
	                            "dayofmonth='" . $thisRecord->dayofmonth . "', ".
	                            "dayofweek='" . $thisRecord->dayofweek . "', ".
	                            "hour='" . $thisRecord->hour . "', ".
	                            "minutes='" . $thisRecord->minutes . "', ".
	                            "action='" . $thisRecord->action . "', ".
	                			"int_desc='" . $thisRecord->int_desc . "', ".
						        "ext_desc='" . $thisRecord->ext_desc . "', ".
						        "selvar='" . $thisRecord->selvar . "', ".
	                            "receipients='" . $thisRecord->receipients . "' ".
	                            "WHERE id='" . $thisRecord->jobid . "'"
	                );
                }
                print json_encode_kinamu(array('success' => true));
                break;
            case 'destroy':
            	$thisRecord = json_decode(html_entity_decode($_REQUEST['data']));
            	if(is_array($thisRecord))
                {
                	foreach($thisRecord as $thisRecordEntry)
                	{
						$db->query('UPDATE  kreportschedules SET ' .
	                            "deleted='1' ".
	                            "WHERE id='" . $thisRecordEntry . "'");
                	}
                }
                else 
                {
	                $db->query('UPDATE  kreportschedules SET ' .
	                            "deleted='1' ".
	                            "WHERE id='" . $thisRecord . "'");
                }
                print json_encode_kinamu(array('success' => true));
                break;
                break;
        }
    }

    function action_get_report_massupdate(){
        global $beanFiles, $beanList, $app_list_strings;

        $retarray = array();
        $retarray['data'] = array();

        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['requester']);

        $langArray = return_module_language('en_us', $thisReport->report_module);

        require_once($beanFiles[$beanList[$thisReport->report_module]]);
        $nodeModule = new $beanList[$thisReport->report_module];

        foreach($nodeModule->field_defs as $fieldname => $fielddefs)
        {
            if(isset($fielddefs['massupdate']) && $fielddefs['massupdate'] == true)
            {
                $retarray['data'][] = array(
                    'fieldname' => $fieldname,
                    'fieldlabel' => isset($fielddefs['vname']) ? isset($langArray[$fielddefs['vname']]) ? $langArray[$fielddefs['vname']] : $fielddefs['vname'] : $fieldname,
                    'fieldtype' => $fielddefs['type'],
                    'fieldoptions' => isset($fielddefs['options']) ? json_encode($app_list_strings[$fielddefs['options']]) : ''
                );
            }
        }

        echo json_encode($retarray);
    }

    /*
     * Custom Action for Soap Call to get Sna�pshots for a Report
     */
    function action_get_listfields(){
        require_once('modules/KReports/KReport.php');

        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['record']);

        print json_encode_kinamu($thisReport->getListfields());
    }

    /*
     * Function lo load enum values
     */

    function action_take_snapshot()
    {
        global $db;

          require_once('modules/KReports/KReport.php');
          require_once('include/utils.php');
          $thisReport = new KReport();
          $thisReport->retrieve($_REQUEST['record']);

          $thisReport->takeSnapshot();
          return true;

    }


    function action_export_to_excel()
    {
      global $current_user;

      require_once('modules/KReports/KReport.php');
      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);


      // check if we have set dynamic Options
      if(isset($_REQUEST['dynamicoptions']))
      // Bugfix 2010-11-12 to handle dynamic options in Excel Export
      //		  $thisReport->whereOverride = json_decode_kinamu( html_entity_decode_utf8($_REQUEST['dynamicoptions']));
                  $_REQUEST['whereConditions'] = $_REQUEST['dynamicoptions'];

                  
      // force Download
      $filename ="kinamureporter.csv";
	  header('Content-type: application/ms-excel');
	  header('Content-Disposition: attachment; filename='.$filename);
                  
      echo $thisReport->createCSV();

    }

    function action_check_isfavorite(){
        global $current_user, $db;

        print ($db->getRowCount($db->query('SELECT id FROM kreportsfavorites WHERE user_id = \'' . $current_user->id . '\' AND report_id = \'' . $_REQUEST['record'] . '\'')) > 0) ? 'true' : 'false';

    }
    // function to add to favorites
    function action_add_report_to_favorites()
    {
        global $current_user, $db;

        $db->query('INSERT INTO kreportsfavorites SET id=\'' . create_guid() . '\', user_id = \'' . $current_user->id . '\', report_id = \'' . $_REQUEST['record'] . '\', description = \'' . $_REQUEST['favorite_name'] . '\', report_where = \'' . $_REQUEST['report_where'] . '\'');

    }

    function action_remove_report_from_favorites()
    {
        global $current_user, $db;

        $db->query('DELETE FROM kreportsfavorites WHERE user_id = \'' . $current_user->id . '\' AND report_id = \'' . $_REQUEST['record'] . '\'');

    }

    /*
     * Function to generate Target List
     */
    function action_export_to_targetlist()
    {
      global $current_user;


      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);

      // check if we have set dynamic Options
      if(isset($_REQUEST['whereConditions']))
                $thisReport->whereOverride = json_decode_kinamu( html_entity_decode($_REQUEST['whereConditions']));

      $thisReport->createTargeList($_REQUEST['targetlist_name']);

      return true;
    }

     /*
     * Function to generate Target List
     */
    function action_export_to_targetlist_premium(){
    	
	   global $current_user;
	   
	   $thisReport = new KReport();
	   $thisReport->retrieve($_REQUEST['record']);
	
	   // initiate the handle
	   require_once('modules/KReports/KReportTargetListHandler.php');
	   $thisTargetListHandler = new KReportTargetListHandler($thisReport);
	   
	   // check if we have set dynamic Options
	   if(isset($_REQUEST['whereConditions']))
	                $thisReport->whereOverride = json_decode_kinamu( html_entity_decode($_REQUEST['whereConditions']));
	    
	   if($_REQUEST['targetlist_action'] == 'new')
	   		$thisReport->createTargeList($_REQUEST['targetlist_name'], $_REQUEST['campaign_id']);     
	   else 
	   		$thisTargetListHandler->handle_udate_request($_REQUEST['taregtlist_update_action'], $_REQUEST['targetlist_id']);     
    	
        return true;
    }
    
    function action_check_export_to_targetlist()
    {

      global $current_user;

      require_once('modules/KReports/KReport.php');
      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);
      // $results = $thisReport->getSelectionResults();

          require_once('modules/ProspectLists/ProspectList.php');
          $newProspectList = new ProspectList();

          // fill with results:
          $newProspectList->load_relationships();

          $linkedFields = $newProspectList->get_linked_fields();

          $foundModule = false;

          foreach($linkedFields as $linkedField => $linkedFieldData)
          {
              if($newProspectList->$linkedField->_relationship->rhs_module == $thisReport->report_module)
              {
                   $foundModule = true;
              }
          }

        print ($foundModule) ? 'true' : 'false';


    }


    function action_check_access_level()
    {

      global $current_user, $db;
      require_once('modules/KReports/KReport.php');
      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);

      require_once('modules/ACL/ACLController.php');

      if(ACLController::checkAccess($thisReport->module_dir,'edit',  $thisReport->assigned_user_id == $current_user->id ? true : false))
      {
          if(ACLController::checkAccess($thisReport->module_dir,'delete', $thisReport->assigned_user_id == $current_user->id ? true : false))
                  print 2;
          else
                  print 1;
      }
      else
      {
          print 0;
      }

    }

    function action_get_userids()
    {
        global $db;

        $returnArray['count'] = $db->getRowCount($db->query('SELECT id, user_name FROM users WHERE deleted = \'0\' AND status = \'Active\' AND user_name like \''. $_REQUEST['query'] . '%\''));

        //if(isset($_REQUEST['query']) && $_REQUEST['query'] != '')
         $usersResult = $db->query('SELECT id, user_name FROM users WHERE deleted = \'0\' AND status = \'Active\' AND user_name like \''. $_REQUEST['query'] . '%\' LIMIT ' .  $_REQUEST['start'] . ',' . $_REQUEST['limit']);
         //else
         //	$usersResult = $db->query('SELECT id, user_name FROM users WHERE deleted = \'0\' AND status = \'Active\'');

         while($userRecord = $db->fetchByAssoc($usersResult))
         {
             // bugfix 2010-09-28 since id was asisgned and not user name ..  no properly evaluates active user
             $returnArray['data'][] = array('value' => $userRecord['id'], 'text' => $userRecord['user_name']);
         }



         echo json_encode($returnArray);
    }

    function action_get_targetlists()
    {
    	global $db;
    	
    	$returnArray =  array();
    	
    	$targetListObj = $db->query("SELECT id, name FROM prospect_lists WHERE deleted='0'");
    	while($prospect_list_record = $db->fetchByAssoc($targetListObj))
    	{
    		$returnArray[] = array(
    			'id' => $prospect_list_record['id'], 
    			'name' => $prospect_list_record['name']
    		);
    	}
    	
    	echo json_encode($returnArray);
    }
    
    function action_get_campaigns()
    {
    	global $db;
    	 
    	$returnArray =  array();
    	$returnArray[] = array(
    			'id' => '',
    			'name' => '-'
    	);
    	 
    	$campaignsObj = $db->query("SELECT id, name FROM campaigns WHERE deleted='0'");
    	while($campaign_record = $db->fetchByAssoc($campaignsObj))
    	{
    		$returnArray[] = array(
    				'id' => $campaign_record['id'],
    				'name' => $campaign_record['name']
    		);
    	}
    	 
    	echo json_encode($returnArray);
    }
    
    function action_get_teamids()
    {
        global $db;

        $returnArray['count'] = $db->getRowCount($db->query('SELECT id, name FROM teams WHERE deleted = \'0\'  AND name like \''. $_REQUEST['query'] . '%\''));

        //if(isset($_REQUEST['query']) && $_REQUEST['query'] != '')
         $teamResult = $db->query('SELECT id, name FROM teams WHERE deleted = \'0\' AND name like \''. $_REQUEST['query'] . '%\' LIMIT ' .  $_REQUEST['start'] . ',' . $_REQUEST['limit']);
         //else
         //	$usersResult = $db->query('SELECT id, user_name FROM users WHERE deleted = \'0\' AND status = \'Active\'');

         while($teamRecord = $db->fetchByAssoc($teamResult))
         {
             // bugfix 2010-09-28 since id was asisgned and not user name ..  no properly evaluates active user
             $returnArray['data'][] = array('value' => $teamRecord['id'], 'text' => $teamRecord['name']);
         }

         echo json_encode($returnArray);
    }
    
    
	function action_get_autocompletevalues(){
		global $app_list_strings, $beanFiles, $beanList, $db;
		
		$returnArray = array();
		
		// explode the path
		$pathArray = explode('::', $_REQUEST['path']);
		
		// get Field and Module from the path
		$fieldArray = explode(':',$pathArray[count($pathArray) - 1]);
		$moduleArray = explode(':',$pathArray[count($pathArray) - 2]);
		
		// load the parent module
		require_once($beanFiles[$beanList[$moduleArray[1]]]);
		$parentModule = new $beanList[$moduleArray[1]];
		
		if($moduleArray[0] == 'link')
		{
			// load the Relationshop to get the module
			$parentModule->load_relationship($moduleArray[2]);
		
			// load the Module
			$thisModuleName = $parentModule->$moduleArray[2]->getRelatedModuleName();
			require_once($beanFiles[$beanList[$parentModule->$moduleArray[2]->getRelatedModuleName()]]);
			$thisModule = new $beanList[$parentModule->$moduleArray[2]->getRelatedModuleName()];
		}
		else
			$thisModule = $parentModule;
		
		if($thisModule->table_name != '' && $_REQUEST['query'] != '')
		{
			$query_res = $db->limitQuery("SELECT id, name FROM $thisModule->table_name WHERE name like '%" . $_REQUEST['query'] . "%' AND deleted='0'", 0 , 10);
			while($thisEntry = $db->fetchByAssoc($query_res)){
				$returnArray[] = array('itemid' => $thisEntry['id'], 'itemtext' => $thisEntry['name']);
			}
		}
		
		echo json_encode($returnArray);
	}
    
    function action_get_enum()
    {

         global $app_list_strings, $beanFiles, $beanList, $db;

         // explode the path
         $pathArray = explode('::', $_REQUEST['path']);

         // get Field and Module from the path
         $fieldArray = explode(':',$pathArray[count($pathArray) - 1]);
         $moduleArray = explode(':',$pathArray[count($pathArray) - 2]);

         // load the parent module
         require_once($beanFiles[$beanList[$moduleArray[1]]]);
         $parentModule = new $beanList[$moduleArray[1]];

         if($moduleArray[0] == 'link')
         {
             // load the Relationshop to get the module
             $parentModule->load_relationship($moduleArray[2]);

             // load the Module
             $thisModuleName = $parentModule->$moduleArray[2]->getRelatedModuleName();
             require_once($beanFiles[$beanList[$parentModule->$moduleArray[2]->getRelatedModuleName()]]);
             $thisModule = new $beanList[$parentModule->$moduleArray[2]->getRelatedModuleName()];

             // pars the otpions into the return array
             switch($thisModule->field_name_map[$fieldArray[1]]['type'])
             {
                 case 'enum':
                 case 'radioenum':
                 case 'multienum':
                  foreach($app_list_strings[$thisModule->field_name_map[$fieldArray[1]]['options']] as $value => $text)
                     {
                         $returnArray[] = array('value' => $value, 'text' => $text);
                     }
                 	break;
                 case 'parent_type':
                 	// bug 2011-08-08 we assume it is parent_name 
                 	// not completely correct since we should look for the field where the name is the type but will be sufficient
                 	foreach($app_list_strings[$thisModule->field_name_map['parent_name']['options']] as $value => $text)
                     {
                         $returnArray[] = array('value' => $value, 'text' => $text);
                     }
                 	break;
                 case 'user_name':
                 case 'assigned_user_name':
                 	 global $locale;
                     $returnArray[] = array('value' => 'current_user_id', 'text' => 'active user');
                     $usersResult = $db->query('SELECT id, user_name, first_name, last_name FROM users WHERE deleted = \'0\' ORDER BY last_name'); //  AND status = \'Active\'');
                     while($userRecord = $db->fetchByAssoc($usersResult))
                     {
                         // bugfix 2010-09-28 since id was asisgned and not user name ..  no properly evaluates active user
                         // bugfix 2012-03-29 proper name formatting based on user preferences
                         // $returnArray[] = array('value' => $userRecord['user_name'], 'text' => ($userRecord['last_name'] =! '' ? $userRecord['first_name'] . ' ' . $userRecord['last_name'] : $userRecord['user_name']));
                         $returnArray[] = array('value' => $userRecord['user_name'], 'text' => ($userRecord['last_name'] =! '' ?  $locale->getLocaleFormattedName($userRecord['first_name'], $userRecord['last_name'], '') : $userRecord['user_name']));
                     }
                     break;
                 case 'team_name':
                     $teamsResult = $db->query('SELECT team_name FROM teams WHERE deleted = \'0\' ORDER BY name'); //  AND status = \'Active\'');
                     while($teamRecord = $db->fetchByAssoc($teamsResult))
                     {
                         // bugfix 2010-09-28 since id was asisgned and not user name ..  no properly evaluates active user
                         $returnArray[] = array('value' => $teamRecord['name'], 'text' =>  $teamRecord['name'] );
                     }
                     break;
             }

         }
         else
         {
             // we have the root module
             switch($parentModule->field_name_map[$fieldArray[1]]['type'])
             {
                 case 'enum':
                 case 'radioenum':
                 case 'multienum':
                  foreach($app_list_strings[$parentModule->field_name_map[$fieldArray[1]]['options']] as $value => $text)
                     {
                         $returnArray[] = array('value' => $value, 'text' => $text);
                     }
                 break;
                 case 'parent_type':
                 	// bug 2011-08-08 we assume it is parent_name 
                 	// not completely correct since we should look for the field where the name is the type but will be sufficient
                 	foreach($app_list_strings[$parentModule->field_name_map['parent_name']['options']] as $value => $text)
                     {
                         $returnArray[] = array('value' => $value, 'text' => $text);
                     }
                 	break;
                 case 'user_name':
                 case 'assigned_user_name':
                     $returnArray[] = array('value' => 'current_user_id', 'text' => 'active user');
                     $usersResult = $db->query('SELECT id, user_name FROM users WHERE deleted = \'0\' AND status = \'Active\'');
                     while($userRecord = $db->fetchByAssoc($usersResult))
                     {
                         // bugfix 2010-09-28 since id was asisgned and not user name ..  no properly evaluates active user
                         $returnArray[] = array('value' => $userRecord['user_name'], 'text' => $userRecord['user_name']);
                     }
                     break;
             }
         }


         print json_encode_kinamu($returnArray);
    }

    /*
     * Custom Action to load the Report Data
     * also gets called during paging limit and start currently only works for MySQL
     * MSSQL needs adoption
     */
    function action_load_report(){
        global $db;

        // set_time_limit(1);
        //sleep(60);

        require_once('modules/KReports/KReport.php');

        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['requester']);

        // set start and limit if not set 
        if(!isset($_REQUEST['start'])) $_REQUEST['start'] = 0;
        if(!isset($_REQUEST['limit'])) $_REQUEST['limit'] = 0;
        
        // set the override Where if set in the request
        if(isset($_REQUEST['whereConditions']))
        {
          $thisReport->whereOverride = json_decode_kinamu( html_entity_decode($_REQUEST['whereConditions']));
        }

        // set request Paramaters
        $reportParams = array('noFormat' => true , 'start' => isset($_REQUEST['start']) ? $_REQUEST['start'] : 0 , 'limit' => isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 0);
        
        // see if we should dort
        //if(isset($parameters['sortseq'])) $paramsArray['sortseq'] = $parameters['sortseq'];
		//if(isset($parameters['sortid'])) $paramsArray['sortid'] = $parameters['sortid'];
		if(isset($_REQUEST['sort']) && isset($_REQUEST['dir']))
		{
			 $reportParams['sortseq'] = $_REQUEST['dir'];
			 $reportParams['sortid'] = $_REQUEST['sort'];
		}
        
        $totalArray = array();
        $totalArray['records'] = $thisReport->getSelectionResults($reportParams , isset($_REQUEST['snapshotid']) ? $_REQUEST['snapshotid'] : '0', false);

        // 2012-01-18 set the metadata so we can also send the records
        $arrayList =  json_decode( html_entity_decode($thisReport->listfields), true);
 		
 		$fieldArr[] = array('name' => 'sugarRecordId');
 		$fieldArr[] = array('name' => 'sugarRecordModule');
 		
 		foreach($thisReport->kQueryArray->queryArray['root']['kQuery']->joinSegments as $joinpath => $joinsegment)
 		{
 			if( $joinsegment['jointype'] != '')
 			{
	 			$fieldArr[] = array('name' => $joinsegment['alias'] . 'id');
	 			$fieldArr[] = array('name' => $joinsegment['alias'] . 'path');
 			}
 		}
 		
 		// see if we have a unionselect
		if($thisReport->kQueryArray->queryArray['root']['kQuery']->unionJoinSegments != '')
		{
			$fieldArr[] = array('name' =>  'unionid');
	 		foreach($thisReport->kQueryArray->queryArray['root']['kQuery']->unionJoinSegments as $thisAlias => $thisJoinIdData)
			{
				$fieldArr[] = array('name' =>  $thisAlias . 'id');
			}
		}
		// process the list fields 
 		foreach($arrayList as $thisList){

	 		$fieldArr[] = array('name' => trim($thisList['fieldid']));
	 		
 			// see if we nee to add a field for the currency_id to the store 2010-12-25 
 			if($this->bean->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['type'] == 'currency' || (isset($this->bean->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['kreporttype']) &&  $this->bean->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['kreporttype'] == 'currency'))
 				$fieldArr[] = array('name'=> trim($thisList['fieldid'], ':') . '_curid');
 		}
      	
		$totalArray['metaData'] = array(
			'totalProperty' => 'count',
			'root' => 'records', 
			'fields' => $fieldArr
		);
        // 2012-01-18 Ende
		
        if(isset($_REQUEST['doCount']) && $_REQUEST['doCount'] == 'true')
        {
             $totalArray['count'] = $thisReport->getSelectionResults(array('start' => $_REQUEST['start'], 'limit' => $_REQUEST['limit']), isset($_REQUEST['snapshotid']) ? $_REQUEST['snapshotid'] : '0', true);
        }
        else
        {
             $totalArray['count'] = (count($totalArray['records']) < $_REQUEST['limit'] ? $_REQUEST['start'] + count($totalArray['records']) : $_REQUEST['start'] + $_REQUEST['limit'] + 1);
        }
        
        // jscon encode the result and return it
        $json_string = json_encode_kinamu($totalArray);
        echo $json_string;

        exit();
    }

    function action_load_report_count(){
        global $db;

        require_once('modules/KReports/KReport.php');

        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['requester']);

        // set the override Where if set in the request
        if(isset($_REQUEST['whereConditions']))
        {
          $thisReport->whereOverride = json_decode_kinamu( html_entity_decode($_REQUEST['whereConditions']));
        }


        echo $thisReport->getSelectionResults(array('start' => $_REQUEST['start'], 'limit' => $_REQUEST['limit']), isset($_REQUEST['snapshotid']) ? $_REQUEST['snapshotid'] : '0', true);
    }


    function action_load_report_tree(){

        // set the header to JSON .. nic ebut not needed ..
        header('Content-Type: application/json');

        // processing
        require_once('modules/KReports/KReport.php');
        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['requester']);

        $currentGroupLevel = 1;
        $filterArray = '';

        //build the filter for the node ..
        if(isset($_REQUEST['node']) && $_REQUEST['node'] != 'root')
        {
            $tmp_filterArray = preg_split('/::/', $_REQUEST['node']);
            foreach($tmp_filterArray as $ilterSeq => $filterDef)
            {
                $filterEntryArray = preg_split('/:/', $filterDef);
                $filterArray[$filterEntryArray[0]] = $filterEntryArray[1];
            }
            $currentGroupLevel = count($filterArray) + 1;
        }

        // get the results for the node
        //$maxGroupLevel = $thisReport->getMaxGroupLevel();

        // get the grouping fields
        $listTypeProperties =  json_decode(html_entity_decode($thisReport->listtypeproperties), true);
         $thisReportGroupings = json_decode($listTypeProperties[0], true);

        //if($currentGroupLevel > $maxGroupLevel)
        if($currentGroupLevel < count($thisReportGroupings))
            $resultRecords = $thisReport->getSelectionResults(array('noFormat' => false, 'toPDF' => true, 'exclusiveGrouping' => true) , '0', false,  $filterArray, array($thisReportGroupings[$currentGroupLevel - 1]['fieldid']));
        else
        	// 2011-03-25 no grouping on the lowest level excpet what the report groups anyway
            $resultRecords = $thisReport->getSelectionResults(array('noFormat' => false, 'toPDF' => true) , '0', false,  $filterArray, array() /*array($thisReportGroupings[count($thisReportGroupings) - 1]['fieldid'])*/);

        // now get the format ... first we did not format to keep original values for the later selection
        // need that for the ID
        // $formattedResultRecords =$thisReport->formatFields($resultRecords, false);

        //$levelFieldId = $thisReport->getGroupLevelId($currentGroupLevel);
        $levelFieldId = $thisReportGroupings[$currentGroupLevel - 1]['fieldid'];

        // get the list fields array since we need to check against that one
        $listFieldsAray = $thisReport->getListFieldsArray();

        foreach($resultRecords as $thisRecordId => $thisRecordData)
        {
            $returnArray = array();
            // 2011-03-07 add the original value '_val' as id rather then the translated value
            $returnArray['id'] = (isset($_REQUEST['node']) && $_REQUEST['node'] != 'root' ? $_REQUEST['node'] . '::' : '') . $levelFieldId . ':' . (isset($thisRecordData[$levelFieldId . '_val']) ? $thisRecordData[$levelFieldId . '_val'] : $thisRecordData[$levelFieldId]);
            $returnArray['leaf'] = $currentGroupLevel == count($thisReportGroupings) /*$maxGroupLevel*/ ? true : false;

            // process all the other entry fields
            foreach($thisRecordData as $fieldId => $fieldValue)
            {

                if(count($thisReportGroupings) /*$maxGroupLevel*/ == $currentGroupLevel || (count($thisReportGroupings) /*$maxGroupLevel*/ > $currentGroupLevel &&  $listFieldsAray[$fieldId]['sqlfunction'] != '-'))
                    $returnArray[$fieldId] = $thisRecordData[$fieldId];
                else
                    $returnArray[$fieldId] = '';
            }

            // set the text if we still have a field
            if($levelFieldId != '')
                $returnArray[$thisReportGroupings[count($thisReportGroupings) - 1]['fieldid']] = $thisRecordData[$thisReportGroupings[$currentGroupLevel - 1]['fieldid']];
                //$returnArray['text'] = $thisFormattedRecordData[$levelFieldId];


            $return[] = $returnArray;
        }

        //json encode an return
        print json_encode_kinamu($return);

    }
    /*
     * Custom SOAP Function to get Nodes
     * Called from extjs Framework to get further nodes for a selected module
     */
    function action_get_nodes(){
        // main processing
        global $_REQUEST, $beanFiles, $beanList;
        if($_REQUEST['node'] != 'unionroot')
        {
            $nodeArray = explode(':', $_REQUEST['node']);

            $returnArray = array();

            if($nodeArray[0] == 'root' || preg_match('/union/',$nodeArray[0]) > 0)
            {
                print json_encode_kinamu($this->buildNodeArray($nodeArray['1'], 'TREE'));
            }
            if($nodeArray[0] == 'link')
            {
                require_once($beanFiles[$beanList[$nodeArray['1']]]);
                $nodeModule = new $beanList[$nodeArray['1']];
                $nodeModule->load_relationship($nodeArray['2']);

                $returnJArray = json_encode_kinamu($this->buildNodeArray($nodeModule->$nodeArray['2']->getRelatedModuleName(), 'TREE', $nodeModule->$nodeArray['2'], $nodeArray['2']));

                print $returnJArray;
            }

        }
        else
            echo '';
    }

    /*
     * Custom Action to get the Fields for a Module
     */
    function action_get_fields()
    {
        global $_REQUEST, $beanFiles, $beanList;

        $nodeArray = explode(':', $_REQUEST['nodeid']);

        $returnArray = array();

        // check if we have the root module or a union module ...
        if($nodeArray[0] == 'root' || preg_match('/union/', $nodeArray[0]) == 1)
        {
            print json_encode_kinamu($this->buildFieldArray($nodeArray['1']));
        }
        if($nodeArray[0] == 'link')
        {
            require_once($beanFiles[$beanList[$nodeArray['1']]]);
            $nodeModule = new $beanList[$nodeArray['1']];
            $nodeModule->load_relationship($nodeArray['2']);

            $returnJArray = json_encode_kinamu($this->buildFieldArray($nodeModule->$nodeArray['2']->getRelatedModuleName()));

            print $returnJArray;
        }

        if($nodeArray[0] == 'relationship')
        {
            require_once($beanFiles[$beanList[$nodeArray['1']]]);
            $nodeModule = new $beanList[$nodeArray['1']];
            $nodeModule->load_relationship($nodeArray['2']);
            $returnJArray = json_encode_kinamu($this->buildLinkFieldArray($nodeModule->$nodeArray['2']));

            print $returnJArray;
        }
        if($nodeArray[0] == 'audit')
        {
        	$returnJArray = json_encode_kinamu($this->buildAuditFieldArray());

            print $returnJArray;
        }
    }
    /*
     * Helper function to get the Fields for a module
     */
    function buildFieldArray($module){
        global $beanFiles, $beanList;
        require_once('include/utils.php');
        $returnArray = array();
        if($module != '' && $module !='undefined' && file_exists($beanFiles[$beanList[$module]])) {
            require_once($beanFiles[$beanList[$module]]);
            $nodeModule = new $beanList[$module];
            foreach($nodeModule->field_name_map as $field_name => $field_defs)
            {
                if($field_defs['type'] != 'link'
                    //&& $field_defs['type'] != 'relate'
                    && (!array_key_exists('source', $field_defs) || 
                    	(array_key_exists('source', $field_defs) && (
                    		$field_defs['source'] != 'non-db'
		                        || ($field_defs['source'] == 'non-db'
		                            && $field_defs['type'] == 'kreporter')
		                        )
                        ))
                    )
                {
                    $returnArray[] = array(
                                        'id' => 'field:' . $field_defs['name'],
                                        'text' => $field_defs['name'],
                                        // in case of a kreporter field return the report_data_type so operators ar processed properly
                                        // 2011-05-31 changed to kreporttype returned if fieldttype is kreporter
                                        // 2011-10-15 if the kreporttype is set return it
                                        //'type' => ($field_defs['type'] == 'kreporter') ? $field_defs['kreporttype'] :  $field_defs['type'],
                     					'type' => (isset($field_defs['kreporttype'])) ? $field_defs['kreporttype'] :  $field_defs['type'],
                                        'name' => (translate($field_defs['vname'],$module ) != '') ? translate($field_defs['vname'],$module ) : $field_defs['name'],
                                        'leaf' => true
                                );
                }
            }
        }
        return $returnArray;

    }

    /*
     * Helper Function to build the nodes ...
     */
    function buildNodeArray($module, $requester, $thisLink = '', $thisLinkName = ''){
        global $beanFiles, $beanList;
        require_once('include/utils.php');

        include('modules/KReports/kreportsConfig.php');

        $returnArray = array();
        if(file_exists($beanFiles[$beanList[$module]])) {
            require_once($beanFiles[$beanList[$module]]);
            $nodeModule = new $beanList[$module];

            $nodeModule->load_relationships();

            // 2011-07-21 add audit table
            if(isset($GLOBALS['dictionary'][$nodeModule->object_name]['audited']) && $GLOBALS['dictionary'][$nodeModule->object_name]['audited'])
            	 $returnArray[] = array(
                                            'id' => 'audit:' . $module . ':audit' ,
                                            'text' => 'auditRecords',
                                            'leaf' => true
                                    );

            //2011-08-15 add relationship fields in many-to.many relationships          
            //2012-03-20 change for 6.4
            if($thisLink != '' && get_class($thisLink) == 'Link2')
            {
	            if($thisLink != '' && $thisLink->_relationship->relationship_type == 'many-to-many')
	            	 $returnArray[] = array(
	                                            'id' => 'relationship:' . $thisLink->focus->module_dir /* $module */ . ':' . $thisLinkName ,
	                                            'text' => 'relationship Fields',
	                                            'leaf' => true
	                                    );            	
            }
            else
            {
	            if($thisLink != '' && $thisLink->_relationship->relationship_type == 'many-to-many')
	            	 $returnArray[] = array(
	                                            'id' => 'relationship:' . $thisLink->_bean->module_dir /* $module */ . ':' . $thisLinkName ,
	                                            'text' => 'relationship Fields',
	                                            'leaf' => true
	                                    );
            }
            

            foreach($nodeModule->field_name_map as $field_name => $field_defs)
            {
            	// 2011-03-23 also exculde the excluded modules from the config in the Module Tree
                if($field_defs['type'] == 'link' && (!isset($field_defs['module']) || (isset($field_defs['module']) && array_search($field_defs['module'], $excludedModules) == false)))
                {
                    //BUGFIX 2010/07/13 to display alternative module name if vname is not maintained
                    if(isset($field_defs['vname']))
                        $returnArray[] = array(
                                            'id' => 'link:' . $module . ':' . $field_name,
                                            'text' => ((translate($field_defs['vname'], $module)) == "" ? ('[' . $field_defs['name'] . ']') : (translate($field_defs['vname'], $module))),
                                            'leaf' => false
                                    );
                    elseif(isset($field_defs['module']))
                        $returnArray[] = array(
                                            'id' => 'link:' . $module . ':' . $field_name,
                                            'text' => translate($field_defs['module'],$module),
                                            'leaf' => false
                                    );
                    else
                        $returnArray[] = array(
                                            'id' => 'link:' . $module . ':' . $field_name,
                                            'text' => get_class($nodeModule->$field_defs['relationship']->_bean),
                                            'leaf' => false
                                    );
                }
            }
        }
        return $returnArray;
    }

    function buildLinkFieldArray($thisLink){

        global $db;

        $queryRes = $db->query('describe ' . $thisLink->_relationship->join_table);

        while($thisRow = $db->fetchByAssoc($queryRes))
        {
            $returnArray[] = array(
                        'id' => 'field:' . $thisRow['Field'],
                        'text' => $thisRow['Field'],
                        // in case of a kreporter field return the report_data_type so operators ar processed properly
                        'type' => 'varchar',
                        'name' => $thisRow['Field'],
                        'leaf' => true
                );
        }

        return $returnArray;
    }


    function buildAuditFieldArray(){

		//date_created
      	$returnArray[] = array(
            'id' => 'field:date_created',
            'text' => 'date_created',
            'type' => 'datetime',
            'name' => 'date_created',
            'leaf' => true
      	 );
        
      	 $returnArray[] = array(
            'id' => 'field:created_by',
            'text' => 'created_by',
            'type' => 'varchar',
            'name' => 'created_by',
            'leaf' => true
      	 );
        
      	 $returnArray[] = array(
            'id' => 'field:field_name',
            'text' => 'field_name',
            'type' => 'varchar',
            'name' => 'field_name',
            'leaf' => true
      	 );
      	 
      	 $returnArray[] = array(
            'id' => 'field:before_value_string',
            'text' => 'before_value_string',
            'type' => 'varchar',
            'name' => 'before_value_string',
            'leaf' => true
      	 );
      	 
      	 $returnArray[] = array(
            'id' => 'field:after_value_string',
            'text' => 'after_value_string',
            'type' => 'varchar',
            'name' => 'after_value_string',
            'leaf' => true
      	 );  
      	     	 
      	 $returnArray[] = array(
            'id' => 'field:before_value_text',
            'text' => 'before_value_text',
            'type' => 'text',
            'name' => 'before_value_text',
            'leaf' => true
      	 );      

      	 $returnArray[] = array(
            'id' => 'field:after_value_text',
            'text' => 'after_value_text',
            'type' => 'text',
            'name' => 'after_value_text',
            'leaf' => true
      	 );      	 
        return $returnArray;
    }
    
    /*
     * Helper to load the charts via AJAX
     *
     */
    function action_getcharthtml()
    {

      global $current_user;

      require_once('modules/KReports/KReport.php');
      require_once('modules/KReports/KReportChart.php');
      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);

         // set the override Where if set in the request
      if(isset($_REQUEST['whereConditions']))
      {
          $thisReport->whereOverride = json_decode_kinamu( html_entity_decode($_REQUEST['whereConditions']));
      }

      $thisChartArray = new KReportChartArray($thisReport, json_decode_kinamu(html_entity_decode($thisReport->chart_params_new)), 300, $thisReport->chart_layout);

      $chartDataXML = $thisChartArray->getUpdatedChartsXML();

      print $chartDataXML;

    }

    /*
     * Begin professional Versio
     */

    function action_get_single_chart()
    {
      global $current_user;

      require_once('modules/KReports/KReport.php');
      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);
      $thisReport->buildChartArray();
      $result = $thisReport->renderChart($_REQUEST['chartindex'], $_REQUEST['height'], $_REQUEST['snapshot'], false, $_REQUEST['chartid'], true);

      echo $result;
    }

    function action_get_trendchart()
    {
      global $current_user;

      require_once('modules/KReports/KReport.php');
      require_once('modules/KReports/KReportChart.php');
      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);
      $thisReportchart = new KReportChart($thisReport);

      $result = $thisReportchart->renderTrendChart($_REQUEST['height'], $_REQUEST['dataSeriesFieldId'], $_REQUEST['dimensionsFieldId'], $_REQUEST['chartid'], $_REQUEST['chartType']);

      echo $result;
    }

    /*
     * function that returns the generated SQL Query
     */
    function action_get_sql()
    {
      global $current_user;

      require_once('modules/KReports/KReport.php');
      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);

      // set the override Where if set in the request
      if(isset($_REQUEST['whereConditions']) && $_REQUEST['whereConditions'] != '')
      {
          $thisReport->whereOverride = json_decode_kinamu( html_entity_decode($_REQUEST['whereConditions']));
      }

      //echo $thisReport->get_report_main_sql_query('', true, '');

      echo $thisReport->get_report_main_sql_query(true, '', '');
      echo '

count

';
      echo $thisReport->kQueryArray->countSelectString;

            echo '

total

';
      echo $thisReport->kQueryArray->totalSelectString;

      //$sqlArray = $thisReport->get_report_main_sql_query('', true, '');
      //echo $sqlArray['select'] . ' ' . $sqlArray['from'] . ' ' . $sqlArray['where'] . ' ' . $sqlArray['groupby'] . ' ' . $sqlArray['having'] . ' ' . $sqlArray['orderby'];
    }

    function action_duplicate_report()
    {
      global $current_user, $db, $beanList;

      require_once('modules/KReports/KReport.php');

      //$thisReport->retrieve($_REQUEST['record']);

      $row = $db->fetchByAssoc($db->query('SELECT * FROM kreports WHERE id=\'' . $_REQUEST['record'] . '\''));

      $thisReport = new KReport();
      $thisReport->populateFromRow($row);
      $thisReport->id = create_guid();
      $thisReport->new_with_id = true;
      $thisReport->name = $_REQUEST['newName'];
      $thisReport->save();

      if($beanList['KOrgObjects']) {
          // also duplicate the privileges if korgobjects is installed
          $resultSet = $db->query("SELECT * FROM korgobjects_beans WHERE bean_id = '" . $db->quote($_REQUEST['record']) . "' AND bean_name = 'KReport' AND deleted = 0");
          while($row = $db->fetchByAssoc($resultSet)) {
              $db->query("INSERT INTO korgobjects_beans (id, korgobject_id, bean_id, date_modified, bean_name, from_sap, deleted)
                               VALUES ('" . create_guid() . "', '" . $row['korgobject_id'] . "', '" . $thisReport->id . "', '" . $row['date_modified'] . "', '" . $row['bean_name'] . "', '" . $row['from_sap'] . "', '" . $row['deleted'] . "')");
          }
      }
    }


	/*
	 * function that creates the PDF
	 */
    function action_export_to_pdf()
    {
    	// 2011-07-15 bugfix to make sure nothing is sent before the PDF
    	ob_start();
    	
    	// process the report to get header and rows
        require_once('modules/KReports/KReport.php');
        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['record']);
    	include('modules/KReports/KReportPDF.php');
    	createKReportPDF($thisReport, 'D');
        
    }

    // ENDE Pro
    function action_export_to_kml() {
          $thisReport = new KReport();
          $thisReport->retrieve($_REQUEST['record']);

          // check if we have set dynamic Options
          if(isset($_REQUEST['whereConditions']))
                    $thisReport->whereOverride = json_decode_kinamu( html_entity_decode($_REQUEST['whereConditions']));

          $xmlData = $thisReport->createKML();
          echo $xmlData;

    }

    // for the maps integration
    function action_get_report_geocodes(){

      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);

      // check if we have set dynamic Options
      if(isset($_REQUEST['whereConditions']))
                $thisReport->whereOverride = json_decode_kinamu( html_entity_decode($_REQUEST['whereConditions']));

      echo $thisReport->getGeoCodes();
    }

    /*
     * Function to generate Target List
     */
    function action_geocode_report_results()
    {
      global $current_user;


      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);

      // check if we have set dynamic Options
      if(isset($_REQUEST['whereConditions']))
                $thisReport->whereOverride = json_decode_kinamu( html_entity_decode($_REQUEST['whereConditions']));

      $thisReport->massGeoCode();

      return true;
    }

    /*
     * function to deliuver html data for Rpeort and Dashlet
     */

    function action_getReportHtmlResults()
    {
    	require_once('modules/KReports/views/view.htmlpremium.php');
    	$thisReport = new KReport();
      	$thisReport->retrieve($_REQUEST['record']);

      	// see if we have custom Dashlet Filters
      	if(isset($_REQUEST['whereClause']))
      	{
      		$whereClause = json_decode(html_entity_decode($_REQUEST['whereClause']), true);

      		foreach($whereClause as $whereClauseData)
      		{
      			$dashletWhereClause[$whereClauseData['fieldid']] = $whereClauseData;
      		}

      		// get and update Report where Clause
      		$repWhereClause = json_decode(html_entity_decode($this->bean->whereconditions), true);

      		foreach($repWhereClause as $repWhereClauseIndex => $repWhereClauseData)
      		{
      			if(isset($dashletWhereClause[$repWhereClauseData['fieldid']]) && $dashletWhereClause[$repWhereClauseData['fieldid']]['value'] !== 'KRignoreFilter')
      			{
      				switch($repWhereClause[$repWhereClauseIndex]['usereditable'])
      				{
      					// if we are a checkbox set either on or off ...
      					// still not happy with this but it works
      					case 'yo2':
      					case 'yo1':
      						if($dashletWhereClause[$repWhereClauseData['fieldid']]['value'] == true)
      							$repWhereClause[$repWhereClauseIndex]['usereditable'] = 'yo1';
      						else
      							$repWhereClause[$repWhereClauseIndex]['usereditable'] = 'yo2';
      						break;
      					// default handling
      					default:
		      				switch($repWhereClause[$repWhereClauseIndex]['type'])
		      				{
		      					case 'enum':
		      					case 'radioenum':
		      					case 'date':
		      					case 'datetime':
				      				$repWhereClause[$repWhereClauseIndex]['value'] = $dashletWhereClause[$repWhereClauseData['fieldid']]['value'];
				      				$repWhereClause[$repWhereClauseIndex]['valuekey'] = $dashletWhereClause[$repWhereClauseData['fieldid']]['value'];

				      				// if clause has not been set we assume it has to be equal
				      				if($repWhereClause[$repWhereClauseIndex]['operator'] == 'ignore')
				      					$repWhereClause[$repWhereClauseIndex]['operator'] = 'equals';
				      				break;
		      					default:
		      						$repWhereClause[$repWhereClauseIndex]['value'] = $dashletWhereClause[$repWhereClauseData['fieldid']]['value'];
		      						if($repWhereClause[$repWhereClauseIndex]['operator'] == 'ignore')
				      					$repWhereClause[$repWhereClauseIndex]['operator'] = 'contains';
		      						break;
		      				}
		      				break;
      				}
      			}
      			elseif(isset($dashletWhereClause[$repWhereClauseData['fieldid']]) && $dashletWhereClause[$repWhereClauseData['fieldid']]['value'] == 'KRignoreFilter')
      			{
      				$repWhereClause[$repWhereClauseIndex]['operator'] = 'ignore';
      			}
      		}

      		$this->bean->whereconditions = json_encode_kinamu($repWhereClause);
      	}

      	echo json_encode(
      		array(
      			'content' => reportResultsToHTML($_REQUEST['divID'], $this->bean, array('start' => $_REQUEST['start'], 'limit' => $_REQUEST['limit'], 'dashletLinks' => true)),
      			'divId' => $_REQUEST['divID'],
      		    'reloadInterval' => 3000,
      		    'reportId' => $_REQUEST['record'],
      		    'start' => $_REQUEST['start'],
      		    'limit' => $_REQUEST['limit']
      			)
      		);
    }


    /**
	 * Save controller function
	 * @see SugarController::action_save()
	 */
    function action_save() {
	    global $mod_strings;

	    if(empty($this->bean->name)) {
	        $this->bean->name = $mod_strings['LBL_DEFAULT_NAME'];
	    }

	    $this->bean->save();
	}


    /*
     * Function to save standard list layout
     */
    function action_save_standard_layout()
    {
      global $current_user;

      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);

      $layoutParams = json_decode_kinamu(html_entity_decode($_REQUEST['layoutparams']));

      $listFields =  json_decode_kinamu( html_entity_decode($thisReport->listfields));

      // process the Fields
      foreach($listFields as $thisFieldIndex => $thisListField)
      {
            reset($layoutParams);
            foreach($layoutParams as $thisLayoutParam)
            {
                if($thisLayoutParam['dataIndex'] == $thisListField['fieldid'])
                {
                  $thisListField['width'] = $thisLayoutParam['width'];
                  $thisListField['sequence'] =   (string)$thisLayoutParam['sequence'];

                  // bug 2011-03-04 sequence needs leading 0
                  if(strlen($thisListField['sequence']) < 2) $thisListField['sequence'] = '0' . $thisListField['sequence'];

                  $thisListField['display'] = $thisLayoutParam['isHidden'] ? 'no' : 'yes';
                  $listFields[$thisFieldIndex] = $thisListField;
                  break;
                }
            }
      }

      usort($listFields, 'arraySortBySequence');

      $thisReport->listfields = json_encode_kinamu($listFields);
      echo $thisReport->save();
      echo $thisReport->listfields;
    }

    function action_get_pushpinimages(){
		//open the pushpin directory
		$retArray = array();
	    if ($handle = opendir('modules/KReports/images/pushpins')) {

		    while (false !== ($file = readdir($handle))) {
		        if(substr($file, 0, 1) != '.')
		        	$retArray[] = array('filename' => $file);
		    }

		    closedir($handle);
		}
        echo json_encode($retArray);
    }
}

/*
 * function for array sorting
 */
function arraySortBySequence($a, $b)
{
    return ($a['sequence'] < $b['sequence']) ? -1 : 1;
}

?>
