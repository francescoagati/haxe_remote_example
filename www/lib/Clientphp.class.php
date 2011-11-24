<?php

class Clientphp {
	public function __construct(){}
	static function main() {
		$URL = "http://localhost:8080/haxoprova/www/index.php";
		$cnx = haxe_remoting_HttpConnection::urlConnect($URL);
		$proxy = new ApiProxyPhp($cnx->resolve("inst"));
		haxe_Log::trace("ciao", _hx_anonymous(array("fileName" => "Clientphp.hx", "lineNumber" => 12, "className" => "Clientphp", "methodName" => "main")));
		haxe_Log::trace($proxy->foo(1, 2), _hx_anonymous(array("fileName" => "Clientphp.hx", "lineNumber" => 14, "className" => "Clientphp", "methodName" => "main")));
	}
	function __toString() { return 'Clientphp'; }
}
