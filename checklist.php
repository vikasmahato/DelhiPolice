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
    <link rel="icon" href="../../favicon.ico">

    <title>Calculation Sheet</title>

    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Noto+Serif:400,700"> 
    <!-- Bootstrap core CSS -->
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Delhi Police</a>
        </div>
        
      </div>
    </nav>
      
      
    <!-- Begin page content -->
    <div class="container content">
        <form id="CalculationSheet" action="calcSheet.php" method="post">
      	<div>
      		 <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the category of CGHS Applicant:</span>
            <select class="custom-select" name="appCGHScategory" id="appCGHScategory" required >
                <option value="" selected disabled>Please select</option>
                <option value="General">General</option>
                <option value="Private">Private</option>
                <option value="Semi-Private">Semi-Private</option>
            </select>
         </div>
             <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Hospital Type:</span>
            <div id="radioOptions">
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="h_type" id="nabh_nabl" value="nabh_nabl">
                    NABH
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="h_type" id="non_nabh_nabl" value="non_nabh_nabl">
                    NON NABH
                </label>
              </div>
           </div>
         </div>
      		
      	</div>
      	<h2>&nbsp;</h2>
        
      	<div class='row'>
      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
      			<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
							<th width="5%">S No</th>
                            <th width="15%">Bill No, Hosp Name</th>
                            <th width="10%">Date</th>
							<th width="48%">Name of tests</th>
                            <th width="10%">Amount Claimed</th>
							<th width="10%">Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input class="case" type="checkbox"/></td>
							<td><input type="text" data-type="productCode" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"></td>
                            <td><input type="text" data-type="hospName" name="itemHosp[]" id="itemHosp_1" class="form-control" autocomplete="off"></td>
                            <td><input type="date" data-type="date" name="itemDate[]" id="itemDate_1" class="form-control" autocomplete="off"></td>
							<td><input type="text" data-type="productName" name="itemName[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
                            <td><input type="number" step="any" name="total_asked[]" id="total_asked_1" class="form-control totalAskedPrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
							<td><input type="number" step="any" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
						</tr>
					</tbody>
				</table>
      		</div>
      	</div>
      	<div class='row'>
      		<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
      			<button class="btn btn-danger delete" type="button">- Delete</button>
      			<button class="btn btn-success addmore" type="button">+ Add More</button>
      		</div>
      		<div class='col-xs-12 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-sm-5 col-md-5 col-lg-5'>
				<div class="form-group">
						<label>Amount asked: &nbsp;</label>
						<div class="input-group">
							<div class="input-group-addon">₹</div>
							<input type="number" step="any" class="form-control" name="askedTotal" id = "askedTotal" placeholder="Amount asked" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
						</div>
					</div>
					<div class="form-group">
						<label>Total: &nbsp;</label>
						<div class="input-group">
							<div class="input-group-addon">₹</div>
							<input type="number" step="any" class="form-control" name="subTotal" id = "subTotal" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
						</div>
					</div>
                <div class="bt"><button type="submit" class="btn btn-info" >SUBMIT</button>
                </div>
					</div>
			     </div>
				</form>
      </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/auto.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>





