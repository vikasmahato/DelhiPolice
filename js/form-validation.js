function validateForm(){

    var formObject = document.forms["myForm"];

    var stDate = document.forms["myForm"]["startDate"].value;

    var edDate = document.forms["myForm"]["endDate"].value;

    var rel = document.forms["myForm"]["relation"].value;    

    var claim = document.forms["myForm"]["ctype"].value;
    

    if(rel=="" && claim!="advance" && claim!="adjust")

{

    formObject.elements["relation"].value = 'SELF';

    formObject.elements["refCGHSno"].value = 0;

    formObject.elements["refCGHSexp"].value = '2099-01-01';

    
   }

    var appexpdt = document.forms["myForm"]["appCGHSexp"].value;

    var refexpdt = document.forms["myForm"]["refCGHSexp"].value;
    

    if(stDate > edDate)

  { 	alert("Invalid period of treatment");
	return false; 	}

    if(stDate > appexpdt)

  {     alert("CGHS Card of Applicant has expired");
	return false;		}

    if(stDate > refexpdt)

  {     alert("CGHS Card of Dependent has expired");
	return false;		}
    
    switch(claim)
{
	case "opref" : refProcess();
		       break;
	case "opemg" : emgProcess();
		       break;
	case "ipref" : refProcess();
		       break;
       case "emgctd" : refProcess();
		       break;
       case "credit" : creditProcess();
		       break;
       case "permit" : permissionProcess();
		       break;
       case "advance" : advanceProcess();
                break;
       case "adjust": advanceProcess();
                break;
	     default : alert("Invalid Claim!");
}

}
