<?php
//
$msg="Hello World";

const KEY ='thisismykey';

$msg_encrypted = base64_encode(openssl_encrypt($msg,'aes-128-abc', KEY, 0,'55555555555555555'));

echo $msg_encrypted;

?>