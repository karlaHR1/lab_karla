<?php 
//autor: karla Ruano 
//codigo para calcular el iva de un producto
if (isset($_POST["codigo"])) {
	date_default_timezone_set("America/El_Salvador");
	require_once("nusoap/lib/nusoap.php");
	$wsdl="http://localhost/lab_karla/ws.php?wsdl";
	$client=new nusoap_client($wsdl,"wsdl");
	$err=$client->getError();
	if ($err) {
		echo "<h1>Error de conexion</h1>";
		exit(0);
	}
	$parametros=array("codigo"=>$_POST["codigo"],"nombre"=>$_POST["nombre"], "precio"=>$_POST["precio"]);

	$result=$client->call("iva",$parametros);
	echo $client->getError();
	print_r($result);
}else {
  //formulario para ingresar los datos
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>CALCULO IVA</title>
</head>
<body>
	<form method="post" >
		<h1 align="center">CALCULO DE IVA</h1>
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