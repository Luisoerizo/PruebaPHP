//Para formulario
let Password = document.querySelector("#password");
let PasswordConfirm = document.querySelector("#password-confirm");

//todos los botones submit que envían los formularios
let BtnSubmit = document.querySelector(".btn-primary");
//Indicador que permite enviar o no el formulario

//mensaje
let Message = document.querySelector(".message");

let checkPass = function () {
  if (PasswordConfirm.value.length > 0) {
    if (PasswordConfirm.value == Password.value) {
      Message.innerHTML = "Ambas contraseñas coinciden";
      Message.classList.remove("text-danger");
      Message.classList.add("text-success");
      pass_flag = true;
    } else {
      Message.innerHTML = "No hay coincidencia entre las contraseñas";
      Message.classList.remove("text-success");
      Message.classList.add("text-danger");
      pass_flag = false;
    }
  } else {
    Message.innerHTML = "Ingrese una contraseña";
    Message.classList.remove("text-success");
    Message.classList.add("text-danger");
    pass_flag = false;
  }
};

function validate() {
  if (pass_flag == true) {
    return true;
  } else {
    return false;
  }
}

$(document).ready(function () {
  $("form").submit(function (e) {
    e.preventDefault();

    let data = $(this).serializeArray();

    $.ajax({
      type: "POST",
      url: "signup/registrarUsuario",
      data: data,
      success: function(data)             
      {
        $('#resultado').html(data);               
      }
    })
  });
});
