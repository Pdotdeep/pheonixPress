<?php
/**
 * Akeeba Engine
 * The PHP-only site backup engine
 *
 * @copyright Copyright (c)2006-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU GPL version 3 or, at your option, any later version
 * @package   akeebaengine
 */

namespace Akeeba\Engine\Postproc;



class None extends Base
{
	public function __construct()
	{
		// No point in breaking the step; we simply do nothing :)
		$this->recommendsBreakAfter           = false;
		$this->recommendsBreakBefore          = false;
		$this->advisesDeletionAfterProcessing = false;
	}

	public function processPart($localFilepath, $remoteBaseName = null)
	{
		// Really nothing to do!!
		return true;
	}

	protected function makeConnector()
	{
		// I have to return an object to satisfy the definition.
		return (object) [
			'foo' => 'bar',
		];
	}
}
