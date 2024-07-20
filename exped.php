<?php
session_start();
?>
<html>
<head>  
 <title>Sistema CEESDENT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="js/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" href="css/estiloclinica.css">   
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
.boton_personalizado{
    text-decoration: none;
    padding: 12px;
	padding-left: 10px;
    padding-right: 10px;
	display: inline-block; 
	height: 60px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }  
</style>
</head>
<body> 
<?php 
require_once "conexion.php"; 
?>
 
<div class="container-fluid">
<center> <img src="img/logo.png" alt="" width="330" height="90" /> </center>
			  <center><h3>Actualizar Expediente</h3>	
              <hr style ="width:300px;color:blue;">	              
			   <form class="frm" method="post" action="pexped.php" enctype="multipart/form-data"> 
				   <label><b>Doctor:</b></label><br><? echo $_SESSION[user];?>	<br><br>
				   <input type="hidden" name="idd" value="<? echo $_SESSION[id];?>">
				   <?				   
					date_default_timezone_set('UTC');
				   $accion = "select p.idp,p.nombre from pacientes p, citas c where c.idd=".$_SESSION['id']." and p.idp=c.idp and c.fecha='".date("Y-m-d")."'";			 						  
				   $resul2 = mysqli_query($conn,$accion);
				   ?>			   
				   <b>Paciente Actual:</b><br><select name ="idp">				    
				   <option value='' selected>Seleccione</option>
				   <?				   
					  while($row2=mysqli_fetch_array($resul2))
					  {						 
						  echo "<option value='$row2[idp]'>".$row2[nombre]."</option>";
					  }
				   echo "</select>"; 				   
				   ?><br><br>
				   <b>Observaciones:</b><br><textarea name="obs" rows="5" columns="30"></textarea><br><br>
				   <b>Imagen(es):</b>
				   <div class="element-file"  title="Send file" >
					<label class="title">
						<div class="item-cont">
							<label class="large">						
								<input type="file"  class="file_input" name="file" style="color: transparent;"/>			 
								<span class="icon-place"></span>
							</label>
						</div>
					</label> 
				</div>
				
					<b>Avance:</b><input type="range" list="tickmarks" step="50" name="estatus">
					<datalist id="tickmarks">
					  <option value="0">
					  <option value="50">
					  <option value="100">					  
					</datalist>	<br><br>
					<center><button>Enviar datos</button></center>					
				</form>
			</center>
			</div>

</html>