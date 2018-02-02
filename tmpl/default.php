<?php
/**
 * @module      Easy Search Module
 * @copyright   Copyright (C) 2009 Hiro Nozu
 * @license     GNU/GPL
 * @website     http://easysearch.forjoomla.net/
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

?>
<form id="easysearch-form" action="index.php" method="post"<?php echo $style; ?>>
    <input id="easysearch-keyword" class="inputbox" type="text" name="keyword" value="" />
    <input class="button" type="submit" value="<?php echo JText::_( 'Search' ); ?>" />
    <input type="hidden" name="option" value="com_easysearch" />
</form>
<?php echo $js; ?>
