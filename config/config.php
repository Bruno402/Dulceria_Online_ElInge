<?php

define("CLIENT_ID", "AUtc9Dot3tAC6zf05-Ct4HsAJKauc4ojmP4Novw5aQyncVcjK4pMdCAZXq0dtgReGW8kCaWT7wQPbYyi");
define("CURRENCY", "MXN");
define("KEY_TOKEN", "Cali402_13#");
define("MONEDA", "$");

session_start();

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>