<?
//idc	idp	idd	fecha	hora	estado	descripcion	recordatorios
$idc=$_POST[idc];
$idp=$_POST[idp];
$idd=$_POST[idd];

$fec=$_POST[fec];
$hor=$_POST[hor];
$est=$_POST[est];
$des=$_POST[des];
$rec=$_POST[rec];
require_once "conexion.php"; 
if ($idc)
{
	$estado="P"; // P=Pendiente, A=Atendida y C=Cancelada 
$accion = "Insert into citas values('$idc', '$idp', '$idd', '$fec', '$hor', '$estado', '$des', '$rec')"; 
echo $accion;	 
$consulta = mysqli_query($conn,$accion);
if ($consulta) 
	{	 	
		if (mysqli_affected_rows($conn)>0) 
			{	
			      echo "Cita Agendada correctamente!";
			}
			else
			{ 
				echo "Error al guardar la cita!!";
			}
	}
}	
echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=citas.php">';
	
?>