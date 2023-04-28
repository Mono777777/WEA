<?php
session_start();
    if(isset($_SESSION["isLogged"]) && $_SESSION["isLogged"])
        header('location: profil.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
    <style>
        form {
            background-color: orange;
            border: 2px solid black;
            border-radius: 25px;
            padding: 20px;
            height: 50vh;
            width: 50vh;
            margin-top: 100px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            font-size: 22px;
        }
        body {
	        background-color: gray;
        }
        label, input {
            padding-bottom: 20px;
        }
        #nope {
            position: fixed;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }
    </style>
</head>
<body>
    <div id="nope">     
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'usernameOrEmailTaken') {
            echo "The username or email is already taken";
        }
    }
    ?>
    </div>
    <center>
        <form action="profil.php" method="post">
            <input type="text" name="firstname" placeholder="Firstname:"><br>
        
            <input type="text" name="lastname" placeholder="Lastname:"><br>
        
            <input type="text" name="username" placeholder="Username:"><br>
        
            <input type="email" name="email" placeholder="Email:"><br>

            <input type="password" name="password" placeholder="password:"><br>
        
            <input type="password" name="check_password" placeholder="Confirm Password:"><br>     
        
            <textarea name="bio" cols="20" rows="1" placeholder="Bio:"></textarea><br>
            <input type="submit" name="register" value="register">
            <input type="submit" name="login" value="login">
        </form>
    </center>
    <script>
        $("form").submit(isFormValid);

        function isFormValid(event)
        {
            $(".error").remove();   
            isInputFilled("first_name");         
            isInputFilled("last_name");         
            isInputFilled("username");         
            isInputFilled("password");         
            isInputFilled("check_password");         
            isInputFilled("email");                 
            
            if($(".error").length > 0){
                event.preventDefault();
                return;
            }
            $("form").unbind("submit");

        }    
        function isInputFilled(inputName){
            let input = $("input[name="+inputName+"]");
            if(input.val().trim() == "")
                input.after("<span class='error'>zde musíte zadat údaj</span>"
            )
        }
</script>
</body>
</html>