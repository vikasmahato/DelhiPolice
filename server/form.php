<?php

function form(){
    echo '  <div class="container" align="center">
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter Applicants full name:</span>
            <input type="text" class="form-control" id="basic-url" name="applicantName" placeholder="Applicant Name" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the Belt No:</span>
            <input type="text" class="form-control" id="basic-url" name="idNo" placeholder="Belt No" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter PIS No:</span>
            <input type="number" class="form-control" id="basic-url" name="pis" placeholder="PIS No" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter rank:</span>
            <select class="custom-select" name="rank" required >
                <option value="" selected disabled>Please select</option>
                <option value="Police Constable">Police Constable</option>
                <option value="Senior Police Constable">Senior Police Constable</option>
                <option value="Police Head Constable">Police Head Constable</option>
                <option value="Assistant Sub-Inspector of Police">Assistant Sub-Inspector of Police</option>
                <option value="Sub-Inspector of Police">Sub-Inspector of Police</option>
                <option value="Inspector of Police">Inspector of Police</option>
                <option value="Assistant Commissioner of Police">Assistant Commissioner of Police</option>
                <option value="YAdditional Deputy Commissioner of Police">Additional Deputy Commissioner of Police</option>
                <option value="Deputy Commissioner of Police">Deputy Commissioner of Police</option>
            </select>
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Claim for Self or Relative:</span>
            <div id="radioOptions">
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="claimCheck" id="radioCheck" value="self" onclick="hide()">
                    SELF
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="claimCheck" id="radioCheck" value="relative" onclick="show()">
                    RELATIVE
                </label>
              </div>
           </div>
         </div>
         <div class="input-group"  id="dependent1">
            <span class="input-group-addon" id="basic-addon3">Enter relation with the CGHS holder:</span>
            <input type="text" class="form-control" id="basic-url" name="relation" placeholder="Relation" >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter Pincode:</span>
            <input type="number" class="form-control" id="basic-url" name="pincode" placeholder="Pincode" required >
         </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Period of treatment</span>
            <input type="date" class="form-control" id="periodDate" name="startDate" required >
            <span class="input-group-addon" id="periodTo">To</span>
            <input type="date" class="form-control" id="periodDate" name="endDate" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the Hospital Name:</span>
            <input type="text" class="form-control" id="basic-url" name="hospitalName" placeholder="Hospital Name" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the Hospital Address:</span>
            <input type="text" class="form-control" id="basic-url" name="hospitalAddress" placeholder="Address" required >
         </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the Police Station No:</span>
            <input type="number" class="form-control" id="basic-url" name="policestationNo" placeholder="Police Station No" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter SI No:</span>
            <input type="text" class="form-control" id="basic-url" name="siNo" placeholder="SI No" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter Diary No:</span>
            <input type="text" class="form-control" id="basic-url" name="diaryNo" placeholder="Diary No" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter Referred Hospital Name:</span>
            <input type="text" class="form-control" id="basic-url" name="refHospitalname" placeholder="Referred Hospital Name" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the CGHS No of Applicant:</span>
            <input type="number" class="form-control" id="basic-url" name="appCGHSno" placeholder="Applicant CGHS Number" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the expiry date of CGHS card of Applicant:</span>
            <input type="date" class="form-control" id="basic-url" name="appCGHSexp" required >
         </div>
         <div class="input-group" id="dependent2">
            <span class="input-group-addon" id="basic-addon3">Enter the CGHS No of Dependent:</span>
            <input type="text" class="form-control" id="basic-url" name="refCGHSno" placeholder="Dependent CGHS Number" >
         </div>
         <div class="input-group" id="dependent3">
            <span class="input-group-addon" id="basic-addon3">Enter the expiry date of CGHS card of Dependent:</span>
            <input type="date" class="form-control" id="basic-url" name="refCGHSexp" >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the category of CGHS Applicant:</span>
            <input type="text" class="form-control" id="basic-url" name="appCGHScategory" placeholder="CGHS Applicant Category" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the disease of the patient:</span>
            <input type="text" class="form-control" id="basic-url" name="disease" placeholder="Disease" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the date of application:</span>
            <input type="date" class="form-control" id="basic-url" name="applicationDate" required >
         </div>
         <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Enter the amount requested in claim:</span>
            <input type="number" class="form-control" id="basic-url" name="amtAsked" placeholder="Amount Asked" required >
         </div>
         </div>
';
}
?>