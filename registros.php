<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
    <link rel="stylesheet" href="">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width,   initial-scale=1.0"/>
  </head>

    <body> 
        <!--CRUD-->
        <section>
            <div class="container">
                <div class="col s12 ">
                    
                    <h2 class="center-align white-text">Lista de personajes</h2>
                        <div class="col s12 m12">
                            <a href="index.php" class="left-align waves-effect white black-text waves-light btn"><i class="material-icons left">arrow_back</i>Regresar</a>
                            <a href="registros.php" class="derecha waves-effect waves-light btn white black-text"><i class="material-icons left">replay</i>Recargar</a>
                        </div>
                    <div class="row">

                    <?php
                        require("lib/database.php");
                        $sql = "SELECT * FROM personajes ORDER BY id";
                        $params = null;
                        try
                        {
                            $data = Database::getRows($sql, $params);
                            if($data != null)
                            {
                                    foreach($data as $row)
                                    {
                                        if($row['faccion'] == 1)
                                        {
                                            $faccion = "Osadia";
                                        }
                                        else if($row['faccion'] == 2)
                                        {
                                            $faccion = "Verdad";
                                        }
                                        else if($row['faccion'] == 3)
                                        {
                                            $faccion = "Erudicion";
                                        }
                                        else if($row['faccion'] == 4)
                                        {
                                            $faccion = "Abnegacion";
                                        }
                                        else if($row['faccion'] == 5)
                                        {
                                            $faccion = "Cordialidad";
                                        }
                                        else if($row['faccion'] == 6)
                                        {
                                            $faccion = "Sin faccion";
                                        }

                                        if($row['divergente'] == 1)
                                        {
                                            $diver = "SI";
                                        }
                                        else if($row['divergente'] == 0)
                                        {
                                            $diver = "NO";
                                        }
                                    print("
                                    <div class='col s12 m6'>
                                        <div class='card blue-grey darken-1 grey'>
                                            <div class='card-content white-text'>
                                                <span class='card-title'>".$row['personaje']."</span>
                                                <p>Nombre: ".$row['actor']."</p>
                                                <p>Fraccion: ".$faccion."</p>
                                                <p>Divergente: ".$diver."</p>
                                            </div>
                                            <div class='card-action right-align'>
                                                <a href='modi.php?code=".$row['id']."' class='waves-effect waves-light boton blue btn'><i class='material-icons right'>edit</i>Modificar</a>
                                                <a href='lib/delete.php?code=".$row['id']."' class='waves-effect waves-light boton red btn'><i class='material-icons right'>delete</i>Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                       
                                    ");
                                }
                                
                            }
                            else
                            {
                                print("
                                <div class='col s12 m12'>
                                    <div class='card blue-grey darken-1 grey'>
                                        <div class='card-content white-text'>
                                            <span class='card-title center-align'><i class='material-icons'>warning</i> No hay registros <i class='material-icons'>warning</i></span>
                                        </div>
                                    </div>
                                </div>
                                   
                                ");
                            }
                        }
                        catch(Exception $error)
                        {
                            Page::showMessage(2, $error->getMessage(), "../main/");
                        }
                    ?>
                        
                    </div>
                </div>
            </div>
        </section>


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    
    </body>
</html>