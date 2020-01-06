<?php
/**
 * @package    solo
 * @copyright  Copyright (c)2014-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license    GNU GPL version 3 or later
 */

use Awf\Text\Text;

defined('_AKEEBA') or die();

/** @var \Solo\View\Fsfilters\Html $this */

$js = <<< JS

akeeba.loadScripts.push(function() {
    akeeba.Fsfilters.renderTab(akeeba_fsfilter_data);	
});

JS;

?>
@inlineJs($js)
@include('CommonTemplates/ErrorModal')
@include('CommonTemplates/ProfileName')

<form class="akeeba-form--inline akeeba-panel--info">
    <div class="akeeba-form-group">
        <label>@lang('COM_AKEEBA_FILEFILTERS_LABEL_ROOTDIR')</label>
		<?php echo $this->root_select; ?>
    </div>
    <div id="addnewfilter" class="akeeba-form-group--actions">
        <label>
			@lang('COM_AKEEBA_FILEFILTERS_LABEL_ADDNEWFILTER')
        </label>
        <button class="akeeba-btn--grey" onclick="akeeba.Fsfilters.addNew('directories'); return false;">@lang('COM_AKEEBA_FILEFILTERS_TYPE_DIRECTORIES')</button>
        <button class="akeeba-btn--grey" onclick="akeeba.Fsfilters.addNew('skipfiles'); return false;">@lang('COM_AKEEBA_FILEFILTERS_TYPE_SKIPFILES')</button>
        <button class="akeeba-btn--grey" onclick="akeeba.Fsfilters.addNew('skipdirs'); return false;">@lang('COM_AKEEBA_FILEFILTERS_TYPE_SKIPDIRS')</button>
        <button class="akeeba-btn--grey" onclick="akeeba.Fsfilters.addNew('files'); return false;">@lang('COM_AKEEBA_FILEFILTERS_TYPE_FILES')</button>
    </div>
</form>

<div id="ak_roots_container_tab" class="akeeba-panel--primary">
    <div id="ak_list_container">
        <table id="ak_list_table" class="akeeba-table--striped">
            <thead>
            <tr>
                <td width="250px">@lang('COM_AKEEBA_FILEFILTERS_LABEL_TYPE')</td>
                <td>@lang('COM_AKEEBA_FILEFILTERS_LABEL_FILTERITEM')</td>
            </tr>
            </thead>
            <tbody id="ak_list_contents">
            </tbody>
        </table>
    </div>
</div>
