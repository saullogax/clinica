<? 
//Emailer2.php es recomendado para usarse con mail de php (es mas seguro) 
$correo=$_GET[correo];
$nom=$_GET[nombre];
$m2=$_GET['mensaje'];
// <img border="0" src="http://fs5.directupload.net/images/160429/temp/a4kowgs2.png" /> 
$m1='<html><head></head><body>';
$m1.="<font color='Blue' size='4'>Recordatorio GEAIE </font><br><hr>Hola<b> ".$nom."!</b><br> Le recordamos una actividad que tiene asignada:<br><br><b>";
$men=$m1.$m2."</b></body></html>";
 $from=$nom."<testing@gmail.com>";      
            $headersfrom='';
            $headersfrom .= 'MIME-Version: 1.0' . "\r\n";
            $headersfrom .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headersfrom .= 'From: '.$from.' '. "\r\n";

if (mail($correo,"Recordatorio GEAIE",$men,$headersfrom))
{
 echo "Recordatorio se ha enviado....<META HTTP-EQUIV='Refresh' CONTENT='1; URL=../recordatorios.php'> "; 
}
else echo "Error"; 

// se recordo m2  a nom
?>

