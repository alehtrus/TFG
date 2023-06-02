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
        }else{
            return null;
        }
    }

    function pintarAnimales($lista_animales)
    {
        require_once("../Util/Util.php");

        if($lista_animales != null){
            foreach ($lista_animales as $noticia) {
                $numAleatorio = random_int(1,6);
                echo ('        
                    <div class="col-md-12 animate-box">
                        <a href="' . $noticia->getLink() . '" class="blog-post" target= "_blank">
                            <span class="img" style="background-image: url(../Vistas/images/portfolio-'.$numAleatorio.'.jpg);"></span>
                            <div class="desc">
                                <h3>' . $noticia->getTitulo() . '</h3>
                                <span class="cat">' . recortarString($noticia->getDescripcion()) . '</span>
                            </div>
                        </a>
                    </div>        
            ');
            }
        }else{
            echo 'ERROR: No se pudo pintar las noticias. Listado de noticas no instanciado.';
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
