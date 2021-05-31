<?php
include "conn.php";
 

$con=new mysqli($servidor, $username, $password, $database);
    if (isset($_GET['id'])){
        $id=$_GET['id'];
    }else if(isset($_POST['id'])){
        $id=$_POST['id'];
        header("Location: persona_detalle.php?id=".$id);
    }else{
        die("No existe el id del proyecto solicitado");
    }
    //consulta mysql
    $consulta="SELECT * from persona where id=$id";
    //ejecutar consulta
    $resultado=$con->query($consulta);
    $us=$resultado->fetch_assoc();

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
    <title>tabla de proyectos</title>
</head>
<body>
    <div>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item">
                        Home
                    </a>

                    <a class="navbar-item">
                        Documentation
                    </a>
                </div>

                <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                    <a class="button is-light">
                        Regístrarse
                    </a>
                    <a class="button is-primary">
                        <strong>Iniciar Sesión</strong>
                    </a>
                    </div>
                </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="is-widescreen mt-4">
        <nav class="breadcrumb is-right" aria-label="breadcrumbs">
            <ul>
                <li><a href="index.php">Lista personas</a></li>
                <li class="is-active"><a href="#" aria-current="page"></a> Detalles persona</li>
            </ul>
        </nav>
    </div>
    
    <div class="container is-widescreen">
        <div class=" is-flex is-justify-content-space-between mt-6">
            <h1 class="title">Detalles de <?php echo $us['name']?>.</h1>
            <div class="is-flex is-align-items-center">
                <input class="input is-rounded is-small" type="text" placeholder="Buscar">
                <a href="update.php?id=<?php echo $row['id'] ?>" class="button is-link ml-2">Editar </a>
            </div>
        </div>
    </div>
    <div class="container is-widescreen"> 
        <div class="card " style='min-height:300px'>
            <div class="card-content p-3"> 
                <div class="level">
                    <div class="level-item has-text-centered">
                        <div class="media mb-3">
                            <div class="media-left">
                                <figure class="image is-96x96">
                                    <img class="is-rounded" src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div class="content is-small">
                            <p class='is-size-7 mb-0 mt-3'><b>Nombre:</b></p>
                            <p class="is-size-7 mb-1  "><a href=""></a> <?php echo $us['name']?></p>
                            <p class='is-size-7 mb-0 mt-3'><b>Position</b></p>
                            <p class="is-size-7 mb-1"> <?php echo $us['position']?> </p>
                            <p class='is-size-7 mb-0 mt-3'><b>Location:</b></p>
                            <p class="is-size-7 mb-1"> <?php echo $us['location']?> </p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div class="content is-small">
                            <p class='is-size-7 mb-0 mt-3'><b>Industry:</b></p>
                            <p class="is-size-7 mb-1"> <?php echo $us['industry']?> </p>
                            <p class='is-size-7 mb-0 mt-3'><b>Income:</b></p>
                            <p class="is-size-7 mb-1"><a href=""></a> <?php echo $us['income']?></p>
                            <p class='is-size-7 mb-0 mt-3'><b>Age:</b></p>
                            <p class="is-size-7 mb-1"> <?php echo $us['age']?> </p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div class="content is-small">
                            <p class='is-size-7 mb-0 mt-3'><b>Marital_status:</b></p>
                            <p class="is-size-7 mb-1"> <?php echo $us['marital_status']?> </p>
                        </div>
                    </div>
                </div>
                <div class="level-left"> 
                    <div class="content is-small">
                        <p class='is-size-7 mb-0 mt-3'><b>Story:</b></p>
                        <p class="is-size-7 mb-1"> <?php echo $us['story']?> </p>
                        <p class='is-size-7 mb-0 mt-3'><b>Goals:</b></p>
                        <p class="is-size-7 mb-1"> <?php echo $us['goals']?> </p>
                        <p class='is-size-7 mb-0  mt-3'><b>Needs:</b></p>
                        <p class="is-size-7 mb-1 "> <?php echo $us['needs']?> </p>
                        <p class='is-size-7 mb-0  mt-3' ><b>Wants:</b></p>
                        <p class="is-size-7 mb-1 "> <?php echo $us['wants']?> </p>
                        <p class='is-size-7 mb-0  mt-3'><b>Fears:</b></p>                               
                         <p class="is-size-7 mb-1"> <?php echo $us['fears']?> </p>
                        <p class='is-size-7 mb-0  mt-3'><b>Interests:</b></p>
                        <p class="is-size-7 mb-1 "> <?php echo $us['interests']?> </p>
                        <p class='is-size-7 mb-0  mt-3'><b>Tools:</b></p>
                        <p class="is-size-7 mb-1"> <?php echo $us['tools']?> </p>
                        <p class='is-size-7 mb-0 mt-3'><b>social_networks</b></p>
                        <p class="is-size-7 mb-1"> <?php echo $us['social_networks']?> </p>
                        <p class='is-size-7 mb-0 mt-3'><b>Brands:</b></p>
                        <p class="is-size-7 mb-1"> <?php echo $us['brands']?> </p>
                    </div>
                </div>
            </div>
             
        </div>
        <div class= "mt-6">
            <a href="index.php" class="button is-link ml-2">Regresar </a>
        </div>
     
    </div>
     
</body>
</html>