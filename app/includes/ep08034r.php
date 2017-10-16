<?php
require_once 'includes/c04l340f.php'; require_once 'includes/h08034r.php'; if (isset($_REQUEST['message'])) { $sp56547e = $_REQUEST['message']; } ?>
    <div class="mainf" style="margin-left:auto;margin-right:auto;">
        <a style="text-align:center;" href="e976437.php?edit=sales">Change Email</a>
        <div class="well">
            <div  style="font-size: 14px;"><u><b>User Info:</b></u><br></div>
            <div  style="margin: 20px;text-align:center;<?php  echo strlen($sp56547e) > 0 ? '' : 'display: none;'; ?> ">
                <span style="color: #F33; background-color: #FCC; padding: 5px; border: 1px solid gray;margin: auto;"><?php  echo $sp56547e; ?></span>
            </div>
            <form method="post" action="e976437.php">
                <label for="UN">User Name:</label>
                 <input id="UN" disabled type="Text" name="user_name" value="<?=$_SESSION['Username']?>"  size="35"><br>
                <label style="color: #FF4500;">
                        Password must be 8 or more characters containing at least one of each:
                        <br />special (!@%^*-+={}<>~?), number, lowercase, and uppercase letters.
                </label><br>
                <label for="password">New Password:</label>
                <input type="Password" required="" onkeyup="checkpw(this);" size="16"
                    minlenth="8" maxlength="50" name="NewPassword" id="password">
                <span style="color: #F33; margin-left: 10px; padding: 2px;" id="pwmsg"></span>
                <div style="font-size:10px; font-color: gray; font-family:Arial;">(Minimum of 8 characters)</div>
                <label for="confirm">Confirm New Password:</label>
                <input type="Password" size="16" required="" minlenth="8" maxlength="50"
                    name="ConfirmNewPassword" id="confirm" onkeyup="checkmatch();">
                <div id="confirmmsg"></div>
                <input type="submit" id="submit" name="SubmitChangedPass" value="Change Password" style="font-size: 10px;">
            </form>
        </div>

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

$('form').submit(function(event){
	if (!check_strong_password()){
		event.preventDefault();
	};
})
</script>
<?php 