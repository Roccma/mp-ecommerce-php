 <?php

    error_reporting(E_ERROR & E_PARSE);
    // SDK de Mercado Pago
    require __DIR__ .  '/vendor/autoload.php';

    MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

    $fp = fopen('logs.txt', 'a');
    fwrite( $fp , "REQUEST: " . var_export($_REQUEST, true) . PHP_EOL);
    fwrite( $fp , "GET: " . var_export($_GET, true) . PHP_EOL);
    
    
    switch($_REQUEST["type"]) {
        case "payment":
            fwrite( $fp , "Payment 1: ");
            $payment = MercadoPago\Payment.find_by_id($_REQUEST["data_id"]);
            fwrite( $fp , "Payment: " . var_export($payment, true) . PHP_EOL);
            break;
        case "plan":
            $plan = MercadoPago\Plan.find_by_id($_REQUEST["id"]);
            break;
        case "subscription":
            $plan = MercadoPago\Subscription.find_by_id($_REQUEST["id"]);
            break;
        case "invoice":
            $plan = MercadoPago\Invoice.find_by_id($_REQUEST["id"]);
            break;
    }


    fclose( $fp );

?>