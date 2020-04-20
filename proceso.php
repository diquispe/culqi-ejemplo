

<?php
// Cargamos Requests y Culqi PHP
require 'request/library/Requests.php';
Requests::register_autoloader();
require 'culqi/lib/culqi.php';


$SECRET_KEY = "sk_test_27wbUvNBrUu9bLK0";

$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));



$charge = $culqi->Charges->create(
 array(
     "amount" => $_POST['precio'],
     "currency_code" => "USD",
     "description" => $_POST['producto'],
     "email" => $_POST['email'],
     "source_id" => $_POST['token']
   )
);

echo 'exito';

?>