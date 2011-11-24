<?php

class Remoting_Api {
	public function __construct($c) {
		if(!php_Boot::$skip_constructor) {
		$this->__cnx = $c;
	}}
	public $__cnx;
	public function foo($x, $y) {
		return $this->__cnx->resolve("foo")->call(new _hx_array(array($x, $y)));
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	function __toString() { return 'Remoting_Api'; }
}
