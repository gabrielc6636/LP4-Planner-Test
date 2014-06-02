<?php 
include_once("DBManager.php");
?>
<?
class claseLog{ 

	function get_materias_alumno($Legajo){
	   $con = new DBManager;
	   if($con->conectar()==true){
			
		
		
		$query = "select 
					mc.idMaterias,
					m1.Nombre,
					mc.idMaterias_Correlativas,
					m2.Nombre as NombreCorrelativa,
					ma.Legajo from 
				Materias_Correlativas mc,
				Materias m1,
				Materias m2,
				Estado_Materia e,
				Materias_Alumnos ma
				where mc.idMaterias = m1.idMaterias 
				and mc.idMaterias_Correlativas = m2.idMaterias
				and mc.idMaterias_Correlativas = ma.idMaterias 
				and ma.idEstado = e.idEstado_Materia
				and ma.Legajo = ".$Legajo." order by m1.idMaterias";
		
		
		$result = @mysql_query($query);
		
			if (!$result){
			   echo 'Error get_materias_alumno';
			}else{
				
				return $result;
			}
		}
	}
	
	function get_materias_posibles($Legajo){
	   $con = new DBManager;
	   if($con->conectar()==true){
			
		
		
		$query = "SELECT m1.idMateria,
       m1.Nombre as Nombre_Materia,
       m1.CargaHoraria,
       m1.Contenido,/*c.*,*/
       m2.idMateria as idMateria_Correlativa,
       m2.Nombre as Nombre_Correlativa 
					FROM Correlatividad c,Materia m1,Materia m2 
					where m1.idMateria = c.idMateria 
					and m2.idMateria = c.idMateria1
					and not exists (SELECT * FROM Alumno_Materia am 
									where am.idAlumno = (select idAlumno from Alumno where Legajo =  ".$Legajo.") 
									and am.idMateria = m1.idMateria)
					and exists (SELECT * FROM Alumno_Materia am 
								where am.idAlumno = (select idAlumno from Alumno where Legajo =  ".$Legajo.") 
								and am.idMateria = m2.idMateria 
								and am.Regular = 1)
				";
		
		
		$result = @mysql_query($query);
		
			if (!$result){
			   echo 'Error get_materias_posibles';
			}else{
				
				return $result;
			}
		}
	}
	
	function get_materias_aprobadas($Legajo){
	   $con = new DBManager;
	   if($con->conectar()==true){
			
		
		
		$query = "SELECT m1.idMateria,
       m1.Nombre as Nombre_Materia,
       m1.CargaHoraria,
       m1.Contenido,/*c.*,*/
       m2.idMateria as idMateria_Correlativa,
       m2.Nombre as Nombre_Correlativa 
					FROM Correlatividad c,Materia m1,Materia m2 
					where m1.idMateria = c.idMateria 
					and m2.idMateria = c.idMateria1
					
					and exists (SELECT * FROM `Alumno_Materia` am 
								where am.idAlumno = (select idAlumno from Alumno where Legajo =  ".$Legajo.") 
								and am.idMateria = m1.idMateria 
								and am.Regular = 1)
				";
		
		
		$result = @mysql_query($query);
		
			if (!$result){
			   echo 'Error get_materias_aprobadas';
			}else{
				
				return $result;
			}
		}
	}
	
	function alta_alumno($Legajo,$Dni,$Nombre,$Apellido,$Carrera){
	   $con = new DBManager;
	   if($con->conectar()==true){
		
		
		/*echo $result;
			if (!$result){
			   echo 'Error get_tiempo';
			}else{*/
				$query = "select (MAX(idAlumno)+1) as idAlumno from Alumno";
				$result = @mysql_query($query);
		/*
					if (!$result){
					   echo 'Error get_tiempo';
					}else{*/
						$campo = mysql_fetch_array($result);
						//echo $campo['idAlumno'];
						/*
					}
				
			}*/
			
			//$query = "INSERT INTO CorridaLog(fecha,idLog,ip) VALUES (CURRENT_TIMESTAMP,1, '".$_SERVER['REMOTE_ADDR']."')";
		$query = "INSERT INTO `Alumno`(`idAlumno`,`Legajo`,`Contraseña`,`Nombre`,`Apellido`,`Documento`,`TipoDocumento`,`idDato`)
					VALUES ( ".$campo['idAlumno'].",".$Legajo.",".$Dni.",'".$Nombre."','".$Apellido."',".$Dni.",'DNI',1)"; //HARCODEO DE idDATO
		
		//echo $query;
		$result = @mysql_query($query);
		
		$query = "INSERT INTO `Alumno_Plan` (`idAlumno`,`idPlandeestudio`) 
				  VALUES (".$campo['idAlumno'].",1)"; //HARCODEO DE idPLAN
		
		//echo $query;
		$result = @mysql_query($query);
		
		$query = "INSERT INTO `Alumno_Materia` (`idAlumno`,`idMateria`,`Regular`,`Aprobada`) VALUES (".$campo['idAlumno'].",0,1,1)";
		//echo $query;
		$result = @mysql_query($query);
		
		}
	}
	
	function alta_materia_alumno($Legajo,$Materia){
	   $con = new DBManager;
	   if($con->conectar()==true){
		
		
		/*echo $result;
			if (!$result){
			   echo 'Error get_tiempo';
			}else{*/
				$query = "select idAlumno from Alumno where Legajo = ".$Legajo."";
				$result = @mysql_query($query);
		/*
					if (!$result){
					   echo 'Error get_tiempo';
					}else{*/
						$campo = mysql_fetch_array($result);
						//echo $campo['idAlumno'];
						/*
					}
				
			}*/
			
			//$query = "INSERT INTO CorridaLog(fecha,idLog,ip) VALUES (CURRENT_TIMESTAMP,1, '".$_SERVER['REMOTE_ADDR']."')";
		
		
		
		
		$query = "INSERT INTO `Alumno_Materia` (`idAlumno`,`idMateria`,`Regular`,`Aprobada`) VALUES (".$campo['idAlumno'].",".$Materia.",1,1)";
		//echo $query;
		$result = @mysql_query($query);
		
		}
	}
	
	
	function get_corrida_ins(){
	   $con = new DBManager;
	   if($con->conectar()==true){
		
		$query = "INSERT INTO CorridaLog(fecha,idLog,ip) VALUES (CURRENT_TIMESTAMP,1, '".$_SERVER['REMOTE_ADDR']."')";
		$result = @mysql_query($query);
		/*echo $result;
			if (!$result){
			   echo 'Error get_tiempo';
			}else{*/
				$query = "select MAX(idCorridaLog) as idCorridaLog from CorridaLog";
				$result = @mysql_query($query);
		/*
					if (!$result){
					   echo 'Error get_tiempo';
					}else{*/
						$campo = mysql_fetch_array($result);
						echo $campo['idCorridaLog'];/*
					}
				
			}*/
		}
	}
	
	
	
	function get_carreras(){
	   $con = new DBManager;
	   if($con->conectar()==true){
		
		$query = "select * from Carrera";
		$result = @mysql_query($query);
		
			if (!$result){
			   echo 'Error get_carreras';
			}else{
				return $result;
			}
		}
	}
	
	function get_alumnos_carrera($idCarrera){
	   $con = new DBManager;
	   if($con->conectar()==true){
		
		$query = "select CONCAT(a.Nombre,' ',a.Apellido) as NombreApellido,a.* from Carrera c,Plandeestudio p, Alumno_Plan ap,Alumno a 
where  c.idCarrera = p.idCarrera 
and ap.idPlandeestudio = p.idPlandeestudio 
and ap.idAlumno = a.idAlumno
and c.idCarrera = ".$idCarrera." order by 2";
		
		
		
		$result = @mysql_query($query);
		
			if (!$result){
			   echo 'Error get_alumnos_carrera';
			}else{
				
				return $result;
			}
		}
	}
	
	function get_materias_carrera($idCarrera){
	   $con = new DBManager;
	   if($con->conectar()==true){
		
		$query = "select m.* from Carrera c,Plandeestudio p, Materia_Plan mp,Materia m 
					where  c.idCarrera = p.idCarrera 
					and mp.idPlandeestudio = p.idPlandeestudio 
					and mp.idMateria = m.idMateria
					and c.idCarrera = ".$idCarrera."
					order by m.idMateria					";
		
		
		
		$result = @mysql_query($query);
		
			if (!$result){
			   echo 'Error get_materias_carrera';
			}else{
				
				return $result;
			}
		}
	}
	
	
	
	function get_alumnos_legajo($Legajo){
	   $con = new DBManager;
	   if($con->conectar()==true){
		
		$query = "select Legajo,Concat(Apellido,' ',Nombre) as Nombre from Alumno where Legajo = ".$Legajo." order by 2";
		
		
		
		$result = @mysql_query($query);
		
			if (!$result){
			   echo 'Error get_alumnos_legajo';
			}else{
				
				return $result;
			}
		}
	}
	
	function get_alumnos_legajodni($Legajo,$Dni){
	   $con = new DBManager;
	   if($con->conectar()==true){
		
		$query = "select Legajo,Documento,Apellido,Nombre from Alumno where Legajo = ".$Legajo." and Documento = ".$Dni." order by 2";
		
		
		
		$result = @mysql_query($query);
		
			if (!$result){
			   echo 'Error get_alumnos_legajodni';
			}else{
				
				return $result;
			}
		}
	}
	
	function get_oferta(){
	   $con = new DBManager;
	   if($con->conectar()==true){
		
		$query = "select 
					a.Año as Year,a.Cuatrimestre,
					/*c.idComision,*/
					c.NumeroReferencia as NumComision,
					c.idMateria as NumMateria,
					m.Nombre,
					m.CargaHoraria,
					ds.DiaSemana,
					sh.HoraDesde as Desde,
					sh.HoraHasta as Hasta,
					s.Nombre as Sede,
					au.Descripcion as Aula

					from Comision c, 
								  Materia m,
								  Comision_Horario ch,
								  Horario_Semana hs,
								  SegmentoHorario sh,
								  DiaSemana ds,
								  AñoCuatrimestre a,
								  Aula_Sede us,
								  Aula au,
								  Sede s
					where m.idMateria = c.idMateria 
					  and ch.idComision = c.idComision
					  and hs.idHorario_Semana = ch.idHorario_Semana
					  and hs.idSegmentoHorario = sh.idSegmentoHorario
					  and hs.idDiaSemana = ds.idDiaSemana
					  and a.idAñoCuatrimestre = c.idAñoCuatrimestre
					  and us.idAula_Sede = ch.idAula_Sede
					  and au.idAula = us.idAula
					  and s.idSede = us.idSede";
		$result = @mysql_query($query);
		
			if (!$result){
			   echo 'Error get_carreras';
			}else{
				return $result;
			}
		}
	}
 
 }
?>