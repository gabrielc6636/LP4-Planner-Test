<?
include("lib/insertLog.php");
$objTiempo = new claseLog();

//echo $_SERVER['REMOTE_ADDR'];

?>


<?php
/*
if($_GET) 
{
*/
   $result = ($objTiempo->get_carreras());
   
	$lista=array();
	$contador=0;
	while($row = mysql_fetch_array($result)){
		$lista[$contador]=$row;
		$contador++;
	}

   echo json_encode($lista);
 //}
?>