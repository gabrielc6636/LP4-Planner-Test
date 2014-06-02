<?php
session_start();
if(!$_SESSION['logged']){
    header("Location: index.html");
    exit;
}
$resultado = "";
$resultado = 'Bienvenido, '.$_SESSION['fname'].' '.$_SESSION['lname'];
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
    	<label><?php echo $resultado; ?></label> 
    	<div id="progreso" align="center">
			<p>Progreso de la Carrera</p>
            <div>45%</div>
                 <div class="progress-bar green stripes">
                     
                        <span style="width: 45%"></span>
                    </div>
                </div>

            <div class="ss-form-heading">
            	
                <div align="center">
                <form action="user_page_materias.php" class="registrar">
            		<input type="submit" value="Registrar Materias">
                    
            	</form>
                <form action="user_page_consulta.php">
                	<input type="submit" value="Consultar Materias Aprobadas">
                </form>
				<form action="user_page_oferta.php">
                	<input type="submit" value="Consultar Materias Ofertadas">
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