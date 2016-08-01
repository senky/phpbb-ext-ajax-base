<?php
/**
*
* Ajax Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2016 Jakub Senko <jakubsenko@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace senky\ajaxbase\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\senky\ajaxbase\acp\main_module',
			'title'		=> 'ACP_AJAX_BASE_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'settings'	=> array('title' => 'OPTIONS', 'auth' => 'ext_senky/ajaxbase && acl_a_board', 'cat' => array('ACP_AJAX_BASE_TITLE')),
			),
		);
	}
}
