<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService(
    $_EXTKEY,
    'phpexcel',
    'tx_phpexcel_service',
    array (
        'title' => 'PHPExcel for TYPO3',
        'description' => '',
        'subtype' => '',
        'available' => TRUE,
        'priority' => 50,
        'quality' => 50,
        'os' => '',
        'exec' => '',
        'classFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Service/Phpexcel.php',
        'className' => 'ArminVieweg\PhpexcelService\Service\Phpexcel',
    )
);


/** @var \ArminVieweg\PhpexcelService\Service\Phpexcel $phpExcelService */
$phpExcelService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstanceService('phpexcel');
$phpExcel = $phpExcelService->getPHPExcel();

// Your excel magic goes here...

/** @var \PHPExcel_Writer_Excel2007 $excelWriter */
$excelWriter = $phpExcelService->getInstanceOf('PHPExcel_Writer_Excel2007', $phpExcel);
$excelWriter->save('...');