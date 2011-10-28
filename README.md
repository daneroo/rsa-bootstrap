# Using public key crypto

References:

*   [open ssl in php article](http://andytson.com/blog/2009/07/php-public-key-cryptography-using-openssl/)
*   [rsa in javascript](http://www-cs-students.stanford.edu/~tjw/jsbn/)
*   [openssl crash  course](http://www.entropy.ch/blog/Developer/2009/01/11/OpenSSL-Public-Key-and-PKI-Crash-Course-Part-1-4.html)    
*   [Javascript Cryptography Toolkit](http://ats.oka.nu/titaniumcore/js/crypto/readme.txt)
*   [ASN.1 Decoder](http://lapo.it/asn1js/)

## openssl tool
This is how we generate a 1024 bit rsa key

    openssl genrsa -out private-key.pem 1024
    # this will produce the accompanying public key
    openssl rsa -in private-key.pem -pubout -out public-key.pem

If you wanted the private key to be passphrase protected (with triple-des symetric encryption) use.

    openssl genrsa -des3 -out private-key-with-passphrase.pem 1024
    
Using the keys:

    echo "Very sensitive information" > clear.txt
    # encrypt
    openssl rsautl -encrypt -pubin -inkey public-key.pem < clear.txt > encrypted.txt
    # decrypt
    openssl rsautl -decrypt -inkey private-key.pem < test-encrypted.txt

Examining the keys

    openssl rsa -text < private-key.pem
    openssl asn1parse -inform PEM -in private-key.pem -i
    
## PHP
if you generated the keys as above: `private-key.pem`,`private-key.pem`, you can use these two keys to encrypt/decrypt with php:

    php openssl-example.php

## Javascript