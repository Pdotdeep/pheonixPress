<?php /* /home/notesqol/public_html/gigawebsoft.com/news/wp-content/plugins/akeebabackupwp/app/Solo/ViewTemplates/Main/warning_adblock.blade.php */ ?>
<?php
/**
 * @package    solo
 * @copyright  Copyright (c)2014-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license    GNU GPL version 3 or later
 */

defined('_AKEEBA') or die();

// Used for type hinting
/** @var \Solo\View\Main\Html $this */

$adblock = <<<JS
akeeba.System.documentReady(function(){
        var test = document.createElement('div');
        test.innerHTML = '&nbsp;';
        test.className = 'adsbox';
        document.body.appendChild(test);
        window.setTimeout(function() {
            if (test.offsetHeight === 0) {
                document.getElementById('adblock-warning').style.display = 'block';
            }
            test.remove();
        }, 100);
    });
JS;

?>
<?php $this->container->application->getDocument()->addScriptDeclaration($adblock); ?>

<div id="adblock-warning" class="akeeba-block--failure" style="display: none;">
	<?php echo \Awf\Text\Text::_('SOLO_SETUP_LBL_ADBLOCK_WARNING'); ?>
</div>
