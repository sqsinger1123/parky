	
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="http://code.jquery.com/jquery-latest.js"></script>

	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-responsive.min');
		echo $this->Html->css('bootstrap-responsive');
		echo $this->Html->css('extras');
		echo $this->Html->css('parkycss');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('selectime_s');
		echo $this->Html->script('tinysort');
		echo $this->Html->script('sort_s');
		echo $this->Html->script('search_s');
		echo $this->Html->script('helpers');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div id="wrap">

<div class="navbar navbar-fixed-top">

      <div class="navbar-inner">
        <div class="container">
        		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
            <a class="brand" href="/"> 
              <img src="/parky_logo_noshadow.png" class="head-logo" title="Parky" />
            </a>
        <div class="nav-collapse collapse">
            <ul class="nav" align="right">

              <li<?php if ($this->here == '/parkys' || $this->here == '/') {echo ' class="active"';}?>><a href="/parkys">Find Parking</a></li>

              <li<?php 
                  $loggedin = -1;
                  if($session->read('Auth.User')){
                    $loggedin = $session->read('Auth.User.guest');

                    if (ereg('parkys/myreservations', $this->here)) {
                      echo ' class="active"';
                    }
                }?>>
              <a href="/parkys/myreservations" <?php if ($loggedin!=0){?>style="display:none"<?php }?>>My Reservations</a></li>

             <li<?php if (ereg('^/parkys/mydriveways', $this->here)) {echo ' class="active"';}?>>

          		<a href="/parkys/mydriveways" <?php if ($loggedin!=0){?>style="display:none" <?php }?>>My Driveways</a></li>


              <li<?php if (ereg('^/users/edit', $this->here)) {echo ' class="active"';}?>

              <?php if ($loggedin!=0){?> style="display:none" <?php }?>>

              <a href=<?php echo ("/users/edit?redirect=".$this->here);?>>Account</a></li>

              <li<?php if (ereg('^/users/login', $this->here)) {echo ' class="active"';}?>

              <?php if ($loggedin>=0){?>style="display:none"<?php }?>>

              <a href=<?php echo "/users/login?redirect=".$this->here?> >Sign In</a></li>

          	   <li<?php if (ereg('^/users/logout', $this->here)) {echo ' class="active"';}?>><a href="/users/logout"<?php if ($loggedin<0){?>style="display:none"<?php }?>>Log out</a></li>


            </ul>
            <ul class="nav" align="right" style="float:right;">
              <li <?php if (ereg('^/parkys/about', $this->here)) {echo ' class="active"';}?>  ><a href="/parkys/about"<?php if ($loggedin==0){?>style="display:none"<?php }?>>About Parky</a></li>


              <li<?php if (ereg('^/users/logout', $this->here)) {echo ' class="active"';}?> style="float:right;"><a href="/users/edit"<?php if ($loggedin<0){?>style="display:none"<?php }?>>
          	   <?php 
              if($loggedin>=0){ 
              if($session->read('Auth.User.firstname')){
              	echo "Hello, ";
              	echo $session->read('Auth.User.firstname');
                echo "!";
              } else {
              	echo "Sorry, no name on file";
              }
              }
              ?>

          			</a></li>
            </ul>
          </div>
      </div>
      </div>
</div>

			
      <!---?php echo $this->Session->flash(); ?-->
 <?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>


		<div id="push"></div>
</div>
    <div id="footer">
			<div class="container">
			<p class="muted credit">Copyright 2013 Annie Yang, Eric Lu, Sam Singer | <a href="/parkys/about">About Parky</a></p>
		</div>
		</div>
	</div>

	<!--?php echo $this->element('sql_dump'); ?-->
</body>
</html>
