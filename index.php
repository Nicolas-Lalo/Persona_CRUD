<?php
$servidor = "8.tcp.ngrok.io:17494";
$username = 'user_test_persona';
$password = '12345678';
$database = "PERSONAS_BD";
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystyles.css">
    <title>Lista de usuarios</title>
</head>

<body>
    <div class="container is-fullhd">
        <div class="columns is-centered">
            <div class="column is-four-fifths">
                <h1 class="title">Lista de usuarios</h1>
                <a href="create.php" class="button is-link">Agregar datos</a>

                <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Posición</th>
                            <th>Localidad</th>
                            <th>Industria</th>
                            <th>Salario</th>
                            <th>Edad</th>
                            <th>Estado civil</th>
                            <th>Metas</th>
                            <th>Necesidades</th>
                            <th>Intereses</th>
                            <th>Deseos</th>
                            <th>Miedos</th>
                            <th>historia</th>
                            <th>Herramientas que usa</th>
                            <th>Redes Sociales</th>
                            <th>Marcas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $resultados->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['position'] ?></td>
                                <td><?php echo $row['location'] ?></td>
                                <td><?php echo $row['industry'] ?></td>
                                <td><?php echo $row['income'] ?></td>
                                <td><?php echo $row['age'] ?></td>
                                <td><?php echo $row['marital_status'] ?></td>
                                <td><?php echo $row['goals'] ?></td>
                                <td><?php echo $row['needs'] ?></td>
                                <td><?php echo $row['interests'] ?></td>
                                <td><?php echo $row['wants'] ?></td>
                                <td><?php echo $row['fears'] ?></td>
                                <td><?php echo $row['story'] ?></td>
                                <td><?php echo $row['tools'] ?></td>
                                <td><?php echo $row['social_networks'] ?></td>
                                <td><?php echo $row['brands'] ?></td>
                                <td><a href="readDetalle.php?id=<?php echo $row['id'] ?>">Ver</a> | <a href="update.php?id=<?php echo $row['id'] ?>">Editar</a> | <a href="delete.php?id=<?php echo $row['id'] ?>">Eliminar</a></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
