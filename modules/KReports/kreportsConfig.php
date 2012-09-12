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
$customFunctionInclude = 'modules/KReports/KReportCustomFunctions.php';

$kreportEmailTemplate = 'dd457b9e-ec56-70c7-5b74-4d9c6d0938b6';
$kreportEmailSubject = 'KINAMU Reporter';
$kreportEmailBody = 'This is your scheduled Report';

// exculde Modules from Selection in Reports
$excludedModules = array('Schedulers', 'Administration');

// define Color Schemes
$kreporterColorschema = array(
	'kinamu' => array(
		'name' => 'Standard KINAMU Theme', 
		'colors' => array(
			'AFBD1F', 
			'EF3024',
			'FFCE04', 
			'E4801B',
			'7D0749', 
			'00525E', 
			'003D78', 
			'606062'
			)
		),
	'monochrome' => array(
		'name' => 'Monochrome KINAMU Theme', 
		'colors' => array(
			'606062'
			)
		),
	'yellow' => array(
		'name' => 'Monochrome KINAMU Theme (yellow)', 
		'colors' => array(
			'FFCE04'
			)
		),
	'green' => array(
		'name' => 'Monochrome KINAMU Theme (green)', 
		'colors' => array(
			'AFBD1F'
			)
		)
);

// define Styles for Charts
$kreporterStyles = array(
'noStyle' => array(
		'name' => 'noStyle', 
),
'kinamu' => array(
		'name' => 'Standard KINAMU Styles', 
		'standardParameters' => array(
			'showBorder' => 0, 
            'bgcolor' => 'ffffff'
		),
		'styleDefinitions' => array(
			array(
				'name' => 'captionFont', 
                'type' => 'font', 
                'params' => 'font=Verdana;size=12;color=777777'
			),
			array(
				'name' => 'plotGlow', 
                'type' => 'glow', 
                'params' => 'color=#bbbbbb;alpha=55'
			),
			array(
				'name' => 'captionShadow', 
                'type' => 'Shadow', 
                'params' => 'distance=6;angle=45'
			)			
		),
		'styleApplications' => array(
			array(
				'styleObject' => 'CAPTION', 
			    'styles' => 'captionFont, captionShadow'
			),
			array(
				'styleObject' => 'CANVAS', 
			    'styles' => 'plotGlow'
			)
		)
	)
);

$pdfStyles = array(
		'headerFill' => array(
			'R' => 255,'G' => 0,'B' => 0
		), 
		'headerText' => array(
			'R' => 255,'G' => 255,'B' => 255
		), 
		'showTableLines' => false,
		'tableLines' => array(
			'R' => 255,'G' => 255,'B' => 255
		), 
		'tableLineWeight' => 0.3,
		'tableFillUneven' => array(
			'R' => 210,'G' => 210,'B' => 210
		),
		'tableFillEven' => array(
			'R' => 255,'G' => 255,'B' => 255
		),
		'dataText' => array(
			'R' => 0,'G' => 0,'B' => 0
		), 
);

?>