<?php
require 'fetch.php';
session_start();
if($_SESSION["sess_userrole"]!="dealing"){
    header ("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
    <style> body {padding-top:65px;}</style>
     
  </head>
    
  <body>
      <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Delhi Police</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Status<span class="sr-only">(current)</span></a></li>
        <li><a href="refChecklist.php">OP-Referral</a></li>
        <li><a href="emgChecklist.php">OP-Emergency</a></li>
        <li><a href="ip_refChecklist.php">IP-Referral</a></li>
        <li><a href="ip_emgChecklist.php">Emergency Credit</a></li>
          <li><a href="creditCheck.php">Credit</a></li>
          <li><a href="permissionCheck.php">Permission</a></li>
         <!-- <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Advance <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
 <li><a href="advanceChecklist.php">Advance</a></li>
    <li><a href="#">Adjustment</a></li>
</ul>
</li>-->
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $_SESSION['sess_username'];?></a></li>
            <li><a href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
    </div>


<!-- Content -->
<div class="container-fluid">
  	<div class="row">
      <div class="col-md-1">
          <ul id="sidebar" class="nav nav-stacked affix">
            <li><a href="#waiting">Waiting</a></li>
              <li><a href="#reeval">Re-Eval</a></li>
            <li><a href="#approve">Approved</a></li>
            <li><a href="#inprogress">In Process</a></li>
            <li><a href="#failed">Rejected</a></li>
        </ul>
      </div>
      
      <div class="col-md-11">
         
<!-- Content -->
          <h3 id="waiting">Waiting for PHQ</h3>
          <?php fetch_waiting(); ?>
          
          <h3 id="reeval">Re-Evaluation</h3>
          <?php fetch_reeval(); ?>
          
          <h3 id="approve">Approved</h3>
          <?php fetch_approved(); ?>
          
          <h3 id="inprogress">In progress</h3>
          <?php fetch_inprogress(); ?>
            
          <h3 id="failed">Failed</h3>
          <?php fetch_failed(); ?>
   
      </div>
    </div>
</div>
      


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
      
    </body>
</html>
