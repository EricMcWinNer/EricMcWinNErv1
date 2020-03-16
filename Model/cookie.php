<?php

class Cookie
{
    private $value;
    private $name;
    private $expires;

    function __construct($name, $value, $expires)
    {
        $this->value = $value;
        $this->name = $name;
        $this->expires = time() + (86400 * $expires);
    }
    public function getValue()
    {
        return $this->value;

    }
    public function getName()
    {
        return $this->name;
    }
    public function getExpires()
    {
        return $this->expires;
    }
    public function encryptcookie($crypt__key, $crypt__IV, $ssl__key, $ssl__IV)
    {
        $encryptedvalue = openssl_encrypt(base64_encode(strrev(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $crypt__key, $this->value, MCRYPT_MODE_CBC, $crypt__IV))), "AES-256-CBC", $ssl__key, 0, $ssl__IV);
        setcookie($this->name, $encryptedvalue, $this->expires, "/");
    }
    public static function decryptcookie($value, $crypt__key, $crypt__IV, $ssl__key, $ssl__IV)
    {
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $crypt__key, strrev(base64_decode(openssl_decrypt($value, "AES-256-CBC", $ssl__key, 0, $ssl__IV))), MCRYPT_MODE_CBC, $crypt__IV);
    }
}
