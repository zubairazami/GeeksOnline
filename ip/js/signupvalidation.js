 function validateForm()
 {
 	var showAlert = false;
 	var submit = true;
 	var username = document.forms["signupform"]["username"].value;
 	var password = document.forms["signupform"]["password"].value;
 	var retypepassword = document.forms["signupform"]["retypepassword"].value;
 	var msg = "Please, consider following case(s) :\n";

 	if(validateField(username)==false)
 	{
 		msg = msg + ">  The username has to be in between 6-15 character & may contain only Alphabet, Number & Underscore."+"\n";
 		showAlert = true;
 		
 	}
 	if(validatePass(password)==false)
 	{
 		msg = msg + ">  The password has to be in between 6-15 character & may contain only Alphabet & Number."+"\n";
 		showAlert = true;
 	}

 	if (passwordmatch(password,retypepassword)==false)
 	{
 		msg = msg + ">  Both password need to match" + "\n";
 		showAlert = true;
 	}
 	if(showAlert)
 	{
 		alert(msg);
 		submit = false;
 	}
 	return submit;
 }

function validateField(inputtxt)  
{  	
	var inputSize = inputtxt.length;
	if(inputSize < 6 || inputSize > 15)
	{
		return false;
	}
	var RegularExpression = /^([a-zA-Z0-9_]+)$/;
	if (inputtxt.match(RegularExpression)) 
	{
		return true;
	}
	else
	{
		return false;
	}
		
}

function validatePass(inputtxt)  
{  	
	var inputSize = inputtxt.length;
	if(inputSize < 6 || inputSize > 15)
	{
		return false;
	}
	var RegularExpression = /^([a-zA-Z0-9]+)$/;
	if (inputtxt.match(RegularExpression)) 
	{
		return true;
	}
	else
	{
		return false;
	}
		
}

function passwordmatch(password,retypepassword)
{
	if(password == retypepassword)
		return true;
	else
		return false;
}