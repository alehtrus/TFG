<?php

function getConexion()
{
    $conexion = mysqli_connect( 'localhost', 'root', '1234' );
        if ( mysqli_connect_errno() )
        {
            echo 'Error al conectar a MySQL: '. mysqli_connect_error();
        }
        mysqli_select_db( $conexion, 'portal_del_peludo' );
    
        return $conexion;
}