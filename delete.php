<?php
include "conn.php";

    if (isset($_GET['id'])){
        $idProyecto=$_GET['id'];
    }else{
        die("No existe el id del proyecto solicitado");
    }

    //conexión a mysql
    $con=new mysqli($servidor, $username, $password, $database);
    //consulta mysql
    $consulta="delete from persona where id=$idProyecto";
    //ejecutar consulta
    if($con->query($consulta)){
        $notif='El registro se eliminó correctamente';
    }else{
        $notif='No se pudo eliminar el registro: '.$con->error;
    }
    //cerrar conexión
    $con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystyles.css">
    <title>Perfil de usuario</title>
</head>
<body>
    <div class="container" id="mensaje">
    <div class="notification is-primary" >
    <button class="delete" id="cerrar"></button>
        <?php echo $notif ?>
    </div>
    </div>
</body>
<script>
var notif=document.getElementById('mensaje');
     var botonCerrar=document.getElementById("cerrar");
     botonCerrar.addEventListener('click',function(){
     notif.style.visibility="hidden";
     notif.style.display="none";
     botonCerrar.parentNode.remove();
     location.href ="create.php";
     })
</script>
</html>