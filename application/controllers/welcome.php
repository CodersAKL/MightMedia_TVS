<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2012, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
//		$aData['sForm'] = $this->load->controller('user_module/form');

//		$aTemplateData['sLanguageMenu'] = $this->load->controller('language_module/menu/index');

		$this->data = array
		(
			'sUserName' => 'Svecias',
			'boolfalse'=> false,
			'booltrue'=> true,
			'number' => 10,
			'foo' => 'bar',
			'test'=>'something',
			'array'=>array(
				'unique'=>'im unique',
				array('id'=>'23', 'sale_price'=>12, 'price'=>15),
				array('id'=>'21', 'sale_price'=>28, 'price'=>20)
			),
			'myarray'=>array('submitter'=>'clemens', 'id'=>1),
			'title2'=> 'Single Title not in posts',
			'posts'=>array(
				array('title'=>'first post', 'paras'=>array('main'=>'foo', 'short'=>'bar')),
				array('title'=>'second post', 'paras'=>array('main'=>'ice', 'short'=>'cold'))
			),
			'blog_entries'=>array(
				array('title'=>'first post', 'body'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam aspernatur assumenda, atque corporis deserunt dolore ea eligendi eveniet incidunt inventore itaque iusto maxime mollitia non quae ratione reiciendis sint?'),
				array('title'=>'second post', 'body'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.')
			),
			'emptyarray' => array( ),
			'emptyvar'   => '',
			'withdelimiters' => 'delimiters in data {if number}{test}{/if} are converted to html-entities',
			'withwrongdelimiters' => 'this var has {if  something wrong} with it'
		);

		$this->template
			->add_css( 'user/main.css' )
			->title('test')
			->build('welcome_message', $this->data );
		;

	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */