<?php

function log1($user1, $action){
require '../database-config.php';

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO logs (user_name, action) VALUES ('$user1', '$action')";
$dbh->exec($sql);
echo "success";
}
function ref_log(){
log1("Dealing Hand", "Added new referral case");
}

function emg_log(){
log1("Dealing Hand","Added new emergency case");
}

function  reeval_log(){
log1("Dealing Hand", "Reevaluated a form");
}

function  phq_approval_log(){
log1("Dealing Hand","Sent to PHQ for approval");
}

function phq_approval_recieved_log(){
log1("Dealing Hand", "Recieved PHQ approval");
}

function hag_approve_log(){
log1("HAG", "Approved");
}

function hag_reeval_log(){
log1("HAG","Sent for reevaluation");
}

function acp_approve_log(){
log1("ACP", "Approved");
}

function acp_reeval_log(){
log1("ACP","Sent for reevaluation");
}

function iadmin_reeval_log(){
log1("I Admin","Sent for reevaluation");
}

function  iadmin_approve_log(){
log1("I Admin", "Approved");
}

function dcp_approve_log(){
log1("DCP", "Sent for approval");
}

function dcp_reeval_log(){
log1("DCP","Sent for reevaluation");
}

function dcp_deny_log(){
log1("ACP","Denied");
}
?>
