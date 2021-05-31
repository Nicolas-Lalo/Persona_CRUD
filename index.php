<?php
// $servidor = "8.tcp.ngrok.io:11388";
// $username = 'root';
// $password = '';
// $database = "personas_bd";
include "conn.php";
//conexión a mysql
$con = new mysqli($servidor, $username, $password, $database);
//consulta mysql
$consulta = "select * from persona";
//ejecutar consulta
$resultados = $con->query($consulta);

//cerrar conexión
$con->close();
?>
<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top" style='scroll-behavior: smooth'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystyles.css">
    <title>Lista de usuarios</title>
    <script src="https://kit.fontawesome.com/3176d7a66a.js" crossorigin="anonymous"></script>
</head>

<style>
    .rounded-border{border-radius: 1.25rem}.bordered{border:1px solid #B8B8B8}.bordered-light{border:1px solid #757763}
    .card-footer-item:hover{color: #B8B8B8}
    .link-name:hover{color: #B8B8B8}
</style>

<body>
    <!-- NAVBAR -->
    <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
      <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php">
            <img src="img/logo.png" width="112" height="28" alt="logo">
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
                <a class="navbar-item">
                    About Us
                </a>
            </div>

            <div class="navbar-end">
                <a class="navbar-item">
                    About Us
                </a>
                <div class="navbar-item">
                    <div class="buttons">
                    <a class="button  is-rounded is-outlined is-white">
                    Log in
                    </a>
                </div>
            </div>
        </div>
      </div>
    </nav>

    <!-- HERO -->
    <section class="hero is-info is-fullheight mb-0">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-flex is-align-items-center">
                    <div class="column is-half">
                        <p class="title is-1">
                            UX Personas
                        </p>
                        <p class="subtitle">
                            ¡Crea, Edita y Explora con los
                            Objeto Persona de tu proyecto!
                        </p>
                        <a href="#listaPersonas" class="button is-rounded is-outlined is-link">Comenzar</a>
                    </div>
                    <div class="column">
                        <figure class="image is-4by3">
                            <img src="img/hero.png">
                        </figure>
                    </div>
            </div>
            </div>
        </div>
    </section>

    <div id="listaPersonas" class="container pt-6">
        <!-- ENCABEZADO -->
        <div class="is-flex is-justify-content-space-between is-align-items-center mt-6">
            <div>
                <h1 class="title">Lista de Personas</h1>
            </div>
            <div class="is-flex is-align-items-center">
                    <p class="control has-icons-right mr-2">
                        <input class="input is-rounded is-smallt" type="text" placeholder="Buscar">
                        <span class="icon is-small is-right">
                            <i class="fas fa-search"></i>
                        </span>
                    </p>
                    <a href="create.php" class="button is-rounded is-link ml-2">Agregar </a>
                </div>
            </div>
        </div>

        <div class="container has-background-primary mb-6 bordered rounded-border mt-4">
            <div class="columns is-multiline m-0 is-1">
                <?php
                while ($row = $resultados->fetch_assoc()) {
                ?>
                <div class="column is-3-desktop is-one-third-tablet">
                    <div class="card is-flex is-flex-direction-column is-justify-content-space-between bordered-light" style='min-height:422px'>
                        <div class="card-content p-3">
                            <div class="media mb-3">
                                <div class="media-left">
                                    <figure class="image is-96x96">
                                    <img class="is-rounded" src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="content is-small">
                                    <p class='is-size-7 mb-0'><b>Nombre</b></p>
                                    <p class="is-size-7 mb-1 has-text-grey-light"><a class="link-name" href=""><?php echo $row['name'] ?></a></p>
                                    <p class='is-size-7 mb-0'><b>Estado Civil</b></p>
                                    <p class="is-size-7 mb-1 has-text-grey-light"> <?php echo $row['marital_status'] ?> </p>
                                </div>
                            </div>

                            <div class="content">
                                <div class="columns is-0 mb-0">
                                    <div class="column is-half">
                                        <p class='is-size-7 mb-0'><b>Ocupación</b></p>
                                        <p class="is-size-7 mb-0 has-text-grey-light"> <?php echo $row['position'] ?> </p>
                                    </div>
                                    <div class="column">
                                        <p class='is-size-7 mb-0'><b>Salario Anual</b></p>
                                        <p class="is-size-7 mb-0 has-text-grey-light">$<?php echo $row['income'] ?> </p>
                                    </div>
                                </div>
                                <p class='is-size-7 mb-0'><b>Intereses</b></p>          
                                <p class="is-size-7 mb-1 has-text-grey-light"><?php echo $row['interests'] ?> </p>
                                <p class='is-size-7 mb-0'><b>Necesidades</b></p>
                                <?php
                                    if (strlen($row['needs']) > 160) { ?>
                                        <p class="is-size-7 mb-1 has-text-grey-light"><?php echo substr($row['needs'],0,159) . "..."; ?> </p>
                                <?php
                                    } else { ?>
                                        <p class="is-size-7 mb-1 has-text-grey-light"><?php echo $row['needs'] ?> </p>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <footer class="card-footer py-1">
                                <a  href="delete.php?id=<?php echo $row['id'] ?>" class="card-footer-item p-1" style='border-right:0px'> <!-- Eliminar -->
                                    <div class="has-background-primary is-flex is-justify-content-center is-align-content-center is-align-items-center"
                                    style='border-radius:50%;width:35px;height:35px'>
                                        <i class="fas fa-trash-alt"></i>
                                    </div>
                                </a>
                                <a href="update.php?id=<?php echo $row['id'] ?>" class="card-footer-item p-1" style='border-right:0px'> <!-- Editar -->
                                    <div class="has-background-primary is-flex is-justify-content-center is-align-content-center is-align-items-center"
                                    style='border-radius:50%;width:35px;height:35px'>
                                        <i class="fas fa-edit"></i>
                                    </div>
                                </a>
                                <a href="detalles_persona.php?id=<?php echo $row['id'] ?>" class="card-footer-item p-1" style='border-right:0px'> <!-- Ver -->
                                    <div class="has-background-primary is-flex is-justify-content-center is-align-content-center is-align-items-center"
                                    style='border-radius:50%;width:35px;height:35px'>
                                        <i class="far fa-eye"></i>
                                    </div>
                                </a>
                        </footer>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
</body>

</html>
