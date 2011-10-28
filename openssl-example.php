<?php

    echo "PHP-OpenSSL examples\n";

    $public_key = openssl_pkey_get_public('file://public-key.pem');
    
    $clear_text = "My super secret information";
    $encrypted_data;
    openssl_public_encrypt($clear_text, $encrypted_data, $public_key);

    echo "secret info: ".$clear_text."\n";
    echo "encrypted version (base64): ".base64_encode($encrypted_data)."\n";
    echo "encrypted version (hex): ".bin2hex($encrypted_data)."\n";

    echo "\n\n  Transport line \n\n";
    $decrypted_data;
    $private_key = openssl_pkey_get_private('file://private-key.pem'/*, $passphrase*/);
    openssl_private_decrypt($encrypted_data, $decrypted_data, $private_key);

    echo "decoded secret info: ".$clear_text."\n\n\n";

?>