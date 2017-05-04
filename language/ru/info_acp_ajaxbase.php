<?php
/**
*
* Ajax Base extension for the phpBB Forum Software package.
* Russian translation by HD321kbps
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
	'ACP_AJAX_BASE_OPTIONS_SAVED'	=> 'Настройки Ajax Base были сохранены.',
	'OPTIONS'						=> 'Настройки',
	'AJAXBASE_ALLOW_PREVIEW'		=> 'Ajax в предварительном просмотре',
	'AJAXBASE_ALLOW_WHOISONLINE'	=> 'Ajax в блоке Кто онлайн',
	'AJAXBASE_ALLOW_STATISTICS'		=> 'Ajax в блоке Статистика',
));
