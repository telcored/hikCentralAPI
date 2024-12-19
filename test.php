<?php

include "helper.php";



$mode = "test"; //valor "prod" para produccion, "test para pruebas"

$Cla            = new CurlRequest();
$Cla->apiKey    = "4c1734a1-296a-4bf1-8752-0d2c37392513";
$Cla->accessKey = "fffafddb-d4a5-45c9-a681-c4eb8c8e6296";
$Cla->urlQuery  = 'https://intcomex-' . $mode . '.apigee.net/v1/getcatalog';

var_dump($Cla->getRequest());
