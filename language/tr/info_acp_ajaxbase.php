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
	'ACP_AJAX_BASE_TITLE'			=> 'Ajax Üssü',
	'ACP_AJAX_BASE_OPTIONS_SAVED'	=> 'Ajax Üssü seçenekleri kaydedildi.',
	'OPTIONS'						=> 'Seçenekler',
	'AJAXBASE_ALLOW_PREVIEW'		=> 'Gönderi önizlemeyi Ajaxlandır',
	'AJAXBASE_ALLOW_WHOISONLINE'	=> 'Kimler Çevrimiçi bölümünü Ajaxlandır',
	'AJAXBASE_ALLOW_STATISTICS'		=> 'İstatistikleri Ajaxlandır',
));
