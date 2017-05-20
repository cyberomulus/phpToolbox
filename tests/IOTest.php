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

	/**
	 * Test the metod IO::scanDirFS($directory, $recursive)
	 *
	 * @depends	testScanDirFS_exceptionNotExist
	 * @depends testScanDirFS_exceptionNotDirectory
	 */
	public function testScanDirFS()
		{
		// test with recurise
		$testedDirectory = $this->ioClass->scanDirFS("tests/fixtures/io_scanDirFS");
		$arrayExpected = array( "file.txt",
								"file2.xml",
								"sub_directory" => array("file3.html",
														"file4.php",
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
	 * Test the method IO::copyFS($source, $destination, $permissions)
	 *
	 * @depends testScanDirFS
	 */
	public function testCopyFS()
		{
		// test the copy
		$this->assertTrue($this->ioClass->copyFS("tests/fixtures/io_scanDirFS", "tests/fixtures/io_copyFS"));

		// test if the copy equals original
		$this->assertEquals($this->ioClass->scanDirFS("tests/fixtures/io_scanDirFS"),
							$this->ioClass->scanDirFS("tests/fixtures/io_copyFS") );
		}

	/**
	 * Test if the exception has returned in the metod IO::rmDirFS($directory)
	 * if a directory not exist
	 */
	public function testRmDirFS_exceptionNotExist()
		{
		$this->expectExceptionMessage("The directory null not exist");
		$this->ioClass->scanDirFS("null");
		}

	/**
	 * Test if the exception has returned in the metod IO::rmDirFS($directory)
	 * if a directory is not directory
	 */
	public function testRmDirFS_exceptionNotDirectory()
		{
		$this->expectExceptionMessage("tests/fixtures/io_scanDirFS/file.txt is not a directory");
		$this->ioClass->scanDirFS("tests/fixtures/io_scanDirFS/file.txt");
		}

	/**
	 * Test the method IO::rmDirFS($directory, $recursive)
	 *
	 * @depends testRmDirFS_exceptionNotExist
	 * @depends testRmDirFS_exceptionNotDirectory
	 * @depends testCopyFS
	 */
	public function testRmDirFS()
		{
		$this->assertTrue($this->ioClass->rmDirFS("tests/fixtures/io_copyFS"));
		$this->assertDirectoryNotExists("tests/fixtures/io_copyFS");
		}
	}