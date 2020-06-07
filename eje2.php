<?php 
//autor: yakein castro 
//Descripcion: ejercicio #2 para el calculo del iva de un producto
if (isset($_POST["codigo"])) {
	date_default_timezone_set("America/El_Salvador");
	require_once("nusoap/lib/nusoap.php");
	$wsdl="http://localhost/yaki/ws.php?wsdl";
	$client=new nusoap_client($wsdl,"wsdl");
	$err=$client->getError();
	if ($err) {
		echo "<h1>Error de conexion</h1>";
		exit(0);
	}
	$parametros=array("codigo"=>$_POST["codigo"],"nombre"=>$_POST["nombre"], "precio"=>$_POST["precio"]);

	$result=$client->call("calc",$parametros);
	echo $client->getError();
	print_r($result);
}else {

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Ejericio 2</title>
</head>
<body>
	<form method="post" >
		<h1 align="center">Productos con iva</h1>
    <br>
    <table align="center" >
      <div >
       <thead>
        <tr>
            <th> Codigo:</th>
            <th><input type="text" name="codigo"></th>
  
        </tr>
         <tr>
            <th> Nombre:</th>
            <th> <input type="text" name="nombre"></th>
  
        </tr>
        <tr>
            <th> Precio:</th>
            <th> <input type="text" name="precio"></th>
  
        </tr>
      
    </thead>
</table>
  </div>
  <br>
    <div align="center">
  <button type="submit" class="btn btn-primary" >Enviar</button>
</div>
</form>

</body>
</html>
<?php
}
?>