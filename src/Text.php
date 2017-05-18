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
 * This class contains useful functions for manipulating and verifying text
 *
 * @package Cyberomulus\PhpToolbox
 * @author	Brack Romain <http://www.cyberomulus.me>
 */
class Text
	{
	/**
	 * Return true if the string start with expected, else return false
	 *
	 * @param	string	$expected	 	String expected for start
	 * @param	string	$string		 	String tested
	 * @param   bool 	$caseSensitive	true (by default) for test with case sensitive, false for test without case
	 *                               	sensitive
	 *
	 * @return	bool	true if the string start with expected, else return false
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function startWith($expected, $string, $caseSensitive = true)
		{
		if ($caseSensitive == false)
			{
			$expected = strtolower($expected);
			$string = strtolower($string);
			}

		return substr($string, 0, strlen($expected)) == $expected;
		}

	/**
	 * Return true if the string end with expected, else return false
	 *
	 * @param	string	$expected		String expected for end
	 * @param	string	$string			String tested
	 * @param   bool 	$caseSensitive	true (by default) for test with case sensitive, false for test without case
	 *                               	sensitive
	 *
	 * @return	bool	true if the string end with expected, else return false
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function endWith($expected, $string, $caseSensitive = true)
		{
		if ($caseSensitive == false)
			{
			$expected = strtolower($expected);
			$string = strtolower($string);
			}

		return substr($string, -strlen($expected)) == $expected;
		}
	}