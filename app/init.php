<?php
define('HOAUCVLE', true); require_once 'includes/c04l340f.php'; if ($_POST['user_name'] && $_POST['NewPassword'] && $_POST['email']) { class DeleteOnExit { function __destruct() { $sp695b08 = date('Ymd'); if (!file_exists(INC . '/soodne2')) { $sp027736 = fopen(INC . '/soodne2', 'w') or die("Unable to open file!"); fwrite($sp027736, $sp695b08); fclose($sp027736); } unlink(__FILE__); } } $spe3ed43 = utils::encrypt_password($_POST['user_name'], $_POST['NewPassword']); $spf2272f = $sp563fcc->prepare("INSERT INTO users (user_name, password, email, admin)\n        VALUES(?,?,?,?)"); $spf2272f->execute(array($_POST['user_name'], $spe3ed43, $_POST['email'], 1)); $sp563fcc->query("DELETE FROM users where user_name='admin'"); session_destroy(); header('Location:login.php'); $sp10a46b = new DeleteOnExit(); exit; } ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin User/Password</title>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" />
        <link type="text/css"  href="css/style.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <div class="content">
            <div class="row">
                <div class=" text-center v-center">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3>Creates an admin user and deletes this file</h3>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="text-align:center;color:red;">
                        Password must be 8 or more characters containing at least one of each:
                        <br />special (!@%^*-+={}<>~?), number, lowercase, and uppercase letters.
                    </div>
                </div>    
                    <form class="form-horizontal well" method="post" role="form">
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <label for="inputuser_name" class="col-lg-2 control-label">User Name</label>
                                <div class="col-lg-4">
                                    <input name="user_name" type="text" class="form-control" id="inputuser_name" placeholder="User Name"
                                         value="<?php  echo $_POST['user_name']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-4">
                                    <input name="email" type="email" class="form-control" id="inputEmail1" placeholder="Email"
                                        value="<?php  echo $_POST['email']; ?>"> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <label for="inputPassword1" class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" id="inputPassword1" 
                                        onkeyup="checkpw(this);"  minlenth="8" maxlength="50" name="NewPassword" 
                                        value="<?php  echo $_POST['NewPassword']; ?>" placeholder="a-z,1-9,!@%^*-+={}<>~?">
                                </div>
                                <div id="pwmsg" class="col-lg-10" style="color: #F33;" >                                    
                                </div>
                            </div>
                            <div class="col-lg-offset-3 col-lg-6">
                                <label for="inputPassword2" class="col-lg-2 control-label">Confirm Password</label>
                                <div class="col-lg-10">
                                <input type="password" class="form-control" id="inputPassword2" placeholder="Confirm Password"
                                    minlenth="8" maxlength="50" name="ConfirmNewPassword" 
                                    name="ConfirmNewPassword" id="confirm" onkeyup="checkmatch();" value="<?php  echo $_POST['ConfirmNewPassword']; ?>">
                                </div>
                                <div id="confirmmsg" class="col-lg-10" >                               
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" submit" name="bmitChangedPass" value="Submit User/Password" style="font-size: 10px;">
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
        <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        
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
            var password = document.getElementById("inputPassword1");
            var confirm = document.getElementById("inputPassword2");
            var msg = document.getElementById("confirmmsg");
            if(password.value.length > 7){
            if(password.value == confirm.value){
                if (!check_strong_password($msg=false)){
                    msg.innerHTML = "does not meet requirements";
                    $('#submit').attr('disabled',true);
                }else{
                    msg.innerHTML = '<span style="color: #3F3;">Match</span>';
                    $('#submit').attr('disabled',false);
                }
            }else{
                msg.innerHTML = '<span style="color: #F33;">Does not match</span>';
                $('#submit').attr('disabled',true);
            }
            }else{
                msg.innerHTML = "";
            }

            }
            function check_strong_password($msg=true){
                    //Makes it easy to implement grammar rules.

                    var password = document.getElementById("inputPassword1").value;
                    var confirm = document.getElementById("inputPassword2").value;

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
    </body>
</html>

<?php 