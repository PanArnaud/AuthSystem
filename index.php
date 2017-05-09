<?php
  require('includes/config.php');
  require('utils/form.php');

  if($user->isLogged())
    header('Location:profile.php');

  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    // Username
    if(strlen($username) < 3) {
	    $error['username'] = 'Username is too short.';
  	} else {
    	$userExits = $user->isUserExists($username);
    	if($userExits) {
    		$error['username'] = 'Username provided is already in use.';
    	}
  	}
    // Password
    if(strlen($password) < 3) {
      $error['password'] = 'Password is too short.';
    }
    if($password != $passwordConfirm) {
      $error['password'] = 'Passwords do not match.';
    }
    // Email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error['email'] = 'Please enter a valid email address';
  	} else {
  		$emailExists = $user->isEmailExists($email);
  		if($emailExists) {
  			$error['email'] = 'Email provided is already in use.';
  		}
  	}
    if(!isset($error)) {
      try {
        $user->register($username, $password, $email);

        header('Location: index.php?action=joined');
        exit;
      } catch (Exception $e) {
        $error[] = $e->getMessage();
      }
    }
  }

  require('partials/head.php');
?>
  <div class="ui middle aligned center aligned grid">
    <div class="column">
      <h2 class="ui teal header">
        <div class="content">
          Join Us !
        </div>
      </h2>
      <?php if(isset($_GET['action']) && $_GET['action'] == 'joined'): ?>
      <div class="ui green icon message">
        <i class="checkmark icon"></i>
        <div class="content">
          <div class="header">
            Congratulations !
          </div>
          <p>You're successfuly registered in this awesome website !</p>
        </div>
      </div>
    <?php endif; ?>
      <form method="post" action="" class="ui large form error">
        <div class="ui stacked segment">
          <div class="required field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="username" placeholder="Username" required>
            </div>
          </div>
          <?php if(isset($error)) echo showError($error, 'username'); ?>
          <div class="required field">
            <div class="ui left icon input">
              <i class="mail icon"></i>
              <input type="email" name="email" placeholder="Email" required>
            </div>
          </div>
          <?php if(isset($error)) echo showError($error, 'email'); ?>
          <div class="two fields">
            <div class="required field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" placeholder="Password" required>
              </div>
            </div>
            <div class="required field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="passwordConfirm" placeholder="Confirm password" required>
              </div>
            </div>
          </div>
          <?php if(isset($error)) echo showError($error, 'password'); ?>

          <input type="submit" name="submit" value="Register" class="ui fluid large teal submit button">
        </div>
        <div class="ui error message"></div>
      </form>
      <div class="ui message">
        Already registered ? <a href="login.php">Log In</a>
      </div>
    </div>
  </div>
