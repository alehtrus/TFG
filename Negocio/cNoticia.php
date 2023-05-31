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
    
    function init($titulo,$descripcion,$link,$publishDate,$imagen)
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
        $fichero = file_get_contents($url);

        $fichero = json_decode($fichero);
        $lista_noticias = [];

        foreach($fichero as $noticia){
           $new = new Noticia();       
           $new->init($noticia->titulo, $noticia->descripcion, $noticia->link, $noticia->publishDate, $noticia->imagen); 
           $lista_noticias[] = $new;

        }
        return $lista_noticias;
    }

    function pintarNoticias($lista_noticias)
    {
        require_once("../Util/Util.php");
        
        foreach($lista_noticias as $noticia)
        {
            echo ('        
                <div class="col-md-12 animate-box">
                    <a href="'.$noticia->getLink().'" class="blog-post">
                        <span class="img" style="background-image: url('.$noticia->getImagen().');"></span>
                        <div class="desc">
                            <h3>'.$noticia->getTitulo().'</h3>
                            <span class="cat">'.recortarString($noticia->getDescripcion()).'</span>
                        </div>
                    </a>
                </div>        
        ');
        }            
    }

    function pintarTitulosNoticias($lista_noticias)
    {
        require_once("../Util/Util.php");
        
        for ($i=0; $i <= 3; $i++) { 
            echo('<li><a href="#">'.$lista_noticias[$i]->getTitulo().'</a></li>');
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