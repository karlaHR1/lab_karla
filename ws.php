<?php
date_default_timezone_set("America/El_Salvador");
require_once("nusoap/lib/nusoap.php");
$server=new nusoap_server;
$server->configureWSDL('server','urn:server');
$server->wsdl->schemaTargetNamespace='urn:server';
//datos para el ej1
$server->register('hola',
		array('usuario'=>'xsd:string','cargo'=>'xsd:string','sueldo'=>'xsd:int','anio'=>'xsd:int','giro'=>'xsd:string'),
		array('return'=>'xsd:string'),
		'urn:server',
		'urn:server#holaServer',
		'rpc',
		'encoded',
		'Funcion hola mundo');
//datos para el eje2
$server->register('iva',

        array('codigo'=>'xsd:int','nombre'=>'xsd:string','precio'=>'xsd:float','iva'=>'xsd:float','total'=>'xsd:float'),
        array('return'=>'xsd:string'),
        'urn:server',
        'urn:server#ivaServer',
        'rpc',
        'encoded',
        'Funcion calculo iva');


function hola($usuario,$cargo,$sueldo,$anio,$giro) {
	return "<table border='1' class='table table-responsive table-hover'>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Sueldo</th>
            <th>Años</th>
            <th>Giro de la empresa</th>
        </tr>
        <tr>
            <th>$usuario</th>
            <th>$cargo</th>
            <th>$sueldo</th>
            <th>$anio</th>
            <th>$giro</th>
        </tr>
    </thead>
    </table>";

}

function iva($codigo,$nombre,$precio,$iva,$total) {
$iva=0.13*$precio;
$total=$precio+$iva;
    return "<table border='1' class='table table-responsive table-hover'>
    <thead>
        <tr>
            <th>Codigo producto</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>IVA</th>
            <th>Total</th>
        </tr>
        <tr>
            <th>$codigo</th>
            <th>$nombre</th>
            <th>$precio</th>
            <th>$iva</th>
            <th>$total</th>
        </tr>
    </thead>
    </table>";

}

$HTTP_RAW_POST_DATA=isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : "";
//$server->service($HTTP_RAW_POST_DATA);
$server->service(file_get_contents("php://input"));
?>