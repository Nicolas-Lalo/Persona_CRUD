<?php
    // $servidor = "0.tcp.ngrok.io:15758";
    // $username = 'root';
    // $password = '';
    // $database = "personas_bd";
    include "conn.php";
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

    <div class="mt-4">
        <nav class="breadcrumb is-right" aria-label="breadcrumbs">
            <ul>
                <li><a href="index.php">Lista personas</a></li>
                <li class="is-active"><a href="#" aria-current="page">Editar infromación</a></li>
            </ul>
        </nav>
    </div>
    
    <div class="container is-fullhd">
        <h1 class="title">Editar información de <?php echo $us['name']?>.</h1>
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
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <div> 
                                <div class="field">
                                    <label class="label">Name:</label>
                                    <div class="control">
                                        <input class="input is-primary" type="text" placeholder="name" name="name" required value="<?php echo $us['name']?>">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Position:</label>
                                    <div class="control">
                                        <input class="input is-primary" type="text" placeholder="position" name="position" required value="<?php echo $us['position']?>">
                                    </div>
                                </div>       
                                <div class="field">
                                    <label class="label">Location:</label>
                                    <div class="control">
                                        <input class="input is-primary" type="text" placeholder="location" name="location" required value="<?php echo $us['location']?>">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Industry:</label>
                                    <div class="control">
                                        <input class="input is-primary" type="text" placeholder="industry" name="industry" required value="<?php echo $us['industry']?>">
                                    </div>
                                </div>    
                                <div class="field">
                                    <label class="label">Income:</label>
                                    <div class="control">
                                        <input class="input is-primary" type="text" placeholder="income" name="income" required value="<?php echo $us['income']?>">
                                    </div>
                                </div>        
                                <div class="field">
                                    <label class="label">Age:</label>
                                    <div class="control">  
                                        <input class="input is-primary" type="text" placeholder="age" name="age" required value="<?php echo $us['age']?>">
                                    </div>
                                </div> 
                                <div class="field">
                                    <label class="label">Marital status:</label>
                                    <div class="control">
                                        <input class="input is-primary" type="text" placeholder="marital_status" name="marital_status" required value="<?php echo $us['marital_status']?>">
                                    </div>
                                </div> 
                                <div class="field">
                                    <label class="label">Story:</label>
                                    <div class="control"> 
                                        <textarea class="input is-primary"  name='story' rows="10"><?php echo $us['story']?></textarea>
                                       <!-- <input class="input is-primary" type="text" placeholder="story" name="story" required value="<?php echo $us['story']?>"> -->
                                    </div>
                                </div> 

                                <div class="field">
                                    <label class="label">Goals:</label>
                                    <div class="control">
                                        <textarea class="input is-primary"  name='goals' ><?php echo $us['goals']?></textarea>
                                        <!-- <input class="input is-primary" type="text" placeholder="goals" name="goals" required value="/> -->
                                    </div>
                                </div>   
                                <div class="field">
                                    <label class="label">Needs:</label>
                                    <div class="control">      
                                        <textarea class="input is-primary"  name='needs' ><?php echo $us['needs']?></textarea>
                                        <!-- <input class="input is-primary" type="text" placeholder="needs" name="needs" required value="<?php echo $us['needs']?>"> -->
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Wants:</label>
                                    <div class="control">      
                                        <textarea class="input is-primary"  name='wants' ><?php echo $us['wants']?></textarea>
                                        <!-- <input class="input is-primary" type="text" placeholder="needs" name="needs" required value="<?php echo $us['needs']?>"> -->
                                    </div>
                                </div> 
                                  <!-- WANTS -->

                                <div class="field">
                                    <label class="label">Fears:</label>
                                    <div class="control"> 
                                        <textarea class="input is-primary"  name='fears' ><?php echo $us['fears']?></textarea> 
                                    </div>
                                </div> 

                                <div class="field">
                                    <label class="label">interests:</label>
                                    <div class="control">   
                                        <input class="input is-primary" type="text" placeholder="interests" name="interests" required value="<?php echo $us['interests']?>">
                                    </div>
                                </div> 
                                  
                                 
                                <div class="field">
                                    <label class="label">Tools:</label>
                                    <div class="control"> 
                                        <input class="input is-primary" type="text" placeholder="tools" name="tools" required value="<?php echo $us['tools']?>">
                                    </div>
                                </div> 
                                <div class="field">
                                    <label class="label">Social networks:</label>
                                    <div class="control"> 
                                        <input class="input is-primary" type="text" placeholder="socual_networks" name="social_networks" required value="<?php echo $us['social_networks']?>">
                                    </div>
                                </div>  
                                <div class="field">
                                    <label class="label">Brands:</label>
                                    <div class="control"> 
                                        <input class="input is-primary" type="text" placeholder="brands" name="brands" required value="<?php echo $us['brands']?>">
                                    </div>
                                </div> 
                            </div>    
                            <input type="hidden" name="id" value="<?php echo $id?>">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container is-widescreen ">   
            <div class="level-right mt-4">
                <button class="button is-link is-light">Cancelar</button>
                <button class="button is-link">Guardar cambios</button>
            </div>
        </div>
    </div>
</body>
</html>