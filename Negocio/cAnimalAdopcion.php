<?php

class AnimalAdoptivo
{

    private string $titulo;
    private string $descripcion;
    private string $link;

    function __construct()
    {
    }

    function init($titulo, $descripcion, $link)
    {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->link = $link;
    }

    function unserializeAnimal()
    {
        require_once("../Util/Util.php");

        $url = GET_ANIMALES;

        if (file_get_contents($url) != false) {
            $fichero = file_get_contents($url);
            $fichero = json_decode($fichero);
            $lista_animales = [];

            foreach ($fichero as $animal) {
                $new = new AnimalAdoptivo();
                $new->init($animal->titulo, $animal->descripcion, $animal->link);
                $lista_animales[] = $new;
            }
            return $lista_animales;
        } else {
            return null;
        }
    }

    function pintarAnimales($lista_animales)
    {
        require_once("../Util/Util.php");

        if ($lista_animales != null) {
            //var_dump($lista_animales);
            $contador = 0;
            $grupos = ceil(count($lista_animales) / 3);
            for ($i = 0; $i < $grupos; $i++) {
                if($i == 0){
                    echo '<div class="carousel-item active">';
                }else{
                    echo '<div class="carousel-item">';
                }
                
                for ($j = 0; $j < 3; $j++) {
                    if (isset($lista_animales[$contador])) {
                        $numAleatorio = random_int(1, 6);
                        echo ('
                    <div class="col-md-12 animate-box">
                        <a href="' . $lista_animales[$contador]->link . '" class="blog-post" target= "_blank">
                            <span class="img" style="background-image: url(../Vistas/images/portfolio-' . $numAleatorio . '.jpg);"></span>
                            <div class="desc">
                                <h3>' . $lista_animales[$contador]->titulo . '</h3>
                                <span class="cat">' . recortarString($lista_animales[$contador]->descripcion) . '</span>
                            </div>
                        </a>
                    </div>
                    ');
                    $contador++;
                    }                    
                }
                echo '</div>';
            }
        } else {
            echo 'ERROR: No se pudo pintar los animales en adopcion. Listado de animales no vacio.';
        }
    }

    function getTitulo()
    {
        return $this->titulo;
    }

    function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    function getLink()
    {
        return $this->link;
    }

    function setLink($link)
    {
        $this->link = $link;
    }
}
