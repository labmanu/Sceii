
$( document ).ready(function() {
   
    const correo_input = document.getElementById('correo');
    const clave_input = document.getElementById('clave');
    const lbl_email_error = document.getElementById('label_email_error');
    const lbl_clave_error = document.getElementById('label_clave_error');
    const showPass = document.getElementById('showPassword');

    correo_input.addEventListener('keyup', updateEmail);
    clave_input.addEventListener('keyup', updateClave);
    showPass.addEventListener('click', showPassword)
    

function updateEmail(e) {
    const value = e.target.value;
    if (
        value.match(/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/) ||
        value ===""
      ) {
        //alert("si cumple")
        correo_input.classList.add("input-login");
        correo_input.classList.remove("input-login-error");
        lbl_email_error.style.display = "none";

      }else{
        //alert("no cumple")
        correo_input.classList.add("input-login-error");
        correo_input.classList.remove("input-login");
        lbl_email_error.style.display = "flex";
        lbl_email_error.innerHTML = "Ingresa un correo valido"
      }
}

function updateClave(){
  clave_input.classList.add("input-login");
  clave_input.classList.remove("input-login-error");
  lbl_clave_error.style.display = "none";
}

function showPassword(){
  const show = showPass.classList.contains('fa-eye-slash')?true:false;
  if(show){
    showPass.classList.add("fa-eye");
    showPass.classList.remove("fa-eye-slash");
    clave_input.type = "text"
  }
  else{
    showPass.classList.add("fa-eye-slash");
    showPass.classList.remove("fa-eye");
    clave_input.type = "password"
  }
}
});


