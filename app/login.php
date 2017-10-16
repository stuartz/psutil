<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE); ini_set('log_errors', 1); define('HOAUCVLE', true); require_once 'includes/c04l340f.php'; require_once 'includes/f08034r.php'; !$_SESSION['login_count'] ? $_SESSION['login_count'] = 1 : $_SESSION['login_count']++; !$_SESSION['token_count'] ? $_SESSION['token_count'] = 1 : ($sp7504f1 = null); $_SESSION['COAUREVB8UR'] = 1;  if ($_SESSION['login_count'] > 25) { exit('Maximum number of 25 attemps has been exceeded. Contact '. SMTP_FROM.'if reached in error.'); } if ($_SESSION['token'] > date() && $_SESSION['token_count'] > 2) { exit('Maximum number of 2 reset attemps has been exceeded. Contact '.SMTP_FROM.' if reached in error.'); } $spdf97c3 = false; $sp5fd516 = false; function getRandomString($spdcfe84) { $sp78cedf = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789"; $spd5de6c = strlen($sp78cedf); $sp2669f6 = ""; for ($sp898c72 = 0; $sp898c72 < $spdcfe84; $sp898c72++) { $spa4f211 = mt_rand(0, $spd5de6c - 1); $sp2669f6 .= $sp78cedf[$spa4f211]; } return $sp2669f6; } $spc689cc = Utils::Get('username'); $spa3ea45 = Utils::Get('password'); $sp501257 = Utils::Get('token'); $sp56547e = Utils::Get('message'); $sp7506ee = false; if ($sp501257) { $_SESSION['token_count']++; unset($_SESSION['token']); $spb59fb6 = $sp563fcc->prepare("\n        SELECT user_name\n        FROM users\n        WHERE token = ?\n    "); $spb59fb6->execute(array($sp501257)); $sp2669f6 = $spb59fb6->fetchColumn(); $spb59fb6->closeCursor(); if ($sp2669f6) { $sp7506ee = true; $_SESSION['Username'] = $sp2669f6; $spf2272f = $sp563fcc->prepare("UPDATE users SET token=NULL WHERE token=?"); $spf2272f->execute(array($sp501257)); } else { $sp56547e = "Please request a new password reset.  This Link is no longer available."; } } if (array_key_exists('ForgotPassword', $_POST) && $_POST['ForgotPassword'] == '1') { $spb59fb6 = $sp563fcc->prepare("\n\t\t\tSELECT email\n\t\t\tFROM users\n\t\t\tWHERE user_name = ?\n\t\t"); $spb59fb6->execute(array($spc689cc)); $sp1be437 = $spb59fb6->fetchColumn(); if ($sp1be437) { if (!isset($_SESSION['token'])) { $sp3361b3 = date(); $_SESSION['token'] = date('Y-m-d H:i:s', strtotime('+15 minutes', strtotime($sp94c6cd))); } $sp501257 = getRandomString(25); $spb59fb6 = $sp563fcc->prepare("UPDATE users SET token=?\n      WHERE user_name = ?"); $spb59fb6->execute(array($sp501257, $spc689cc)); $spca2e2a = "https://"; $spdd8ef7 = "Forgot Password on Account Pro"; $sp3357a4 = $spca2e2a . $_SERVER['HTTP_HOST']; $spfa5264 = '
    <html><head><title>Forgot Password For Account Pro</title></head><body> <p>If you did not request to reset your password or have remembered your password, please ignore this email.</p><p>Click on the given link to reset your password <a href="' . $sp3357a4 . '/login.php?token=' . $sp501257 . '">Reset Password</a></p><p>Or copy and paste the following into your browser: ' . $sp3357a4 . '/login.php?token=' . $sp501257 . '</body></html>'; if (!s_mL($sp1be437, $spdd8ef7, $spfa5264, '', '', '', true)) { exit('Sorry Email SMTP has not been set up to send'); } } $spdf97c3 = true; } if (array_key_exists('ForgotUsername', $_POST) && $_POST['ForgotUsername'] == '1') { $spb59fb6 = $sp563fcc->prepare("\n\t\t\tSELECT user_name, email\n\t\t\tFROM users\n\t\t\tWHERE email = ?\n            LIMIT 1\n\t\t"); $spb59fb6->execute(array($_POST['email'])); $sp2669f6 = $spb59fb6->fetch(); $spb59fb6->closeCursor(); if ($sp2669f6) { $spc689cc = $sp2669f6['user_name']; $sp5b3878 = $sp2669f6['Email']; $sp799786 = $sp2669f6['FName'] . ' ' . $sp2669f6['LName']; $spdd8ef7 = "Your Request from AccountPRO"; $spfa5264 = "<h3>Dear {$sp799786}:</h3><p>Your Username is {$spc689cc}<br><br>"; $spfa5264 .= "If you did not initiate or request this information, please ignore this email.</p>"; if (!s_mL($sp1be437, $spdd8ef7, $spfa5264, '', '', '', true)) { exit('Sorry Email SMTP has not been set up to send'); } } $sp5fd516 = true; } if (isset($_POST['SubmitChangedPass'])) { $spb443cb = false; $sp0ce606 = $_POST['NewPassword'];$spc45129 = $_POST['ConfirmNewPassword']; if (empty($sp0ce606) or empty($spc45129)) { header('Location: login.php?message=A Password(s) is blank'); exit; } elseif ($sp0ce606 != $spc45129) { header('Location: login.php?message=Passwords do not match'); exit; } $sp1b1fc3 = check_strong_password($sp0ce606); if ($sp1b1fc3 != '') { exit('Sorry, your password did not meet requirements. Try again.'); } if ($spb443cb == false) { $spc689cc = $_SESSION['Username'] ? $_SESSION['Username'] : $_SESSION['Username']; $sp641924 = Utils::encrypt_password($spc689cc, $sp0ce606); $spf2272f = $sp563fcc->prepare("UPDATE users SET password = ?\n             WHERE user_name = ?"); $spf2272f->execute(array($sp641924, $spc689cc)); unset($_SESSION); header('Location: login.php?message="Please login using new credentials"'); } } if ($spc689cc && $spa3ea45) { $sp810fa7 = "\\;\\:\\.\\(\\)\\['\\']\\,\"\\'\\#"; if (empty($spc689cc) or empty($spa3ea45)) { $sp56547e = 'Your Username and/or Password is not correct. Please try again.'; } elseif (preg_match("#['" . $sp810fa7 . "']#i", $spc689cc) or preg_match("#['" . $sp810fa7 . "']#i", $spa3ea45)) { $sp56547e = 'Your Username and/or Password is not correct. Please try again.'; } else { if (array_key_exists('URL', $_SESSION)) { $spf0c143 = $_SESSION['URL']; } session_regenerate_id(true); $_SESSION = []; if ($spf0c143) { $_SESSION['URL'] = $spf0c143; } $sp641924 = Utils::encrypt_password($spc689cc, $spa3ea45); $sp886af2 = "SELECT user_name, email, admin\n\t            FROM users\n\t            WHERE user_name=? AND password=?\n\t            "; $spb59fb6 = $sp563fcc->prepare($sp886af2); $spb59fb6->execute(array($spc689cc, $sp641924)); $sp2669f6 = $spb59fb6->fetch(); $spb59fb6->closeCursor(); if ($sp2669f6) { $spa73766 = session_id(); $sp697c08 = date('Y-m-d H:i:s'); $_SESSION['Username'] = $spc689cc; $_SESSION['Salesperson_Name'] = $sp2669f6['user_name']; $_SESSION['login'] = true; $_SESSION['admin'] = $sp2669f6['admin']; $_SESSION['COAUREVB8UR'] = true; session_write_close(); if (array_key_exists('URL', $_SESSION)) { header('Location: ' . $_SESSION['URL']); exit; } else { header('Location: /index.php'); exit; } } else { $_SESSION['login'] = false; $sp56547e = '<div align="center" style="font-family: verdana, arial, helvetica; font-size: 11px; color: red; background-color: #EEEEEE; padding: 5 5 5 5; border: 1 solid black;"><b>Your Username and/or Password are incorrect.<br>Please try again </div><br>'; } } } ?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" >
    <title>PS Utilities: Login Page</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
      }

      .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin .checkbox {
        font-weight: normal;
      }
      .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>
    <script type="text/javascript">
    function checkCookie(){
      var cookieEnabled=(navigator.cookieEnabled)? true : false;
      if (typeof navigator.cookieEnabled=="undefined" && !cookieEnabled){
          document.cookie="testcookie";
          cookieEnabled=(document.cookie.indexOf("testcookie")!=-1)? true : false;
      }
      return (cookieEnabled)?true:showCookieFail();
      }

      function showCookieFail(){
        alert("cookies must be enabled on your browser for this site to function.");
      }
    </script>
  </head>
  <body onload="checkCookie();">
    <noscript>Javascript must be enabled on your browser to use this site.</noscript>
    <div class="container well" style="background-color: #fff;">

    <?php  if ($sp5fd516) { ?>
      <div style="width: 600px; margin: auto;">
          <h3>User Request Sent</h3>
          <p>Your Username has been sent to the email address in your account profile.
           </p>
      </div>
    <?php  } elseif ($spdf97c3) { ?>
      <div style="width: 600px; margin: auto;">
        <h3>User Request Sent</h3>
        <p>Your Password reset has been sent to the email address in your account profile (link is valid for 24 hrs.).
         </p>
      </div>
    <?php  } else { if ($sp7506ee) { ?>
        <form id="tokenreset" method="post" action="login.php">
            <h3>Change your password</h3>
            <table border="0" align="center" cellpadding="3" cellspacing="0">
                <tr>
                    <td colspan="2" style="color: #FF4500;">
                        Password must be 8 or more characters containing at least one of each:
                        <br />special (!@%^*-+={}<>~?), number, lowercase, and uppercase letters.
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="top"><b>New Password:</b></td>
                    <td align="left" valign="middle">
                        <div>
                            <input type="Password" required="" onkeyup="checkpw(this);" size="16" minlenth="8" maxlength="50" name="NewPassword" id="password">
                            <span style="color: #F33; margin-left: 10px; padding: 2px;" id="pwmsg"></span>
                        </div>
                        <div style="font-size:10px; font-color: gray; font-family:Arial;">(Minimum of 8 characters)</div>
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="top"><b>Confirm New Password:</b></td>
                    <td align="left" valign="middle">
                        <input type="Password" size="16" required="" minlenth="8" maxlength="50" name="ConfirmNewPassword" id="confirm" onkeyup="checkmatch();">
                        <div id="confirmmsg"></div>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" colspan="2">
                        <input type="submit" id="submit" name="SubmitChangedPass" value="Change Password" style="font-size: 10px;">
                    </td>
                </tr>
            </table>
        </form>
    <?php  } else { ?>
      <form class="form-signin" role="form" method="post">
        <div style="width: 330px; margin: auto; color: #c00;text-align:center;">
          <h3>Login for Services</h3>
          <h3 style="color:red;"><?php  echo $sp56547e; ?></h3>
        </div>
        <input type="text" autofocus class="form-control input-lg" name="username" placeholder="username" value="<?php  echo $spc689cc; ?>" required autofocus>
        <input type="password" class="form-control input-lg" name="password" placeholder="password" value="<?php  echo $spa3ea45; ?>" required>
        <button class="btn btn-lg btn-danger btn-block" type="submit">Sign in</button>
      </form>
    <?php  } } ?>


    </div>
    <div style="width: 700px; margin: auto; color: #666;">
      <form  style="float:left;" class="form-signin" role="form" method="post">
        <h3 class="form-signin-heading">Forgot Your Password?</h3>
        <p class="text-small">Please enter your Username
        and click on the button and your password reset link will be sent to the
        email address you have on your profile.</p>
        <input required class="form-control input-sm" name="username" placeholder="username or email" value="<?php  echo $spc689cc; ?>" type="text">
        <input name="ForgotPassword" value="1" type="hidden">
        <button class="btn btn-xs btn-block" type="submit">Reset Password</button>
      </form>
      <form style="float:right;" class="form-signin" role="form" method="post">
        <h3 class="form-signin-heading">Forgot Your Username?</h3>
        <p class="text-small">Please enter your Email
        and click on the button and your Username will be sent to the
        email address you have on your profile.</p>
        <input required class="form-control input-sm" name="email" placeholder="your email" value="<?php  echo $sp5b3878; ?>" type="email">
        <input name="ForgotUsername" value="1" type="hidden">
        <button class="btn btn-xs btn-block" type="submit">Send Username</button>
      </form>
    </div>
    <script src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script>
            /*@cc_on
              @if (@_jscript_version < 10)
                if(!$.cookie('ieNotification')){
                  alert('For optimal display and functionality, IE 10+ or a different browser is recommended.');
                  $.cookie('ieNotification', 1, { expires: 1});
                };

              @end
              @if (@_jscript_version < 9)
                  if (!Array.prototype.indexOf)
                    {
                      Array.prototype.indexOf = function(elt )
                      {
                        var len = this.length >>> 0;

                        var from = Number(arguments[1]) || 0;
                        from = (from < 0)
                             ? Math.ceil(from)
                             : Math.floor(from);
                        if (from < 0)
                          from += len;

                        for (; from < len; from++)
                        {
                          if (from in this &&
                              this[from] === elt)
                            return from;
                        }
                        return -1;
                      };
                    }
              @end
            @*/
	  </script>

      <script type="text/javascript">
      function checkpw(pw){
        var msg = document.getElementById("pwmsg");
        if(pw.value.length < 8){
          msg.innerHTML = "Too short";
        	$('#submit').attr('disabled',true);
        }else{
        	if (!check_strong_password($msg=false)){
        		msg.innerHTML = "does not meet requirements";
        		$('#submit').attr('disabled',true);
        	}else{
        		msg.innerHTML = "";
        		$('#submit').attr('disabled',false);
        	}

        }
      }

      function checkmatch(){
        var password = document.getElementById("password");
        var confirm = document.getElementById("confirm");
        var msg = document.getElementById("confirmmsg");
      if(password.value.length > 7){
        if(password.value == confirm.value){
        	if (!check_strong_password($msg=false)){
        		msg.innerHTML = "does not meet requirements";
        		$('#submit').attr('disabled',true);
        	}else{
      	    msg.innerHTML = "<span style=\"color: #3F3;\">Match</span>";
      	    $('#submit').attr('disabled',false);
      	}
        }else{
          msg.innerHTML = "<span style=\"color: #F33;\">Does not match</span>";
          $('#submit').attr('disabled',true);
        }
      }else{
          msg.innerHTML = "";
      }

      }
      function check_strong_password($msg=true){
              //Makes it easy to implement grammar rules.

        		var password = document.getElementById("password").value;
        		var confirm = document.getElementById("confirm").value;

              var password_flaws = [];

              var strlen = password.length;
              if(password.substr(0,8).toUpperCase() == 'PASSWORD')
                password_flaws[password_flaws.length] = "is 'password' . . . are you really using 'password' for your password? If so, this is not allowed.";

      		if (password != confirm && $msg){
      			password_flaws[password_flaws.length] = "doesn't match confirm";
      		}
              if(strlen <= 7)
                      password_flaws[password_flaws.length] = "is too short";

              if (!password.match(/[@%^*-+=\{}<>~?!]+/)) {
              	password_flaws[password_flaws.length] = " must include at least one special";
          	}

              if (!password.match(/[0-9]+/)) {
              	password_flaws[password_flaws.length] = " must include at least one number";
          	}

      		if (!password.match(/[a-z]+/)) {
      	        password_flaws[password_flaws.length] = " must include at least one lowercase letter";
      	    }

      		if (!password.match(/[A-Z]+/)) {
      	        password_flaws[password_flaws.length] = " must include at least one uppercase letter";
      	    }
              //The function returns an empty string if the password is "good".
              var return_string = "";
               var sizeof = password_flaws.length;

              for(var index = 0; index < sizeof; index++)
              {
                      if(index == 0)
                              return_string += "Your password ";

                      if(index == sizeof - 1 && sizeof != 1)
                              return_string += " and ";

                      //this is in case i have more than 3 sources of error.
                      if(index != 0 && index != sizeof - 1)
                             return_string += ", ";

                      return_string += password_flaws[index];
              }
              if (return_string != ''){
              	if($msg){alert (return_string)};
              	return false;
              }else{return true;}

      }

      $('#tokenreset').submit(function(event){
      	if (!check_strong_password()){
      		event.preventDefault();
      	};
      })
      </script>
  </body>
</html>
<?php
