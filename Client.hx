class ApiProxy extends haxe.remoting.AsyncProxy<Api> { 
  
}

class Client {
  static function main() { 
    
    var URL = "http://localhost:8080/haxoprova/www/index.php";
    var cnx = haxe.remoting.HttpAsyncConnection.urlConnect(URL);
    var proxy = new ApiProxy(cnx.inst);
    
    trace("ciao");
    
    proxy.foo(1,2,function(res) {
      trace(res);
    });
    
  }
}