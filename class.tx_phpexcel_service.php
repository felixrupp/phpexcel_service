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
 * PHPExcel Service
 */
class tx_phpexcel_service extends t3lib_svbase {
	public function __construct() {
		if (!file_exists(t3lib_div::getFileAbsFileName('EXT:phpexcel_service/Classes/PHPExcel.php'))) {
			throw new Exception(
				'Please download PHPExcel library to extension in Extension Manager! See readme.txt in phpexcel_service root directory for further instructions.',
				1327677412
			);
		}
		require_once(t3lib_div::getFileAbsFileName('EXT:phpexcel_service/Classes/PHPExcel.php'));
	}

	/**
	 * Returns instance of basic class 'PHPExcel'
	 *
	 * @return PHPExcel
	 *
	 * @see tx_phpexcel_service::getInstanceOf()
	 */
	public function getPHPExcel() {
		return $this->getInstanceOf('PHPExcel');
	}

	/**
	 * Make and return instance of given classname.
	 *
	 * @param string $className
	 * @return object
	 *
	 * @see t3lib_div::makeInstance()
	 */
	public function getInstanceOf($className) {
		if (func_num_args() > 1) {
			$constructorArguments = func_get_args();
			array_shift($constructorArguments);

			$reflectedClass = new ReflectionClass($className);
			$instance = $reflectedClass->newInstanceArgs($constructorArguments);
		} else {
			$instance = t3lib_div::makeInstance($className);
		}
		return $instance;
	}

	/**
	 * @return array list of available classes
	 */
	public function listAvailableClasses() {
		$phpExcelRootPath = t3lib_div::getFileAbsFileName('EXT:phpexcel_service/Classes');
		$phpExcelPath = $phpExcelRootPath . '/PHPExcel';
		$availableClasses = array();

		$availableClasses[] = 'PHPexcel';
		foreach(t3lib_div::get_dirs($phpExcelPath) as $directory) {
			if (preg_match('/[A-Z]/', $directory{0})) {
				foreach (t3lib_div::getFilesInDir($phpExcelPath . DIRECTORY_SEPARATOR . $directory) as $file) {
					$availableClasses[] = 'PHPexcel_' . $directory . '_' . substr($file, 0, -4);
				}
			}
		}

		return $availableClasses;
	}
}
?>