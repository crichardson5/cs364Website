function transactionSwitch() {
  // Get the checkbox
  var checkBox = document.getElementById("transSwitch");
  // Get the output text
  var text = document.getElementById("submitTransaction");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.value = "Submit Income";
  } else {
    text.value = "Submit Expense";
  }
}
function Validate_Info_Form_Data(){
  //Set errorsWithForm to False
  var errorsWithForm = true;
  
 var emailAddress = document.forms["loginPage364"]["emailAddress"].value;
  if (emailAddress == "") {
    alert("Email Address name must be filled out");
    errorsWithForm = false;
    return errorsWithForm;
  }
  var password = document.forms["loginPage364"]["password"].value;
  if (password == "") {
    alert("Password must be filled out");
    errorsWithForm = false;
    return errorsWithForm;
   }
  
 if(password.length < 1 || password.length >50)  {  	
        errorsWithForm = false;
 alert("Password does not meet length criteria.");
	return errorsWithForm;  	
      }
 
if(emailAddress.length < 1 || emailAddress.length >50)  {  	
        errorsWithForm = false;
 alert("Email does not meet length criteria.");
	return errorsWithForm;  	
      }

var emailHitter = /^[A-Za-z0-9_.-]+[@]{1}[A-Za-z0-9_.-]+$/;
if(!(emailHitter.test(emailAddress)))
{
errorsWithForm = false;
alert("Not a valid email address.");
return errorsWithForm;
}
}

function Validate_Create_Form_Data(){
  //Set errorsWithForm to False
  var errorsWithForm = true;
  
 var emailAddress = document.forms["createAccount"]["emailAddress"].value;
  if (emailAddress == "") {
    alert("Email Address name must be filled out");
    errorsWithForm = false;
    return errorsWithForm;
  }
  var password = document.forms["createAccount"]["password"].value;
  if (password == "") {
    alert("Password must be filled out");
    errorsWithForm = false;
    return errorsWithForm;
   }
  
 var letters = /^[a-zA-Z]+$/;
 var firstName = document.forms["createAccount"]["first_name"].value;
   if(!(letters.test(firstName)))
   {
   errorsWithForm = false;
   alert("Not a valid first name.");
   return errorsWithForm;
   }

   var letters = /^[A-Za-z\s\-]+$/;
   var lastName = document.forms["createAccount"]["last_name"].value;
   if(!(letters.test(lastName)))
   {
   errorsWithForm = false;
   alert("Not a valid last name.");
   return errorsWithForm;
   }



 if(password.length < 1 || password.length >50)  {  	
        errorsWithForm = false;
 alert("Password does not meet length criteria.");
	return errorsWithForm;  	
      }
 
if(emailAddress.length < 1 || emailAddress.length >50)  {  	
        errorsWithForm = false;
 alert("Email does not meet length criteria.");
	return errorsWithForm;  	
      }

var emailHitter = /^[A-Za-z0-9_.-]+[@]{1}[A-Za-z0-9_.-]+$/;
if(!(emailHitter.test(emailAddress)))
{
errorsWithForm = false;
alert("Not a valid email address.");
return errorsWithForm;
}

}

function changeDate(){
	//enable submit button
  var submitButton = document.getElementById("submitMonth");
  submitButton.disabled = false;
}

