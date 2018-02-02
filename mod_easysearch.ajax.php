<?php
/**
 * @module      Easy Search Module
 * @copyright   Copyright (C) 2009 Hiro Nozu
 * @license     GNU/GPL
 * @website     http://easysearch.forjoomla.net/
 */

// Set flag that this is a parent file
define( '_JEXEC', 1 );

// define('JPATH_BASE', dirname(__FILE__) );

define('DS', DIRECTORY_SEPARATOR);

define('JPATH_BASE', dirname(dirname(dirname(__FILE__))));

require_once( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once( JPATH_BASE .DS.'includes'.DS.'framework.php' );
require_once( JPATH_BASE .DS.'includes'.DS.'helper.php' );
require_once( JPATH_BASE .DS.'includes'.DS.'toolbar.php' );

JDEBUG ? $_PROFILER->mark( 'afterLoad' ) : null;

/**
 * CREATE THE APPLICATION
 *
 * NOTE :
 */
$app =& JFactory::getApplication('administrator');

/**
 * INITIALISE THE APPLICATION
 *
 * NOTE :
 */
$app->initialise(array(
	'language' => $app->getUserState( "application.lang", 'lang' )
));

// JPluginHelper::importPlugin('system');

// trigger the onAfterInitialise events
// JDEBUG ? $_PROFILER->mark('afterInitialise') : null;
// $app->triggerEvent('onAfterInitialise');

/**
 * ROUTE THE APPLICATION
 *
 * NOTE :
 */
$app->route();

// trigger the onAfterRoute events
// JDEBUG ? $_PROFILER->mark('afterRoute') : null;
// $app->triggerEvent('onAfterRoute');

/**
 * DISPATCH THE APPLICATION
 *
 * NOTE :
 */
$option = JAdministratorHelper::findOption();
$app->dispatch($option);

// trigger the onAfterDispatch events
// JDEBUG ? $_PROFILER->mark('afterDispatch') : null;
// $app->triggerEvent('onAfterDispatch');




/**
 * Render Easy Search form
 */


$style = " style=\"margin: 10px;\"";

require(JModuleHelper::getLayoutPath('mod_easysearch'));

?>