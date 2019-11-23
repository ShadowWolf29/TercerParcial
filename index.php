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
        <!--Php-->
        <?php
        require("lib/database.php");
        require("lib/validator.php");
        if(!empty($_POST))
        {
            $_POST = Validator::validateForm($_POST);
            $personaje = $_POST['personaje'];
            $actor = $_POST['actor'];
            try
            {
                if($personaje != ""  && $actor !="")
                {
                    if(isset($_POST['diver']))
                    {
                        $divergente = 1;
                    }
                    else
                    {
                        $divergente = 0;
                    }
                        if(isset($_POST['faccion']))
                        {
                            $faccion = $_POST['faccion'];
                            $sql = "INSERT INTO personajes(personaje, actor, faccion, divergente) VALUES(?, ?, ?, ?)";
                            $params = array($personaje, $actor, $faccion, $divergente);
                            if(Database::executeRow($sql, $params))
                            {
                                print("<script>alert('Se agrego exitosamente')</script>");
                            }
                            else
                            {
                                print("<script>alert('Ocurrio un error')</script>");
                            }
                        }
                        else
                            {
                                print("<script>alert('Debe seleccionar una faccion')</script>");
                            }
                  
                }
                else
                {
                    print("<script>alert('Debe llenar todos los campos')</script>");
                }
            }
            catch (Exception $error)
            {
                print("<script>alert('Debe llenar todos los campos')</script>");
            }
        }
        
        ?>
        <!--CRUD-->
        <section>
            <div class="container z-depth-5 formulario">
                <div class="col s12 ">
                    <div class="row">
                        <form class="col s12" method="post">
                            <h2 class="center-align Black-text">Personajes de divergente</h2>
                            <div class="row form">
                                <div class="input-field col m6 s12">
                                    <input placeholder="nombre" name="personaje" id="personaje" type="text" class="validate black-text">
                                    <label class="black-text" for="personaje">Personaje</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <select name="faccion">
                                        <option value="0" disabled selected>Elije faccion</option>
                                        <option value="1">Osadia</option>
                                        <option value="2">Verdad</option>
                                        <option value="3">Erudicion</option>
                                        <option value="4">Abnegacion</option>
                                        <option value="5">Cordialidad</option>
                                        <option value="6">Sin faccion</option>
                                    </select>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input  placeholder="actor" name="actor"  id="actor" type="text" class="validate black-text">
                                    <label class="black-text" for="actor">Actor</label>
                                </div>
                                <div class="switch col s12 m6 center">
                                <label>
                                    <input type="checkbox" name="diver" />
                                    <span class="black-text">Divergente</span>
                                </label>
                                </div>
                                <div class="col s12 m12">

                                </div>
                                <div class="col s12 m6 left-align">
                                        <a href="registros.php" class="waves-effect grey darken-4  waves-light btn"><i class="material-icons left">business</i>Registros</a>
                                </div>
                                <div class="col s12 m6 right-align">
                                        <button type='submit' class="waves-effect grey darken-4 waves-light btn"><i class="material-icons right">send</i>Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    
    </body>
</html>