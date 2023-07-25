let __password = document.getElementById("password");
let __confirm_password = document.getElementById("cpassword");
let __parentcontainer = document.getElementById("validate");

// ! VALIDACION DE LOS DATOS

// ! VALIDACION DE CAMPO CONTRASEÑA VACIA
__password.addEventListener("blur", function (e) {
  e.preventDefault();
  if (__password.value == "") __password.focus();
});

// ! VALIDACION DE CONTRASEÑA/CONFIRMACION CONTRASEÑA
let __createElement = __parentcontainer.querySelector("p");

if (!__createElement) {
  __createElement = document.createElement("p");
  __createElement.classList.add("text-sm", "font-extrabold");
  __parentcontainer.appendChild(__createElement);
}

__password.addEventListener("focusout", function (e) {
  let __value_password = __password.value;
  let __value_cpassword = __confirm_password.value;
  // ! VALIDACION PARA CAMPO VACIO DE CONFIRMAR CONTRASEÑA
  if (__value_password != __value_cpassword) {
    __confirm_password.focus();
    __createElement.textContent = "Las contraseñas no coinciden";
  } else {
    __createElement.textContent = "Las contraseñas coinciden";
  }
});

__confirm_password.addEventListener("blur", function (e) {
  e.preventDefault();

  let __value_password = __password.value;
  let __value_cpassword = __confirm_password.value;
  // ! VALIDACION PARA CAMPO VACIO DE CONFIRMAR CONTRASEÑA
  if (__value_password != __value_cpassword) {
    __confirm_password.focus();
    __createElement.textContent = "Las contraseñas no coinciden";
  } else {
    __createElement.textContent = "Las contraseñas coinciden";
  }
});

// ! VALIDACIONES

