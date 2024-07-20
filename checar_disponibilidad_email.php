<?php 
require('conexion.php');

function is_valid_email($str)
{
  $matches = null;
  return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
}

sleep(1);
$email = $_POST["email"];
filter_var($email,FILTER_SANITIZE_EMAIL);
if (!is_valid_email($email)) {    
	echo '<div class="alert alert-danger"><strong>Error: </strong>Correo no Válido</div>';  
}
else
{ 
    $result = $conn->query('SELECT * FROM pacientes WHERE email = "'.(string)strtolower($email).'"'); 
    if ($result->num_rows > 0) {
        echo '<div class="alert alert-danger"><strong>Oh no!</strong> Correo no elegible.</div>';
    } else {
        echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> Correo elegible.</div>';
    }
}
?>