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
$kreportCustomFunctions = array(
	'getcurrentuserid' => 'current User ID',
);

if(!function_exists('getcurrentuserid'))
{
	function getcurrentuserid($whereConditionRecord)
	{
		global $current_user;
		
		return array(
			'operator' => 'oneof',
		    'value' => $current_user->id . ',seed_chris_id'
		);
	}
}

?>