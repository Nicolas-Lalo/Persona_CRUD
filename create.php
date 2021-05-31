<?php
// $servidor = "0.tcp.ngrok.io:15758";
// $username = 'root';
// $password = '';
// $database = "personas_bd";
include "conn.php";
//conexión a mysql
$con = new mysqli($servidor, $username, $password, $database);

if (isset($_POST['name']) && !empty($_POST['name'])) {
    $consulta = "INSERT INTO persona (name,position,location,industry,income,age,marital_status,goals,needs,interests,wants,fears,story,tools,social_networks,brands)
                    VALUES ('" . $_POST["name"] . "','" . $_POST["position"] . "','" . $_POST["location"] . "',
                    '" . $_POST["industry"] . "','" . $_POST["income"] . "','" . $_POST["age"] . "',
                    '" . $_POST["marital_status"] . "','" . $_POST["goals"] . "','" . $_POST["needs"] . "','" . $_POST["interests"] . "',
                    '" . $_POST["wants"] . "','" . $_POST["fears"] . "','" . $_POST["story"] . "','" . $_POST["tools"] . "','" . $_POST["social_networks"] . "','" . $_POST["brands"] . "'); ";

    if ($con->query($consulta) === TRUE) {
        $notif = "El registro de usuario fue exitoso";
    } else {
        $notif = "Hubo un error en el proceso de registro: " . $con->error;
    }
}

$con->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystyles.css">
    <title>Crear persona</title>
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

    <div class="container mt-5 mb-5">
        <div class="columns">
            <div class="column is-1"></div>
            <div class="column is-10">
                <?php
                if (isset($notif)) {
                ?>
                    <div class="notification is-primary">
                        <button class="delete"></button>
                        <?php echo $notif ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <br>
    <div class="container has-background-primary mb-6 bordered rounded-border mt-4">
        <div class="box ml-6 mr-6 mb-6 has-background-primary "> <!-- cambiar color -->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <!-- secciones -->
            <div class="card">
                <div class="card-content">
            <nav class="tabs is-boxed is-fullwidth is-large">
                <div class="container">
                    <ul>
                        <li class="tab is-active" onclick="openTab(event,'seccion_1')"><a >Sección 1</a></li>
                        <li class="tab" onclick="openTab(event,'seccion_2')"><a >Sección 2</a></li>
                        <li class="tab" onclick="openTab(event,'seccion_3')"><a >Sección 3</a></li>
                    </ul>
                </div>
            </nav>
            <!-- secciones -->
            <!--contenido seccion 1  -->
            <div class="container section">
                <div id="seccion_1" class="content-tab " >

                    <div class="field ">
                        <label class="label has-text-grey-light">Nombre:</label>
                        <div class="control">
                            <input class="input is-primary " type="text" name="name" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-grey-light">Ocupación:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="position" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-grey-light">Location:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="location" required>
                        </div>
                    </div>


                    <div class="field">
                        <label class="label has-text-grey-light">Industry:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="industry" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-grey-light">Income:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="income" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-grey-light">Age:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="age" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-grey-light">Marital status:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="marital_status" required>
                        </div>
                    </div>

                </div>
            </div>
                <!--contenido seccion 1  -->

            <!--contenido seccion 2  -->
            <div id="seccion_2" class="content-tab" style="display:none">

                <div class="field">
                        <label class="label has-text-grey-light">Story:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="story" required>
                        </div>
                    </div>

                    <div class="field">
                    <label class="label has-text-grey-light">Goals:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="goals" required>
                    </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-grey-light">Needs:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="needs" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-grey-light">Wants:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="needs" required>
                        </div>
                    </div>

                    <div class="field">
                    <label class="label has-text-grey-light">Fears:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="fears" required>
                    </div>
                    </div>

            </div>
            <!--contenido seccion 2  -->

            <!--contenido seccion 3  -->

            <div id="seccion_3" class="content-tab" style="display:none">
                <div class="field">
                        <label class="label has-text-grey-light">Interests:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="interests" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-grey-light">Tools:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="tools" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-grey-light">Social networks:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="social_networks" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-grey-light">Brands:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="brands" required>
                        </div>
                    </div>

            </div>
            </div>
            </div>
            <!--contenido seccion 3  -->

                


                <div class="field is-grouped mt-5">
                    <div class="control">
                        <button class="button is-link">Guardar registro</button>
                    </div>
                </div>

            </form>
        </div>

    </div>


</body>

<script>
        function openTab(evt, tabName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("content-tab");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tab");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" is-active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " is-active";
        }
    </script>

</html>