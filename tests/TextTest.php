<?php
/*
 * This file is part of the phpToolBox package.
 *
 * (c) Brack Romain <cyberomulus.me@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cyberomulus\PhpToolbox\tests;

use Cyberomulus\PhpToolbox\Text;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Cyberomulus\PhpToolbox\Text
 *
 * @package	Cyberomulus\PhpToolbox\tests
 * @author	Brack Romain <cyberomulus.me@gmail.com>
 */
class TextTest extends TestCase
	{
	/**
	 * @var	Text
	 */
	protected $textClass;

	/**
	 * Initialise the tested class
	 */
	protected function setUp(): void
		{
		$this->textClass = new Text();
		}

	/**
	 * Test the method Text::startWith($expected, $string)
	 */
	public function testStartWith()
		{
		// test with case sensitive
		$this->assertTrue($this->textClass->startWith("it's ok", "it's ok, nice!"));
		$this->assertFalse($this->textClass->startWith("It's ok", "it's ok, nice!"));

		// test without case sensitive
		$this->assertTrue($this->textClass->startWith("it's ok", "it's ok, nice!", false));
		$this->assertTrue($this->textClass->startWith("It's ok", "it's ok, nice!", false));
		}

	/**
	 * Test the method Text::endWith($expected, $string)
	 */
	public function testEndWith()
		{
		// test with case sensitive
		$this->assertTrue($this->textClass->endWith("nice!", "it's ok, nice!"));
		$this->assertFalse($this->textClass->endWith("Nice!", "it's ok, nice!"));

		// test without case sensitive
		$this->assertTrue($this->textClass->endWith("nice!", "it's ok, nice!", false));
		$this->assertTrue($this->textClass->endWith("Nice!", "it's ok, nice!", false));
		}

	/**
	 * Test if the exception has returned in the method Text::random($length, $chars)
	 * if length is not a int
	 */
	public function testRandom_exceptionNotInt()
		{
		$this->expectExceptionMessage("test is not a int");
		$this->textClass->random("test");
		}

	/**
	 * Test the method Text::random($length, $chars)
	 *
	 * @depends testRandom_exceptionNotInt
	 */
	public function testRandom()
		{
		// test with no parameter
		$this->assertEquals(1, preg_match("#^[a-zA-Z0-9]{10}$#", $this->textClass->random()));

		// test with parameter
		$this->assertEquals(1, preg_match("#^[niceForThisTest123_-]{100}$#", $this->textClass->random(100, "niceForThisTest123_-")));
		}

	/**
	 * Test the method to_camelCase($string, $capitalizeFirst)
	 */
	public function testTo_camelCase()
		{
		// test with no capitalise first character and without special character
		$this->assertEquals("itIsGood", $this->textClass->to_camelCase("It is good"));

		// test with capitalise first character and without special character
		$this->assertEquals("ItIsGood", $this->textClass->to_camelCase("it is good", true));

		// test with no capitalise first character and with special character
		$this->assertEquals("itSGoodVeryNiceNice", $this->textClass->to_camelCase(" It's good, very nice_nice !!"));

		// test with capitalise first character and with special character
		$this->assertEquals("ItSGoodVeryNiceNice", $this->textClass->to_camelCase(" It's good, very nice_nice !!", true));

		// test with more special character
		$this->assertEquals("NiceNice", $this->textClass->to_camelCase(" nice @ & | ' ( § ! { } ) - _ = + % \ >< nice", true));
		}
	
	/**
	 * Test the method to_camelCase($string, $capitalizeFirst)
	 */
	public function testFrom_camelCase()
		{
		// test with no capitalise first character of first word and without special character
		$this->assertEquals("it is good", $this->textClass->from_camelCase("ItIsGood"));
		
		// test with capitalise first character of first word and without special character
		$this->assertEquals("It is good", $this->textClass->from_camelCase("itIsGood", true));
		
		// test with no capitalise first character of first word and with special character
		$this->assertEquals("it is good(nice)", $this->textClass->from_camelCase("ItIsGood(nice)"));
		
		// test with capitalise first character of first word and with special character
		$this->assertEquals("It is good(nice)", $this->textClass->from_camelCase("itIsGood(nice)", true));
		}
	
	/**
	 * Test the method to_snakeCase($string)
	 */
	public function testTo_snakeCase()
		{
		// test without special character
		$this->assertEquals("it_is_good", $this->textClass->to_snakeCase("It is good"));
		
		// test with special character
		$this->assertEquals("it_s_good_very_nice_nice", $this->textClass->to_snakeCase(" It's good, very nice_nice !!"));
		}
	
	/**
	 * Test the method Text::is_email($string)
	 */
	public function testIs_email()
		{
		// test with a email
		$this->assertTrue($this->textClass->is_email("test@test.com"));

		// test without email
		$this->assertFalse($this->textClass->is_email("no email here"));

		// test with email in more text
		$this->assertFalse($this->textClass->is_email("this a email : test@test.com"));
		}

	/**
	 * Test the method Text::get_emails($string)
	 *
	 * @depends testIs_email
	 */
	public function testGet_emails()
		{
		// test find all emails
		$this->assertEquals(array("test@test.com", "nice@gmail.com"),
							$this->textClass->get_emails("Find test@test.com and nice@gmail.com"));

		// test with one email only
		$this->assertEquals(array("test@test.com"),
							$this->textClass->get_emails("test@test.com"));

		// test without email
		$this->assertFalse($this->textClass->get_emails("no email"));
		}

	/**
	 * Test the method Text::contains_email($string)
	 *
	 * @depends testGet_emails
	 */
	public function testContains_email()
		{
		// test with more emails
		$this->assertTrue($this->textClass->contains_email("Find test@test.com and nice@gmail.com"));

		// test with one email only
		$this->assertTrue($this->textClass->contains_email("test@test.com"));

		// test without email
		$this->assertFalse($this->textClass->contains_email("no email"));
		}
    
	/**
	 * Test the method Text::isValidSructuredCommunication($string)
	 */
	public function testIsValidSructuredCommunication()
	   {
	   // test bad length
	   $this->assertFalse($this->textClass->isValidSructuredCommunication("123456789123456"));
	   $this->assertFalse($this->textClass->isValidSructuredCommunication(123456789123456));
	   
	   // test good structure
	   $this->assertTrue($this->textClass->isValidSructuredCommunication("618326144938"));
	   $this->assertTrue($this->textClass->isValidSructuredCommunication(618326144938));
	   $this->assertTrue($this->textClass->isValidSructuredCommunication("434809819052"));
	   $this->assertTrue($this->textClass->isValidSructuredCommunication(434809819052));
	   
	   // test bad structure
	   $this->assertFalse($this->textClass->isValidSructuredCommunication("489627851425"));
	   $this->assertFalse($this->textClass->isValidSructuredCommunication(489627851425));
	   $this->assertFalse($this->textClass->isValidSructuredCommunication("458965214782"));
	   $this->assertFalse($this->textClass->isValidSructuredCommunication(458951235877));
	   
	   // test good structure with int inferior to 12 numbers
	   $this->assertTrue($this->textClass->isValidSructuredCommunication(9801));
	   }
	
	/**
	 * Test the method Text::isValidSructuredCommunication($string)
	 */
    public function testIsIbanStructure()
	   {
       // test bad Iban
       $this->assertFalse($this->textClass->isIbanStructure("GB87BARC20678541971655"));
       
       // test good Iban
       $this->assertTrue($this->textClass->isIbanStructure("BE43068999999501"));
       $this->assertTrue($this->textClass->isIbanStructure("BE60750651355970"));
       }
    }
