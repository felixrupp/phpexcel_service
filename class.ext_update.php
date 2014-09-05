<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Armin Ruediger Vieweg <info@professorweb.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Extension update
 */
class ext_update  {

    /**
     * Main function, returning the HTML content of the module
     *
     * @return string HTML
     */
    public function main()    {
		$phpExcelVersion = '1.7.6';

		$temporaryFile = PATH_site . 'typo3temp/phpexcel_service_download_library_' . uniqid() . '.zip';
		$classesDir = t3lib_div::getFileAbsFileName('EXT:phpexcel_service/Classes/');
		$remoteDestinationFile = 'http://dl.dropbox.com/u/59241126/' . $phpExcelVersion . '.zip';

			// Get file and cancel if not existing/accessible
		$remoteFileContent = t3lib_div::getURL($remoteDestinationFile);
		if ($remoteFileContent === FALSE) {
			return 'Error while downloading the PHPExcel library!';
		}

			// Check existing classes dir and empty it
		if (count(t3lib_div::getFilesInDir($classesDir)) > 0) {
			$this->rmdirRecursively($classesDir);
		}

			// Create classes dir if not existing
		if (!file_exists($classesDir)) {
			mkdir($classesDir);
		}

			// Write content to disk
		$handle = fopen($temporaryFile, 'wb');
		fwrite($handle, $remoteFileContent);
		fclose($handle);

		/** @var $tools tx_em_Tools */
		$tools = t3lib_div::makeInstance('tx_em_Tools');
		$tools->unzip($temporaryFile, $classesDir);
		unlink($temporaryFile);

		return 'PHPExcel ' . $phpExcelVersion . ' has been downloaded successfully! See readme.txt for a small introduction.';

    }

    /**
     * @return boolean Always returns true
     */
    public function access() {
        return true;
    }

	/**
	 * @param string $directory
	 */
	protected function rmdirRecursively($directory) {
		if (is_dir($directory)) {
			$objects = scandir($directory);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($directory."/".$object) == "dir") $this->rmdirRecursively($directory."/".$object); else unlink($directory."/".$object);
				}
			}
			reset($objects);
			rmdir($directory);
		}
	}

}
?>