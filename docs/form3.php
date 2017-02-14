<?php

$form3 ="<html>
  <head>
   <style>
              .container{
            font-size: 1.3em;
            margin-top: 5px;;
        }    
         h4{
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
        }
         table, th, td {
    border: 1px solid black;
    margin-top:5px;
    margin-bottom:5px;
}
table {
    border-collapse: collapse;
}
      </style>
  </head>
  <body>
      <div class='container'>
    <h4 style='text-align:center;'><b><u>OFFICE OF THE DEPUTY COMMISIONER OF POLICE SOUTH EAST DISTRICT,</u></b></h4>
          <h4><u><b>IST FLOOR, POLICE STATION SARITA VIHAR, NEW DELHI-110076.</u></b></h4>
          <div style='text-align:center'>No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; / Genl. Br. (SED) dated New Delhi, the </div>
        <div>To</div>
        <div style='margin-top:15px;margin-left:92px;'>The Deputy Commissioner of Police</div>
        <div style='margin-bottom:10px;margin-left:92px;'>General Administration/PHQ, Delhi</div>
          <div>Subject:- &nbsp;&nbsp;Regarding medical re-imbursement claim in respect of $value[applicant_name] No. $value[police_station_no].</div>
        <div style='margin-top:5px;'>Memo</div>
          <p style='text-indent:12%;'>
             It is informed that $value[applicant_name] was admitted in $value[hospital_name] Hospital in emergency. The treatment was taken by the patient in CGHS recognized Hospital on credit basis. Now, the hospital authority has submitted a medical claim (in duplicate) for reimbursement. As per the C.S.M.A. Rules, calculations statement has been prepared which is enclosed herewith. The details of the claim is as under:-
          </p>
    
      <table>
    <tbody>
      <tr>
        <th>Rank, Name & No. of the beneficiary</th>
        <th>Name of Hospital</th>
        <th>Name of disease</th>
        <th>Period of treatment</th>
        <th>Amount claimed</th>
        <th>Amount admissible</th>
      </tr>
      <tr>
       <td>$value[rank]<br>$value[applicant_name]<br>$value[police_station_no]</td>
        <td>$value[hospital_name]</td>
        <td>$value[disease]</td>
        <td>$value[startdate] to $value[enddate]</td>
        <td>$value[amt_asked]</td>
        <td>$value[amt_granted]</td>
      </tr>

    </tbody>
  </table>
    <p style='text-indent:12%;'>
        It is therefore, requested that necessary ex-past facto permission may kindly be obtained from the component authority and conveyed to this office at an early date. Funds are available under head “01.01.06 Medical Treatment” during the current financial year 2016-17.
    </p>
    <div style='text-align:right;font-weight:bold;margin-top:25px;'>ACP/HQ</div>
    <div class='row'>
    <div >Encls - <strong><u>As Above</u></strong></div>
    <div style='text-align:right'>For DY. COMMISIONER OF POLICE</div>
    </div>
    <div style='text-align:right'>SOUTH EAST DISTRICT, NEW DELHI</div>
    </div>
  </body>
</html>";

?>
     
     
