<?php
/**
 * Gzip Component
 *
 * A simple component that will compress html output for you automatically
 *
 * Based upon Felix Geisendörfer's example at
 * http://debuggable.com/posts/issues-with-output-buffering-in-cakephp:480f4dd5-b4fc-42a7-a5ab-4544cbdd56cb
 *
 * PHP versions 4 and 5
 *
 * Copyright 2010, Jose Diaz-Gonzalez
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the below copyright notice.
 *
 * @copyright   Copyright 2009-2010, Jose Diaz-Gonzalez
 * @package     gzip
 * @subpackage  gzip.controllers.components
 * @link        http://github.com/josegonzalez/webservice_plugin
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 **/
class GzipComponent extends Object{

/**
 * Called before the Controller::beforeFilter().
 * Enables Gzip for all rendered HTML
 *
 * @param object  A reference to the controller
 * @return void
 * @access public
 * @link http://book.cakephp.org/view/65/MVC-Class-Access-Within-Components
 */
	function startup(&$controller){
		if (Configure::read('debug') < 2) {
			@ob_start ('ob_gzhandler');
			header('Content-type: text/html; charset: UTF-8');
			header('Cache-Control: must-revalidate');
			header("Expires: " . gmdate('D, d M Y H:i:s', time() - 1) . ' GMT');
		}
	}
}