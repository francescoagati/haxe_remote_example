class Server {
  static var inst : Api;

  static function main() {
    inst = new Api();
    // create an incoming connection and give acces to the "inst" object
    var ctx = new haxe.remoting.Context();
    ctx.addObject("inst",inst);  
    
       if( haxe.remoting.HttpConnection.handleRequest(ctx) )
         return;
    
  }
}