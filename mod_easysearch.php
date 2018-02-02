<?php
/**
 * @module      Easy Search Module
 * @copyright   Copyright (C) 2009 Hiro Nozu
 * @license     GNU/GPL
 * @website     http://easysearch.forjoomla.net/
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

if (!defined( '_JOS_EASY_SEARCH_MODULE' ))
{
    /** ensure that functions are declared only once */
    define( '_JOS_EASY_SEARCH_MODULE', 1 );


    $mode = $params->get('mode', '1');
    $js   = '';

    if ($params->get('shortcut', 1)) {

        $document =& JFactory::getDocument();
        $document->addScript(JURI::root(true).DS.'administrator'.DS.'modules'.DS.'mod_easysearch'.DS.'shortcut.js');

        $shortcut_key = $params->get('shortcut_key', 'F');

        $keycode = $params->get('keycode', '');
        if ($keycode != '') $keycode = "keycode: {$keycode},";


        if ($mode == '1') {
            $js_function = "$('easysearch-keyword').focus(); $('easysearch-keyword').select();";
        }else{
            $js_function = "$('sbox-window').setStyle('padding', '3px'); SqueezeBox.options.duration = 0; SqueezeBox.fromElement('easy-search');";
        }

        $js = <<<EOJ
<script type="text/javascript">
window.addEvent('domready', function () {
    shortcut_es.add('{$shortcut_key}', function(e) {
        {$js_function}
    }, {
        {$keycode}
        'disable_in_input':true
    });
    // Safari needs this...
    shortcut_es.add('Esc', function(e) {
        $('easysearch-keyword').blur();
        SqueezeBox.close();
    });
});
</script>

EOJ;
    } // End of if ($params->get('shortcut', 1))

    if ($mode == '1') {
        $style = $params->get('style');
        if ($style != '') $style = " style=\"{$style}\"";
        require(JModuleHelper::getLayoutPath('mod_easysearch'));
    }else{
        $style = 'style="margin: 10px;"';
        JHTML::_('behavior.modal');
                  echo '<a rel="{handler: \'iframe\', size: {x: 850, y: 400}, onClose: function() {}}" href="index.php?option=com_easysearch&view=select&tmpl=component" class="modal">
<span class="icon-32-new">
</span>
Easy Search
</a>';

        echo $js;
    }
}