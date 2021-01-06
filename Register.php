<?php
   
  
    require './connection.php';

    session_start();

    

    // Initializing the variables;
    $user = '';
    $password = '';
    $repeatPass = '';
    $email = '';
    $message = ' ';
    $captcha = ' ';
   
    if(isset($_POST['register'])){

  
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['passwords'];
        $repeatPass = $_POST['conpassword'];
        $captcha = $_POST['captcha'];
        $userType = $_POST['userType'];
        
      
        $name = "SELECT * FROM registration where username = '$user'";

        $prepare = $db->prepare($name);
        
        if($prepare->execute())
        {
            if($prepare->rowCount()==1)
            {
                $message = "This Username is already taken.";   
                
            }
            elseif($password != $repeatPass){
            
                $message = "Password does not match";
               


            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                
                $message = "Invalid Email Id";
                
            }
            elseif($_SESSION["vercode"] != $captcha){

                $message = " The verification is invalid";
            }

            else{
              $pass_check = password_hash($password, PASSWORD_BCRYPT);
            //   $_SESSION['hasing'] = $pass_check;

            
                $reg = "INSERT INTO registration (username, email, passwords, user_type) values (:username,:email,:passwords,:user_type)";

                
    
                $statement = $db->prepare($reg);
                $statement->bindValue(':username', $user);        
                $statement->bindValue(':email', $email);
                $statement->bindValue(':passwords', $pass_check);
                $statement->bindValue(':user_type', $userType);

                
            
            // Execute the INSERT.
                $statement->execute();
                $insert_id = $db->lastInsertId();
                
                $message = "Registration Sucessful";

    
            }
        }

        
        
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Here</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href = "uploadStyle.css">
</head>
<body>
    <div class = "container">
    <div class = "row">
    <div class = "col-md-6">
    <h2>Register Here</h2>
    <form action = "Register.php" method = "post">
    <div class = "form-group">
    <label>Username</label><br>
    <input type="text" class="form-control" name="user" ><br>
    </div>

    <div class = "form-group">
    <label>Email ID</label><br>
    <input type="email" name = "email" class = "form-control" ><br>
    </div>
    
    <div class = "form-group">
    <label>Password</label><br>
    <input type="password" name = "passwords" class = "form-control" ><br>
    </div>

    <div class = "form-group">
    <label>Confirm Password</label><br>
    <input type="password" name = "conpassword" class = "form-control" ><br>
    </div>

    <input type="hidden" name = "userType" class = "form-control" value = "User">

    <div class = "form-group">
    <label><img src="captcha.php" alt="captcha image"></label> <br>
    <input type="text" name = "captcha" class = "form-control" ><br>
    </div>
    <br>
    <button class="btn-primary" type="submit" name="register">Register</button><br>

 </form>
    <h2>Click here to  <a href = "login.php"> Sign in</a></h2>
    <h3><?php echo $message; ?></h3>

    
</div>
</div>
</div>
</body>
</html>