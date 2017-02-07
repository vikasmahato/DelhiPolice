<?php

function showdate(){
    date_default_timezone_set('Asia/Calcutta');
/*    $mydate=getdate(date("U"));
$date =  "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";*/
    
    $today = date('d/m/Y H:i:s', time());;          
    return $today;
}

function new_ref(){
    
    $filename = '../logs/dealing.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' New Referral Case'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function new_emg(){
        $filename = '../logs/dealing.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' New Emergency Case'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function reeval_log(){
        $filename = '../logs/dealing.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' Re-Evaluation Done'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function phq_approval_sent(){
        $filename = '../logs/dealing.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' Request PHQ for approval'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function phq_approval_recieved(){
        $filename = '../logs/dealing.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' Approval from PHQ recieved'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function calcsheet(){
        $filename = '../logs/dealing.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' Calculation Sheet made'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function hag_approve(){
    $filename = '../logs/hag.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' New Approval'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
    exit;
}

function hag_reeval(){
    $filename = '../logs/hag.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' Request for Re-Eval sent'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function acp_approve(){
    $filename = '../logs/acp.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' New Approval'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function acp_reeval(){
    $filename = '../logs/acp.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' Request for Re-Eval sent'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function iadmin_approve(){
    $filename = '../logs/iadmin.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' New Approval'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function iadmin_reeval(){
    $filename = '../logs/iadmin.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' Request for Re-Eval sent'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function dcp_approve(){
    $filename = '../logs/dcp.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' New Approval'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function dcp_reeval(){
    $filename = '../logs/dcp.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' Request for Re-Eval sent'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}

function dcp_deny(){
    $filename = '../logs/dcp.log';
$handle = fopen($filename, 'a'); /*or die('Cannot open file:  '.$filename);*/
$data = showdate().' Denied action'.PHP_EOL;
fwrite($handle, $data);
    fclose($handle);
}


?>