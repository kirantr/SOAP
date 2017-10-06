<?php

include_once './config.php';
include_once 'libs/SoapCbrClient.php';
include_once 'libs/CurlCbrClient.php';
include_once 'libs/SoapSportClient.php';
include_once 'libs/CurlSportClient.php';

$objSoapCbr = new SoapCbrClient(BANK_WSDL);
$objCurlCbr = new CurlCbrClient();
$objSoapSport = new SoapSportClient(SPORT_WSDL);
$objCurlSport = new CurlSportClient(SPORT_WSDL);

$date = $_POST['dateCbr'];
//$curs = $objSoapCbr -> getData($date);
//$curs = $objCurlCbr -> getData($date);
//$sport = $objSoapSport -> getCities();
$sport = $objCurlSport -> getCities();
//var_dump($curs);

include_once './templates/tmpl_index.php';


?>