<?php
/**
*
* Ajax Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2016 Jakub Senko <jakubsenko@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace senky\ajaxbase\migrations;

class release_1_2_0 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\gold');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('ajaxbase_allow_preview', 1)),
			array('config.add', array('ajaxbase_allow_whoisonline', 1)),
			array('config.add', array('ajaxbase_allow_statistics', 1)),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_AJAX_BASE_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_AJAX_BASE_TITLE',
				array(
					'module_basename'	=> '\senky\ajaxbase\acp\main_module',
				),
			)),
		);
	}
}
