<?php
/**
 * All Gzip plugin tests
 */
class AllGzipTest extends CakeTestCase {

/**
 * Suite define the tests for this suite
 *
 * @return void
 */
	public static function suite() {
		$suite = new CakeTestSuite('All Gzip test');

		$path = CakePlugin::path('Gzip') . 'Test' . DS . 'Case' . DS;
		$suite->addTestDirectoryRecursive($path);

		return $suite;
	}

}
