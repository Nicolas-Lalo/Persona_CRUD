<?php
    $servidor="0.tcp.ngrok.io:13945";
    $username='user_test_persona';
    $password='';
    $database="PERSONAS_BD";
    //conexión a mysql
    $con=new mysqli($servidor, $username, $password, $database);
    if (isset($_GET['id'])){
        $id=$_GET['id'];
    }else if(isset($_POST['id'])){
        $id=$_POST['id'];
        header("Location: update.php?id=".$id);
    }else{
        die("No existe el id del proyecto solicitado");
    }
    //consulta mysql
    $consulta="SELECT * from persona where id=$id";
    //ejecutar consulta
    $resultado=$con->query($consulta);
    $us=$resultado->fetch_assoc();

    //consulta mysql
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $consulta="UPDATE persona 
                    set name='" . $_POST["name"] ."',
                    position='" . $_POST["position"] ."',
                    location='" . $_POST["location"] ."',
                    industry='" . $_POST["industry"] ."',
                    income='" . $_POST["income"] ."',
                    age='" . $_POST["age"] ."',
                    marital_status='" . $_POST["marital_status"] ."',
                    goals='" . $_POST["goals"] ."',
                    needs='" . $_POST["needs"] ."',
                    interests='" . $_POST["interests"] ."',
                    wants='" . $_POST["wants"] ."',
                    fears='" . $_POST["fears"] ."',
                    story='" . $_POST["story"] ."',
                    tools='" . $_POST["tools"] ."',
                    social_networks='" . $_POST["social_networks"] ."',
                    brands='" . $_POST["brands"] ."'
                    where id='" . $_POST["id"] ."'";
        echo $consulta;
        //ejecutar consulta
        if($con->query($consulta)===TRUE){
            $notif="el registro de usuario fue exitoso";
        }else{
            $notif="Hubo un error en el proceso de registro: ".$con->error;
        }    
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
    <title>tabla de proyectos</title>
</head>
<body>
    <div class="container">
    
    
    <div class="columns">
        <div class="column"></div>
        <div class="column is-half">
            <h1 class="title">Formulario de registro de usuarios</h1>
            <?php
            if (isset($notif)){
            ?>
            <div class="notification is-primary">
            <button class="delete"></button>
                <?php echo $notif ?>
            </div>
            <?php
            }
            ?>
            <div class="box">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <input class="input is-primary" type="text" placeholder="name" name="name" required value="<?php echo $us['name']?>">
                    <input class="input is-primary" type="text" placeholder="position" name="position" required value="<?php echo $us['position']?>">
                    <input class="input is-primary" type="text" placeholder="location" name="location" required value="<?php echo $us['location']?>">
                    <input class="input is-primary" type="text" placeholder="industry" name="industry" required value="<?php echo $us['industry']?>">
                    <input class="input is-primary" type="text" placeholder="income" name="income" required value="<?php echo $us['income']?>">
                    <input class="input is-primary" type="text" placeholder="age" name="age" required value="<?php echo $us['age']?>">
                    <input class="input is-primary" type="text" placeholder="marital_status" name="marital_status" required value="<?php echo $us['marital_status']?>">
                    <input class="input is-primary" type="text" placeholder="goals" name="goals" required value="<?php echo $us['goals']?>">
                    <input class="input is-primary" type="text" placeholder="needs" name="needs" required value="<?php echo $us['needs']?>">
                    <input class="input is-primary" type="text" placeholder="interests" name="interests" required value="<?php echo $us['interests']?>">
                    <input class="input is-primary" type="text" placeholder="fears" name="fears" required value="<?php echo $us['fears']?>">
                    <input class="input is-primary" type="text" placeholder="story" name="story" required value="<?php echo $us['story']?>">
                    <input class="input is-primary" type="text" placeholder="tools" name="tools" required value="<?php echo $us['tools']?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Actualizar usuario</button>
                    </div>
                    <div class="control">
                        <button class="button is-link is-light">Cancelar</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="column"></div>
    </div>
    </div>
</body>
</html>