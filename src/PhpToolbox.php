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
 * This class contains a getter for each of the individual classes.
 * If you want to use this lib as a framework service, you can declare this class to use a single service
 *
 * @package	Cyberomulus\PhpToolbox
 * @author	Brack Romain <http://www.cyberomulus.me>
 */
class PhpToolbox
	{
	/**
	 * @var	\Cyberomulus\PhpToolbox\Text
	 * 			This instance contains useful functions for manipulating and verifying text
	 */
	private $text;

	/**
	 * @var \Cyberomulus\PhpToolbox\IO
	 * 			This instance contains useful functions for read and write (on filesystem, console, network)
	 */
	private $io;

	/**
	 * PhpToolbox constructor, initialize all properties.
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function __construct()
		{
		$this->text = new Text();
		$this->io = new IO();
		}

	/**
	 * @return \Cyberomulus\PhpToolbox\Text
	 * 				The instance of class Text (contains useful functions for manipulating and verifying text)
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function getText()
		{
		return $this->text;
		}

	/**
	 * @return \Cyberomulus\PhpToolbox\IO
	 * 				The instance of class IO (contains useful functions for read and write (on filesystem, console, network)
	 *
	 * @author	Brack Romain <http://www.cyberomulus.me>
	 */
	public function getIO()
		{
		return $this->io;
		}
	}