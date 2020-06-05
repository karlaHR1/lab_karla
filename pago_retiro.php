<?php 
//ejercicio para calcular pagos
if (isset($_POST["usuario"])) {
	date_default_timezone_set("America/El_Salvador");
	require_once("nusoap/lib/nusoap.php");
	$wsdl="http://localhost/lab_karla/ws.php?wsdl";
	$client=new nusoap_client($wsdl,"wsdl");
	$err=$client->getError();
	if ($err) {
		echo "<h1>Error de conexion</h1>";
		exit(0);
	}
	$parametros=array("usuario"=>$_POST["usuario"],"cargo"=>$_POST["cargo"], "sueldo"=>$_POST["sueldo"], "anio"=>$_POST["anio"],"giro"=>$_POST["giro"]);

	$result=$client->call("hola",$parametros);
	echo $client->getError();
	print_r($result);
}else {
  //formulario para capturar datos
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>PAGO DE RETIROS</title>
</head>
<body>
	<form method="post" >
		<h1 align="center">PAGO DE RETIROS DE EMPLEADOS</h1>
    <br>
    <table align="center" >
      <div >
       <thead>
        <tr>
            <th> Nombre:</th>
            <th><input type="text" name="usuario"></th>
  
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
            <th> <input type="text" name="anio"></th>
  
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