<?php
  require('includes/config.php');

  if(!$user->isLogged())
    header('Location:login.php');

  $activePage = "profile";

  require('partials/head.php');
  require('partials/navbar.php');
?>
  <div class="ui very padded text container segment">
    <h4 class="ui teal horizontal divider header">
      <i class="teal announcement icon"></i>
      Feed
    </h4>
    <div class="ui form">
      <div class="field">
        <textarea rows="2" placeholder="Say something awesome !"></textarea>
      </div>
    </div>
    <div class="ui feed">
      <div class="event">
        <div class="label">
          <i class="film icon"></i>
        </div>
        <div class="content">
          <div class="summary">
            <a class="user">
              Dylan Boyer
            </a> watch a new episode of <strong>One Piece</strong>
            <div class="date">
              1 Hour Ago
            </div>
          </div>
          <div class="meta">
            <a class="like">
              <i class="like icon"></i> 4 Likes
            </a>
          </div>
        </div>
      </div>
      <div class="event">
        <div class="label">
          <i class="trophy icon"></i>
        </div>
        <div class="content">
          <div class="summary">
            <a class="user">
              Samuel Ethève
            </a> just got a new job !
            <div class="date">
              2 Hour Ago
            </div>
          </div>
          <div class="meta">
            <a class="like">
              <i class="like icon"></i> 12 Likes
            </a>
          </div>
        </div>
      </div>
      <div class="event">
        <div class="label">
          <i class="pencil icon"></i>
        </div>
        <div class="content">
          <div class="summary">
            <a class="user">
              Tristan Hoarau
            </a> just designed a new masterpiece !
            <div class="date">
              4 Hour Ago
            </div>
          </div>
          <div class="meta">
            <a class="like">
              <i class="like icon"></i> 9 Likes
            </a>
          </div>
        </div>
      </div>
      <div class="event">
        <div class="label">
          <i class="add user icon"></i>
        </div>
        <div class="content">
          <div class="summary">
            <a class="user">
              Ludovic Rossolin
            </a> just added <a class="user">Julie Lebreton</a> as friend !
            <div class="date">
              9 Hour Ago
            </div>
          </div>
          <div class="meta">
            <a class="like">
              <i class="like icon"></i> 7 Likes
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- Close conainter opened in navbar.php -->


<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.js"></script>
<script type="text/javascript">
  $('.ui.dropdown')
  .dropdown()
  ;
</script>
