<?php

use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;

include 'vendor/autoload.php';

$bag = CertificationBagFactory::integrationWebpayNormal();
$plus = TransbankServiceFactory::normal($bag);

$response = $plus->getTransactionResult();
//echo '<pre>' . print_r($response, true) . '</pre>';

// Verificar stock, que el monto corresponda, etc...
$plus->acknowledgeTransaction();

//Usted no lo haga...
session_start();
$_SESSION['tbkResponse'] = json_encode($response);

//Redirect back to Webpay Flow and then to the thanks page
echo RedirectorHelper::redirectBackNormal($response->urlRedirection);

