<?php
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?php  echo $sp47dc23; ?></title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" />
  <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" />
  <link type="text/css"  href="css/style.css" type="text/css" rel="stylesheet" />
  <style>
    .hidden {display:none;}
    .ui-dialog { z-index: 1000 !important ;}
    .ui-front { z-index: 1000 !important; }
    @media print {
      no-print {display:none;}
    }
  </style>
</head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top" role="banner">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/" class="navbar-brand" title="v.0.9.0">PS Utilities </a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
          <ul class="nav navbar-nav">
            <li>
              <a href="ir636797.php">Inventory Request</a>
            </li>
            <li>
              <a href="os643s64.php">Order Status</a>
            </li>
            <li>
              <a href="ss643s64.php">Shipping Status</a>
            </li>
<?php  if ($_SESSION['admin'] == 1) { echo '<li><a href="a46437.php">Admin</a></li>'; } if ($_SESSION['login']) { echo '<li><a href="e976437.php?edit=pass">MyAccount</a></li>'; echo '<li><a href="index.php?logout=1">Logout</a></li>'; } else { echo '<li><a href="login.php">Login</a></li>'; } ?>
          </ul>
        </nav>
      </div>
    </nav>
    <div class="mainx">
<?php  if (!PRODUCTION) { echo '<span style="color:red;font-size:large;float:left">' . $spca7505 . '</span>'; if (isset($_SESSION['tl'])) { $sp8ccae7 = $_SESSION['tl']; if ($sp8ccae7 > 0) { echo '<span style="color:orange;font-size:large;float:right;">You have ' . $sp8ccae7 . ' days until trial expires</span>'; } else { echo '<span style="color:red;font-size:large;float:right;">Your trial period has expired</span>'; } } }