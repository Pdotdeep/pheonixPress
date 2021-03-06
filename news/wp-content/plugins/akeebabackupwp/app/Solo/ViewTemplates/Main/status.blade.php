<?php
/**
 * @package    solo
 * @copyright  Copyright (c)2014-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license    GNU GPL version 3 or later
 */

use Akeeba\Engine\Factory;
use Awf\Text\Text;

defined('_AKEEBA') or die();

// Used for type hinting
/** @var \Solo\View\Main\Html $this */

$router = $this->container->router;

?>
<div class="akeeba-panel">
    <header class="akeeba-block-header">
        <h3>@lang('COM_AKEEBA_CPANEL_LABEL_STATUSSUMMARY')</h3>
    </header>
    <div>
        {{-- Backup status summary --}}
        {{ $this->statusCell }}

        {{-- Warnings --}}
        @if($this->countWarnings)
            <div>
                {{ $this->detailsCell }}
            </div>
            <hr/>
        @endif

        {{-- Version --}}
        <p class="ak_version">
            @lang('SOLO_APP_TITLE') {{ AKEEBABACKUP_PRO ? 'Professional ' : 'Core' }} {{ AKEEBABACKUP_VERSION }} ({{ AKEEBABACKUP_DATE }})
        </p>

        {{-- Changelog --}}
        <a href="#" id="btnchangelog" class="akeeba-btn--primary">CHANGELOG</a>

        <div id="akeeba-changelog" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
            <div class="akeeba-renderer-fef">
                <div class="akeeba-panel--info">
                    <header class="akeeba-block-header">
                        <h3>
                            @lang('CHANGELOG')
                        </h3>
                    </header>
                    <div id="DialogBody">
                        {{ $this->formattedChangelog }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Donation CTA --}}
        @if( ! (AKEEBABACKUP_PRO))
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="display: inline-block">
                <input type="hidden" name="cmd" value="_s-xclick" />
                <input type="hidden" name="hosted_button_id" value="10903325" />
                <input type="submit" class="akeeba-btn--green" value="Donate via PayPal" />
                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
        @endif

        {{-- Pro upsell --}}
        @if(!AKEEBABACKUP_PRO && (time() - $this->lastUpsellDismiss < 1296000))
            <p style="margin-top: 0.5em">
                @if (!$this->getContainer()->segment->get('insideCMS', false))
                    <a href="https://www.akeebabackup.com/landing/akeeba-solo.html" class="akeeba-btn--ghost--small">
                        <span class="akion-ios-star"></span>
                        @lang('COM_AKEEBA_CONTROLPANEL_BTN_LEARNMORE')
                    </a>
                @else
                    <a href="https://www.akeebabackup.com/landing/akeeba-backup-wordpress.html" class="akeeba-btn--ghost--small">
                        <span class="akion-ios-star"></span>
                        @lang('COM_AKEEBA_CONTROLPANEL_BTN_LEARNMORE')
                    </a>
                @endif
            </p>
        @endif
    </div>
</div>
