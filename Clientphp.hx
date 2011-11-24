class ApiProxyPhp extends haxe.remoting.Proxy<Api> { 
  
}

class Clientphp {
  static function main() { 
  
      var URL = "http://localhost:8080/haxoprova/www/index.php";
      var cnx = haxe.remoting.HttpConnection.urlConnect(URL);
      var proxy = new ApiProxyPhp(cnx.inst);

      trace("ciao");

      trace(proxy.foo(1,2));
      
  }
}