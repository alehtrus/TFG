<?php

class Medico
{

    private int $id;
    private int $idVeterinario;
    private string $dni;
    private string $nombre;
    private int $numColegiado;


    function __construct()
    {
    }

    function init($id, $idVeterinario, $dni, $nombre, $numColegiado)
    {
        $this->id = $id;
        $this->idVeterinario = $idVeterinario;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->numColegiado = $numColegiado;
    }

    function unserializeMedicos()
    {
        $url = GET_MEDICOS;
        if (file_get_contents($url) != false) {
            $fichero = file_get_contents($url);

            $fichero = json_decode($fichero);
            $lista_medicos = [];

            foreach ($fichero as $medico) {
                $med = new Medico();
                $med->init($medico->id, $medico->id_veterinario, $medico->dni, $medico->nombre, $medico->numero_colegiado);

                $lista_medicos[] = $med;
            }

            return $lista_medicos;
        } else {
            return null;
        }
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }


    function getIdVeterinario()
    {
        return $this->idVeterinario;
    }

    function setIdVeterinario($idVeterinario)
    {
        $this->idVeterinario = $idVeterinario;
    }


    function getDni()
    {
        return $this->dni;
    }

    function setDni($dni)
    {
        $this->dni = $dni;
    }


    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    function getNumColegiado()
    {
        return $this->numColegiado;
    }

    function setNumColegiado($numColegiado)
    {
        $this->numColegiado = $numColegiado;
    }
}
