<?php
/**
 * @package    solo
 * @copyright  Copyright (c)2014-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license    GNU GPL version 3 or later
 */

use Awf\Text\Text;
use Solo\Helper\Escape;

defined('_AKEEBA') or die();

/** @var \Solo\View\Sysconfig\Html $this */

$router = $this->getContainer()->router;
$inCMS = $this->getContainer()->segment->get('insideCMS', false);
?>

@include('CommonTemplates/FTPBrowser')
@include('CommonTemplates/SFTPBrowser')
@include('CommonTemplates/FTPConnectionTest')

<form action="@route('index.php?view=sysconfig')" method="POST" id="adminForm"
      class="akeeba-form--horizontal" role="form">
    <div class="akeeba-tabs">
        <label for="sysconfigAppSetup" class="active">
            <span class="akion-ios-cog"></span>
	        @lang('SOLO_SETUP_LBL_APPSETUP')
        </label>
        <section id="sysconfigAppSetup">
	        @include('Sysconfig/appsetup')
        </section>

    @if ($inCMS && AKEEBABACKUP_PRO)
        <label for="sysconfigBackupOnUpdate">
            <span class="akion-refresh"></span>
			@lang('SOLO_SETUP_LBL_BACKUPONUPDATE')
        </label>
        <section id="sysconfigBackupOnUpdate">
			@include('Sysconfig/backuponupdate')
        </section>
    @endif

        <label for="sysconfigBackupChecks">
            <span class="akion-android-list"></span>
	        @lang('SOLO_SYSCONFIG_BACKUP_CHECKS')
        </label>
        <section id="sysconfigBackupChecks">
	        @include('Sysconfig/backupchecks')
        </section>

        <label for="sysconfigPublicAPI">
            <span class="akion-android-globe"></span>
	        @lang('SOLO_SYSCONFIG_FRONTEND')
        </label>
        <section id="sysconfigPublicAPI">
	        @include('Sysconfig/publicapi')
        </section>

        <label for="sysconfigPushNotifications">
            <span class="akion-chatbubble"></span>
	        @lang('SOLO_SYSCONFIG_PUSH')
        </label>
        <section id="sysconfigPushNotifications">
	        @include('Sysconfig/push')
        </section>

        <label for="sysconfigUpdate">
            <span class="akion-refresh"></span>
	        @lang('SOLO_SYSCONFIG_UPDATE')
        </label>
        <section id="sysconfigUpdate">
	        @include('Sysconfig/update')
        </section>

        <label for="sysconfigEmail">
            <span class="akion-email"></span>
	        @lang('SOLO_SYSCONFIG_EMAIL')
        </label>
        <section id="sysconfigEmail">
	        @include('Sysconfig/email')
        </section>

	    @if (!$inCMS)
        <label for="sysconfigDatabase">
            <span class="akion-ios-box"></span>
	        @lang('SOLO_SETUP_SUBTITLE_DATABASE')
        </label>
        <section id="sysconfigDatabase">
	        @include('Sysconfig/database')
        </section>
	    @endif
    </div>

    <div class="akeeba-hidden-fields-container">
        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="token" value="@token()">
    </div>
</form>

<script type="text/javascript">
// Callback routine to close the browser dialog
var akeeba_browser_callback = null;

akeeba.loadScripts.push(function ()
{
	// Initialise the translations
	akeeba.Setup.translations['UI-BROWSE'] = '<?php echo Escape::escapeJS(Text::_('COM_AKEEBA_CONFIG_UI_BROWSE')) ?>';
	akeeba.Setup.translations['UI-REFRESH'] = '<?php echo Escape::escapeJS(Text::_('COM_AKEEBA_CONFIG_UI_REFRESH')) ?>';
	akeeba.Setup.translations['UI-FTPBROWSER-TITLE'] = '<?php echo Escape::escapeJS(Text::_('COM_AKEEBA_CONFIG_UI_FTPBROWSER_TITLE')) ?>';
	akeeba.Setup.translations['UI-ROOT'] = '<?php echo Escape::escapeJS(Text::_('SOLO_COMMON_LBL_ROOT')) ?>';
	akeeba.Setup.translations['UI-TESTFTP-OK'] = '<?php echo Escape::escapeJS(Text::_('COM_AKEEBA_CONFIG_DIRECTFTP_TEST_OK')) ?>';
	akeeba.Setup.translations['UI-TESTFTP-FAIL'] = '<?php echo Escape::escapeJS(Text::_('COM_AKEEBA_CONFIG_DIRECTFTP_TEST_FAIL')) ?>';
	akeeba.Setup.translations['UI-TESTSFTP-OK'] = '<?php echo Escape::escapeJS(Text::_('COM_AKEEBA_CONFIG_DIRECTSFTP_TEST_OK')) ?>';
	akeeba.Setup.translations['UI-TESTSFTP-FAIL'] = '<?php echo Escape::escapeJS(Text::_('COM_AKEEBA_CONFIG_DIRECTSFTP_TEST_FAIL')) ?>';

	// Push some custom URLs
	akeeba.Setup.URLs['ftpBrowser'] = '<?php echo Escape::escapeJS($router->route('index.php?view=ftpbrowser')) ?>';
	akeeba.Setup.URLs['sftpBrowser'] = '<?php echo Escape::escapeJS($router->route('index.php?view=sftpbrowser')) ?>';
	akeeba.Setup.URLs['testFtp'] = '<?php echo Escape::escapeJS($router->route('index.php?view=configuration&task=testftp')) ?>';
	akeeba.Setup.URLs['testSftp'] = '<?php echo Escape::escapeJS($router->route('index.php?view=configuration&task=testsftp')) ?>';
});

</script>
