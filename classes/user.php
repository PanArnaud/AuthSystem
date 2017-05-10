<?php
include('password.php');

/**
 *
 */
class User extends Password
{

  private $_db;

  function __construct($db)
  {
    parent::__construct();
    $this->_db = $db;
  }

  /**
   * Get id, username, and password by username
   * @param  string $username
   * @return array
   */
  private function getUserByUsername($username) {
    try {
      $q = $this->_db->prepare('SELECT id, username, password FROM users WHERE username = :username AND active=1');
      $q->execute(['username' => $username]);
      return $q->fetch();
    } catch (Exception $e) {
      echo '<p>'.$e->getMessage().'</p>';
    }
  }

  /**
   * Check if an username is already used
   * @param  string  $username
   * @return boolean           [description]
   */
  public function isUserExists($username) {
    $q = $this->_db->prepare('SELECT username FROM users WHERE username = :username');
    $q->execute(array(':username' => $username));
    $user = $q->fetch(PDO::FETCH_ASSOC);
    return $user ? true : false;
  }

  /**
   * Check if an email is already used
   * @param  string  $email
   * @return boolean           [description]
   */
  public function isEmailExists($email) {
    $q = $this->_db->prepare('SELECT email FROM users WHERE email = :email');
    $q->execute(array(':email' => $email));
    $user = $q->fetch(PDO::FETCH_ASSOC);
    return $user ? true : false;
  }

  /**
   * Register an user
   * @param  string  $username
   * @param  string  $password
   * @param  string  $email
   * @return boolean           [description]
   */
  public function register($username, $password, $email) {
    $password = md5($password);
    $q = $this->_db->prepare('INSERT INTO users (username,password,email) VALUES (:username, :password, :email)');
    var_dump($q);
			$q->execute(array(
				':username' => $username,
				':password' => $password,
				':email' => $email
			));
  }

  /**
   * Log an user
   * @param  string $username
   * @param  string $password
   * @return boolean
   */
  public function login($username, $password) {
    $user = $this->getUserByUsername($username);

    if($user && $this->checkPassword($password,$user['password']) == 1) {
      $_SESSION['loggedin'] = true;
      $_SESSION['user'] = $user;

      return true;
    }
  }

  /**
   * Check if an user is currently logged in
   * @return boolean
   */
  public function isLogged() {
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
  }

  /**
   * Log out an user
   * @return boolean
   */
  public function logout() {
    session_destroy();
  }
}
