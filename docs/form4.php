<?php
$string ="";
if($value[r_cghs_no]!=0)
{
    $string="___________________________ (Name of the patient) W/O, S/O, D/O, F/O, M/O $value[rank] $value[applicant_name] (Name of the police officer/men) ";
}
else {
	$string="$value[rank] $value[applicant_name]";
}
$form4 ="<html>
  <head>
   <style>
        .container{
            font-size: 1.2em;
            margin-bottom: 100px;
            margin-top: 10px;
        }
    
         h3{
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
             margin-bottom: 30px;
        }
         table, th, td {
    border: 1px solid black;
}
table {
    border-collapse: collapse;
    margin-bottom:15px;
}
      </style> 
  </head>
  <body>
      <div class='container'>
       <h3>CALCULATION SHEET</h3>
          <p style='text-align:justify;'>Details of expenditures incurred on the treatment of<b> $string Belt No. $value[police_station_no] at $value[hospital_name] (Name of the Hospital)</b> where he/she remained admitted/under treatment from<b> $value[startdate] to $value[enddate](yy-mm-dd)</b>.
          </p>
       <table class='table'>
      <tbody>
      <tr>
        <td width='2%'>Sr. No.</td>
        <td width='23%'>Bill no. &<br> Name of the Hospital</td>
        <td width='15%'>Date of Bill</td>
        <td width='40%'>Name of the Tests/<br>Medicines etc.</td>
        <td width='10%'>Amount <br> claimed</td>
        <td width='10%'>Admissible <br> Amount</td>
      </tr>
     $data
     <tr>
      <td></td>
        <td ></td>
        <td></td>
        <td>Total</td>
        <td >$value[amt_asked]</td>
        <td>$value[amt_granted]</td>
        </tr>
    </tbody>
  </table>
<p style='text-indent:12%;text-align:justify;'>It is certified that the bills have been checked in totality and rates claimed by the treating hospitals are Matched/restricted to CGHS approved rates. The claim for the tests/pathology is cross referenced for checking the rates with the tests actually conducted.</p>
<div style='margin-top:20px;'>Signature of Dealing Assistant     ____________________</div>
<div style='margin-top:20px;'>Signature of Head Assistant         ____________________</div>
<div style='margin-top:20px;'>Signature of Inspector Administration___________________</div>
<div style='text-align:center;margin-bottom:30px;margin-top:40px;'>VERIFIED</div>
<div style='text-align:center;font-weight:bold'>ASSTT. COMMISIONER OF POLICE (HQ),</div>
<div style='text-align:center;font-weight:bold'>SOUTH-EAST DISTRICT, NEW DELHI.</div>
</div>
</body>
</html>";

?>
