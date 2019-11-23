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
            if(empty($_GET['code'])) 
            {
                header("location:registros.php");
            }
            else
            {
                $id = $_GET['code'];
                $sql = "SELECT * FROM personajes WHERE id = ?";
                $params = array($id);
                $data = Database::getRow($sql, $params);
                $personaje = $data['personaje'];
                $categoria = $data['faccion'];
                $actor = $data['actor'];
                $diver = $data['divergente'];
            }
            if(!empty($_POST))
            {
                $_POST = Validator::validateForm($_POST);
                $personajeg = $_POST['personaje'];
                $actorg = $_POST['actor'];
                try
                {
                    if($personajeg != ""  && $actorg !="")
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
                                $facciong = $_POST['faccion'];
                                $sql2 = "UPDATE personajes SET personaje = ?, actor = ?, faccion = ?, divergente = ? WHERE id=?";
                                $params2 = array($personajeg, $actorg, $facciong, $divergente, $id);
                                if(Database::executeRow($sql2, $params2))
                                {
                                    print("<script>alert('Se modifico exitosamente'); location.href ='registros.php';</script>");
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
            switch($categoria)
            {
                case 1:
                    {
                        $select=('
                            <div class="input-field col s12 m6">
                                <select name="faccion">
                                    <option value="1" selected>Osadia</option>
                                    <option value="2">Verdad</option>
                                    <option value="3">Erudicion</option>
                                    <option value="4">Abnegacion</option>
                                    <option value="5">Cordialidad</option>
                                    <option value="6">Sin faccion</option>
                                </select>
                            </div>
                        ');
                    }break;
                case 2:
                        {
                        $select=('
                            <div class="input-field col s12 m6">
                                <select name="faccion">
                                    <option value="1">Osadia</option>
                                    <option value="2" selected>Verdad</option>
                                    <option value="3">Erudicion</option>
                                    <option value="4">Abnegacion</option>
                                    <option value="5">Cordialidad</option>
                                    <option value="6">Sin faccion</option>
                                </select>
                            </div>
                        ');
                    }break;
                case 3:
                    {
                        $select=('
                            <div class="input-field col s12 m6">
                                <select name="faccion">
                                    <option value="1">Osadia</option>
                                    <option value="2">Verdad</option>
                                    <option value="3" selected>Erudicion</option>
                                    <option value="4">Abnegacion</option>
                                    <option value="5">Cordialidad</option>
                                    <option value="6">Sin faccion</option>
                                </select>
                            </div>
                        ');
                    }break;
                case 4:
                    {
                        $select=('
                            <div class="input-field col s12 m6">
                                <select name="faccion">
                                    <option value="1">Osadia</option>
                                    <option value="2">Verdad</option>
                                    <option value="3">Erudicion</option>
                                    <option value="4" selected>Abnegacion</option>
                                    <option value="5">Cordialidad</option>
                                    <option value="6">Sin faccion</option>
                                </select>
                            </div>
                        ');
                    }break;
                case 5:
                    {
                        $select=('
                            <div class="input-field col s12 m6">
                                <select name="faccion">
                                    <option value="1">Osadia</option>
                                    <option value="2">Verdad</option>
                                    <option value="3">Erudicion</option>
                                    <option value="4">Abnegacion</option>
                                    <option value="5" selected>Cordialidad</option>
                                    <option value="6">Sin faccion</option>
                                </select>
                            </div>
                        ');
                    }break;
                case 6:
                    {
                        $select=('
                            <div class="input-field col s12 m6">
                                <select name="faccion">
                                    <option value="1">Osadia</option>
                                    <option value="2">Verdad</option>
                                    <option value="3">Erudicion</option>
                                    <option value="4">Abnegacion</option>
                                    <option value="5">Cordialidad</option>
                                    <option value="6" selected>Sin faccion</option>
                                </select>
                            </div>
                        ');
                    }break;
            }
            if($diver == 0)
            {
                $check=('
                <div class="switch col s12 m6 center">
                    <label class="black-text">
                        No divergente
                        <input type="checkbox" name="diver">
                        <span class="lever"></span>
                        Divergente
                    </label>
                </div>
                ');
            }
            else
            {
                $check=('
                <div class="switch col s12 m6 center">
                    <label class="black-text">
                        No divergente
                        <input type="checkbox" checked="checked" name="diver">
                        <span class="lever"></span>
                        Divergente
                    </label>
                </div>
                ');
            }
        ?>
        <!--CRUD-->
        <section>
            <div class="container z-depth-5 formulario">
                <div class="col s12 ">
                    <div class="row">
                        <form class="col s12" method="post">
                            <h2 class="center-align Black-text">Modificar</h2>
                            <div class="row form">
                                <div class="input-field col m6 s12">
                                    <input  id="personaje" type="text" class="validate black-text" name="personaje" value='<?php print($personaje);?>'>
                                    <label class="black-text" for="personaje">Personaje</label>
                                </div>
                                <?php
                                    print($select);
                                ?>
                                <div class="input-field col s12 m6">
                                    <input  id="actor" type="text" class="validate black-text" name="actor" value='<?php print($actor);?>'>
                                    <label class="black-text" for="actor">Actor</label>
                                </div>
                                <?php
                                    print($check);
                                ?>
                                <div class="col s12 m12">

                                </div>
                                <div class="col s12 m6 left-align">
                                        <a href="registros.php" class="waves-effect grey darken-3 waves-light btn"><i class="material-icons left">arrow_back</i>Regresar</a>
                                </div>
                                <div class="col s12 m6 right-align">
                                        <button type="submit" class="waves-effect grey darken-4 waves-light btn"><i class="material-icons right">send</i>Modificar</button>
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