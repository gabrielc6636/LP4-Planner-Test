<?php
ob_start();
include("lib/insertLog.php");
$objTiempo = new claseLog();


$objTiempo->alta_alumno($_REQUEST['legajo'],$_REQUEST['dni'],$_REQUEST['nombre'],$_REQUEST['apellido'],$_REQUEST['carrera']);
ob_start();
//header("Location: user_page.php");

$resultado = "";
$resultado = 'Carga realizada exitosamente';


?>
<!DOCTYPE html> 
<html> 
<head> 
<title>Academic Planner</title> 
<link href="styles/sesion.css" rel="stylesheet" type="text/css" />
</head> 
<body>
	<img alt="fondo" src="img/bg.png"  id="full-screen-background-image" />
    <div id="head">
    	<img src="img/logoplanner_small.png" />
        
    </div>
    <div class="ss-form-container"> 

            <div class="ss-form-heading">
            	<label><?php echo $resultado; ?></label> 
                <div align="center">
                <form action="index.html">
                	<input type="submit" value="Ingresar">
                </form>
               	</div>
            </div> 
</div>
	<div id="footer">
    	<div style="float:right;margin-top: 10px;">
        	<p style="margin:0px;color: #CCC;font-size:10px">Disponible en</p>
        	<img src="img/android.png" />
        </div>
    </div>
    <div id="footer2" align="center" style="color:#CCCCCC;">
    	<p style="font-size:10px;margin:0;padding-top:8px;">Copyright© 2014 - Todos los derechos reservados a Academic Planner</p>
    </div>
</body>
</html>