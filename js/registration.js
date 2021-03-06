function validate(){
    //get all user inputs
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var bday = document.getElementById("bday").value;
    var password = document.getElementById("pass").value;

    //error message display element
    var errorMessage = document.getElementById("errorMessage");

    //error message itself
    var message = "";
    var isValid = true;

    //if first name not valid
    if (!nameValidate(fname)){
        //append to message first name is invalid
        message = message + "First name invalid!\n";
        isValid = false;
    }
    //if last name not valid
    if(!nameValidate(lname)){
        //append to message last name is invalid
        message = message + "Last name invalid!\n";
        isValid = false;
    }
    //if email not valid
    if(!emailValidate(email)){
        //append to message email is invalid
        console.log(email);
        message = message + "Email invalid!\n";
        isValid = false;
    }
    //if birth date not valid
    if (!dateValidate(bday)){
        //append to message birth date is invalid
        message = message + "Birth date invalid!\n";
        isValid = false;
    }
   
    
    //display an error message
    errorMessage.innerHTML = message;
    return isValid;
}

//name validation
function nameValidate(name){
    //must have letters only
    return /^[A-z ]+$/.test(name);
}

//date validation
function dateValidate(date){
    //date input
    var dateInput = new Date(date);
    //today's date
    var now = new Date();
    //if date is in the future return false
    if (dateInput > now) {
        return false;
    }
    return true;
}

//email validation
function emailValidate(email){
    //must have characters, then @, then more characters, then ., then 2 or 3 more characters
    return /[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/.test(email);
}