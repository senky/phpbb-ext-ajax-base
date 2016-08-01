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

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $user, $template, $request, $config;

		$user->add_lang('acp/common');
		$this->tpl_name = 'ajaxbase';
		$this->page_title = $user->lang('ACP_AJAX_BASE_TITLE');
		add_form_key('senky/ajaxbase');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('senky/ajaxbase'))
			{
				trigger_error('FORM_INVALID');
			}

			$config->set('ajaxbase_allow_preview', $request->variable('ajaxbase_allow_preview', 1));
			$config->set('ajaxbase_allow_whoisonline', $request->variable('ajaxbase_allow_whoisonline', 1));
			$config->set('ajaxbase_allow_statistics', $request->variable('ajaxbase_allow_statistics', 1));

			trigger_error($user->lang('ACP_AJAX_BASE_OPTIONS_SAVED') . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'U_ACTION'						=> $this->u_action,
			'AJAXBASE_ALLOW_PREVIEW'		=> $config['ajaxbase_allow_preview'],
			'AJAXBASE_ALLOW_WHOISONLINE'	=> $config['ajaxbase_allow_whoisonline'],
			'AJAXBASE_ALLOW_STATISTICS'		=> $config['ajaxbase_allow_statistics'],
		));
	}
}
