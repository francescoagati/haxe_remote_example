<?php

class Api {
	public function __construct() { 
	}
	public function foo($x, $y) {
		return $x + $y;
	}
	function __toString() { return 'Api'; }
}
