<?php


class Usuario
{

    private string $dni;
    private string $contrasena;
    private string $rol;

    function __construct()
    {
    }

    function init($dni, $contrasena, $rol)
    {

        $this->dni = $dni;
        $this->contrasena = $contrasena;
        $this->rol = $rol;
    }

    function insertarUsuario($dni, $contrasena, $rol)
    {

        $rol = strtoupper($rol);
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        $rq = "http://localhost:5174/api/Usuario?dni=".$dni."&contrasena=".$contrasena."&rol=".$rol."";

        $rs = curl_init($rq);

        curl_setopt($rs, CURLOPT_POST, true);
        curl_setopt($rs, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($rs);
        if(curl_errno($rs)) {
            $error_message = curl_error($rs);
            // Manejar el error de acuerdo a tus necesidades
        } else {
            print('funca');
            curl_close($rs);
        }
    }

    function unserializeUsuario($fichero)
    {
        $fichero = json_decode($fichero);
        $lista_usuarios = [];

        foreach ($fichero as $usuario) {
            $usr  = new Usuario();
            $usr->init($usuario->dni, $usuario->contrasena, strtoupper($usuario->rol));

            $lista_usuarios[] = $usr;
        }

        return $lista_usuarios;
    }

    function verificar($dni, $clave)
    {
        $dni = filter_var($dni, FILTER_SANITIZE_ENCODED);
        $rq = "http://localhost:5174/api/Usuario/uno?dni=" . $dni;
        $rq = file_get_contents($rq);

        $tmpUsuario = new Usuario();
        $rs = $tmpUsuario->unserializeUsuario($rq);
        //var_dump($rs[0]);
        if (password_verify($clave, $rs[0]->contrasena))
        {
            $info = array(
                'dni' => $rs[0]->dni,
                'rol' => $rs[0]->rol
            );
            //echo("Tienes acceso, máquina");
            return $info;
        } 
        else 
        {
            //echo("No tienes acceso, máquina");
            return 'NOT_FOUND';
        }
    }
}
