<?php
session_start();

$response = json_decode($_SESSION['tbkResponse']);
//echo '<pre>' . print_r($response, true) . '</pre>';

if ($response->detailOutput->responseCode === 0) {
    echo "<h1>Gracias por tu compra</h1>";
} else {
    echo "<h1>La transacción ha sido rechazada</h1><h3>Las posibles causas de este rechazo son:</h3><p>- Error en el ingreso de los datos de su tarjeta de Crédito o Débito (fecha y/o código de seguridad).<br>- Su tarjeta de Crédito o Débito no cuenta con saldo suficiente</p>";
}
