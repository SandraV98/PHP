$(document).ready(function() {

    $(document).on('click', '#login', function(event){
    event.preventDefault();
    
        var  username, password;
        var $errors=0;
    
        username= document.getElementById("username").value.trim();
        password= document.getElementById("password").value.trim();
    
      var username_message, password_message;
    
      username_message = document.getElementById("username_message");
      password_message = document.getElementById("password_message");
    
      var name_regex = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,14}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,14})*$/;
      var password_regex = /^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{6,10}$/;
     
      /*username */
         if(username == ""){
            $errors++;
            username_message.innerHTML = "Please fill out this field."
        }
        else{
            if(!name_regex.test(username)){
                $errors++;
                username_message.innerHTML = "Name is not valid. Required and alphabates only.";
            }else{
                username_message.innerHTML = "";
            }
        }
            /*password*/
        if(password == ""){
            $errors++;
            password_message.innerHTML = "Please fill out this field. ";
        }
        else{
            if(!password_regex.test(password)){
                $errors++;
                password_message.innerHTML = "Password must contain at least 6-10 characters. At least one alpha AND one number. The following special chars are allowed (0 or more): !@#$%";
            }else{
                password_message.innerHTML = "";
               
            }
        }
        if($errors == 0)
        {
            $.ajax({
                url:"login_page_php.php",
                method:"POST",
                data:
                {
                'username':username,
                'password':password 
                } ,
                success: function (result){
                        //console.log(result);
                         if(result.idRole=='2'){
                         location.href="category.php";
                         }else{
                         location.href="admin.php";
                         }
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                    // if 500...
                    // if 404...
                }
            });
          $('#odgovor').html(``);
       }
       else
        {
            $('#odgovor').html(`<p class="alert alert-success my-3">Incorrect login information.Please check your credentials and try again.</p>`);
    
        }
    
    })

});
