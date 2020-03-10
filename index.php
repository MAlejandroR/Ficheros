<?php
//Escribir las acciones necesarias para evitar warning y mantener el nombre de usuario introducido si vuelvo de descargas.php



?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="./css/estilo.css" rel="stylesheet" type="text/css">

</head>
<body>

<fieldset class="caja_centrada">
    <div class="error"><?php echo $msj ?></div>
    <legend style="font-size:20px;font-style: oblique;background:aliceblue ">Subida de ficheros</legend>
    <form action="descarga.php" method="POST" enctype="multipart/form-data">
        <br/>
        Usuario&nbsp&nbsp&nbsp <input type="text" name="name" value="<?php echo $name ?>"  >
        <br>
        Password <input type="text" name="pass" value="<?php echo $pass ?>"  >
        <br/>
        <br/>
        <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
        <!--    <input type="hidden" name="MAX_FILE_SIZE" value=1024 />-->
        <div style="float:right">
            <input type="file" name="fichero"><br>
        </div>
        <br>
        <br>
        <input type="submit" value="Subir fichero y acceder" name="enviar">
        <input type="submit" value="Subir fichero" name="enviar">
        <input type="submit" value="Acceder" name="enviar">

    </form>
</fieldset>

</body>
</html>