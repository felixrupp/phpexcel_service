phpexcel_service TYPO3 Extension - Read Me
-------------------------------------------------------

1.	Installation
	After the successful installation it is necessary to download the PHPExcel library which can't be
	delivered with the extension (cause filesize restriction of TYPO3 extensions in TER). To make this process easier,
	simply go to the info tab of Extension Manager and execute the update script.

	The current version of PHPExcel will be downloaded to the server and extracted to the /Classes directory of
	this extension.


1b.	Manual installation
	If you don't trust the download script, you can put PHPExcel library manually to the extension.
	Just download the current release and put the file 'PHPExcel.php' and the whole directory 'PHPExcel' to the
	'Classes' directory in the root of this extension.


2.	Update
	If you update the extension, it is also necessary to execute the update script!


3.	How to use?
	It is very easy to integrate PHPExcel to your projects, using a provided service in TYPO3. Example:

	/** @var $phpExcelService tx_phpexcel_service */
    $phpExcelService = t3lib_div::makeInstanceService('phpexcel');

    /** @var $phpExcel PHPExcel */
    $phpExcel = $phpExcelService->getPHPExcel();

    /* Do your excel magic here ... */

    /** @var $excelWriter PHPExcel_Writer_Excel2007 */
    $excelWriter = $phpExcelService->getInstanceOf('PHPExcel_Writer_Excel2007', $phpExcel);
    $excelWriter->save($destinationPath);


4.	Documentation
	You'll find a documentation on the website of PHPExcel:
	http://phpexcel.codeplex.com/


5.	Bugs
	If you find a bug, or can't download PHPExcel automatically, feel free to contact me by mail:
	info@professorweb.de