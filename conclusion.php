<?php
session_start();
?>
<head>  
 <title>Registro de Doctores</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" href="css/estiloclinica.css">  
  <script> 
	function comprobarClave(){ 
		clave1 = document.f1.cla.value 
		clave2 = document.f1.cla2.value 

		if (clave1 != clave2) 			 
		{
			alert("El password reescrito no es igual al primero...") 
			document.f1.cla2.value="";
			document.f1.cla2.focus();
			return false;
		}
		else
			return true;		 
	} 
</script> 
<style>	
body, html{
	margin:0;
	padding:0;
	width:100%;
	height:100%;
	position:relative;	
}
.frm{
	border:1px solid #E1E1E1;
	border-radius:5px;
	padding:17px;
	width:380px;
	background-color:lightblue;	 
	position:absolute;
	top:50%;
	left:50%;
	transform:translate(-50%,-30%);
}
@media(max-width:400px){
	 .frm
	 {
		 width:90%;		 
	 }
}
</style>	
</head>
<body> 
<?  
$idc=$_POST[idc];  //cita
$idp=$_POST[idp];  // paciente
$idd=$_POST[idd];  //doctor
require_once "conexion.php"; 
if (!isset($idd))
{ 	
	// obtiene indice de cita		 
	$sql2="select max(idc) as sig from citas"; 
	if($resul=mysqli_query($conn,$sql2) )
	{ 
		while ($row=mysqli_fetch_array($resul))
		{
			$idc = $row[sig]+1;			
		}
	}
	if (!$idc ) $idc =1;  
	?>	 		
	<div class="container-fluid">
		<h3>Nueva Cita</h3>
		<form class="frm" action="" name="f1" method="post">	
			<input type="hidden"  name="idc" value="<? echo $idc; ?>" />
			<label for="idp" >* Paciente:</label> <input type="text"  name="idp" value="<? echo $_SESSION['user']; ?>" disabled  />					      			
			<label for="idd">* Doctor:</label> 
			<select name="idd" onchange="getComboA(this)">
				<option value="">Seleccione Doctor</option>
				<?php 	
					require_once "conexion.php"; 
					$sql2="select * from doctores"; 					 
					if($resul=mysqli_query($conn,$sql2) )
					{ 				
						while ($row=mysqli_fetch_array($resul))
						{	 
						?>
						<OPTION value="<?php echo $row[0];?>"><?php echo $row[1]; ?></OPTION>
						<?							 
						}
					} 	
				?>
			</select>
			<center><input type="submit" value="Hacer una Cita"></center>
		</form>
	</div>
</body> 
<?php
}
else
{	
	$sql3="select nombre from doctores where idd=$idd"; 
	if($resul3=mysqli_query($conn,$sql3) )
	{ 
		while ($row3=mysqli_fetch_array($resul3))
		{
			$nd = $row3[nombre];
		}
	}					
	echo "<form class='frm' action='pcita.php' name='f2'method='post'>";	
	echo "<input type='hidden' name='idc' value='<? echo $idc; ?>' />";
	echo "<div class='container-fluid'>";
	echo "<h3>Nueva Cita</h3>";
	echo "<font size='4'>";
    echo " Folio de Cita:<b><font color='red'>".$idc."</font></b><br> <input type='hidden' name='idc' value='$idc'>";
	echo "        Médico:<b><font color='red'>".$nd." </font></b><br> <input type='hidden' name='idd' value='$idd'>";
	echo "     Paciente:<b><font color='red'>".$_SESSION['user']."</font></b><br></font><hr>";
	echo "<input type='hidden' name='idp' value='$_SESSION[id]'>";
?>
	<label for="fec"> Fecha:</label><input type="date" name="fec" required />	
	<label for="hor">  Hora:</label><input type="time" name="hor" required/>		
	<label for="des">Descripción:</label><br>
	<textarea name="des" style="width: 100%; height: 60px;"  /></textarea>
	<label for="rec">No. de Recordatorios:</label>
	<select style="width: 60%; height: 40px;background-color:white;" name="rec">
		<option value="1">Uno</option>
		<option value="2">Dos</option>
		<option value="3">Tres</option>		
		</select>
	<center><button>Guardar</button></center>
		</form>
		</pre>
<?	
	}
?> 
				
		 
		 

