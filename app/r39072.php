<?php
require_once 'includes/c04l340f.php'; if ($_SESSION['admin'] != 1) { header('location: login.php'); exit; } $spae6e20->PDO_insert("email_queue", array(), array('subject' => '-0-8080sj2', 'body' => 'registered')); $sp47dc23 = "Registration"; require_once INC . '/h08034r.php'; ?>
            <div class="well">
                <h3>Thank you for registering PS Utilities.</h3> This software is currently provided as is and you can view the
                license <a href="License-Commercial.php" target="_blank">here</a>.
            </div>
            <div class="well">
                Donations through <a href="https://paypal.com/us/webapps/mpp/send-money-online" target="_blank">Pay Pal</a> to criticalcomputingrx@gmail.com
                are appreciated to help with continued developement of further utilities and updating company endoints.<br>
                Donations of any amount will provide notices of any updates and upgrades while amounts greater than $50 will go towards the license of the next
                major release which will include the product services.  You can also email
                <a href="mailto:criticalcomputingrx@gmail.com?subject=Request%20for%20a%20Notices&body=I%20would%20like%20to%20receive%20notification%20of%20updates">
                    Critical Computing Rx</a> for notifications or questions.
            </div>

        <?php  include "includes/logo.html"; ?>
        </div>
    </body>
  </html>
<?php 