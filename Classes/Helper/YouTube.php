<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2014 Jose Antonio Guerra <jaguerra@icti.es>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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
 * Helper class to handle YouTube URLs
 *
 * @package TYPO3
 * @subpackage tx_flvplayer2
 *
 */
class Tx_Flvplayer2_Helper_YouTube {

		/**
		 * @return boolean
		 */
		static public function isValidUrl($url) {
				if (strpos($url, 'outube.com') || strpos($url, 'youtu.be')) {
						return TRUE;
				}

				return FALSE;
		}

		/**
		 * @return string
		 */
		static public function getVideoIdFromUrl($url) {

				if (!self::isValidUrl($url)) {
						return FALSE;
				}

				$code = FALSE;

				if ( preg_match('/http[s]{0,1}:\/\/www\.youtube\.com\/watch\?v=([^&]+)/', $url, $matches) > 0 ) {
						$code = $matches[1];
				} elseif ( preg_match('/http[s]{0,1}:\/\/youtu\.be\/([^&]+)/', $url, $matches) > 0 ) {
						$code = $matches[1];
				} elseif ( preg_match('/\/\/www\.youtube\.com\/embed\/([^&]+)/', $url, $matches) > 0 ) {
						$code = $matches[1];
				}

				return $code;
		}

}

?>