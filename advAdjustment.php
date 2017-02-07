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
      <style>
#amtAsked,#amtGranted,#amtDue{
        width:400px;
        text-align: left;
    }    
</style>
  </head>
  <body onload="enterdiary()">
      
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
 <li><a href="advanceChecklist.php">Advance</a></li>
    <li><a href="#">Adjustment</a></li>
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
      
      
<form name="myForm" class="form-horizontal" id="advanceCheck" onsubmit="return validateForm()" action="add_new_referral.php" method="post">
             
         <div class="container" align="center">
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Applicant's full name:</span>
            <input type="text" class="form-control" id="basic-url" name="applicant_name" readonly disabled >
         </div>
         
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">PIS No:</span>
            <input type="text" class="form-control" id="basic-url" name="pis" readonly disabled>
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Rank:</span>
            <input type="text" class="form-control" id="basic-url" name="rank" readonly disabled>
         </div>
         
         <div class="input-group"  id="dependent1">
            <span class="input-group-addon" id="basic-addon3">Relation with the CGHS holder:</span>
            <input type="text" class="form-control" id="basic-url" name="relation" readonly disabled>
         </div>
         
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Period of treatment</span>
            <input type="date" class="form-control" id="periodDate" name="startdate" readonly disabled>
            <span class="input-group-addon" id="periodTo">To</span>
            <input type="date" class="form-control" id="periodDate" name="enddate" readonly disabled>
         </div>
	 <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Hospital Name:</span>
            <input type="text" class="form-control" id="basic-url" name="hospital_name" readonly disabled>
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Hospital Address:</span>
            <input type="text" class="form-control" id="basic-url" name="hospital_address" readonly disabled>
         </div>
             <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Police Station No:</span>
            <input type="text" class="form-control" id="basic-url" name="police_station_no" readonly disabled >
         </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Diary No:</span>
            <input type="text" class="form-control" id="diary" name="diary_no" readonly>
            <span class="input-group-addon" id="dated">/Genl. Branch/SED dated</span>
            <input type="date" class="form-control" id="diary" name="diary_date" readonly disabled>
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Referred Hospital Name:</span>
            <input type="text" class="form-control" id="basic-url" name="ref_hospital_name" readonly disabled>
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Disease of the patient:</span>
            <input type="text" class="form-control" id="basic-url" name="disease" readonly disabled>
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Date of application:</span>
            <input type="date" class="form-control" id="basic-url" name="application_date" readonly disabled>
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Amount granted:</span>
            <input type="number" class="form-control" name="amt_granted" id="amtGranted" readonly disabled>
         </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Amount requested in claim:</span>
            <input type="number" class="form-control" name="amtAsked" id="amtAsked" placeholder="Amount Asked" onkeyup="updateAmtdue();">
         </div>   
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Amount due:</span>
            <input type="number" class="form-control" name="amtDue" id="amtDue" placeholder="Amount Due" value ="">
         </div>
             
             <input type="hidden" name="ctype" value="adjust">
         <div class="bt"><input onClick="advanceProcess()" type="button" class="btn btn-info" value="SUBMIT" />
         </div>

         </div>
      </form>
         

      <script>
     
         function enterdiary(){
            var result = window.prompt("Enter Diary No");
             $.ajax({                    
  url: 'advance.php',     
  type: 'post', 
  data : {
    diaryNo : result 
  },
  dataType: 'json',
 success: function(data) {
     //data = '{"asdf":"Hello","qwerty":"world"}';  
//var jsonstr = JSON.stringify(data);
   // document.write(jsonstr);
    
     for(key in data)
{
  if(data.hasOwnProperty(key))
    $('input[name='+key+']').val(data[key]);
}

  }
             
//  error: function() {alert("Resorce not found");}
});
         }
          
    function updateAmtdue(){
    var amtg = document.getElementById("amtGranted").value;
    var amta = document.getElementById("amtAsked").value;
    document.getElementById("amtDue").value = amta - amtg;
    }
    
      </script>
      
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>