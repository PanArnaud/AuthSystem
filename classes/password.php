<?php

/**
 *
 */
class Password
{

  public function __construct() {}

  /**
    * Verify a password
    *
    * @param string $password
    * @param string $hash
    *
    * @return boolean
    */
  public function checkPassword($password, $hash) {
    $password_hashed = md5($password);
    return $password_hashed == $hash ? true : false;
  }
}
