<?php
$servidor = "0.tcp.ngrok.io:15758";
$username = 'root';
$password = '';
$database = "personas_bd";
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
    <title>tabla de proyectos</title>
</head>

<body>

    <section class="hero is-link">
        <div class="hero-body has-text-centered">
            <p class="title">
                Formulario de registro de usuarios
            </p>
        </div>
    </section>

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

    <div class="container">
        <div class="box ml-6 mr-6 mb-6">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <!-- secciones -->
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
                <div id="seccion_1" class="content-tab" >

                    <div class="field">
                        <label class="label">Nombre:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="name" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Ocupación:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="position" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Location:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="location" required>
                        </div>
                    </div>


                    <div class="field">
                        <label class="label">Industry:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="industry" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Income:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="income" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Age:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="age" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Marital status:</label>
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
                        <label class="label">Story:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="story" required>
                        </div>
                    </div>

                    <div class="field">
                    <label class="label">Goals:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="goals" required>
                    </div>
                    </div>

                    <div class="field">
                        <label class="label">Needs:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="needs" required>
                        </div>
                    </div>

                    <div class="field">
                    <label class="label">Fears:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="fears" required>
                    </div>
                    </div>

            </div>
            <!--contenido seccion 2  -->

            <!--contenido seccion 3  -->

            <div id="seccion_3" class="content-tab" style="display:none">
                <div class="field">
                        <label class="label">Interests:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="interests" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Tools:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="tools" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Social networks:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="social_networks" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Brands:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="brands" required>
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