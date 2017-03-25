<?php
$string = "$value[relation]";
if($value[relation]=="own"){
    $string = "self";
}
$form12 = "<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <title>Medical Claim</title>
  </head>
  <body>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
      <div class='container' style='margin-bottom:70px; margin-top:40px; font-size:1.3em;'>
          <h3 style='text-align:center; margin-bottom:40px;'><b><u>NOTE SHEET</u></b></h3>
          <div>FR:-&nbsp; &nbsp; &nbsp; &nbsp; Diary No.<b> $value[diary_no]</b>/Genl. Br. (SED) dated<b> $value[diary_date]</b></div>
          <div  style='margin-top:8px;'>Subject:- <b>An application submitted by $value[rank] $value[applicant_name], No. $value[police_station_no] (PIS No. $value[pis]) regarding grant of permission for taking treatment in empanelled hospital under CGHS.</b></div> 
        <p style='text-indent:12%;text-align:justify;'>FR along with its enclosures may kindly be persued vide which <b>$value[rank] $value[applicant_name] No. $value[police_station_no] (PIS No. $value[pis])</b> has requested that he/she may be granted permission for taking treatment of his/her <b> $string </b>(relation of the patient) in <b>$value[ref_hospital_name]</b> as CMO-CGHS Dispensary/Govt. Hospital. <b>$value[hospital_name]</b> has referred to his/her <b>$value[relation]</b>(relation of patient) treatment at any CGHS approved Hospital.</p>
       <p style='text-indent:12%;text-align:justify;'>In this connection, it is submitted that the CMO-CGHS Dispensary/Govt. Hospital has referred to any CGHS approved Hospital. As such, Addl. DCP/SED (H.O.O) may like to accord permission to <b>$value[rank] $value[applicant_name]</b>, No. <b>$value[police_station_no] (PIS No. $value[pis]) </b>for treatment of his/her<b> $string</b> in <b>$value[ref_hospital_name]</b>. He/She is a CGHS beneficiary having a valid CGHS card ID No. <b>$value[a_cghs_no]</b>. He/She is entitled for <b>$value[a_cghs_category]</b> ward category (calculated as per basic pay of Govt. Servant).
         Permission is valid for __________________ w.e.f. <b>$value[startdate]</b> (yy-mm-dd).</p>  
      <div style='margin-top:75px;'><b><u>HAG/SE</u></b></div>
      <div style='margin-top:15px;'><b><u>INSPR. ADMN.</u></b></div>
      <div style='margin-top:15px;'><b><u>ACP/HQ</u></b></div>
      <div style='margin-top:15px;'><b><u>ADDL. DCP/SED</u></b></div>
      </div>      
  </body>
</html>";

?>
