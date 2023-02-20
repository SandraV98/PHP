$(document).ready(function() {

    $(document).on('click', '#check', function(event){
        event.preventDefault();
      var valid = true;

    var firstName, lastName, email, username, password;

    firstName = document.getElementById("firstName").value.trim();
    lastName = document.getElementById("lastName").value.trim();
    email= document.getElementById("email").value.trim();
	username= document.getElementById("username").value.trim();
    password= document.getElementById("password").value.trim();

	
    var name_regex = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,14}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,14})*$/;
	var email_regex=/^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9]+(\.[a-z0-9]+)*(\.[a-z]{2,3})$/;
    var password_regex = /^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{6,10}$/;
   
    var first_name_message, last_name_message, email_message, password_message;

    first_name_message = document.getElementById("first_name_message");
    last_name_message = document.getElementById("last_name_message");
	email_message = document.getElementById("email_message");
    username_message = document.getElementById("username_message");
    password_message = document.getElementById("password_message");
	
	/*firstName*/
    if(firstName == ""){
        valid = false;
        first_name_message.innerHTML = "Please fill out this field."
    }
    else{
        if(!name_regex.test(firstName)){
            valid = false;
            first_name_message.innerHTML = "Name is not valid. Required and alphabates only.";
        }else{
            first_name_message.innerHTML = "";
        }
    }

	/*lastName*/
    if(lastName == ""){
        valid = false;
        last_name_message.innerHTML = "Please fill out this field."
    }
    else{
        if(!name_regex.test(lastName)){
            valid = false;
            last_name_message.innerHTML = "Last name is not valid. Required and alphabates only.";
        }else{
            last_name_message.innerHTML = ""; 
        }
    }

	/*email*/
    if(email == ""){
        valid = false;
        email_message.innerHTML = "Please fill out this field. "
    }
    else{
        if(!email_regex.test(email)){
            valid = false;
            email_message.innerHTML = "Email is not valid. Example: user.name@focus.com";
        }else{
            email_message.innerHTML = "";
           
        }
    }
	
    /*username */
    if(username == ""){
        valid = false;
        username_message.innerHTML = "Please fill out this field."
    }
    else{
        if(!name_regex.test(username)){
            valid = false;
            username_message.innerHTML = "Name is not valid. Required and alphabates only.";
        }else{
            username_message.innerHTML = "";
        }
    }
        /*password*/
	if(password == ""){
        valid = false;
        password_message.innerHTML = "Please fill out this field. ";
    }
    else{
        if(!password_regex.test(password)){
            valid = false;
            password_message.innerHTML = "At least 8 chars.Contains at least one digit,Contains at least one lower alpha char and one upper alpha charContains at least one char within a set of special chars (@#%$^ etc.Does not contain space, tab, etc.";
        }else{
            password_message.innerHTML = "";
           
        }
    }
    if(valid)
	{
      // alert("Congratulations, your account has been successfully created.");      
      $.ajax({
        url: "action_page1.php",
        method: "POST",
        data:
        {
            'firstName':firstName,
            'lastName':lastName,
            'email':email,
            'username':username,
            'password':password 
        } ,
        dataType:"json",
        success: function (result){
                 //console.log(result);
                $('#odgovor').html(`<p class="alert alert-success my-3">${result.answer}</p><a href="login.php">Login</a>`);
        },
        error: function(xhr){
            $('#odgovor').html(`<p class="alert alert-success my-3">${xhr.responseText}</p>`);
           // console.error(xhr.responseText);
            // if 500...
            // if 404...
        }
    });

    }
});

});





