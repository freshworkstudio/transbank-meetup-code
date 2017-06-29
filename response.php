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
$_SESSION['buyOrder'] = $response->buyOrder;

//Redirect back to Webpay Flow and then to the thanks page
return RedirectorHelper::redirectBackNormal($response->urlRedirection);

