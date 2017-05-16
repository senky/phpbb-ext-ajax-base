<?php
/**
*
* Ajax Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 Jakub Senko <jakubsenko@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace senky\ajaxbase\event;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\template\context */
	protected $template_context;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\config\config */
	protected $config;

	/**
	* Constructor
	*
	* @param \phpbb\template\template	$template			Template object
	* @param \phpbb\controller\helper	$helper				Helper object
	* @param \phpbb\template\context	$template_context	Template context object
	* @param \phpbb\request\request		$request			Request object
	* @param \phpbb\config\config		$config				Config object
	* @access public
	*/
	public function __construct(\phpbb\template\template $template, \phpbb\controller\helper $helper, \phpbb\template\context $template_context, \phpbb\request\request $request, \phpbb\config\config $config)
	{
		$this->template = $template;
		$this->helper = $helper;
		$this->template_context = $template_context;
		$this->request = $request;
		$this->config = $config;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	public static function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'						=> 'assign_common_template_variables',
			'core.posting_modify_template_vars'				=> 'output_ajax_post_preview',
			'core.obtain_users_online_string_before_modify'	=> 'fix_online_users_link',
		);
	}

	/**
	 * Assign common template variables
	 *
	 * @param object $event The event object
	 * @return null
	 * @access public
	 */
	public function assign_common_template_variables($event)
	{
		$rootref = $this->template_context->get_root_ref();

		$this->template->assign_vars(array(
			'S_AJAXBASE_ALLOW_PREVIEW'		=> $this->config['ajaxbase_allow_preview'],
			'S_AJAXBASE_ALLOW_WHOISONLINE'	=> $this->config['ajaxbase_allow_whoisonline'],
			'S_AJAXBASE_ALLOW_STATISTICS'	=> $this->config['ajaxbase_allow_statistics'],

			'U_AJAX_BASE_STATISTICS'	=> $this->helper->route('senky_ajaxbase_statistics'),
			'U_AJAX_BASE_WHO_IS_ONLINE'	=> $this->helper->route('senky_ajaxbase_who_is_online'),

			// overwrite
			'TOTAL_USERS_ONLINE'	=> '<span id="who_is_online_wrapper">' . $rootref['TOTAL_USERS_ONLINE'],
			'LOGGED_IN_USER_LIST'	=> $rootref['LOGGED_IN_USER_LIST'] . '</span>',
		));
	}

	/**
	 * Alter preview output for ajax request
	 *
	 * @param object $event The event object
	 * @return null
	 * @access public
	 */
	public function output_ajax_post_preview($event)
	{
		if ($this->request->is_ajax() && $event['preview'])
		{
			if (empty($event['message_parser']->message))
			{
				exit;
			}
			else if (sizeof($event['error']))
			{
				JsonResponse::create($event['error'], 412)->send();
				exit_handler();
			}
			else
			{
				$this->template->assign_vars($event['page_data']);

				// we can't use helper's render method, because it refreshes the page
				page_header('');
				$this->template->set_filenames(array(
					'body' => '@senky_ajaxbase/ajax_posting_preview.html')
				);
				page_footer();
			}
		}
	}

	/**
	 * Fix online users link when board is in subdirectory.
	 *
	 * Credit to Tatiana5 (https://github.com/Tatiana5):
	 * https://github.com/Tatiana5/phpbb-ext-ajax-base/commit/61eeb43d20a4455b4ece3e757730f90584aee3f4
	 *
	 * @param object $event The event object
	 * @return null
	 * @access public
	 */
	public function fix_online_users_link($event)
	{
		if ($this->request->is_ajax())
		{
			$user_online_links = $event['user_online_link'];
			foreach ($user_online_links as $user_id => $user_online_link)
			{
				$user_online_links[$user_id] = preg_replace('#(?<=href=")[\./]+?/(?=\w)#', generate_board_url() . '/', $user_online_link);
			}
			$event['user_online_link'] = $user_online_links;
		}
	}
}
