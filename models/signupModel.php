<?php


class SignUpModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function insertar($datos)
    {
        try {
            $query = $this->prepare('INSERT INTO personas(nombre,apaterno,amaterno,nacimiento,email,telefono,password) 
            VALUES (:nombre,:apaterno,:amaterno,:nacimiento,:email,:telefono,:password)');
            $query->execute([
                'nombre'  => $datos['nombre'],
                'apaterno'  => $datos['apaterno'],
                'amaterno'  => $datos['amaterno'],
                'nacimiento'  => $datos['nacimiento'],
                'email'  => $datos['email'],
                'telefono'  => $datos['telefono'],
                'password' => $datos['password'],
            ]);
            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            error_log($e);
            return false;
        }
    }
}
