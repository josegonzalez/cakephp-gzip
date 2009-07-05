<?php 
/**
 * GzipComponent
 * 
 * A simple component that will compress html output for you automatically
 *
 * Based upon Felix Geisendörfer's example at http://debuggable.com/posts/issues-with-output-buffering-in-cakephp:480f4dd5-b4fc-42a7-a5ab-4544cbdd56cb
 *
 * @version 0.1 
 * @author Jose Diaz-Gonzalez <support@savant.be>
 * @license	http://www.opensource.org/licenses/mit-license.php The MIT License
 * @package	app
 * @subpackage app.controller.components
 */
class GzipComponent extends Object{

	/**
	 * Enables Gzip for all rendered HTML
	 *
	 * @return void
	 * @author Felix Geisendörfer
	 * @link http://debuggable.com/posts/issues-with-output-buffering-in-cakephp:480f4dd5-b4fc-42a7-a5ab-4544cbdd56cb
	 **/
	function startup(&$controller){
		if (Configure::read('debug') < 2) {
			@ob_start ('ob_gzhandler');
			header('Content-type: text/html; charset: UTF-8');
			header('Cache-Control: must-revalidate');
			$offset = -1;
			$ExpStr = "Expires: " . gmdate('D, d M Y H:i:s', time() + $offset) . ' GMT';
			header($ExpStr);
		}
	}
}