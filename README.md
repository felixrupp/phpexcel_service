# Extension manual phpexcel_service

Fork of Armin Vieweg's extension for Typo3 7.6.

phpexcel_service provides the library [PHPExcel](https://phpexcel.codeplex.com) for TYPO3.
This version contains the version 1.8.0 and requires TYPO3 7.6.

The [documentation of PHPExcel](https://github.com/PHPOffice/PHPExcel/wiki/User%20Documentation) itself can be found on github.

## Installation

In earlier versions of this extension the PHPExcel library itself wasn't shipped
with the extension, due file size limitations of TER. But in this version the
library is already included. No further steps are necessary after installing.


## How to use?

It is very easy to integrate PHPExcel to your projects. The extension provides a service
for TYPO3, which helps you to instanciate the PHPExcel library.

Example:
```
    /** @var \ArminVieweg\PhpexcelService\Service\Phpexcel $phpExcelService */
	$phpExcelService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstanceService('phpexcel');
	$phpExcel = $phpExcelService->getPHPExcel();

	// Your excel magic goes here...

	/** @var \PHPExcel_Writer_Excel2007 $excelWriter */
	$excelWriter = $phpExcelService->getInstanceOf('PHPExcel_Writer_Excel2007', $phpExcel);
	$excelWriter->save('...');
```
