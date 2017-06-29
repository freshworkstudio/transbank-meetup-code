<?php

session_start();
use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;

include 'vendor/autoload.php';

$bag = CertificationBagFactory::integrationWebpayNormal();
$plus = TransbankServiceFactory::normal($bag);

$response = $plus->getTransactionResult();
echo '<pre>' . print_r($response, true) . '</pre>';
