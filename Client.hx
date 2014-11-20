class ApiProxy extends haxe.remoting.AsyncProxy<Api> { 
  
}

class Client {
  static function main() { 
    var URL = "http://localhost/haxe_remote_example/www/index.php";
    var cnx = haxe.remoting.HttpAsyncConnection.urlConnect(URL);
    var proxy = new ApiProxy(cnx.inst);
    
    trace("ciao");
    
    proxy.foo(1,2,function(res) {
      trace(res);
    });
    
  }
}