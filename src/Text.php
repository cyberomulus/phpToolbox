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

	/**
	 * Return an array with emails in string
	 *
	 * @param	string	$string		String to be scanned
	 *
	 * @return	array|bool			Array with emails in the string, or false if the string not contains email
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function get_emails($string)
		{
		// array returned
		$returned = array();

		// split with space delimiter
		foreach(preg_split('/\s/', $string) as $token)
			{
			// add if email
			if (filter_var($token, FILTER_VALIDATE_EMAIL) !== false)
				$returned[] = $token;
			}

		// return the array or false
		if (count($returned) == 0)
			return false;
		else
			return $returned;
		}

	/**
	 * Verify if a string contains one or more emails
	 *
	 * @param	string	$string		String to be scanned
	 *
	 * @return	bool	true if the string contains one or more emails, else false
	 * @uses	self::get_emails()	For find emails in the string
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function contains_email($string)
		{
		return is_array($this->get_emails($string));
		}

	// todo is_email()
	}