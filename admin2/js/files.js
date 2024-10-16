function _(el) {
    return document.getElementById(el);
  }
  
  function subirFoto(){
    var file = document.getElementById("file").value;
    var descripcion = document.getElementById("descripcion").value;
    var selector = document.getElementById("selectorCategoria").value;
    if (file == null || file == "" || selector == null || selector == "" || descripcion == null || descripcion == ""){
      alert("Por favor, selecciona una imagen, escribe la descripción y una categoría.");
      return;
    }
    else{
      uploadFile();
    }
  }

  function uploadFile() {
    var file = _("file").files[0];
    var categoria = document.getElementById("selectorCategoria").value;
    var descripcion = document.getElementById("descripcion").value;
    var precio = document.getElementById("precio").value;
    var precauciones = document.getElementById("precauciones").value;
    var modo_uso = document.getElementById("modo_uso").value;
    var nombre = document.getElementById("nombre").value;
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    // variable del name file
    formdata.append("nombre", nombre);
    formdata.append("categoria", categoria);
    formdata.append("descripcion", descripcion);
    formdata.append("precio", precio);
    formdata.append("precauciones", precauciones);
    formdata.append("modo_uso", modo_uso);
    formdata.append("file", file);
    // variables post
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "prcd/upload.php"); 
    
    // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
    //use file_upload_parser.php from above url

    //ARCHIVO CON EL PROCEDIMIENTO PARA MOVER ELUMENTO AL SERVIDOR
    ajax.send(formdata);

    function progressHandler(event) {
      queryPhotos();
      alert("Se ha cargado correctamente");
        _("loaded_n_total").innerHTML = "Cargado " + event.loaded + " bytes de " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar").value = Math.round(percent);
        _("status").innerHTML = Math.round(percent) + "% subido... espere un momento";
      }
      
      function completeHandler(event) {
        _("status").innerHTML = event.target.responseText;
        _("progressBar").value = 0; //wil clear progress bar after successful upload
          _("file").style.display='none';
          _("progressBar").style.display='none';
          document.getElementById("btnNew").disabled = false;
          document.getElementById("btnAdd").disabled = true;
      }
      
      function errorHandler(event) {
        _("status").innerHTML = "Fallo en la subida";
      }
      
      function abortHandler(event) {
        _("status").innerHTML = "Fallo en la subida";
      }
      
  }

  function queryPhotos(){
    $.ajax({
        type: "POST",
        url: "prcd/queryPhotos.php",
        dataType: "html",
        success: function(data){
            $('#photosN').fadeIn(1000).html(data);
        }
    });
}

  function ModalQr(valor, num){

    // var texto = concatenado.toString();
    // var texto = document.getElementById('photoRuta').value;
    var texto = 'nexustechstudio.com/photoNexus/docs/'+valor;
    document.getElementById('qrcode'+num).innerHTML = "";
// aquí

var qrcode = new QRCode(document.getElementById("qrcode"+num), {
      text: texto,
      // width: 100%,
      // height: 100%,
      correctLevel: QRCode.CorrectLevel.Q
    });

    // Obtener el elemento canvas generado por QRCode.js
    var canvas = document.querySelector("#codigo-qr canvas");

    // Crear un nuevo elemento de imagen para el logo
    var logo = new Image();
    logo.src = "imagen.png";

    console.log();

  }

  function eliminarPhoto(id){

    var idPhoto = id;
    if (confirm("¿Estás seguro de que deseas eliminar este elemento?")) {
      $.ajax({
        type: "POST",
        data:{
          idPhoto:idPhoto
        },
        url: "prcd/deletePhoto.php",
        dataType: "json",
        success: function(data){
          var jsonData = JSON.parse(JSON.stringify(data));
          var success = jsonData.success;
          if (success == 1){
            alert("Se eliminó la fotografía");
            queryPhotos();
          }
          else{
            alert("No se eliminó la fotografía");
          }
        }
      });
    }
    else{
      console.log("No se eliminó");
    }
  }

  function cambiarCategoria(idPhoto,valor){
    var idPhoto = idPhoto;
    var categoria = valor;

    $.ajax({
      type: "POST",
      data:{
        idPhoto:idPhoto,
        categoria:categoria
      },
      url: "prcd/cambiarCategoria.php",
      dataType: "json",
      success: function(data){
        var jsonData = JSON.parse(JSON.stringify(data));
        var success = jsonData.success;
        if (success == 1){
          alert("Se cambió la categoría");
          queryPhotos();
        }
        else{
          alert("No se cambió la categoría");
        }
      }
    });

  }

  function reloadWeb(){
    location.reload();
  }