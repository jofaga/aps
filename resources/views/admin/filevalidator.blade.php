<script>
//Carga archivo, determina propiedades y valida tamano.
var _URL = window.URL || window.webkitURL;
$("#file").change(function(e) {   
	    var image, file;

      if ((file = this.files[0])) {
       var sizeByte = this.files[0].size;
       var sizekiloBytes = parseInt(sizeByte / 1024);
        image = new Image();
        
        image.onload = function() {           
            document.getElementById("data").innerHTML = 'Datos imagen: tamaño = ' + sizekiloBytes  + ' KB , ancho (width) = ' + this.width + ' , altura (height) = ' + this.height;

        if(sizekiloBytes > $('#file').attr('size')){
              alert('El tamaño supera el limite permitido!');
           $(this).val('');
           document.getElementById("valida").disabled=true;
        }else{
          alert('El tamaño es permitido (menor a ' + $('#file').attr('size') + ' KB)');
           document.getElementById("valida").disabled=false;
        }
        };
    
        image.src = _URL.createObjectURL(file);
    }

});

  //Valida envio.
   $('#form').submit(function() {
  var fileSize = $('#file')[0].files[0].size;
  var sizekiloBytes = parseInt(fileSize / 1024);
  if (sizekiloBytes >  $('#file').attr('size')) {
      alert('El tamaño supera el limite permitido!');
      return false;
  }
});
</script>