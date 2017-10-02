<?php

include_once './config.php';
include_once 'libs/SoapCbrClient.php';

$objSoapCbr = new SoapCbrClient(BANK_WSDL);

$date = $_POST['dateCbr'];
$curs = $objSoapCbr -> getCurs($date);
//var_dump($curs);

include_once './templates/tmpl_index.php';


?>