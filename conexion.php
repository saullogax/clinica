<?
	$servername="127.0.0.1";
	$username="root";
	$password="rootroot";
	$dbname="clinicaweb";
	$conn=new mysqli ($servername,$username,$password,$dbname);
	if($conn->connect_error)
	{
		die("La conexión falló:".$conn->connect_error);	
	}
?>