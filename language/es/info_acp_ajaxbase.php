<?php
/**
*
* Ajax Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2016 Jakub Senko <jakubsenko@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'ACP_AJAX_BASE_TITLE'			=> 'Ajax Base',
	'ACP_AJAX_BASE_OPTIONS_SAVED'	=> 'Las opciones de Ajax Base han sido guardadas.',
	'AJAXBASE_ALLOW_PREVIEW'		=> 'Vista previa de mensaje Ajax',
	'AJAXBASE_ALLOW_WHOISONLINE'	=> 'Sección de Quién está conectado Ajax',
	'AJAXBASE_ALLOW_STATISTICS'		=> 'Estadísticas Ajax',
));
