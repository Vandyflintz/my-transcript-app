<?php
function encrypt($value){
    $pass = 'transcript2022app!';
    $method = 'AES-128-ECB';
    $value = openssl_encrypt($value, $method, $pass);
    return $value;
}
function decrypt($value){
    $pass = 'transcript2022app!';
    $method = 'AES-128-ECB';
    $value=openssl_decrypt($value, $method, $pass);
    return $value;
}



?>