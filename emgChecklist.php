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
        <li class="active"><a href="#">OP-Emergency<span class="sr-only">(current)</span></a></li>
        <li><a href="ip_refChecklist.php">IP-Referral</a></li>
        <li><a href="ip_emgChecklist.php">Emergency Credit</a></li>
          <li><a href="creditCheck.php">Credit</a></li>
          <li><a href="permissionCheck.php">Permission</a></li>
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
    <form name="myForm" class="form-horizontal" id="emgCheck">
            <div class="container" align="center">
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter Applicant's full name:</span>
            <input type="text" class="form-control" id="basic-url" name="applicantName" placeholder="Applicant Name" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the Belt No:</span>
            <input type="text" class="form-control" id="basic-url" name="idNo" placeholder="Belt No"required  >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter PIS No:</span>
            <input type="text" class="form-control" id="basic-url" name="pis" placeholder="PIS No" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter rank:</span>
            <select class="custom-select" name="rank" required >
                <option value="" selected disabled>Please select</option>
                <option value="Police Constable">Police Constable</option>
                <option value="Senior Police Constable">Senior Police Constable</option>
                <option value="Police Head Constable">Police Head Constable</option>
                <option value="Assistant Sub-Inspector of Police">Assistant Sub-Inspector of Police</option>
                <option value="Sub-Inspector of Police">Sub-Inspector of Police</option>
                <option value="Assistant Inspector of Police">Assistant Inspector of Police</option>
                <option value="Inspector of Police">Inspector of Police</option>
                <option value="Assistant Commissioner of Police">Assistant Commissioner of Police</option>
                <option value="YAdditional Deputy Commissioner of Police">Additional Deputy Commissioner of Police</option>
                <option value="Deputy Commissioner of Police">Deputy Commissioner of Police</option>
            </select>
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Claim for Self or Relative:</span>
            <div id="radioOptions">
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="claimCheck" id="radioCheck" value="self" onclick="hide()" >
                    SELF
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="claimCheck" id="radioCheck" value="relative" onclick="show()">
                    RELATIVE
                </label>
              </div>
           </div>
          </div>
         <div class="input-group" id="dependent1">
            <span class="input-group-addon" id="basic-addon3">Enter relation with the CGHS holder:</span>
            <input type="text" class="form-control" id="basic-url" name="relation" placeholder="Relation"  >
         </div>
<!--         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter Pincode:</span>
            <input type="number" class="form-control" id="basic-url" name="pincode" placeholder="Pincode" required  >
         </div> -->
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Period of treatment</span>
            <input type="date" class="form-control" id="periodDate" name="startDate" required  >
            <span class="input-group-addon" id="periodTo">To</span>
            <input type="date" class="form-control" id="periodDate" name="endDate" >
         </div>
	 <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the Hospital Name:</span>
            <input type="text" class="form-control" id="basic-url" name="hospitalName" placeholder="Hospital Name" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the Hospital Address:</span>
            <input type="text" class="form-control" id="basic-url" name="hospitalAddress" placeholder="Address" required >
         </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter Diary No:</span>
            <input type="text" class="form-control" id="diary" name="diaryNo" placeholder="Diary No" required >
            <span class="input-group-addon" id="dated">/Genl. Branch/SED dated</span>
            <input type="date" class="form-control" id="diary" name="diaryDate" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the CGHS No of Applicant:</span>
            <input type="number" class="form-control" id="basic-url" name="appCGHSno" placeholder="Applicant CGHS Number" required  >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the expiry date of CGHS card of Applicant:</span>
            <input type="date" class="form-control" id="basic-url" name="appCGHSexp" required  >
         </div>
         <div class="input-group" id="dependent2">
            <span class="input-group-addon" id="basic-addon3">Enter the CGHS No of Dependent:</span>
            <input type="text" class="form-control" id="basic-url" name="refCGHSno" placeholder="Dependent CGHS Number" >
         </div>
         <div class="input-group" id="dependent3">
            <span class="input-group-addon" id="basic-addon3">Enter the expiry date of CGHS card of Dependent:</span>
            <input type="date" class="form-control" id="basic-url" name="refCGHSexp" >
         </div>
         <div class="input-group" id="dependent4">
            <span class="input-group-addon" id="basic-addon3">Dependent Certificate:</span>
            <div id="radioOptions">
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="dependentCertificate">
                    Attached
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="dependentCertificate">
                    Not Required
                </label>
              </div>
           </div>
         </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the category of CGHS Applicant:</span>
            <select class="custom-select" name="appCGHScategory" required >
                <option value="" selected disabled>Please select</option>
                <option value="General">General</option>
                <option value="Private">Private</option>
                <option value="Semi-Private">Semi-Private</option>
            </select>
         </div>       
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the disease of the patient:</span>
            <input type="text" class="form-control" id="basic-url" name="disease" placeholder="Disease" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the date of application:</span>
            <input type="date" class="form-control" id="basic-url" name="applicationDate" required  >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the amount requested in claim:</span>
            <input type="number" class="form-control" id="basic-url" name="amtAsked" placeholder="Amount Asked" required  >
         </div>
        <input type="hidden" name="refHospitalname">
         </div>
<!--            <h3>Checklist of documents required</h3>
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true"> <b>ID Card</b>
      </span>
    </div>
  </div>
    
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox"> <b>CGHS Card</b>
      </span>
    </div>
  </div>
</div>
               
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" name="dependentCertificate" > <b>Dependent Certificate</b>
      </span>
    </div>
  </div>
    
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true"> <b>Prescription Slip</b>
      </span>
    </div>
  </div>
</div>
               
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" > <b>Original Bill</b>
      </span>
    </div>
  </div>
    
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" > <b>Medical Bill</b>
      </span>
    </div>
  </div>
</div>
               
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" > <b>Main Bill Break-up</b>
      </span>
    </div>
  </div>
    
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" > <b>Discharge Summary</b>
      </span>
    </div>
  </div>
</div>
               
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" > <b>Lab Report</b>
      </span>
    </div>
  </div>
    
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" > <b>Duplicate Medical</b>
      </span>
    </div>
  </div>
</div>
               
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" name="reason" > <b>Reason for Late Submission</b>
      </span>
    </div>
  </div>
    
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" name="deathCertificate" > <b>Death Certificate</b>
      </span>
    </div>
  </div>
</div>
               
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" > <b>Photocopy of Medical</b>
      </span>
    </div>
  </div>
    
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" > <b>MRC Form</b>
      </span>
    </div>
  </div>
</div>
               
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" > <b>Emergency Certificate</b>
      </span>
    </div>
  </div>
    
  <div class="col-lg-6">
    <div class="input-group">
      <span id="pgspan" class="input-group-addon">
        <input type="checkbox" required="true" > <b>Reason for Non-govt. Hospital</b>
      </span>
    </div>
  </div>
</div>-->
<input type="hidden" name="ctype" value="opemg">
            <div class="bt"><input onClick="return validateForm()" type="button" class="btn btn-info" value="SUBMIT" />
      
    </div>
<!--        <button type="submit">S</button>-->
         </form>
    
      </div>
  </body>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/form-validation.js"></script>
</html>
