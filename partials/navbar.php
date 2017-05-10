<div class="ui container">
  <div class="ui teal large text menu">
    <div class="header item">My Awesome App</div>
    <a href="" class="item <?php if($activePage == 'profile') echo 'active'?>">
      Home
    </a>
    <a class="item">
      Messages
    </a>
    <a class="item">
      Friends
    </a>
    <div class="right menu">
      <div class="ui right dropdown item">
        <i class="circular user icon"></i>
          <?= $_SESSION['user']['username'] ?>
        <i class="dropdown icon"></i>
        <div class="menu">
          <a href="logout.php" class="ui item">
            Logout
          </a>
        </div>
      </div>

    </div>
  </div>
