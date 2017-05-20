<?php
/*
 * This file is part of the phpToolBox package.
 *
 * (c) Brack Romain <http://www.cyberomulus.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cyberomulus\PhpToolbox\tests;

use Cyberomulus\PhpToolbox\IO;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Cyberomulus\PhpToolbox\IO
 *
 * @package	Cyberomulus\PhpToolbox\tests
 * @author	Brack Romain <http://www.cyberomulus.me>
 */
class IOTest extends TestCase
	{
	/**
	 * @var	\Cyberomulus\PhpToolbox\IO
	 */
	protected $ioClass;

	/**
	 * Initialize the tested class
	 */
	protected function setUp()
		{
		$this->ioClass = new IO();
		}

	/**
	 * Test the metod IO::scanDirFS($directory, $recursive)
	 */
	public function testScanDirFS()
		{
		// test with recurise
		$testedDirectory = $this->ioClass->scanDirFS("tests/fixtures/io_scanDirFS");
		$arrayExpected = array( "file.txt",
								"file2.xml",
								"sub_directory" => array("file3.html",
														"file4.php",
														"empty_directory" => array(),
														"more_directory" => array("file5.css")
														)
								);
		$this->assertEquals($arrayExpected, $testedDirectory);

		// test without recursive
		$testedDirectory = $this->ioClass->scanDirFS("tests/fixtures/io_scanDirFS", false);
		$arrayExpected = array( "file.txt",
								"file2.xml"
								);
		$this->assertEquals($arrayExpected, $testedDirectory);
		}

	/**
	 * Test if the exception has returned in the metod IO::scanDirFS($directory, $recursive)
	 * if a directory not exist
	 */
	public function testScanDirFS_exceptionNotExist()
		{
		$this->expectExceptionMessage("The directory null not exist");
		$this->ioClass->scanDirFS("null");
		}

	/**
	 * Test if the exception has returned in the metod IO::scanDirFS($directory, $recursive)
	 * if a directory is not directory
	 */
	public function testScanDirFS_exceptionNotDirectory()
		{
		$this->expectExceptionMessage("tests/fixtures/io_scanDirFS/file.txt is not a directory");
		$this->ioClass->scanDirFS("tests/fixtures/io_scanDirFS/file.txt");
		}
	}