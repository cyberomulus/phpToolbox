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

use Cyberomulus\PhpToolbox\PhpToolbox;
use Cyberomulus\PhpToolbox\Text;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Cyberomulus\PhpToolbox\PhpToolbox
 *
 * @package	Cyberomulus\PhpToolbox
 * @author	Brack Romain <http://www.cyberomulus.me>
 */
class PhpToolboxTest extends TestCase
	{
	/**
	 * Test all class getters
	 */
	public function testGetters()
		{
		$phpToolBox = new PhpToolbox();

		// test getter for Text Class
		$this->assertNotNull($phpToolBox->getText());
		$this->assertInstanceOf(Text::class, $phpToolBox->getText());
		}
	}
