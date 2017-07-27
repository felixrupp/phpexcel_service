<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "phpexcel_service".
 *
 * Auto generated 24-03-2015 23:49
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'PHPExcel Library and Service',
	'description' => 'Provides PHPExcel library and TYPO3 service to use it. PHPExcel is already provided in this extension.',
	'category' => 'misc',
	'version' => '1.9.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => false,
	'author' => 'Armin Ruediger Vieweg',
	'author_email' => 'armin@v.ieweg.de',
	'author_company' => '',
	'constraints' =>
	array (
		'conflicts' =>
		array (
			'phpexcel_library' => '0.0.0-0.0.0',
		),
		'depends' =>
		array (
			'typo3' => '7.6.0-7.6.99',
		),
		'suggests' =>
		array (
		),
	),
);

