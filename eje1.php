<?php 
//Descripcion: ejercicio #1 para el calculo de pagos por retiro
//Autor: Yakelin Castro  version 2.0  
if (isset($_POST["nombre"])) {
	date_default_timezone_set("America/El_Salvador");
	require_once("nusoap/lib/nusoap.php");
	$wsdl="http://localhost/yaki/ws.php?wsdl";
	$client=new nusoap_client($wsdl,"wsdl");
	$err=$client->getError();
	if ($err) {
		echo "<h1>Error de conexion</h1>";
		exit(0);
	}
	$parametros=array("nombre"=>$_POST["nombre"],"cargo"=>$_POST["cargo"], "sueldo"=>$_POST["sueldo"], "tiempo"=>$_POST["tiempo"],"giro"=>$_POST["giro"]);

	$result=$client->call("pago",$parametros);
	echo $client->getError();
	print_r($result);
}else {
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Ejercicio 1</title>
</head>
<body>
	<form method="post" >
		<h1 align="center">Pago por retiros</h1>
    <br>
    <table align="center" >
      <div >
       <thead>
        <tr>
            <th> Nombre:</th>
            <th><input type="text" name="nombre"></th>
  
        </tr>
         <tr>
            <th> Cargo:</th>
            <th> <input type="text" name="cargo"></th>
  
        </tr>
        <tr>
            <th> Sueldo:</th>
            <th> <input type="text" name="sueldo"></th>
  
        </tr>
        <tr>
            <th> Año:</th>
            <th> <input type="text" name="tiempo"></th>
  
        </tr>
        <tr>
            <th> Giro:</th>
            <th> <input type="text" name="giro"></th>
  
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