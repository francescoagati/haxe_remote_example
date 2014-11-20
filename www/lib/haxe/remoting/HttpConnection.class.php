<?php

class haxe_remoting_HttpConnection implements haxe_remoting_Connection{
	public function __construct($url, $path) {
		if(!php_Boot::$skip_constructor) {
		$this->__url = $url;
		$this->__path = $path;
	}}
	public $__url;
	public $__path;
	public function resolve($name) {
		$c = new haxe_remoting_HttpConnection($this->__url, $this->__path->copy());
		$c->__path->push($name);
		return $c;
	}
	public function call($params) {
		$data = null;
		$h = new haxe_Http($this->__url);
		$h->cnxTimeout = haxe_remoting_HttpConnection::$TIMEOUT;
		$s = new haxe_Serializer();
		$s->serialize($this->__path);
		$s->serialize($params);
		$h->setHeader("X-Haxe-Remoting", "1");
		$h->setParameter("__x", $s->toString());
		$h->onData = array(new _hx_lambda(array(&$data, &$h, &$params, &$s), "haxe_remoting_HttpConnection_0"), 'execute');
		$h->onError = array(new _hx_lambda(array(&$data, &$h, &$params, &$s), "haxe_remoting_HttpConnection_1"), 'execute');
		$h->request(true);
		if(_hx_substr($data, 0, 3) !== "hxr") {
			throw new HException("Invalid response : '" . _hx_string_or_null($data) . "'");
		}
		$data = _hx_substr($data, 3, null);
		return _hx_deref(new haxe_Unserializer($data))->unserialize();
	}
	public $__dynamics = array();
	public function __get($n) {
		if(isset($this->__dynamics[$n]))
			return $this->__dynamics[$n];
	}
	public function __set($n, $v) {
		$this->__dynamics[$n] = $v;
	}
	public function __call($n, $a) {
		if(isset($this->__dynamics[$n]) && is_callable($this->__dynamics[$n]))
			return call_user_func_array($this->__dynamics[$n], $a);
		if('toString' == $n)
			return $this->__toString();
		throw new HException("Unable to call <".$n.">");
	}
	static $TIMEOUT = 10.;
	static function urlConnect($url) {
		return new haxe_remoting_HttpConnection($url, (new _hx_array(array())));
	}
	function __toString() { return 'haxe.remoting.HttpConnection'; }
}
function haxe_remoting_HttpConnection_0(&$data, &$h, &$params, &$s, $d) {
	{
		$data = $d;
	}
}
function haxe_remoting_HttpConnection_1(&$data, &$h, &$params, &$s, $e) {
	{
		throw new HException($e);
	}
}
