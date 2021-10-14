<?php

class SignUp extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->tipoMensaje = "";
    }

    function render()
    {
        $this->view->render('signup');
    }

    function registrarUsuario()
    {

        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $apaterno = isset($_POST['apaterno']) ? $_POST['apaterno'] : null;
        $amaterno = isset($_POST['amaterno']) ? $_POST['amaterno'] : null;
        $nacimiento = isset($_POST['nacimiento']) ? $_POST['nacimiento'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $password_confirm = isset($_POST['password-confirm']) ? $_POST['password-confirm'] : null;

        //Validación de nombre
        if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/", $nombre)) {
            $nombreCheck = true;
            error_log('Nombre valido');
        } else {
            $nombreCheck = null;
            error_log('Nombre no valido');

        }

        //Validación de apellido paterno
        if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/", $apaterno)) {
            $apaternoCheck = true;
            error_log('apaterno valido');

        } else {
            $apaternoCheck = null;
            error_log('apaterno no valido');

        }

        //Validación de apellido materno
        if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/", $amaterno)) {
            $amaternoCheck = true;
            error_log('amaterno valido');

        } else {
            $amaternoCheck = null;
            error_log('amaterno no valido');

        }

        //filtro de email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailCheck = true;
            error_log('email valido');

        } else {
            $emailCheck = null;
            error_log('email no valido');

        }

        //filtro de teléfono
        if(filter_var($telefono,FILTER_VALIDATE_INT, array("options"=>array("min_range"=>10)))){
            error_log($telefono);
            $telefonoCheck = true;
            error_log('telefono valido');
        } else {
            $telefonoCheck = null;
            error_log('telefono no valido');
            error_log($telefono);
        }

        //filtro de fecha
        $fechaArray = explode('-', $nacimiento);
        if (count($fechaArray) == 3 && checkdate($fechaArray[2], $fechaArray[1], $fechaArray[0])) {
            $nacimientoCheck = true;
            error_log('fecha valido');

        } else {
            $nacimientoCheck = null;
            error_log('fecha no valido');

        }

        //Validación de password
        if ($password === $password_confirm) {
            $passwordCheck = true;
            error_log('password valido');

        } else {
            $passwordCheck = null;
            error_log('password no valido');

        }

        if (!$nombre || !$password || !$apaterno || !$amaterno || !$nacimiento || !$email || !$telefono || !$password_confirm) {
            $mensaje = "No puedes dejar campos vacíos";
            $tipoMensaje = "alert alert-danger";
        }elseif(!$nombreCheck || !$passwordCheck || !$apaternoCheck || !$amaternoCheck || !$nacimientoCheck || !$emailCheck || !$telefonoCheck){
            $mensaje = "Algunos de los datos que ingresaste no son válidos, por favor ingrésalos correctamente.";
            $tipoMensaje = "alert alert-danger";
        }
         else {
            $pass_cifrada = password_hash($password, PASSWORD_DEFAULT, array("cost" => 10)); //Cifrando 10 veces la contraseña
            if ($this->model->insertar([
                'nombre' => $nombre,
                'apaterno' => $apaterno,
                'amaterno' => $amaterno,
                'nacimiento' => $nacimiento,
                'email' => $email,
                'telefono' => $telefono,
                'password' => $pass_cifrada,
            ])) {
               echo '<div class="alert alert-success" role="alert">
               Usuario agregado con éxito
             </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                ¡Error! El correo electrónico o número de teléfono ya existen.
              </div>';
            }
        }       
    }
}
