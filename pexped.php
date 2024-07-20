<?
session_start();
$doc=$_POST['idd'];
$idp=$_POST['idp'];
$obs=$_POST['obs'];
$file=$_POST['file'];
$est=$_POST['estatus'];
$b=basename( $_FILES['file']['name']);	


echo $doc."<br>";
echo $idp."<br>";
echo $obs."<br>";
echo $est."<br>";
echo $file."<br>";

if ($b)
					{							
						if ($_FILES["file"]['type']=="image/png" || $_FILES["file"]['type']=="image/jpg" || $_FILES["file"]['type']=="image/jpeg") 
						{
							$target_path = "imagenes/expedientes/";							 
							$target_path = $target_path.basename( $_FILES['file']['name']); 
							if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path))
								echo "Imagen(". basename( $_FILES['file']['name']).")";
							  else					 
								echo "Error con el archivo (". basename( $_FILES['file']['name']).")" ;					   
						}							 						
					}
					else
						echo "(Sin Imagen!) <META HTTP-EQUIV='Refresh'  CONTENT='3;URL=exped.php'>";	
?>
