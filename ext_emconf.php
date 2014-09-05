<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "phpexcel_service".
 *
 * Auto generated 24-07-2014 23:23
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'PHPExcel Library and Service',
	'description' => 'Provides PHPExcel library and TYPO3 service to use it. IMPORTANT: Execute the update script after installing, to get PHPExcel! This may take a moment.',
	'category' => 'misc',
	'version' => '1.7.6',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'Armin Ruediger Vieweg',
	'author_email' => 'info@professorweb.de',
	'author_company' => '',
	'constraints' =>
	array (
		'conflicts' =>
		array (
			'phpexcel_library' => '0.0.0-0.0.0',
		),
		'depends' =>
		array (
			'typo3' => '4.5.0-6.2.99',
		),
		'suggests' =>
		array (
		),
	),
);

