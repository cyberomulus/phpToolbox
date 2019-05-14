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
	 * Create a random string
	 *
	 * @param	int		$length		Length of string returned
	 * @param	string	$chars		List of chars authorized
	 *
	 * @return	string	String		Random string with length and characters defined
	 */
	public function random($length = 10, $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
		{
		// throw if length is not a int
		if (is_int($length) == false)
			throw new \InvalidArgumentException($length . " is not a int");

		// number of chars and string returned
		$chars_len = strlen($chars);
		$returned = '';

		for ($i = 0; $i < $length; $i++)
			$returned .= substr($chars, rand(0, $chars_len - 1), 1);

		return $returned;
		}

	/**
	 * Convert any string in camel case.
	 * Delete all no alpha and digit
	 *
	 * @param	string	$string				String to convert
	 * @param	bool	$capitalizeFirst	true for capitalise first letter of string
	 *
	 * @return	string	String converted on camel case
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function to_camelCase($string, $capitalizeFirst = false)
		{
		// replace all no alpha and digit by space
		$string = preg_replace("/[^[:alnum:][:space:]]/u", " ", $string);

		// capitalize first letter for all words
		$string = ucwords($string);

		// remove all space
		$string = str_replace(" ", "", $string);

		// trim
		$string = trim($string);

		// lower case for first character
		if ($capitalizeFirst == false)
			$string = lcfirst($string);

		return $string;
		}
	
	/**
	 * Split a camel case to words
	 *
	 * @param   string  $string				String to convert
	 * @param	bool	$capitalizeFirst	true for capitalise first letter of first word
	 *
	 * @return	string	Camel case splitted
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function from_camelCase($string, $capitalizeFirst = false)
		{
		// split string at each capitals
		$words = preg_split("/(?=[A-Z])/", $string, null, PREG_SPLIT_DELIM_CAPTURE);
		
		// create string with space
		$string = "";
		foreach ($words as $word)
			{
			$string = $string . " " . $word;
			}
		
		// to lower case and trim
		$string = strtolower($string);
		$string = trim($string);
		
		if ($capitalizeFirst == true)
			$string = ucfirst($string);
		
		return $string;
		}
	
	/**
	 * Convert any string in snake_case.
	 * Delete all no alpha and digit
	 *
	 * @param string	$string		String to convert
	 *
	 * @return	string	String converted on snake case
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function to_snakeCase($string)
		{
		// replace all no alpha and digit by space
		$string = preg_replace("/[^[:alnum:][:space:]]/u", " ", $string);
		
		// replace double space by simple space
		$string = preg_replace("/\s{2,}/", " ", $string, -1);
		
		// convert all string in lower
		$string = strtolower($string);
		
		// trim replace all space by _
		$string = trim($string);
		$string = str_replace(" ", "_", $string);
		
		return $string;
		}
	
	/**
	 * Check if a string is a email
	 *
	 * @param	string	$string		String to be scanned
	 *
	 * @return	bool	true if the string is a email, else false
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function is_email($string)
		{
		if (filter_var($string, FILTER_VALIDATE_EMAIL) !== false)
			return true;
		else
			return false;
		}

	/**
	 * Return an array with emails in string
	 *
	 * @param	string	$string		String to be scanned
	 *
	 * @return	array|bool			Array with emails in the string, or false if the string not contains email
	 * @uses	self::is_email()	For check if a word is a email
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
			if ($this->is_email($token) == true)
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
	 * @return	bool	            true if the string contains one or more emails, else false
	 * @uses	self::get_emails()	For find emails in the string
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function contains_email($string)
		{
		return is_array($this->get_emails($string));
		}
	
    /**
     * Verify if a string (or int) is a valid structured communication
     * 
     * @param   string|int  $string     String or int to be tested
     * 
     * @return  bool    true if the string is a valid structured communication
     * 
     * @author	Brack Romain <http://www.cyberomulus.me>
     */
	public function isValidSructuredCommunication($string)
    	{
	    // to string if int
    	$string = strval($string);
    	
    	if (strlen($string) > 12)
    	   return false;
    	
    	// add 0 before is the string < 12 
        while (strlen($string) < 0)
            $string = "0" . $string;
    	
    	// modulo on first part
    	$modulo = intval(substr($string, 0, -2)) % 97;
    	if ($modulo == 0)
    	    $modulo = 97;
    	
    	// check if modulo is equal to expected
    	return ($modulo == intval(substr($string, -2)) ? true : false);
    	}
	
  	/**
   	 * Verify if a string is a valid Iban structure
   	 *
   	 * @param   string  $iban     String to be tested
   	 *
   	 * @return  bool    true if the string is a valid Iban structure
   	 *
   	 * @author	Brack Romain <http://www.cyberomulus.me>
   	 */
    public function isIbanStructure($iban)
        {
        // prepare code for transform
        $iban = strtolower($iban);        
        $alphabet = array( 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j','k', 'l', 'm',
                            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
        
        // move 4 first caracteres at the end
        $ibanModified = substr($iban, 4) . substr($iban, 0, 4);
        
        // change letter in numeric
        foreach ($alphabet as $letter)
            $ibanModified = str_replace($letter, array_search($letter, $alphabet)+10, $ibanModified);
        
        // check if modulo on iban modified is 1
        return intval($ibanModified) % 97 == 1 ? true : false;
        }
    }