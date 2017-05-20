<?php
/*
 * This file is part of the phpToolBox package.
 *
 * (c) Brack Romain <http://www.cyberomulus.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cyberomulus\PhpToolbox;

/**
 * This class contains useful functions for read and write (on filesystem, console, network)
 *
 * @package Cyberomulus\PhpToolbox
 * @author	Brack Romain <http://www.cyberomulus.me>
 */
class IO
	{
	/**
	 * Scan a directory in the filesystem and return an array.
	 *
	 * For like directory :
	 * | directory
	 *      | file.txt
	 *      | file2.php
	 *      | sub_directory
	 *      |    | file3.xml
	 *      |    | file4.xls
	 *      |    | more_directory
	 *      |    |    | file5.css
	 *      | empty_directory
	 *
	 * The array returned :
	 * [0] = "file.txt"
	 * [1] = "file2.php"
	 * ["subdirectory"][0] = "file3.xml"
	 * ["subdirectory"][1] = "file4.xls"
	 * ["subdirectory"]["more_directory"][0] = "file5.css"
	 * ["empty_directory"] = array()
	 *
	 * @param	string	$directory	Directory for scan (absolute or relative path)
	 * @param	bool	$recursive	true for recursive scan, false for list only files
	 *
	 * @return 	array	an array (see description for example)
	 *
	 * @throws	\InvalidArgumentException
	 * 					If $directory not exist or is not directory
	 * @throws 	\Exception
	 * 					If $directory does not open
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function scanDirFS($directory, $recursive = true)
		{
		// throw an exception is directory does not exist or is not a directory
		if (file_exists($directory) == false)
			throw new \InvalidArgumentException("The directory " . $directory . " not exist");
		if (is_dir($directory) == false)
			throw new \InvalidArgumentException($directory . " is not a directory");

		// array returned
		$returned = array();

		// open directory
		if ($opened = opendir($directory))
			{
			// for all file/directory
			while (($file = readdir($opened)) !== false)
				{
				if ( ($file == '.') || ($file == '..') )
					continue;

				if (is_dir($directory . "/" . $file) == false)
					$returned[] = $file;

				else if ($recursive == true)
					$returned[$file] =  $this->scanDirFS($directory . "/" . $file);
				}

			// close directory and return the array
			closedir($opened);
			return $returned;
			}

		// throw an exception if direction does not open
		else
			throw new \Exception("The directory " . $directory . " does not open");
		}

	/**
	 * Remove a directory recursively in a filesystem
	 *
	 * @param	string	$directory	Directory to remove
	 *
	 * @return	bool	true if directory is removed, else false
	 *
	 * @throws	\InvalidArgumentException
	 * 					If $directory not exist or is not directory
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function rmDirFS($directory)
		{
		//  throw an exception is directory does not exist or is not a directory
		if (file_exists($directory) == false)
			throw new \InvalidArgumentException("The directory " . $directory . " not exist");
		if (is_dir($directory) == false)
			throw new \InvalidArgumentException($directory . " is not a directory");

		// for all file/directory
		foreach(scandir($directory) as $file)
			{
			if ( ($file == '.') || ($file == '..') )
				continue;

			if (is_dir($directory . "/" . $file) == true)
				$this->rmDirFS($directory . "/" . $file);

			else
				unlink($directory . "/" . $file);
			}

		return rmdir($directory);
		}

	// todo function for scan dir in ftp and ssh

	// todo function for remove dir in ftp and ssh

	// todo function for copy dir in fs, ftp and ssh
	}