window.onload = loadClients;

 function showRegistry(){
   var content = document.getElementById("contenido");
   content.innerHTML = this.req.responseText;
  }

  function loadRegistry(){
     var cargador = new ajax.loadContent("./php/registrar.php","GET",showRegistry); 
  }

 function showClients(){
   var content = document.getElementById("contenido");
   content.innerHTML = this.req.responseText;
  }

  function loadClients(){
     var cargador = new ajax.loadContent("./php/clientes.php","GET",showClients); 
  }

 function showEdit(){
   var content = document.getElementById("contenido");
   content.innerHTML = this.req.responseText;
  }

  function loadEdit(){
     var bntEdit = document.getElementById("edit");
     alert(bntEdit.value);
     //var cargador = new ajax.loadContent("./php/operaciones.php?edit=","GET",showEdit); 
  }
