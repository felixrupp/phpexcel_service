<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addService(
    $_EXTKEY,
    'phpexcel' /* sv type */,
    'tx_phpexcel_service' /* sv key */,
    array(

        'title' => 'PHPExcel for TYPO3',
        'description' => '',

        'subtype' => '',

        'available' => TRUE,
        'priority' => 50,
        'quality' => 50,

        'os' => '',
        'exec' => '',

        'classFile' => t3lib_extMgm::extPath($_EXTKEY).'class.tx_phpexcel_service.php',
        'className' => 'tx_phpexcel_service',
    )
);
?>