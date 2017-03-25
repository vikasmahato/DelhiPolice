<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
if( isset( $_POST['user_name'] ) ){
$query_for = $_POST['user_name'];
    $for="";
    if($query_for=="REEVAL"){
        $for="REEVAL_IADMIN','REEVAL_HAG','REEVAL_ACP";
    }elseif($query_for=="PROGRESS"){
        $for=" D_HAND','HAG','I_ADMIN','ACP','DCP ";
    }elseif($query_for=="OVERVIEW"){
        $for=" D_HAND','HAG','I_ADMIN','ACP','DCP','APPROVED', 'FAILED', 'REEVAL_IADMIN','REEVAL_HAG','REEVAL_ACP', 'PHQ ";
       // $for=" D_HAND','HAG','I_ADMIN','ACP','DCP ";
    }else{
        $for = $query_for;
    }
    if($query_for=="OVERVIEW") {echo " <div class='table-responsive'><table class='table table-striped'><thead>
                <tr><th>Name</th><th>To</th>
                  <th>Amount</th>
                  <th>Claim Type</th>
                  <th>Application Date</th></tr></thead><tbody>";}
    try{
         require 'database-config.php';

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM form WHERE status in ('$for') ORDER BY app_id DESC";  
        foreach ($dbh->query($sql) as $row) {
            if($query_for=="APPROVED")
            { get_query_approved($row,$dbh); }
            elseif($query_for=="FAILED")
            { get_query_dealing($row,$dbh); }
            elseif($query_for=="PROGRESS")
            { get_query_dealing($row,$dbh); }
            elseif($query_for=="REEVAL")
            { get_query_reeval($row,$dbh); }
            elseif($query_for=="PHQ")
            { get_query_phq($row,$dbh); }
            elseif($query_for=="HAG")
            { get_query($row,$dbh); }
            elseif($query_for=="I_ADMIN")
            { get_query($row,$dbh); }
            elseif($query_for=="ACP")
            { get_query($row,$dbh); }
            elseif($query_for=="DCP")
            { get_query_dcp($row,$dbh); }
            elseif($query_for=="OVERVIEW")
            {
                get_query_overview($row,$dbh); 
            }
          }
    }catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
    if($query_for=="OVERVIEW"){echo "</tbody>
            </table>
          </div>";}
}
function get_query_overview($row,$dbh) {
    try {
            echo  "<tr>
                  <td>$row[applicant_name]</td>
                  <td>$row[status]</td>
                  <td> $row[amt_asked]</td>
                  <td>$row[claim_type]</td>
                  <td>$row[application_date]</td>
                </tr>"; 
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
function getbuttons($case, $amount){
    switch ($case){
    case "PERMISSION":
        echo "<div class='col-md-3'><button type='submit' class='btn btn-info' name='form12_btn'>Notesheet</button></div>
        <div class='col-md-3'><button type='submit' class='btn btn-info'name='form13_btn'>Permission</button></div>";
        break;
    case "CREDIT":
        echo "<div class='col-md-3'><button type='submit' class='btn btn-info' name='form10_btn'>Notesheet</button></div>
        <div class='col-md-3'><button type='submit' class='btn btn-info'name='form22_btn'>Permission</button></div>";
        break;
    case "OP_REFERRAL":
        echo "<div class='col-md-3'><button type='submit' class='btn btn-info' name='form2_btn'>Notesheet</button></div>
        <div class='col-md-3'><button type='submit' class='btn btn-info'name='form4_btn'>Calculation Sheet</button></div>
        <div class='col-md-3'><button type='submit' class='btn btn-info'name='form15_btn'>Order</button></div>";
        break;
    case "OP_EMERGENCY":
        echo "<div class='col-md-3'><button type='submit' class='btn btn-info' name='form7_btn'>Forwarding Letter</button></div>
        <div class='col-md-3'><button type='submit' class='btn btn-info'name='form4_btn'>Calculation Sheet</button>
        </div>";
        break;
   case "IP_EMERGENCY":	
	 echo "<div class='col-md-3'><button type='submit' class='btn btn-info' name='form3_btn'>Forwarding Letter</button></div>
       <div class='col-md-3'><button type='submit' class='btn btn-info'name='form4_btn'>Calculation Sheet</button> </div>";
        break;
    }
if ($amount >= 200000 ) {
	echo "<div class='col-md-3'><button type='submit' class='btn btn-info' name='form9_btn'>PHQ Order</button></div>";
	}
}
function get_query_approved($row,$dbh) {
    
     try {   
    
        $sid= $row['app_id'];
            $row['amt_asked'] == "" ? $amt='N/A' : $amt=$row['amt_asked'];
            if($row['status']=="HAG"||$row['status']=="REEVAL_HAG") {$length = 20; $status="HAG";}
            elseif($row['status']=="I_ADMIN"||$row['status']=="REEVAL_IADMIN") {$length = 40;$status="Ins. Admin";}
            elseif($row['status']=="ACP"||$row['status']=="REEVAL_ACP") {$length = 60;$status="ACP";}
            elseif($row['status']=="DCP"||$row['status']=="REEVAL_DCP") {$length = 80;$status="DCP";}
              elseif($row['status']=="APPROVED") {$length = 100;$status="APPROVED";}
            
            $medical = "";
            $panelid =$sid."approved";
            $comment = "";
         
            $sql1= "SELECT * FROM medical WHERE app_id=$sid";
            foreach($dbh->query($sql1) as $row1){
                $medical = $medical."<b>$row1[treatment]</b> : $row1[total]<br>";
            }
            $sql2= "SELECT * FROM comments WHERE app_id=$sid";
            foreach($dbh->query($sql2) as $row2){
                $comment = $comment."<div class='panel-body'><b>$row2[user_id]</b> : $row2[comment]</div>";
            }
            echo "<div class='container'>
              <div class='panel-group'>
                <div class='panel panel-default'>
                  <div class='panel-heading'>
                    <h4 class='panel-title'>
                      <a data-toggle='collapse' href='#$panelid'><b>$row[applicant_name]</b></a>&emsp;$row[claim_type]
                    </h4>
                  </div>
                  <div id='$panelid' class='panel-collapse collapse'>
                  <div class='progress'>
   		 <div class='progress-bar' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width:$length%'>
     	 $status
    </div>
  </div>
                     <div class='row'><div class='col-md-12'><div class='panel-body'> $medical</div></div></div>
                     <div class='row'><div class='col-md-12'> $comment</div></div>
                    <div class='row'>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Rank</b> : $row[rank]<br>
                    <b> Relation </b>:  $row[relation]<br>
                    <b> Hospital Name </b>:  $row[hospital_name]<br>
                    <b> Police Station No. </b>:  $row[police_station_no]</div>
                    </div>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Diary No </b> : $row[diary_no]<br>
                    <b> CGHS Category </b>:  $row[a_cghs_category]<br>
                    <b> Disease </b>:  $row[disease]<br>
                    <b> Applicate Date </b>:  $row[application_date]<br>
                    <b> Amount asked </b>:  $amt </div>
                    <div class='form-group panel-body'>
                               <form action='utils/download.php' method='post' id='search_form' target='_blank'>
<input type='hidden' value='$sid' name='id'>
<div class='row'>";
getbuttons($row['claim_type'], $row['amt_granted']);
echo "</div>
</form>
                    </div>            
                    </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>";
 
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
function get_query_dealing($row,$dbh) {
    
    try {   
        
        $sid= $row['app_id'];
            $row['amt_asked'] == "" ? $amt='N/A' : $amt=$row['amt_asked'];
            if($row['status']=="FAILED") {$length = 5; $status="FAILED";}
            elseif($row['status']=="HAG"||$row['status']=="REEVAL_HAG") {$length = 20; $status="HAG";}
            elseif($row['status']=="I_ADMIN"||$row['status']=="REEVAL_IADMIN") {$length = 40;$status="Ins. Admin";}
            elseif($row['status']=="ACP"||$row['status']=="REEVAL_ACP") {$length = 60;$status="ACP";}
            elseif($row['status']=="DCP"||$row['status']=="REEVAL_DCP") {$length = 80;$status="DCP";}
             elseif($row['status']=="APPROVED") {$length = 100;$status="APPROVED";}
            
            $medical = "";
            $panelid =$sid."deal";
            $comment = "";
        
            $sql1= "SELECT * FROM medical WHERE app_id=$sid";
            foreach($dbh->query($sql1) as $row1){
                $medical = $medical."<b>$row1[treatment]</b> : $row1[total]<br>";
            }
            $sql2= "SELECT * FROM comments WHERE app_id=$sid";
            foreach($dbh->query($sql2) as $row2){
                $comment = $comment."<div class='panel-body'><b>$row2[user_id]</b> : $row2[comment]</div>";
            }
            echo "<div class='container'>
              <div class='panel-group'>
                <div class='panel panel-default'>
                  <div class='panel-heading'>
                    <h4 class='panel-title'>
                      <a data-toggle='collapse' href='#$panelid'><b>$row[applicant_name]</b></a>&emsp;$row[claim_type]
                    </h4>
                  </div>
                  <div id='$panelid' class='panel-collapse collapse'>
                  <div class='progress'>
    <div class='progress-bar' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width:$length%'>
      $status
    </div>
  </div>
                      <div class='row'><div class='col-md-12'><div class='panel-body'> $medical</div></div></div>
                     <div class='row'><div class='col-md-12'> $comment</div></div>
                    <div class='row'>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Rank</b> : $row[rank]<br>
                    <b> Relation </b>:  $row[relation]<br>
                    <b> Hospital Name </b>:  $row[hospital_name]<br>
                    <b> Police Station No. </b>:  $row[police_station_no]</div>
                    </div>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Diary No </b> : $row[diary_no]<br>
                    <b> CGHS Category </b>:  $row[a_cghs_category]<br>
                    <b> Disease </b>:  $row[disease]<br>
                    <b> Applicate Date </b>:  $row[application_date]<br>
                    <b> Amount asked </b>:  $amt </div>
                    <div class='form-group panel-body'>
                               <form action='utils/download.php' method='post' id='search_form' target='_blank'>
<input type='hidden' value='$sid' name='id'>
<div class='row'>";
getbuttons($row['claim_type'], $row['amt_granted']);
echo "</div>
</form>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>";
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
function get_query_reeval($row,$dbh) {
    try {
        $sid= $row['app_id'];
            $row['amt_asked'] == "" ? $amt='N/A' : $amt=$row['amt_asked'];
            if($row['status']=="HAG"||$row['status']=="REEVAL_HAG") {$length = 20; $status="HAG";}
            elseif($row['status']=="I_ADMIN"||$row['status']=="REEVAL_IADMIN") {$length = 40;$status="Ins. Admin";}
            elseif($row['status']=="ACP"||$row['status']=="REEVAL_ACP") {$length = 60;$status="ACP";}
            elseif($row['status']=="DCP"||$row['status']=="REEVAL_DCP") {$length = 80;$status="DCP";}
            elseif($row['status']=="APPROVED") {$length = 100;$status="APPROVED";} 
        $medical = "";
        $panelid =$sid."reeval";
        $comment = "";
        $sql1= "SELECT * FROM medical WHERE app_id=$sid";
        foreach($dbh->query($sql1) as $row1){
            $medical = $medical."<b>$row1[treatment]</b> : $row1[total]<br>";
        }
        $sql2= "SELECT * FROM comments WHERE app_id=$sid";
            foreach($dbh->query($sql2) as $row2){
                $comment = $comment."<div class='panel-body'><b>$row2[user_id]</b> : $row2[comment]</div>";
            }
            echo "<div class='container'>
              <div class='panel-group'>
                <div class='panel panel-default'>
                  <div class='panel-heading'>
                    <h4 class='panel-title'>
                      <a data-toggle='collapse' href='#$panelid'><b>$row[applicant_name]</b></a>&emsp;$row[claim_type]
                    </h4>
                  </div>
                  <div id='$panelid' class='panel-collapse collapse'>
                  <div class='progress'>
    <div class='progress-bar' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width:$length%'>
      $status
    </div>
  </div>
                      <div class='row'><div class='col-md-12'><div class='panel-body'> $medical</div></div></div>
                     <div class='row'><div class='col-md-12'> $comment</div></div>
                    <div class='row'>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Rank</b> : $row[rank]<br>
                    <b> Relation </b>:  $row[relation]<br>
                    <b> Hospital Name </b>:  $row[hospital_name]<br>
                    <b> Police Station No. </b>:  $row[police_station_no]</div>
                    </div>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Diary No </b> : $row[diary_no]<br>
                    <b> CGHS Category </b>:  $row[a_cghs_category]<br>
                    <b> Disease </b>:  $row[disease]<br>
                    <b> Applicate Date </b>:  $row[application_date]<br>
                    <b> Amount asked </b>:  $amt </div>
                    </div>
                    </div>
                    <form action='doclist.php' method='POST'>
                    <input type='hidden' value='$sid' name='id'>
                    <button type='submit' name='reeval' class='btn btn-success'>Re-Eval</button>
                    </form>
                    </div>
                </div>
              </div>
            </div>";
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
function get_query($row,$dbh) {
    
    try {   
    
        $sid= $row['app_id'];
             $row['amt_asked'] == "" ? $amt='N/A' : $amt=$row['amt_asked'];
            if($row['status']=="HAG"||$row['status']=="REEVAL_HAG") {$length = 20; $status="HAG";}
            elseif($row['status']=="PHQ") {$length = 20; $status="PHQ";}
            elseif($row['status']=="I_ADMIN"||$row['status']=="REEVAL_IADMIN") {$length = 40;$status="Ins. Admin";}
            elseif($row['status']=="ACP"||$row['status']=="REEVAL_ACP") {$length = 60;$status="ACP";}
            elseif($row['status']=="DCP"||$row['status']=="REEVAL_DCP") {$length = 80;$status="DCP";}
            elseif($row['status']=="APPROVED") {$length = 100;$status="APPROVED";}
            
            $medical = "";
            $panelid =$sid."query";
            $comment = "";
            
            $sql1= "SELECT * FROM medical WHERE app_id=$sid";
            foreach($dbh->query($sql1) as $row1){
                $medical = $medical."<b>$row1[treatment]</b> : $row1[total]<br>";
            }
            $sql2= "SELECT * FROM comments WHERE app_id=$sid";
            foreach($dbh->query($sql2) as $row2){
                $comment = $comment."<div class='panel-body'><b>$row2[user_id]</b> : $row2[comment]</div>";
            }
        
            echo "<div class='container'>
              <div class='panel-group'>
                <div class='panel panel-default'>
                  <div class='panel-heading'>
                    <h4 class='panel-title'>
                      <a data-toggle='collapse' href='#$panelid'><b>$row[applicant_name]</b></a>&emsp;$row[claim_type]
                    </h4>
                  </div>
                   <div id='$panelid' class='panel-collapse collapse'>
                   <div class='progress'>
    <div class='progress-bar' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width:$length%'>
      $status
    </div>
  </div>
                      <div class='row'><div class='col-md-12'><div class='panel-body'> $medical</div></div></div>
                     <div class='row'><div class='col-md-12'> $comment</div></div>
                    <div class='row'>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Rank</b> : $row[rank]<br>
                    <b> Relation </b>:  $row[relation]<br>
                    <b> Hospital Name </b>:  $row[hospital_name]<br>
                    <b> Police Station No. </b>:  $row[police_station_no]</div>
                    </div>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Diary No </b> : $row[diary_no]<br>
                    <b> CGHS Category </b>:  $row[a_cghs_category]<br>
                    <b> Disease </b>:  $row[disease]<br>
                    <b> Applicate Date </b>:  $row[application_date]<br>
                    <b> Amount asked </b>:  $amt </div>  </div> </div>
                    <form class='form-horizontal panel-body' role='form' id='formfield' method='POST' action='update.php' style='margin-left:0px'>
                    <div class='form-group' >
                     <label for='inputComment' class='col-md-1 control-label'>Comments</label>
                    <div class='col-md-11'>
                     <input type='text' class='form-control' id='inputComment' name='inputComment' placeholder='Comment' />
                    </div>
                    </div>
                    <input type='hidden' name='sid' value='$sid'>
                            <div class='form-group panel-body'>
                                <button type='submit' name='approve_btn' class='btn btn-success'>Approve</button>
                                <button type='submit' name='reval_btn' class='btn btn-warning'>Re-Eval</button>
                      </form>
                  </div>
                  
                    </div>
                </div>
              </div>
            </div>";
            
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
function get_query_phq($row,$dbh) {
    
    try {   
    
        $sid= $row['app_id'];
             $row['amt_asked'] == "" ? $amt='N/A' : $amt=$row['amt_asked'];
            if($row['status']=="HAG"||$row['status']=="REEVAL_HAG") {$length = 20; $status="HAG";}
            elseif($row['status']=="PHQ") {$length = 20; $status="PHQ";}
            elseif($row['status']=="I_ADMIN"||$row['status']=="REEVAL_IADMIN") {$length = 40;$status="Ins. Admin";}
            elseif($row['status']=="ACP"||$row['status']=="REEVAL_ACP") {$length = 60;$status="ACP";}
            elseif($row['status']=="DCP"||$row['status']=="REEVAL_DCP") {$length = 80;$status="DCP";}
            elseif($row['status']=="APPROVED") {$length = 100;$status="APPROVED";}
            
            $medical = "";
            $panelid =$sid."query";
            $comment = "";
            
            $sql1= "SELECT * FROM medical WHERE app_id=$sid";
            foreach($dbh->query($sql1) as $row1){
                $medical = $medical."<b>$row1[treatment]</b> : $row1[total]<br>";
            }
            $sql2= "SELECT * FROM comments WHERE app_id=$sid";
            foreach($dbh->query($sql2) as $row2){
                $comment = $comment."<div class='panel-body'><b>$row2[user_id]</b> : $row2[comment]</div>";
            }
        
            echo "<div class='container'>
              <div class='panel-group'>
                <div class='panel panel-default'>
                  <div class='panel-heading'>
                    <h4 class='panel-title'>
                      <a data-toggle='collapse' href='#$panelid'><b>$row[applicant_name]</b></a>&emsp;$row[claim_type]
                    </h4>
                  </div>
                   <div id='$panelid' class='panel-collapse collapse'>
                   <div class='progress'>
    <div class='progress-bar' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width:$length%'>
      $status
    </div>
  </div>
                      <div class='row'><div class='col-md-12'><div class='panel-body'> $medical</div></div></div>
                     <div class='row'><div class='col-md-12'> $comment</div></div>
                    <div class='row'>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Rank</b> : $row[rank]<br>
                    <b> Relation </b>:  $row[relation]<br>
                    <b> Hospital Name </b>:  $row[hospital_name]<br>
                    <b> Police Station No. </b>:  $row[police_station_no]</div>
                    </div>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Diary No </b> : $row[diary_no]<br>
                    <b> CGHS Category </b>:  $row[a_cghs_category]<br>
                    <b> Disease </b>:  $row[disease]<br>
                    <b> Applicate Date </b>:  $row[application_date]<br>
                    <b> Amount asked </b>:  $amt </div>  </div> </div>
                    <form class='form-horizontal panel-body' role='form' id='formfield' method='POST' action='update.php' style='margin-left:0px'>
                    <div class='form-group' >
                     <label for='inputComment' class='col-md-2 control-label'>PHQ Memo No</label>
                    <div class='col-md-10'> <input type='text' class='form-control' id='inputMemo' name='inputMemo' placeholder='Memo No' /> </div>
                    </div>
		<div class='form-group'>
		<label for='memoDate' class='col-md-2 control-label'>PHQ Memo Date</label>
		<div class='col-md-10'><input type='date' class='form-control' id='inputMemoDate' name='inputMemoDate' /></div>
		</div>
                    <input type='hidden' name='sid' value='$sid'>
                            <div class='form-group panel-body'>
                                <button type='submit' name='memo_btn' class='btn btn-success'>Approve</button>
                                <button type='submit' name='reval_btn' class='btn btn-warning'>Re-Eval</button>
                      </form>
                  </div>
                  
                    </div>
                </div>
              </div>
            </div>";
            
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

function get_query_dcp($row,$dbh) {
    
    try {   
    
        $sid= $row['app_id'];
             $row['amt_asked'] == "" ? $amt='N/A' : $amt=$row['amt_asked'];
            if($row['status']=="HAG"||$row['status']=="REEVAL_HAG") {$length = 20; $status="HAG";}
            elseif($row['status']=="PHQ") {$length = 20; $status="PHQ";}
            elseif($row['status']=="I_ADMIN"||$row['status']=="REEVAL_IADMIN") {$length = 40;$status="Ins. Admin";}
            elseif($row['status']=="ACP"||$row['status']=="REEVAL_ACP") {$length = 60;$status="ACP";}
            elseif($row['status']=="DCP"||$row['status']=="REEVAL_DCP") {$length = 80;$status="DCP";}
            elseif($row['status']=="APPROVED") {$length = 100;$status="APPROVED";}
            
            $medical = "";
            $panelid =$sid."query";
            $comment = "";
            
            $sql1= "SELECT * FROM medical WHERE app_id=$sid";
            foreach($dbh->query($sql1) as $row1){
                $medical = $medical."<b>$row1[treatment]</b> : $row1[total]<br>";
            }
            $sql2= "SELECT * FROM comments WHERE app_id=$sid";
            foreach($dbh->query($sql2) as $row2){
                $comment = $comment."<div class='panel-body'><b>$row2[user_id]</b> : $row2[comment]</div>";
            }
        
            echo "<div class='container'>
              <div class='panel-group'>
                <div class='panel panel-default'>
                  <div class='panel-heading'>
                    <h4 class='panel-title'>
                      <a data-toggle='collapse' href='#$panelid'><b>$row[applicant_name]</b></a>&emsp;$row[claim_type]
                    </h4>
                  </div>
                   <div id='$panelid' class='panel-collapse collapse'>
                   <div class='progress'>
    <div class='progress-bar' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width:$length%'>
      $status
    </div>
  </div>
                      <div class='row'><div class='col-md-12'><div class='panel-body'> $medical</div></div></div>
                     <div class='row'><div class='col-md-12'> $comment</div></div>
                    <div class='row'>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Rank</b> : $row[rank]<br>
                    <b> Relation </b>:  $row[relation]<br>
                    <b> Hospital Name </b>:  $row[hospital_name]<br>
                    <b> Police Station No. </b>:  $row[police_station_no]</div>
                    </div>
                    <div class='col-md-6'>
                    <div class='panel-body'><b>Diary No </b> : $row[diary_no]<br>
                    <b> CGHS Category </b>:  $row[a_cghs_category]<br>
                    <b> Disease </b>:  $row[disease]<br>
                    <b> Applicate Date </b>:  $row[application_date]<br>
                    <b> Amount asked </b>:  $amt </div>  </div> </div>
                    <form class='form-horizontal panel-body' role='form' id='formfield' method='POST' action='update.php' style='margin-left:0px'>
                    <div class='form-group' >
                     <label for='inputComment' class='col-md-1 control-label'>Comments</label>
                    <div class='col-md-11'>
                     <input type='text' class='form-control' id='inputComment' name='inputComment' placeholder='Comment' />
                    </div>
                    </div>
                    <input type='hidden' name='sid' value='$sid'>
                            <div class='form-group panel-body'>
                                <button type='submit' name='approve_btn' class='btn btn-success'>Approve</button>
                                <button type='submit' name='reval_btn' class='btn btn-warning'>Re-Eval</button><button type='submit' name='deny_btn' class='btn btn-danger'>Deny</button>
                      </form>
                  </div>
                  
                    </div>
                </div>
              </div>
            </div>";
            
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
?>
