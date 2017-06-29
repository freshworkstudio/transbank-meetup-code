<?php

use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;

include 'vendor/autoload.php';

//Get a certificationBag with certificates and private key of WebpayNormal for integration environment.
$bag = CertificationBagFactory::integrationWebpayNormal();

$plus = TransbankServiceFactory::normal($bag);

//Para transacciones normales, solo se puede añadir una linea de detalle de transacción.
$plus->addTransactionDetail(10000, 'Orden1'); //Amount and BuyOrder

$response = $plus->initTransaction('http://transbank-demo.dev/response.php', 'http://transbank-demo.dev/finish.php');

echo RedirectorHelper::redirectHTML($response->url, $response->token);