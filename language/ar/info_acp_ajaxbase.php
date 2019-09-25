<?php
/**
*
* Ajax Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2016 Jakub Senko <jakubsenko@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Translated By : Bassel Taha Alhitary - www.alhitary.net
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
	'ACP_AJAX_BASE_TITLE'			=> 'تقنية الأجاكس',
	'ACP_AJAX_BASE_OPTIONS_SAVED'	=> 'تم حفظ الخيارات بنجاح.',
	'AJAXBASE_ALLOW_PREVIEW'		=> 'تفعيل الأجاكس في مُراجعة المُشاركة ',
	'AJAXBASE_ALLOW_WHOISONLINE'	=> 'تفعيل الأجاكس في المتواجدون الآن ',
	'AJAXBASE_ALLOW_STATISTICS'		=> 'تفعيل الأجاكس في الإحصائيات ',
));
