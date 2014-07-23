<?php
	@session_start(); 
	include('conectar.php'); 
	$c = Conectarse();
	include('connections/localhost.php');
	
	//if($_SESSION['usuario']){
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
  	<link href="style/bootstrap.css" rel="stylesheet">
  	<link href="style/bootstrap-responsive.css" rel="stylesheet">
  	<link href="style/style.css" rel="stylesheet">
  	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  	<link href="style/estilo.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
        <script>
            
            function cargaSelect(query,idTag){
                $.ajax({
                    url:"ajax/ajax.php",
                    type:"POST",
                    dataType: 'json',
                    data:"sqlQuery="+query,
                    success:function(data){
                        $.each(data,function(index,value) {
                            $(idTag).append("<option id='"+data[index].id+"'>"+data[index].titel+"</option>")
                        });
                    }
                });
            }
            
        </script>
        <title></title>
    <script type="text/javascript" src="js/mysqlwslib.js"></script>
    <script type="text/javascript">
    	function crearTabla(value) {
    		var value = value;
    		var i = 1;
			var j = 1;
    		
    		miTabla = document.createElement("table");
			tbHead = document.createElement("thead");
    		tbBody = document.createElement("tbody");
			
    		tr = document.createElement("tr");
    		//tr2 = document.createElement("tr");
			
    		td1 = document.createElement("th");
    		td2 = document.createElement("th");
    		td3 = document.createElement("th");
    		td4 = document.createElement("th");
    		td5 = document.createElement("th");
    		
    		// atributos para la tabla
    		miTabla.setAttribute("width", "100%");
    		miTabla.setAttribute("border", "0 solid transparent");
    		miTabla.setAttribute("border-collapse", "collapse");
    		miTabla.setAttribute("margin-bottom", "10px");
			miTabla.setAttribute("class", "table");
    		
    		// atributos para la primera celda
    		td1.setAttribute("padding-bottom", "15px");
    		td1.setAttribute("width", "4%");
    		
    		// atributos para la segunda celda
    		td2.setAttribute("width", "32%");
    		
    		// atributos para la tercera celda
    		td3.setAttribute("width", "32%");
    		
    		// atributos para la cuarta celda
    		td4.setAttribute("width", "32%");
    		
    		// atributos para la quinta celda
    		td5.setAttribute("width", "32%");
    		
    		td1.innerHTML = "C&oacute;digo";
    		td2.innerHTML = "Materia";
    		td3.innerHTML = "Lote";
    		td4.innerHTML = "Peso";
    		td5.innerHTML = "Observaciones";
    		
    		tr.appendChild(td1);
    		tr.appendChild(td2);
    		tr.appendChild(td3);
    		tr.appendChild(td4);
    		tr.appendChild(td5);
    		//tr.appendChild(materia);
			
			tbHead.appendChild(tr);
			miTabla.appendChild(tbHead);
			
			while(i<=value){
				var txtmateria = document.createElement("select");
				var opt=document.createElement("option");
				var txtlote = document.createElement("input");
				var txtpeso = document.createElement("input");
				var txtobservacion = document.createElement("input");
				
				
				$(document).ready(function(){
					cargaSelect("<?php echo base64_encode("SELECT id, titel FROM prueba"); ?>","#materia");
					
				});
				
				/*var arrayResult = mysql_select_query ("SELECT * FROM productos");
				//for (j=0; j<=arrayResult.length; j++) {
					//var fila = arrayResult[j];
					//var columna = arrayResult[j][0];
				
					opt.value = "1";
					var txt = document.createTextNode(arrayResult);
					opt.appendChild(txt);
					txtmateria.appendChild(opt);
				//}	*/
											
				codigo = document.createElement("td");
				materia = document.createElement("td");
				lote = document.createElement("td");
				peso = document.createElement("td");
				observacion = document.createElement("td");
				
				codigo.setAttribute("padding-bottom", "15px");
				codigo.setAttribute("width", "4%");
				
    			//var fila = tr + i;
    			
    			fila = document.createElement("tr");
    			finalstring = value + "-" + i;
				
    			materia.setAttribute('width', '32%');
    			txtmateria.setAttribute('name', "materia" + finalstring);
				txtmateria.setAttribute('id', 'materia');
    			materia.appendChild(txtmateria);
				
    			lote.setAttribute('width', '32%');
    			txtlote.setAttribute('name', "lote" + finalstring);
    			lote.appendChild(txtlote);
				
    			peso.setAttribute('width', '32%');
    			txtpeso.setAttribute('name', "peso" + finalstring);
    			peso.appendChild(txtpeso);
				
    			observacion.setAttribute('width', '32%');
    			txtobservacion.setAttribute('name', "observacion" + finalstring);
    			observacion.appendChild(txtobservacion);
				
    			codigo.innerHTML = i;
    			fila.appendChild(codigo);
    			fila.appendChild(materia);
    			fila.appendChild(lote);
    			fila.appendChild(peso);
    			fila.appendChild(observacion);
    			tbBody.appendChild(fila);
    			
    			i++;
    		}
    		
    		
    		
    	 	miTabla.appendChild(tbBody);
    		
    		miCapa = document.getElementById('resultado');
    		miCapa.appendChild(miTabla);
    	}
  	</script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/interface.js"></script>
 
	<link href="style.css" rel="stylesheet" type="text/css" />
  	
	</head>
  <body>
    <label for="numeroMateria">Numero Materias Primas</label>
				<select id="numeroMateria" class="input-block-level" name="numeroMateria" onchange="crearTabla(this.value)">
				<option value="0" style="width:70%" selected disabled>Selecciona</option>
				<?php	
					for($i=1; $i<=36; $i++){
						echo '<option value=' . $i . '>' .$i.'</option>';
					}
				?>
				</select>
	  <div id="resultado"></div>
  </body>
</html>
