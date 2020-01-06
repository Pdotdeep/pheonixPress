<?php
/**
 * Akeeba Engine
 * The PHP-only site backup engine
 *
 * @copyright Copyright (c)2006-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU GPL version 3 or, at your option, any later version
 * @package   akeebaengine
 */

namespace Akeeba\Engine\Postproc\Exception;

/**
 * Indicates that the post-processing engine does not support deleting remotely stored files.
 */
class DeleteNotSupported extends EngineException
{
	protected $messagePrototype = 'The %s post-processing engine does not support deletion of backup archives.';
}