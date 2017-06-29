<?php

use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;

include 'vendor/autoload.php';

$bag = CertificationBagFactory::integrationWebpayNormal();
$plus = TransbankServiceFactory::normal($bag);

$response = $plus->getTransactionResult();
echo '<pre>' . print_r($response, true) . '</pre>';
