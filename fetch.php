<?php
require 'panel.php';

$query_for="";
function fetch_for_dcp(){
    $query_for="DCP";
    get_query_dcp($query_for);

}

function fetch_for_d_hand(){
    $query_for="DCP";
    get_query($query_for);

}

function fetch_for_hag(){
    $query_for="HAG";
    get_query($query_for);

}

function fetch_for_acp(){
    $query_for="ACP";
    get_query($query_for);

}

function fetch_for_iadmin(){
    $query_for="I_ADMIN";
    get_query($query_for);

}

function fetch_approved(){
    $query_for="APPROVED";
    get_query_approved($query_for);

}

function fetch_inprogress(){
    $query_for=" D_HAND','HAG','I_ADMIN','ACP','DCP ";
    get_query_dealing($query_for);

}

function fetch_failed(){
    $query_for="FAILED";
    get_query_dealing($query_for);

}

function fetch_waiting(){
    $query_for="PHQ";
    get_query($query_for);

}

function fetch_reeval(){
    
    $query_for = "REEVAL_IADMIN','REEVAL_HAG','REEVAL_ACP";
    get_query_reeval($query_for);
}


?>
