<?php

class Noticia
{

    private string $titulo;
    private string $descripcion;
    private string $link;
    private string $publishDate;
    private string $imagen;

    function __construct()
    {
    }

    function init($titulo, $descripcion, $link, $publishDate, $imagen)
    {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->link = $link;
        $this->publishDate = $publishDate;
        $this->imagen = $imagen;
    }

    function unserializeNoticias()
    {
        require_once("../Util/Util.php");

        $url = GET_NOTICIAS;

        if (file_get_contents($url) != false) {
            $fichero = file_get_contents($url);
            $fichero = json_decode($fichero);
            $lista_noticias = [];

            foreach ($fichero as $noticia) {
                $new = new Noticia();
                $new->init($noticia->titulo, $noticia->descripcion, $noticia->link, $noticia->publishDate, $noticia->imagen);
                $lista_noticias[] = $new;
            }
            return $lista_noticias;
        }else{
            return null;
        }
    }

    function pintarNoticias($lista_noticias)
    {
        require_once("../Util/Util.php");        
        if($lista_noticias != null){
            $usados = [];

            for ($i=0; $i < 3; $i++) {
                $noticiaAleatoria = cambiarNumAleatorio($lista_noticias, $usados);                
                array_push($usados, $noticiaAleatoria);
                
                echo ('        
                    <div class="col-md-12 animate-box">
                        <a href="' . $lista_noticias[$noticiaAleatoria]->getLink() . '" class="blog-post">
                            <span class="img" style="background-image: url(' . $lista_noticias[$noticiaAleatoria]->getImagen() . ');"></span>
                            <div class="desc">
                                <h3>' . $lista_noticias[$noticiaAleatoria]->getTitulo() . '</h3>
                                <span class="cat">' . recortarString($lista_noticias[$noticiaAleatoria]->getDescripcion()) . '</span>
                            </div>
                        </a>
                    </div>        
            ');
            }
        }else{
            echo 'ERROR: No se pudo pintar las noticias. Listado de noticas no instanciado.';
        }

        
    }

    function pintarTitulosNoticias($lista_noticias)
    {
        require_once("../Util/Util.php");

        if(!empty($lista_noticias)){
            for ($i = 0; $i <= 3; $i++) {
                echo ('<li><a href="'. $lista_noticias[$i]->getLink() .'"target="_blank">' . $lista_noticias[$i]->getTitulo() . '</a></li>');
            }
        }else{
            echo '<li>ERROR: No se pudo pintar los titulos. Lista no instanciada.</li>';
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

    function getFechaPublicacion()
    {
        return $this->publishDate;
    }

    function setFechaPublicacion($publishDate)
    {
        $this->publishDate = $publishDate;
    }

    function getImagen()
    {
        return $this->imagen;
    }

    function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
}
