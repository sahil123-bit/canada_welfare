<?php

    require './connection.php';

    session_start();
    if(isset($_POST['login'])){
    $user = '';
    $password = ' ';
    $email = '';
    $message = ' ';
  
    
    $user = $_POST['user'];
    $password = $_POST['passwords'];
     $pass_check = password_hash($password, PASSWORD_BCRYPT);

    $query = "SELECT * FROM registration where username = '$user' " ;
 	$prep = $db->prepare($query);
 	
     if($prep->execute()){

        $row = $prep->fetch(PDO::FETCH_ASSOC);

        
         $pass_verify = password_verify($password, $row['passwords']);
         if($prep->rowCount()==1 && $pass_verify)
        {

            $_SESSION['username'] = $user;
            
            $query = "SELECT * FROM registration WHERE username = '$user'";
            $prep = $db->prepare($query);
            $prep->execute();
            $post = $prep->fetch();

            $userType = $post['user_type'];

            if($userType == "Admin")
            {
                header('location: ./Admin.php');
            }
            else{
                header('location: ./home.php');
            }

            
            
        }
        else{

            $message = " Invalid username or password.";
            echo $message;
            
            
        }
    }
     }
    
     
     
    
     
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href = "uploadStyle.css">
</head>
<body>
    <div class = "container">
    <div class = "row">
    <div class = "col-md-6">
    <h2>Login Here</h2>
    <form  method = "post">
    <div class = "form-group">
    <label>Username</label><br>
    <input type="text" class="form-control" name="user" ><br>
    </div>
    
    <div class = "form-group">
    <label>Password</label><br>
    <input type="password" name = "passwords" class = "form-control" ><br>
    </div>
    <br>
    <button class="btn-primary" type="submit" name="login">Login</button><br>

 </form>
     <h2>If not Register Yet!</h2> 
        <form action="Register.php" method = "post">
            <button>Register Here</button>
        </form>
        
      
    </div>

    </div>
    
    </div>
</body>
</html>