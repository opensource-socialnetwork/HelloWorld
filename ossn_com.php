<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    Open Social Website Core Team <info@informatikon.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      http://www.opensource-socialnetwork.org/licence
 */
//setting up path so we can use it in entire file
//if your component folder have upper and lower case characters please use same here.
define('__OSSN_HELLO_WORLD__', ossn_route()->com . 'HelloWorld/');

//this function is use to initilize ossn
function ossn_hello_world() {
		/**
		 * Lets add our css to ossn default css file,
		 * Lets create css directory in your component directory here our
		 * directory name is HelloWorld so lets create new directory name css in HelloWorld
		 * directory after that create a file name helloworld.php in it and add css
		 * ossn.default is name of css.
		 * use following code to add css in ossn default css file
		 */
		ossn_extend_view('css/ossn.default', 'css/helloworld');

		/**
		 * For javascript you can do same thing , but instead of css you need to use js see code below:
		 */
		ossn_extend_view('js/opensource.socialnetwork', 'js/helloworld');

		/**
		 * Sometime you can't extned other css or js file as it creates conflicts in css or js,
		 * so for that purpose you need to create seprate js or css file.
		 * Now lets create a new directory called standalone in css directory
		 * create a file called helloworld.php in your standalone directory add your css code in that file.
		 * To create seprate css link in header you can use following code.
		 */
		//this will just tell system that new css file for header is available
		ossn_new_css('hello.world', 'css/standalone/helloworld');

		//now tell system to load file in header, here the first argument in function must be same as you
		//used in ossn_new_css(<argument>)
		ossn_load_css('hello.world');

		//lets create a new page called hello and print hello for that we need to use following code.
		ossn_register_page('hello', 'ossn_hello_page');
		ossn_register_page('hello_custom_template', 'hello_custom_template_page');

		//create configure page and configuring the settings
		if(ossn_isAdminLoggedin()) {
				ossn_register_action('helloworld/admin/settings', ossn_route()->com . 'HelloWorld/actions/settings.php');
				ossn_register_com_panel('HelloWorld', 'settings');
		}

		//creating a new page with ossn layout and adding form and dummy action
		//Creating new page and form at website.com/hello_ossn_layout

		ossn_register_action('helloworld/simple/form', ossn_route()->com . 'HelloWorld/actions/simple-form.php');
		ossn_register_page('hello_ossn_layout', function ($sub_pages) {
				//$subpage1 = $subpage[0]; //	website.com/hello_ossn_layout/{sub1}
				//$subpage2 = $subpage[1]; //	website.com/hello_ossn_layout/{sub1}/{sub2}

				$title = 'Page Title';
				$form  = ossn_view_form('helloworld/simple_form', array(
						'action' => ossn_site_url() . 'action/helloworld/simple/form',
						'class'  => 'my-custom-form-class',
				));
				$content = ossn_set_page_layout('contents', array(
						'content' => $form,
						'title'   => $title,
				));
				echo ossn_view_page($title, $content);
		});
}
//page function that is create by ossn_register_page('hello', 'ossn_hello_page');
//the code below is use to print hello world in page.
// vist http://mysite.com/hello to view page
function ossn_hello_page() {
		echo 'Hello World';
}
function hello_custom_template_page() {
		//file components/HelloWorld/plugins/default/hellowolrd/hello_custom_page.php
		//you can add custom text html inside this page
		$content = ossn_plugin_view('helloworld/hello_custom_page');
		$title   = 'ABC';

		//components\HelloWorld\plugins\default\theme\page\my_custom_page_template.php contain a basic html layout, you can include your stuff in head.
		//Here ossn_load_css and load_js etc won't work as this is custom page outside OSSN templating system.
		echo ossn_view_page($title, $content, 'my_custom_page_template');
}
//this line is used to register initliize function to ossn system
ossn_register_callback('ossn', 'init', 'ossn_hello_world');