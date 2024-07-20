<!-- listado.php-->
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   
	
	
	<link rel="stylesheet" href="css/jquery.dataTables.min.css"></script>
	 
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>	

	
</head>
<?php
echo "<body>";
$mysqli = new mysqli("127.0.0.1", "root", "12345678", "clinicaweb");
 
if ($mysqli === false){
	die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
} 
//idc	idp	idd	fecha	hora	estado	descripcion	recordatorios
$sql = "select citas.idc,pacientes.nombre as Paciente,doctores.nombre as Doctor, DATE_FORMAT(citas.fecha,'%d/%m/%Y') AS fecha ,citas.hora,citas.estado,citas.descripcion,citas.recordatorios from ((citas  
INNER JOIN doctores ON citas.idd = doctores.idd) 
INNER JOIN pacientes ON citas.idp=pacientes.idp)";
if ($result = $mysqli->query($sql) ){
	if ($result->num_rows > 0 ){
		echo "<center><h2>Reporte General de Citas</h2></center>";
       echo "<div class='container'> <div class='table-responsive-sm'><table class='display AllDataTables'>
	   
	    <thead><tr><th>Folio</th><th>Paciente</th><th>Doctor</th><th>Fecha</th><th>Hora</th><th>Estado</th><th>Descripción</th></tr></thead> <tbody>";
		while($row = $result->fetch_array() ){
			echo "<tr><td>".$row[0]."</td><td>".trim($row[1])."</td><td>".trim($row[2])."</td><td>".trim($row[3])."</td><td>".trim($row[4])."</td><td>".trim($row[5])."</td><td>".trim($row[6])."</td></tr>";
		}
		echo "</tbody> </table>";
		$result->close();
	} else {
		echo "NO hay artículos.";
	} 
} else {
	echo "Error: No fue posible ejecutar la consulta $sql ". $mysqli->error;
}
$mysqli->close();
echo "<script> $(document).ready( function () { $('.AllDataTables').DataTable(); } );</script></body>";
?>
