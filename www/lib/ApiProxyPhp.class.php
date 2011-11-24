<?php

class ApiProxyPhp extends Remoting_Api {
	public function __construct($c) { if(!php_Boot::$skip_constructor) {
		parent::__construct($c);
	}}
	function __toString() { return 'ApiProxyPhp'; }
}
