<?php
require './connection.php';

$message = ' ';
$query = "SELECT * FROM registration WHERE id = {$_GET['id']}";
$state = $db->prepare($query);
$state->execute();
$post = $state->fetchAll();
$id = $_GET['id'];
     if (isset($_POST['update']))
     {
        $user = $_POST['user'];
        $email = $_POST['emails'];
        $password = $_POST['passwords'];
        $userType = $_POST['userType'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                
            $message = "Invalid Email Id";
            
        }
        else
        {
            $pass_check = password_hash($password, PASSWORD_BCRYPT);
            $query = "UPDATE registration SET username = :username, email = :email, passwords = :passwords,user_type = :user_type WHERE id = :id";

            $statement = $db->prepare($query);
            $statement->bindValue(':username', $user);        
            $statement->bindValue(':email', $email);
            $statement->bindValue(':passwords', $pass_check);
            $statement->bindValue(':user_type', $userType);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);

            if($statement->execute())
            {
                $message = " The Profile is updated";
                header('location:./Admin.php');
            }
            else
            {
                $message = " The Profile is not updated";
            }

            

        }

     }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
    <div class = "container">
    <div class = "row">
    <div class = "col-md-6">
    <h2>Edit the User Profile</h2>
    <form  method = "post">
    <div class = "form-group">
    <label>Username</label><br>
    <input type="text" class="form-control" name="user"  value = "<?= $post[0]['username']; ?>">
    </div>

    <div class = "form-group">
    <label>Email ID</label><br>
    <input type="text" class="form-control" name="emails" value = "<?= $post[0]['email']; ?>" ><br>
    </div>

    <div class = "form-group">
    <label>Password</label><br>
    <input type="password" class="form-control" name="passwords"  value = "<?= $post[0]['passwords']; ?>"><br>
    </div>

    <div class = "form-group">
    <label> User Type</label>
    <Select name = "userType" class="form-control">
    <option value="Admin">Admin</option>
    <option value="User">User</option>
    </Select><br>
    </div>
    <button class="btn-primary" type="submit" name="update">Update</button><br>
    </form>
    <h3><?php echo $message; ?></h3>
    </div>
    </div>
    </div>
    
</body>
</html>