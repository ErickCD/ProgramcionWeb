function operation(id,typeOperation){
   var tabla = document.getElementById("tdata");
   var tmp = "";
   var length = tabla.rows[id].cells.length;
   var datos = tabla.rows[id].cells;
   for(a = 0 ; a < length ; a++){
      tmp += datos[a].innerHTML + ",";
   }

   var txtName = document.getElementById("txtName");
   var txtAPaterno = document.getElementById("txtAPaterno");
   var txtAMaterno = document.getElementById("txtAMaterno");
   var txtRFC = document.getElementById("txtRFC");
   var txtRFC = document.getElementById("txtRFC");
   var txtTypeOperation = document.getElementById("txtTypeOperation");
   var txtIdentifier = document.getElementById("txtIdentifier");


   txtIdentifier.value = datos[0].innerHTML;
   txtName.value = datos[1].innerHTML;
   txtAPaterno.value = datos[2].innerHTML;
   txtAMaterno.value = datos[3].innerHTML;
   txtRFC.value = datos[4].innerHTML;
   txtTypeOperation.value = typeOperation;

   alert(txtName.value + " <> " + txtAPaterno.value + " <> " + txtAMaterno.value + " <> " + txtRFC.value + " <> " + txtTypeOperation.value+ " <> " + txtIdentifier.value);
 }