<!--172.16.69.142/doctores.php    y    wifi: http://10.10.23.243/listadocitas.txt   -->

<html>
<head>  
 <title>Registro de Doctores</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="js/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" src="js/formoid-solid-purple.js"></script> -->
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
<?php
require_once "conexion.php";	
	$sql1="select max(idd) as sig from doctores"; 
	if($resul=mysqli_query($conn,$sql1) )
	{ 
		while ($row=mysqli_fetch_array($resul))
		{
			$idd = $row[sig]+1;
		}
	}
	if (!$idd ) $idd =1; 
	$nom=$_POST['nom'];
	if (!isset($nom))
	{	  
	?>
			<div class="container-fluid">
			  <h3>Registro de Doctores</h3>
			  <form class="frm" action="" name="f1" method="post"  enctype="multipart/form-data" onsubmit="return comprobarClave();">
					<label for="idd">UserID: <b><?php echo $idd;?></b></label><br>
					<label for="nom">*Nombre:</label> <input type="text" name="nom" required autofocus/>				
					<label for="dir">Dirección:</label> <input type="text" name="dir" />		
					<label for="tel">*Tel:</label> <input type="tel" name="tel" placeholder="10 numeros sin espacios" maxlength="10" required/>				
					<label for="email">Email:</label> <input type="email" name="ema" value=" @ "/>
					<label for="cla">*Password:</label> <input type="password" name="cla" placeholder="******" required/>
					<label for="cla">* Reescriba Password:</label> <input type="password" name="cla2" placeholder="******" required />
					<label for="esp">Especialidad:</label> <input type="text" name="esp" placeholder="Ortodoncia" />
					<div class="element-file"  title="Send file" >
						<label class="title">
							<div class="item-cont">
								<label class="large" >
									<div class="button">Suba la Foto</div>
									<input type="file" class="file_input" name="file" style="color: transparent"/>			 
									<span class="icon-place"></span>
								</label>
							</div>
						</label> 
					</div> 				 
					<center><button>Enviar datos</button></center>
					</div>
				</form>
			</div>
			</body> 
	 <?php
	}
	else
	{
		if (strlen($nom)>2)
		{
			$b=basename( $_FILES['file']['name']);				 
			$nom=$_POST['nom'];		
			$esp=$_POST['esp'];
			$dir=$_POST['dir'];
			$tel=$_POST['tel'];
			$cla=$_POST['cla'];
			$ema=$_POST['ema'];					 
			$accion = "INSERT INTO doctores VALUES ($idd,'".$nom."', '".$esp."', '".$dir."', '".$tel."', '".sha1($cla)."', '".$ema."', '". basename( $_FILES['file']['name'])."')";	 
			$resul = mysqli_query($conn,$accion);
			if ($resul) 
			{				
				if (mysqli_affected_rows($conn)>0) 
				{			
				    echo "Registrado con Éxito. <br/>";	 				   
					if ($b)
					{							
						if ($_FILES["file"]['type']=="image/png" || $_FILES["file"]['type']=="image/jpg" || $_FILES["file"]['type']=="image/jpeg") 
						{
							$target_path = "imagenes/doctores/";							 
							$target_path = $target_path.basename( $_FILES['file']['name']); 
							if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path))
								echo "Su Foto(". basename( $_FILES['file']['name']).")";
							  else					 
								echo "Error con el archivo (". basename( $_FILES['file']['name']).")" ;					   
						}							 						
					}
					else
						echo "(sin Fotografía!) <META HTTP-EQUIV='Refresh'  CONTENT='3;URL=doctores.php'>";		
				}
				else
				echo "No se pudo Registrar! ";
			}				
			echo "<META HTTP-EQUIV='Refresh' CONTENT='3;URL=doctores.php'>";
		}			
		else
		{
			echo "Nombre de doctor demasiado corto! <br><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);'>";
		}
}		
?>
</html>