 	$(document).ready(function(){
		$("#calcular").click(
			function(){
			
			//alert('JS');
				combo1 = document.getElementById('segundoCombo');
		
				//var id = combo1.options[combo1.selectedIndex].value;
				var id = combo1.value;
				//alert(id);
				
				$.ajax(
					{
					data:  {},
					type: "GET",
					dataType: "json",
					url: "CargaOferta.php",
					success: function(data){
						var i = 0;
						var size = data.length;
				
						 //alert("estacion:" + id);
						 //alert("trenes:" + size);
									
						//obtenerEstaciones(id,data);
						
						//alert("Estaciones : " + estaciones.length);
			
						//alert(size);
						//$("div.info").show();
						//for (i = 0; i < size; i++){
						//results(data[i].idTren,data[i].velocidad);
						//calcular(data[i].coordinates);
						//alert(calcular(data[0].coordinates));
						/*				
						var respuesta = calcular(data[i].coordinates,estacioness);
								
								$("div.info").append(" Tren : "+data[i].nTren);
								$("div.info").append(" Tren TBA: "+data[i].idTren);
								$("div.info").append(" Velocidad: "+data[i].velocidad);
								//$("div.info").append(" Distancia: "+ calcular(data[i].coordinates));
								$("div.info").append(" Distancia: "+ respuesta[0] + " km " + respuesta[1] );
								$("div.info").append(" Diferencia: "+data[i].diferencia);
							
							
						}*/
						//restults(data[0]);
						
						var color = "";
						
						if(size > 0){
						
							//alert(size);
						
						var tabla = "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
						tabla = tabla + "<title>Materias Ofertadas</title>";
						tabla = tabla + "<link href='layout01.css' rel='stylesheet' type='text/css' />";
						tabla = tabla + "<link href='styles/sesion.css' rel='stylesheet' type='text/css' />";
						tabla = tabla + "</head><body>";
						
						tabla = tabla + "<img alt='fondo' src='img/bg.png'  id='full-screen-background-image' /><div id='head'><img src='img/logoplanner_small.png' /></div>";
						tabla = tabla + "<div class='ss-form-container'><div class='ss-form-heading'><h1>Materias ofertadas</h1></div>";
						
							//var tabla = "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>Materias por Alumno</title><link href='layout01.css' rel='stylesheet' type='text/css' /></head><body>";
							tabla = tabla + "<table><caption>MATERIAS"; 
							
							tabla = tabla + "</caption><thead><tr><th scope='col'>NumComision</th><th scope='col'>NumMateria</th><th scope='col'>Nombre</th><th scope='col'>CargaHoraria</th><th scope='col'>DiaSemana</th><th scope='col'>Desde</th><th scope='col'>Hasta</th><th scope='col'>Sede</th><th scope='col'>Aula</th></tr></thead><tfoot><tr><td colspan='10'>Compiled by Academic Planner</td></tr></tfoot><tbody>";
							
							//alert(tabla);
							
							for (i = 0; i < size; i++){
							
								tabla = tabla+ "<tr class='odd'>";
														
								tabla = tabla+ "<th scope='row'>"+data[i].NumComision+"</th>";
								//tabla = tabla+ "<td>"+data[i].Cuatrimestre+"</td>";
								//tabla = tabla+ "<td>"+data[i].NumComision+"</td>";
								tabla = tabla+ "<td>"+data[i].NumMateria+"</td>";
								
								tabla = tabla+ "<td>"+data[i].Nombre+"</td>";
								tabla = tabla+ "<td>"+data[i].CargaHoraria+"</td>";
								tabla = tabla+ "<td>"+data[i].DiaSemana+"</td>";
								tabla = tabla+ "<td>"+data[i].Desde+"</td>";
								tabla = tabla+ "<td>"+data[i].Hasta+"</td>";
								
								tabla = tabla+ "<td>"+data[i].Sede+"</td>";
								tabla = tabla+ "<td>"+data[i].Aula+"</td>";
								
								
								

								tabla = tabla+ "</tr>";
							}	
							tabla = tabla + "</tbody></table></div></body></html>";
							//alert(tabla);
							document.write(tabla);
						//}
						
					}	
						
					
						
					},
					error: function(dato){
						alert("ERROR FINAL");
					}
				}
			);
		}
	);
});

