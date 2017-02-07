<?php
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
    <title>Medical Claim</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
      <link href="../css/home.css" rel="stylesheet">
      <script src="../js/dependent.js"></script>
      <script src="../js/script.js"></script>
  </head>
  <body>
       <nav class="navbar navbar-default">
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
         <li><a href="../dealinghome.php">Status</a></li>
        <li><a href="../refChecklist.php">OP-Referral</a></li>
        <li><a href="../emgChecklist.php">OP-Emergency</a></li>
        <li class="active"><a href="#">IP-Referral<span class="sr-only">(current)</span></a></li>
        <li><a href="ip_emgChecklist.php">IP-Emergency</a></li>
          <li><a href="advCheck.php">Advance Claim</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $_SESSION['sess_username'];?></a></li>
            <li><a href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
     <div class="container">
     <h3>FILL THE CLAIM DETAILS AND THE DOCUMENTS SUBMITTED</h3>
         <form class="form-horizontal" id="refCheck">
             <?php
             require 'form.php';
             form();
             ?>
       
            <div class="bt"><input onClick="refProcess()" type="button" class="btn btn-info" value="SUBMIT" />
                    </div>

             <!--<button type="submit" >S</button>-->
      </form>
         
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>