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
	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\config\config */
	protected $config;

	/**
	* Constructor
	*
	* @param \phpbb\template\template	$template	Template object
	* @param \phpbb\user				$user		User object
	* @param \phpbb\config\config		$config		Config object
	* @access public
	*/
	public function __construct(\phpbb\template\template $template, \phpbb\user $user, \phpbb\config\config $config)
	{
		$this->template = $template;
		$this->user = $user;
		$this->config = $config;
	}

	/**
	* Handle the Statistics requests
	*
	* @return null
	* @access public
	*/
	public function handle_statistics()
	{
		// Output page
		page_header('', true);
		$this->template->set_filenames(array(
			'body' => 'ajax_base/who_is_online.html')
		);
		//page_footer();

		$this->template->display('body');

		garbage_collection();
		exit_handler();
	}

	/**
	* Handle the Who is online requests
	*
	* @return null
	* @access public
	*/
	public function handle_who_is_online()
	{
		$this->template->assign_vars(array(
			'TOTAL_POSTS'	=> $this->user->lang('TOTAL_POSTS_COUNT', (int) $this->config['num_posts']),
			'TOTAL_TOPICS'	=> $this->user->lang('TOTAL_TOPICS', (int) $this->config['num_topics']),
			'TOTAL_USERS'	=> $this->user->lang('TOTAL_USERS', (int) $this->config['num_users']),
			'NEWEST_USER'	=> $this->user->lang('NEWEST_USER', get_username_string('full', $this->config['newest_user_id'], $this->config['newest_username'], $this->config['newest_user_colour'])),
		));

		// Output page
		//page_header('');
		$this->template->set_filenames(array(
			'body' => 'ajax_base/statistics.html')
		);
		//page_footer();

		$this->template->display('body');

		garbage_collection();
		exit_handler();
	}

	/**
	* Handle the Private msgs and notification requests
	*
	* @return null
	* @access public
	*/
	public function handle_pm_note()
	{
		$mode = request_var('mode', '');

		// Output page
		page_header('');

		$this->template->assign_vars(array(
			'S_AJAX_BASE_NOTIFICATION'	=> ($mode == 'notification') ? true : false,
			'U_VIEW_ALL_NOTIFICATIONS'	=> generate_board_url() . "/ucp.php?i=ucp_notifications",
		));

		$this->template->set_filenames(array(
			'body' => 'ajax_base/pm_note.html')
		);

		$this->template->display('body');

		garbage_collection();
		exit_handler();
	}
}
