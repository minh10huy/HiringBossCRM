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
$manifest = array(
	'acceptable_sugar_flavors' => array(
		'CE',
        'PRO',
        'ENT'
	),
	'acceptable_sugar_versions' => array(
	    '5.5.*',
	    '6.*'
	),
	'is_uninstallable' => true,
	'name' => 'K Reporter Basic Edition',
	'author' => 'Christian Knoll',
	'description' => 'interactive Reporting Module for SugarCRM',
	'published_date' => '2012/08/05',
	'version' => 'v2.7.7',
	'type' => 'module',
);

$installdefs = array(
    'id' => 'KReporter',
    'image_dir' => '<basepath>/images',
	'beans' => array(
	     array(
	       'module'          => 'KReports',
	       'class'           => 'KReport',
	       'path'            => 'modules/KReports/KReport.php',
	       'tab'             => true, 
	     )
	),
   'language' => array(
     array(
	     'from'              => '<basepath>/language/en_us.KReports.php',
	     'to_module'         => 'application',
	     'language'          => 'en_us' 
     )
   ),
	'copy' => array(
         array(
			'from' => '<basepath>/modules/KReports',
			'to' => 'modules/KReports',
         ), 
	),
	'relationships' => array(
		array(
			'module' => 'KReporter', 
		    'meta_data' => '<basepath>/metadata/KReportMetaData.php'
		),
	),
);

?>