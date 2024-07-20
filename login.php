<html>
<head>  
 <title>Acceso a CEESDENT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="js/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!--  <script type="text/javascript" src="js/formoid-solid-purple.js"></script>  -->
	
  <link rel="stylesheet" href="css/estiloclinica.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> 
   
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
session_start();
	require_once "conexion.php";		
	$ema=$_POST['ema'];
	$b=false;
	if (!isset($ema) )
	{	  
	?><div class="container-fluid">			  
		<form class="frm" action="" name="f1" method="post"  enctype="multipart/form-data">
		<br><br><h4>Acceso al sistema</h4>				
		<label for="email">Email:</label> <input type="email"  id="ema" name="ema" value="@"/ autofocus required>
		<label for="clave">Contraseña:</label> <input type="password"   name="cla" required>
		<center><button>Accesar</button></center>
		</div>
		</form>
		</div>
		</body> 
	 <?php
	}
	else
	{		 				
			$cla=sha1($_POST['cla']);				 			
			$accion = "select * from pacientes where email='$ema' and clave='".$cla."'";			 		
			$resul = mysqli_query($conn,$accion);
			while ($row=mysqli_fetch_array($resul))
			{				 
				$nom = $row[nombre];
				$idp = $row[idp];
				$b=true;			   
			}
			if ($b)
			{
				$_SESSION["user"] = $nom;
				$_SESSION["id"] = $idp;
				echo "Bienvenido ".$nom.".";
				echo"<META HTTP-EQUIV='Refresh'  CONTENT='0;URL=indexs.php'>";				
			}
			else 
			{
				$accion = "select * from doctores where email='$ema' and clave='".$cla."'";			 		
				$resul = mysqli_query($conn,$accion);
				while ($row=mysqli_fetch_array($resul))
				{				 
					$nom = $row[nombre];
					$idd = $row[idd];
					$b=true;			   
				}
				if ($b)
				{
					$_SESSION["user"] = $nom;
					$_SESSION["id"] = $idd;
					echo "Bienvenido ".$nom.".";
					echo"<META HTTP-EQUIV='Refresh'  CONTENT='0;URL=exped.php'>";				
				}
			}	
				echo "Usuario no Registrado";
}		
?>
</html>