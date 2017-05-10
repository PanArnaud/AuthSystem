<?php
  require('includes/config.php');
  require('utils/form.php');

  if($user->isLogged())
    header('Location:profile.php');

  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

	  if($user->login($username, $password)){
		    $_SESSION['username'] = $username;
	      header('Location: profile.php');
		    exit;
    } else {
	    $error['login'] = 'Wrong username or password or your account has not been activated.';
    }
  }

  require('partials/head.php');
?>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal header">
      <div class="content">
        Log In !
      </div>
    </h2>
    <form method="post" action="" class="ui large form error">
      <div class="ui stacked segment">
        <div class="required field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="Username" required>
          </div>
        </div>
        <div class="required field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password" required>
          </div>
        </div>
        <?php if(isset($error)) echo showError($error, 'login'); ?>
        <input type="submit" name="submit" value="Log In" class="ui fluid large teal submit button">
      </div>
      <div class="ui error message"></div>
    </form>
    <div class="ui message">
      No account ? <a href="index.php">Log In</a>
    </div>
  </div>
</div>
