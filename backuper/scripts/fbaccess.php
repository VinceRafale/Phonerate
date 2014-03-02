<?php
  //NIX FUCKING PILLE! ENDELIG VIRKER DET, INGEN RØR NOGET!

  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  require_once('facebook-sdk/src/facebook.php');

  $config = array(
    'appId' => '1374799492774805',
    'secret' => '5cf252ba391b732144487b4251f1fe1e',
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
?>
<html>
  <head></head>
  <body>

  <?php
    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        $user_profile = $facebook->api('/me','GET');
 		   $friends = $facebook->api("/me/friends");
 		   $image = "http://graph.facebook.com/".$user_profile['id']."/picture";

       ?>
      <table class="userinfo">
      <tr>
        <td><img class="user" src="<?php echo $image; ?>"></td>
        <td><p class="userinfo">Velkommen <?php echo $user_profile['first_name'] ?><br>
          <a href="?action=logout">Log ud</a></p></td>
      </tr>
    </table>
       <?php

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl(); 
        echo '<a class="facebook" href="' . $login_url . '">login</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl();
      echo '<a class="facebook" href="' . $login_url . '">login</a>';

    }

  ?>

  </body>
</html>