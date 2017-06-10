function initializeAjax(){
 if (window.XMLHttpRequest){
   peticion = new XMLHttpRequest();
 }else{
   peticion  = new ActiveXObject("Microsoft.XMLHTTP");   
 }
}

var ajax = new Object();
ajax.READY_STATE_UNINITIALICED = 0;
ajax.READY_STATE_LOADING = 1;
ajax.READY_STATE_LOADED = 2;
ajax.READY_STATE_INTERACTIVE = 3;
ajax.READY_STATE_COMPLETE = 4;

ajax.loadContent = function(url,method,functionProcessData,functionError){
 this.url = url;
 this.req = null;
 this.onload = functionProcessData;
 this.onerror = (functionError) ? functionError : this.defaultError;
 this.method = method;
 this.cargarContenidoXML(url,method);
}

ajax.loadContent.prototype = {
cargarContenidoXML: function(url,method){
  if (window.XMLHttpRequest){
     this.req = new XMLHttpRequest();
  }else{
     this.req = new ActiveXObject("Microsoft.XMLHTTP");
  }
  if (this.req){
    try {
       var loader = this;
       this.req.onreadystatechange = function(){
 	 loader.onReadyState.call(loader);
       }
       this.req.open(method,url,false);
       this.req.send(null);
    }catch (e){
     this.onerror.call(this);
    }
  }
},
	
onReadyState: function(){
  var req = this.req;
  var ready = req.readyState;
	
  if (ready == ajax.READY_STATE_COMPLETE){
    var httpStatus = req.status;
    if (httpStatus == 200 || httpStatus == 0){
      this.onload.call(this);
    }
  }
},
defaultError:function(){
  alert("Se ha producido un error al obtener los datos.\n"
         + "\nReadySate: " + this.req.readysate
         + "\nStatus: " + this.req.status
         +  "\nHeaders: " + this.req.getAllResponseHeaders());
}
}