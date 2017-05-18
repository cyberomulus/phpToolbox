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
	 * Initialise the tested class
	 */
	protected function setUp()
		{
		$this->ioClass = new IO();
		}
	}