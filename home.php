<?php
session_start();

if(!isset($_SESSION['username'])){

    header('location ./login.php');
}
else{
   
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canada Welfare</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class= "container">
    <a class="float-right" href = "logout.php">Logout</a>
    
    <h1>Welcome <?php echo $_SESSION['username']; ?></h1><br>
    <h2>It's your time to enlighten the world <?php echo $_SESSION['username']; ?> </h2>

    <navbar class = "navbar">
        <a href="yourProblem.php">Your Account</a>
        
        <a href="#"></a>
      
        <a href="publicProblem.php">Public Views</a>
    </navbar>
    
    </div>

</body>
</html>