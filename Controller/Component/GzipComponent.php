<?php
App::uses('Component', 'Controller');

/**
 * Gzip Component
 *
 * A simple component that will compress html output for you automatically
 *
 * Based upon Felix Geisendörfer's example at
 * http://debuggable.com/posts/issues-with-output-buffering-in-cakephp:480f4dd5-b4fc-42a7-a5ab-4544cbdd56cb
 *
 * @package     gzip
 * @subpackage  gzip.controllers.components
 **/

class GzipComponent extends Component {

/**
 * Called before the Controller::beforeFilter().
 * Enables Gzip for all rendered HTML
 *
 * @param object  A reference to the controller
 * @return void
 */
	public function startup(Controller $controller) {
		if (Configure::read('debug') < 2) {
			ob_start('ob_gzhandler');
			header('Content-type: text/html; charset: UTF-8');
			header('Cache-Control: must-revalidate');
			header("Expires: " . gmdate('D, d M Y H:i:s', time() - 1) . ' GMT');
		}
	}

}
