
/* 
Only Alphabet
example : 
abc - true
123 - false
*/
function validateAlphabet(value)
{
	var alphabet =  /^[a-zA-Z]+$/; 
	if(value.match(alphabet))
	{
		return true;
	}
	else
	{
		return false;
	}
}

/* Email
example : 
email@gmail.com - true
email@ - false
*/
function validateEmail(value)
{
	var email =  /^([a-z0-9+_-]+)(.[a-z0-9+_-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/; 
	if(value.match(email))
	{
		return true;
	}
	else
	{
		return false;
	}
}

/* Number 
example : 
123 - true
abc - false
*/
function validateNumber(value)
{
	var number =  /^[-+]?[0-9]+$/; 
	if(value.match(number))
	{
		return true;
	}
	else
	{
		return false;
	}
}

/* double 
example : 
4.44 - true
4 - false
*/
function validateDoubleNumber(value)
{
	var double =  /(\d{1,2}\.(?=\d{1,2}))/; 
	if(value.match(double))
	{
		return true;
	}
	else
	{
		return false;
	}
}

/* phone number 
example : 
1234 - true
abcd - false
*/
function validateMobileNumber(value)  
{  
	if( value.length != 10)
	{
		return false;
	}
	var phoneno=  /^[0-9 .!?"-]+$/; 
	if(value.match(phoneno))
	{
		return true;
	}
	else
	{
		return false;
	}
}  

/* Alphabet With Space 
example : 
aa bb - true
1234 - false
*/function validateAlphabetWithSpace(value)
{
	var alphabet=  /^([a-zA-Z]+\s)*[a-zA-Z]+$/; 
	if(value.match(alphabet))
	{
		return true;
	}
	else
	{
		return false;
	}
}