<?php
/**
*
* Ajax Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 Jakub Senko <jakubsenko@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace senky\ajaxbase\controller;

/**
* Main controller
*/
class main_controller
{
	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\config\config */
	protected $config;

	/**
	* Constructor
	*
	* @access public
	*/
	public function __construct(\phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user, \phpbb\config\config $config)
	{
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->config = $config;
	}

	/**
	* Handle the requests
	*
	* @return null
	* @access public
	*/
	public function handle()
	{
		switch($this->request->variable('mode', ''))
		{
			case 'who_is_online':

				// Output page
				page_header('', true);
				$this->template->set_filenames(array(
					'body' => 'ajax_base/who_is_online.html')
				);
				page_footer();

			break;

			case 'statistics':

				$this->template->assign_vars(array(
					'TOTAL_POSTS'	=> $this->user->lang('TOTAL_POSTS_COUNT', (int) $this->config['num_posts']),
					'TOTAL_TOPICS'	=> $this->user->lang('TOTAL_TOPICS', (int) $this->config['num_topics']),
					'TOTAL_USERS'	=> $this->user->lang('TOTAL_USERS', (int) $this->config['num_users']),
					'NEWEST_USER'	=> $this->user->lang('NEWEST_USER', get_username_string('full', $this->config['newest_user_id'], $this->config['newest_username'], $this->config['newest_user_colour'])),
				));

				// Output page
				page_header('');
				$this->template->set_filenames(array(
					'body' => 'ajax_base/statistics.html')
				);
				page_footer();

			break;
		}
	}
}
