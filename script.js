function Validate_Info_Form_Data(){
  //Set errorsWithForm to False
  var errorsWithForm = true;

var emailAddress = document.forms["loginPage364"]["emailAddress"].value;
  if (emailAddress == "") {
    alert("Email Address name must be filled out");
    errorsWithForm = false;
    return errorsWithForm;
  }

  var password= document.forms["loginPage364"]["password"].value;
  if (password == "") {
    alert("Password must be filled out");
    errorsWithForm = false;
    return errorsWithForm;
   }
  
 

var letters = /^[A-Za-z\s\-]+$/;

if(!(letters.test(password)))
{
errorsWithForm = false;
return errorsWithForm;
}

 if(password.length < 1)  {  	
        errorsWithForm = false;
	return errorsWithForm;  	
      }
 if(password.length > 50) {  	
        errorsWithForm = false;
	return errorsWithForm;  	
      }

if(emailAddress.length < 1)  {  	
        errorsWithForm = false;
	return errorsWithForm;  	
      }
 if(emailAddress.length > 50) {  	
        errorsWithForm = false;
	return errorsWithForm;  	
      }


}
var emailHitter = /^[A-Za-z0-9_.-]+[@]{1}[A-Za-z0-9_.-]+$/;
var getTested = 0;
if(!(emailHitter.test(emailAddress)))
{
errorsWithForm = false;
return errorsWithForm;
}

return errorsWithForm


//End Validate_Info_Form_Data
}