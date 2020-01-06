<?php
/**
 * Akeeba Engine
 * The PHP-only site backup engine
 *
 * @copyright Copyright (c)2006-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU GPL version 3 or, at your option, any later version
 * @package   akeebaengine
 */

namespace Akeeba\Engine\Filter;



use Akeeba\Engine\Factory;

/**
 * Directory contents (files) exclusion filter
 */
class Skipfiles extends Base
{
	function __construct()
	{
		$this->object  = 'dir';
		$this->subtype = 'content';
		$this->method  = 'direct';

		if (empty($this->filter_name))
		{
			$this->filter_name = strtolower(basename(__FILE__, '.php'));
		}

		if (Factory::getKettenrad()->getTag() == 'restorepoint')
		{
			$this->enabled = false;
		}

		parent::__construct();
	}
}
