<?php

class BcryptSHA256 {
  private static function pre_hash($input) {
    $raw_hash = hash("sha256", $input, true);
    $b64_hash = base64_encode($raw_hash);
    return $b64_hash;
  }
  
  public static function password_hash($password, $options) {
    $hash = password_hash(self::pre_hash($password), CRYPT_BLOWFISH, $options);
    $hash[2] = 's';
    return $hash;
  }
  
  public static function password_verify($hash, $password) {
    if ($hash[2] != 's') {
      return false; // wrong signature
    }
    $hash[2] = "y";
    return password_verify(self::pre_hash($password), $hash);
  }
}
