<?php
$string ="";
if($value[r_cghs_no]==0)
{
    $string="the claimant is a CGHS beneficiary having token card No. $value[a_cghs_no] ";
}
else {
    $string="the claimant and patient are CGHS beneficiary having token cards No. $value[a_cghs_no] & $value[r_cghs_no] respectively ";
}
$form2 ="<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Medical Claim</title>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <style>
        .container{
            font-size: 1.2em;
            margin-top: 30px;
        }
      </style>    
  </head>
  <body>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
      <div class='container'>
          <div>FR:- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Dairy No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; / Genl. Br. (SED) dated </div>
          <div>SUBJECT:- &nbsp; &nbsp; Regarding reimbursement of Medical Claim in Respect of $value[applicant_name] No. $value[police_station_no]</div>
          <p style='text-indent:17%;'>FR along with its enclosure may kindly be perused vide which $value[applicant_name] No. $value[police_station_no] has stated that he/she/his/her $value[relation] (relation with the principal employee) had taken treatment/test at $value[ref_hospital_name] (Name of Hospital/Lab) which is on panel of CGHS after referred from $value[hospital_name](Name of the CGHS wellness center/Govt. Hospital) and taken prior permission of HOO. He has further stated that an amounting to Rs. $value[amt_asked]/- was incurred on his/her treatment. Now he has requested to reimburse the same as per rules/instructions.
          </p>
          <p style='text-indent:17%;'>
          In this regard. It is submitted that $string and valid up to $value[a_cghs_exp]. Accordingly, we have prepared a calculation sheet on the basis of rates approved by the CGHS time to time and Rs $value[amt_granted]/- has been found admissible.
          </p>
          <p style='text-indent:17%;'>
          The Addl. DCP/SED may like to accord ex-post facto sanction of an amounting to Rs $value[amt_granted]/- ( Rupees $rupee_word ) for making payment to him/her on account of expenditure incurred by him/her on the treatment as mentioned at para 1/N above.
          </p>
          <p style='text-indent:17%;'>
          Funds are available under head 01.01.06 Medical Treatment during the current financial year 2016-17.
          </p>
          <p style='text-indent:17%;'>
          Submitted for kind perusal and para 3N above may kindly be approved please.
          </p>
        <div style='text-align:left;text-decoration:underline;font-weight:bold;margin-top:35px;'>HAG</div>
        <div style='text-align:left;text-decoration:underline;font-weight:bold;margin-top:15px'>INSPR/ADMIN</div>
        <div style='text-align:left;text-decoration:underline;font-weight:bold;margin-top:15px'>ACP/HQ</div>
        <div style='text-align:left;text-decoration:underline;font-weight:bold;margin-bottom:20px;margin-top:15px'>ADDL.DCP/SED</div>
        <p style='text-indent:12%;'>
        	Reference paras 1 to 6/N above, Necessary fair draft order is placed below for favour of signature, if approved please.
        </p>
     <div style='text-align:left;text-decoration:underline;font-weight:bold;margin-top:35px;'>HAG/SE</div>
        <div style='text-align:left;text-decoration:underline;font-weight:bold;margin-top:15px'>INSPR. ADMIN.</div>
        <div style='text-align:left;text-decoration:underline;font-weight:bold;margin-bottom:20px;margin-top:15px'>ACP</div>
</div>
  </body>
</html>";

?>