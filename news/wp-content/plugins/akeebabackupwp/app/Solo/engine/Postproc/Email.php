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



use Akeeba\Engine\Factory;
use Akeeba\Engine\Platform;
use Akeeba\Engine\Postproc\Exception\BadConfiguration;
use Awf\Text\Text;
use JText;
use RuntimeException;

class Email extends Base
{
	public function processPart($localFilepath, $remoteBaseName = null)
	{
		// Retrieve engine configuration data
		$config  = Factory::getConfiguration();
		$address = trim($config->get('engine.postproc.email.address', ''));
		$subject = $config->get('engine.postproc.email.subject', '0');

		// Sanity checks
		if (empty($address))
		{
			throw new BadConfiguration('You have not set up a recipient\'s email address for the backup files');
		}

		// Send the file
		$basename = empty($remoteBaseName) ? basename($localFilepath) : $remoteBaseName;

		Factory::getLog()->info(sprintf("Preparing to email %s to %s", $basename, $address));

		if (empty($subject))
		{
			$subject = "You have a new backup part";

			if (class_exists('JText'))
			{
				$subject = JText::_('COM_AKEEBA_COMMON_EMAIL_DEAFULT_SUBJECT');
			}
			elseif (class_exists('\Awf\Text\Text'))
			{
				$subject = Text::_('COM_AKEEBA_COMMON_EMAIL_DEAFULT_SUBJECT');
			}
		}

		$body = "Emailing $basename";

		Factory::getLog()->debug("Subject: $subject");
		Factory::getLog()->debug("Body: $body");

		$result = Platform::getInstance()->send_email($address, $subject, $body, $localFilepath);

		// Return the result
		if ($result !== true)
		{
			// An error occurred
			throw new RuntimeException($result);
		}

		// Return success
		Factory::getLog()->info("Email sent successfully");

		return true;
	}

	protected function makeConnector()
	{
		/**
		 * This method does not use a connector.
		 */
		return;
	}


}
