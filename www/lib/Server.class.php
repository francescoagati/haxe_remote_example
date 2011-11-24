<?php

class Server {
	public function __construct(){}
	static $inst;
	static function main() {
		Server::$inst = new Api();
		$ctx = new haxe_remoting_Context();
		$ctx->addObject("inst", Server::$inst, null);
		if(haxe_remoting_HttpConnection::handleRequest($ctx)) {
			return;
		}
	}
	function __toString() { return 'Server'; }
}
