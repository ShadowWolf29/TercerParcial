<!--Php-->
<?php
    require("database.php");
    require("validator.php");
    if(empty($_GET['id'])) 
    {
        header("location:registros.php");
    }
    else
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM personajes WHERE id = ?";
		$params = array($id);
	    if(Database::executeRow($sql, $params))
		{
            print("<script>alert('Se eliminado el registro'); location.href ='../registros.php'; </script>");
        }
    }
?>