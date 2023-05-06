<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    
        $url = "http://localhost:41840/api/Veterinario";

        $fichero = file_get_contents($url);

        //var_dump($fichero);
        $fichero = json_decode($fichero);
        pintarVeterinarios($fichero);

        function pintarVeterinarios($veterinarios){

            foreach($veterinarios as $veterianrio){
                print($veterianrio->nombre . "<br>");
            }

        }
    
    ?>

</body>
</html>