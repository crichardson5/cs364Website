function processRequest() {
        var url = 'http://localhost/~student/cs364Website/api/budgets/john' //document.getElementById('url').value;
        var method = 'GET'; //document.getElementById('method').value;
        var content = '';//'{"isbn": "0000136006374","title": "A First Course in Database Systems","copyright": 2008,"publisher": "Pearson Education, Inc."}' //document.getElementById('content').value;

        var request = new XMLHttpRequest();
        request.onload = function() {
          var response = document.getElementById('response');
          response.value = request.response;

          var status = document.getElementById('status');
          status.value = request.status;
        };
        request.open(method, url, true);
        request.send(content);
      }

function Validate_Info_Form_Data(){
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
  
 var letters = /^[A-Za-z\s\-]+$/;

 if(password.length < 1)  {  	
        errorsWithForm = false;
	return errorsWithForm;  	
      }
 if(password.length > 50) {  	
        errorsWithForm = false;
        alert("Password has exceeded limit.");
	return errorsWithForm;  	
      }
if(emailAddress.length < 1)  {  	
        errorsWithForm = false;
	return errorsWithForm;  	
      }
 if(emailAddress.length > 50) {  	
        errorsWithForm = false;
        alert("Email address has exceeded limit.");
	return errorsWithForm;  	
      }

var emailHitter = /^[A-Za-z0-9_.-]+[@]{1}[A-Za-z0-9_.-]+$/;
if(!(emailHitter.test(emailAddress)))
{
errorsWithForm = false;
alert("Not a valid email address.");
return errorsWithForm;
}

function Validate_Create_Form_Data(){
  //Set errorsWithForm to False
  var errorsWithForm = true;

  var firstName = document.forms["createAccount"]["first_name"].value;
  if (firstName == "") {
    alert("First name must be filled out");
    errorsWithForm = false;
    return errorsWithForm;
   }

  var lastName = document.forms["createAccount"]["last_name"].value;
  if (lastName == "") {
    alert("Last name must be filled out");
    errorsWithForm = false;
    return errorsWithForm;
   }

  var firstnameHitter = /^[A-Za-z]+$/;
  if(!(firstnameHitter.test(firstName)))
  {
   errorsWithForm = false;
   alert("Not a valid first name.");
   return errorsWithForm;
   }

   var lastnameHitter = /^[A-Za-z]+$/;
   if(!(lastnameHitter.test(lastName)))
   {
    errorsWithForm = false;
    alert("Not a valid last name.");
    return errorsWithForm;
    }

 if(firstName.length < 1)  {  	
        errorsWithForm = false;
	return errorsWithForm;  	
      }
 if(firstName.length > 50) {  	
        errorsWithForm = false;
        alert("First name has exceeded limit.");
	return errorsWithForm;  	
      }

if(lastName.length < 1)  {  	
        errorsWithForm = false;
	return errorsWithForm;  	
      }
 if(lastName.length > 50) {  	
        errorsWithForm = false;
        alert("Last name has exceeded limit.");
	return errorsWithForm;  	
      }
  
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
  
 var letters = /^[A-Za-z\s\-]+$/;

 if(password.length < 1)  {  	
        errorsWithForm = false;
	return errorsWithForm;  	
      }
 if(password.length > 50) {  	
        errorsWithForm = false;
        alert("Password has exceeded limit.");
	return errorsWithForm;  	
      }
if(emailAddress.length < 1)  {  	
        errorsWithForm = false;
	return errorsWithForm;  	
      }
 if(emailAddress.length > 50) {  	
        errorsWithForm = false;
        alert("Email address has exceeded limit.");
	return errorsWithForm;  	
      }

var emailHitter = /^[A-Za-z0-9_.-]+[@]{1}[A-Za-z0-9_.-]+$/;
if(!(emailHitter.test(emailAddress)))
{
errorsWithForm = false;
alert("Not a valid email address.");
return errorsWithForm;
}

return errorsWithForm


//End Validate_Create_Form_Data
}
