<?php
/*
 * This file is part of the phpToolBox package.
 *
 * (c) Brack Romain <cyberomulus.me@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cyberomulus\PhpToolbox;

/**
 * This class contains useful functions for manipulate date, time and timezone
 *
 * @package Cyberomulus\PhpToolbox
 * @author	Brack Romain <cyberomulus.me@gmail.com>
 */
class Datetime
	{
	/**
	 * Verify if timezone is valid
	 *
	 * @param	string	$timezone	timezone to tested is valid
	 *
	 * @return	bool	true if timezone is valid, else false
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function isTimezone($timezone): bool
		{
		return in_array($timezone, \DateTimeZone::listIdentifiers());
		}
	}