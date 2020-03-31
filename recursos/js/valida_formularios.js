//object.addEventListener("submit", myScript)

//.addEventListener("submit", validarUsuario);

if(document.getElementById("usuario")){

function validar(e) {

    var todo_correcto = true;
    var val_esp_nomb = document.getElementById("nombre").value;
    //Valido que el campo nombre no contenga solo espacios en blanco
    if(/^\s+$/.test(val_esp_nomb) ) {
    alert('El contenido del campo NOMBRE no pueden ser solo espacios en blanco.')
    return false;
    }

    if(document.getElementById('nombre').value.length < 3 ){
        todo_correcto = false;
        alert('Verifique que el nombre este escrito correctamente');
    }
    if(document.getElementById('apellido').value.length < 3 ){
        todo_correcto = false;
        alert('Verifique que el apellido este escrito correctamente');
    }
    if(isNaN(document.getElementById('cedula').value)){
        todo_correcto = false;
        alert('La cedula solo acepta datos númericos');
    }
    if(document.getElementById('usuario').value.length < 4 ){
      todo_correcto = false;
      alert('El usuario debe de tener más de 4 caracteres');
    }
    if(document.getElementById('password').value.length < 5 ){
      todo_correcto = false;
      alert('La contraseña debe de tener más de 5 caracteres');
    }
    if(!todo_correcto){
        location.href="../../vista/adu/crear_adu.php";
        }
        return todo_correcto;
  }
}


//***************************** EJEMPLO CON addEventListener ************/

//<script>
//document.getElementById("myForm").addEventListener("submit", myFunction);

//function myFunction() {
 // alert("The form was submitted");
//}
//</script>



//***************************** EJEMPLO CONNONSUBMIT ************/

//<script>
//document.getElementById("myForm").onsubmit = function() {myFunction()};

//function myFunction() {
 // alert("The form was submitted");
//}
//</script>

//***************************** EJEMPLO CON ONSUBMIT ************/
//<form action="/action_page.php" onsubmit="myFunction()"></form>
//<script>
//function myFunction() {
  //alert("The form was submitted");
//}
//</script>

//*************************** LLAMADA DE JAVASCRPIT ***************/
//<script language="JavaScript" src="../js/funciones.js"></script>

/*function validaciones(){
  //Defino variables para las validaciones
  var val_nombre = /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s)+$/
  var val_telefono = /^([0-9\.\-\)\(])+$/
  var val_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
  var val_esp_nomb = document.getElementById("nombre").value;
  var val_esp_ema = document.getElementById("email").value;
  var val_esp_telf = document.getElementById("telefono").value;
  var val_esp_direcc = document.getElementById("direccion").value;
  
  //valido que el campo nombre no este vacio
  if (document.formulario.nombre.value.length==0){
  alert("Debe completar todos los campos.")
  document.formulario.nombre.focus()
  return false;
  }
  
  //Valido que el campo nombre no contenga solo espacios en blanco
  if(/^\s+$/.test(val_esp_nomb) ) {
  alert('El contenido del campo NOMBRE no pueden ser solo espacios en blanco.')
  return false;
  }
  
  //Valida el contenido del campo nombre.. Que solo contenga letras, o espacios en blanco
  if(!val_nombre.test(formulario.nombre.value)) {
  alert('El contenido del campo NOMBRE no es válido.')
  return false
  }
  
  //Valido que el campo email no este vacio
  if (document.formulario.email.value.length==0){
  alert("Debe completar todos los campos")
  document.formulario.email.focus()
  return false;
  }
  
  //Valido que el campo email no contenga solo espacios en blanco
  if(/^\s+$/.test(val_esp_ema) ) {
  alert('El contenido del campo EMAIL no pueden ser solo espacios en blanco.')
  return false;
  }
  
  //Valido que el email, sea correcto
  if(!val_email.test(formulario.email.value)) {
  alert('El contenido del campo E-MAIL no es válido.')
  return false
  }
  //Valido que el campo telefono no este vacio
  if (document.formulario.telefono.value.length==0){
  alert("Debe completar todos los campos")
  document.formulario.telefono.focus()
  return false;
  }
  
  //Valido que el campo telefono no contenga solo espacios en blanco
  if(/^\s+$/.test(val_esp_telf) ) {
  alert('El contenido del campo TELEFONO no pueden ser solo espacios en blanco.')
  return false;
  }
  
  //Valido que el contenido del campo telefono sea valido. Contenga solo numeros, punto, guion y parentesis.
  if(!val_telefono.test(formulario.telefono.value)) {
  alert('Contenido del campo TELEFONO no válido.')
  return false
  }
  
  //Valido que el campo direccion no este vacio
  if (document.formulario.direccion.value.length==0){
  alert("Debe completar todos los campos.")
  document.formulario.direccion.focus()
  return false;
  }
  
  //Valido que el campo comentario no contenga solo espacios en blanco
  if(/^\s+$/.test(val_esp_direcc) ) {
  alert('El contenido del campo COMENTARIO no pueden ser solo espacios en blanco.')
  return false;
  }
  
  alert("Registro completado exitosamente");
  document.formulario.submit()
  }