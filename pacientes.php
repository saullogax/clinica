<html>
<head>  
 <title>Registro de Pacientes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="js/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" src="js/formoid-solid-purple.js"></script> -->
  <link rel="stylesheet" href="css/estiloclinica.css">
  
   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>  
  
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {	
		$('#ema').on('blur', function() {
			$('#result-ema').html('<img src="imagenes/loader.gif" />').fadeOut(1000);
	 
			var email = $(this).val();		
			var dataString = 'email='+email;
	 
			$.ajax({
				type: "POST",
				url: "checar_disponibilidad_email.php",
				data: dataString,
				success: function(data) {
					$('#result-ema').fadeIn(1000).html(data);
				}
			});
		});              
	});    
	</script>

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
	date_default_timezone_set('America/Los_Angeles');
	$fechaActual = date('Y-m-d H:i:s');
	$sql1="select max(idp) as sig from pacientes"; 
	if($resul=mysqli_query($conn,$sql1) )
	{ 
		while ($row=mysqli_fetch_array($resul))
		{
			$idp = $row[sig]+1;
		}
	}
	if (!$idp ) $idp =1; 
	$nom=$_POST['nom'];
	if (!isset($nom))
	{	  
	?>
			<div class="container-fluid">
			  <h3>Registro de Pacientes</h3>
			  <form class="frm" action="" name="f1" method="post"  enctype="multipart/form-data" onsubmit="return comprobarClave();">
				<label for="idd">ID_Paciente: <b><?php echo $idp;?></b></label><br>
				<label for="nom">*Nombre:</label> <input type="text" name="nom" required/>
				<label for="dir">Dirección:</label> <input type="text" name="dir"  />	
				<label for="tel">*Tel(UserID):</label> <input type="tel" name="tel" placeholder="10 numeros sin espacios" maxlength="10" required/>
				<label for="email">Email:</label> <input type="email"  id="ema" name="ema" value="@"/>
				<div id="result-ema"></div>				
				<label for="cla">*Password:</label> <input type="password" name="cla" placeholder="******" required/>
				<label for="cla2">* Reescriba Password:</label> <input type="password" name="cla2" placeholder="******" required />
				<label for="sexo">Sexo:</label>&nbsp;&nbsp;&nbsp;<input type="radio" name="sex" value="M">Masculino  &nbsp;&nbsp;<input type="radio" name="sex" value="F" />Femenino <br>
				<label for="esc">Estudié en...:</label> <input type="text" name="esc"  />				
				<label for="eda">Edad:</label> <br>
				<input type="value" name="eda"  />	 <br>			 							
				<label for="edo">Edo. Civil:</label>&nbsp;&nbsp<input type="radio" name="edo" value="S">Soltero/a &nbsp; <input type="radio" name="edo" value="C">Casado/a &nbsp; <input type="radio" name="edo" value="L">U. Libre 	
				<label for="date">Fecha de Nacim.:</label> <input type="date" name="fechan" placeholder="DD/MM/YYYY" /> 				
				<label for="est">Ocupación:&nbsp; &nbsp;</label> 
				<input type="radio" name="tipo" value="EST">Estudiante  <input type="radio" name="tipo" value="TRA" />Empleado <br>	
				<div class="element-file"  title="Send file" >
					<label class="title">
						<div class="item-cont">
							<label class="large" >
								<div class="button">Seleccione o tómese una Foto</div>
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
			$dir=$_POST['dir'];
			$tel=$_POST['tel'];	
			$ema=$_POST['ema'];					
			$cla=$_POST['cla'];			
			$sex=$_POST['sex'];	
			$esc=$_POST['esc'];	
			$eda=$_POST['eda'];	
			$edo=$_POST['edo'];	
			$fechan=$_POST['fechan'];			 	
			$tipo=$_POST['tipo'];			 
			$estatus='A';
			$observ="-.-";	
			
			// obtener pw
			$file = fopen("../test.rar", "r") or exit("No se pudo abrir archivo!");					
			while(!feof($file))
			{
			  $pw=base64_decode(fgets($file));
			}
			fclose($file);
			
			// generando keycode para validar email
			$web="sagea.online/ceesdent";
			$keycode = md5(rand(0,1000));				
			$accion = "insert into pacientes values ($idp,'".$nom."','".$dir."','".$tel."','".sha1($cla)."','".$ema."','".$sex."','".$esc."','".$eda."','".$edo."','".$fechan."','".$fechaActual."','".$tipo."','".basename( $_FILES['file']['name'])."','I','".$observ."','".$keycode."')";
			$resul = mysqli_query($conn,$accion);
			
			$archivo = fopen('..\test.txt','r');
			while ($linea = fgets($archivo)) 
			{
				$cla=substr(base64_decode($linea), 5);  								
			}
			fclose($archivo);			
			if ($resul) 
			{				
				if (mysqli_affected_rows($conn)>0) 
				{	
					//---- Enviar email con clase phpmailer					
					require_once("email/phpmailer.php");
					$mail  = new PHPMailer();
					$mail->IsSMTP();
					$mail->SMTPAuth   = true;          // enable SMTP authentication
					$mail->SMTPSecure = "ssl";         // sets the prefix to the servier					 
					$mail->Host       = "smtp.gmail.com";      // Servidor
					$mail->Port       = "465";     // Puerto
					$mail->Username   = "profeferudeo@gmail.com";    // Usuario Email
					$mail->Password   =  $cla;    // password
					$mail->From       = "profeferudeo@gmail.com";  //aquí colocas el correo que quieras					 
					$mail->FromName   = "profefer";
					$body ="<br/><br/>Hola $nom.<br><hr>Te has registrado en http://$web y para activar tu cuenta necesitas accesar en esta url: http://$web/v.php?email=$ema&keycode=$keycode";
					$mail->AddAddress($ema, $nom);  
					$mail->Subject  = "Confirme su Registro en CEESDENT";
					$mail->AltBody    = "Para ver el mensaje, por favor use un visor de email HTML compatible!"; // variable opcional
					$mail->WordWrap   = 50; // set word wrap 
					$mail->MsgHTML("<font color='blue' size='4'>".$body."</font>"); 
					$mail->IsHTML(true); // send as HTML 
					if(!$mail->Send()) 
					{ 
					$msg = "Mailer Error: " . $mail->ErrorInfo; 
					} 
					else
					 { 
					$msg = "Confirmación enviada con éxito.  "; 
					} 
					// fin de  envio de Email  
					echo "Registrado con Éxito. <br/>";						
					if ($b)
					{							
						if ($_FILES["file"]['type']=="image/png" || $_FILES["file"]['type']=="image/jpg" || $_FILES["file"]['type']=="image/jpeg") 
						{
							$target_path = "imagenes/pacientes/";							 
							$target_path = $target_path.basename( $_FILES['file']['name']); 
							if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path))
								echo "Su Foto(". basename( $_FILES['file']['name']).")";
							  else					 
								echo "Error con el archivo (". basename( $_FILES['file']['name']).")" ;					   
						}							 						
					}
					else
						echo "(sin Fotografía!)";  		
				}
				else
				echo "No se pudo Registrar! ";
			}				
			echo "<br>Le hemos enviado un enlace a su correo para que pueda activar su cuenta<br>Dé clic en dicho enlace para validar su registro en CEESDENT.<br><a href='index.html'>Accesar a CEESDENT</a>";
		 
				
		}			
		else
		{
			echo "Nombre de paceinte demasiado corto! <br><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);'>";
		}
}		
?>
</html>