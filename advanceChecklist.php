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

    <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
      <link href="css/home.css" rel="stylesheet">
      <script src="js/dependent.js"></script>
      <script src="js/script.js"></script>
  </head>
  <body>
       <nav class="navbar  navbar-inverse">
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
         <li><a href="dealinghome2.php">Status</a></li>
        <li><a href="refChecklist.php">OP-Referral</a></li>
        <li><a href="emgChecklist.php">OP-Emergency</a></li>
        <li><a href="ip_refChecklist.php">IP-Referral</a></li>
        <li><a href="ip_emgChecklist.php">Emergency Credit</a></li>
          <li><a href="creditCheck.php">Credit</a></li>
          <li><a href="permissionCheck.php">Permission</a></li>
          <li role="presentation" class="dropdown active">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Advance <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
 <li><a href="#">Advance</a></li>
    <li><a href="advAdjustment.php">Adjustment</a></li>
</ul>
</li>
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
         <form name="myForm" class="form-horizontal" id="advanceCheck" onsubmit="return validateForm()" action="add_new_referral.php" method="post">
             
         <div class="container" align="center">
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Applicant's full name:</span>
            <input type="text" class="form-control" id="basic-url" name="applicantName"  >
         </div>
         
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">PIS No:</span>
            <input type="text" class="form-control" id="basic-url" name="pis"  >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter rank:</span>
            <select class="custom-select" name="rank" >
                <option value="" selected disabled>Please select</option>
                <option value="Police Constable">Police Constable</option>
                <option value="Senior Police Constable">Senior Police Constable</option>
                <option value="Police Head Constable">Police Head Constable</option>
                <option value="Assistant Sub-Inspector of Police">Assistant Sub-Inspector of Police</option>
                <option value="Sub-Inspector of Police">Sub-Inspector of Police</option>
                <option value="Inspector of Police">Inspector of Police</option>
                <option value="Assistant Commissioner of Police">Assistant Commissioner of Police</option>
                <option value="YAdditional Deputy Commissioner of Police">Additional Deputy Commissioner of Police</option>
                <option value="Deputy Commissioner of Police">Deputy Commissioner of Police</option>
            </select>
         </div>
         
         <div class="input-group"  id="dependent1">
            <span class="input-group-addon" id="basic-addon3">Relation with the CGHS holder:</span>
            <input type="text" class="form-control" id="basic-url" name="relation"  >
         </div>
         
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Period of treatment</span>
            <input type="date" class="form-control" id="periodDate" name="startDate"  >
            <span class="input-group-addon" id="periodTo">To</span>
            <input type="date" class="form-control" id="periodDate" name="endDate"  >
         </div>
	 <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Hospital Name:</span>
            <input type="text" class="form-control" id="basic-url" name="hospitalName"  >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Hospital Address:</span>
            <input type="text" class="form-control" id="basic-url" name="hospitalAddress"  >
         </div>
             <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Police Station No:</span>
            <input type="text" class="form-control" id="basic-url" name="idNo"   >
         </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Diary No:</span>
            <input type="text" class="form-control" id="diary" name="diaryNo"  >
            <span class="input-group-addon" id="dated">/Genl. Branch/SED dated</span>
            <input type="date" class="form-control" id="diary" name="diaryDate"  >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Referred Hospital Name:</span>
            <input type="text" class="form-control" id="basic-url" name="refHospitalname" placeholder="If not referred then type name of hospital taking treatment from" >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Disease of the patient:</span>
            <input type="text" class="form-control" id="basic-url" name="disease"  >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Date of application:</span>
            <input type="date" class="form-control" id="basic-url" name="applicationDate"  >
         </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Amount requested in claim:</span>
            <input type="number" class="form-control" id="basic-url" name="amtAsked" placeholder="Amount Asked" >
         </div>
             <input type="hidden" name="ctype" value="advance">
         <div class="bt"><input onClick="advanceProcess()" type="button" class="btn btn-info" value="SUBMIT" />
         </div>

         </div>
      </form>
         
         
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/form-validation.js"></script>
  </body>
</html>