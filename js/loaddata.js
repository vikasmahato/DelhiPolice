function overview(){
     $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   user_name:"OVERVIEW",
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
}
function approved()
{   
  $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   user_name:"APPROVED",
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
    
}


function rejected()
{   
  $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   user_name:"FAILED",
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
    
}


function progress()
{   
  $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   user_name:"PROGRESS",
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
    
}


function reeval()
{   
  $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   user_name:"REEVAL",
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
    
}


function phq()
{   
  $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   user_name:"PHQ",
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
    
}

function hag()
{   
  $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   user_name:"HAG",
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
    
}
function iadmin()
{   
  $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   user_name:"I_ADMIN",
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
    
}
function acp()
{   
  $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   user_name:"ACP",
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
    
}
function dcp()
{   
  $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   user_name:"DCP",
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
    
}
function reevalForm(){
    alert("Reeval");
    window.open ('doclist.php','_self',false);
}
