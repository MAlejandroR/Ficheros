<?php
require_once "funciones.php";
//Inicilizo variables
$name=$_POST['name'];
$pass=$_POST['pass'];
$admin=false; //Por defecto no soy admin, lo modificaré si sí que nos conectamos como admin

//Verifico condiciones de conexión y si no envío al index
//Escribe las instrucciones necesarias para ello


//Evalúo la acción que nos trajo a este script del index (hay 3 submit en el formulario)
//Como ves se han creado funciones que retornarán el html para luego visualizar
//Puedes cambiar el nombre de las funciones y hacerlo de otra manera si lo consideras
//Se valorará usar una estructura compacta en esta sección
switch ($_POST['enviar']) {
    case 'Subir fichero y acceder':
        $file=$_FILES['fichero'];
        upload_file ($file);
        $ficheros=show_files ($admin);
        break;
    case 'Subir fichero':
        $file=$_FILES['fichero'];
        $msj="El fichero " . $file['name'] . "<br />";
        if (upload_file ($file))
            $msj.="se ha subido correctamente";
        else
            $msj.="no se ha podido subir. <br />Error: " . $file['error'];
        header ("Location:index.php?msj=$msj");
        break;
    case 'Acceder':
        $ficheros=show_files ($admin);
        break;
    case 'publicar':
        $ficheros_subir=$_POST['ficheros_publicar'];
        publicar_ficheros ($ficheros_subir);
        $ficheros=show_files ($admin);
        break;
    default:
        header ("Location:index.php?msj='Debe registrarse para subir ficheros'");
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
    <title>Descarga de ficheros</title>

</head>
<body>
<h1>WEB DE DESCARGAS DE FICHEROS</h1>
<div id="app">
    <form action="index.php" method="POST">
        <input style="float:right; margin-right:30%" type="submit" value="Volver" name="enviar">
        <input type="hidden" value="<?php echo $name ?>" name="name">
        <input type="hidden" value="<?php echo $pass ?>" name="pass">

    </form>
    <?php echo $ficheros ?>

</div>
</body>
