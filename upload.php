<?php
    require './connection.php';


    session_start();
    

    if(!isset($_SESSION['username'])){

        header('location ./login.php');
    }
    
    $message = ' ';
    if(isset($_POST['upload']))
    {
        
        
        $topic = $_POST['topic'];
        $comment = $_POST['comment'];
       

        if($_FILES['image'] && $_FILES['image']['error']==0)
        {
            $image= $_FILES['image']['name'];
            $image_type =$_FILES['image']['type'];
            $image_size = $_FILES['image']['size'];
            $image_tem_location = $_FILES['image']['tmp_name'];
            $image_stored_location = "images/".$image;
            
            $allowed_extension = array('gif','jpeg','jpg','png', 'jfif');
            $file_extension = pathinfo($image,PATHINFO_EXTENSION);

            if(!in_array($file_extension,$allowed_extension)){
                $message = "Only Images are Accepted !";
            }
            else{

            move_uploaded_file($image_tem_location,$image_stored_location);

            $query = "INSERT INTO uploads (topic,opinion,images,user) values (:topic,:opinion,:images,:user)";

            $statement = $db->prepare($query);
           
            $statement->bindvalue(':topic', $topic);
            $statement ->bindvalue(':opinion', $comment);
            $statement->bindvalue(':images',$image_stored_location);
            $statement->bindvalue(':user', $_SESSION['username'] );

            $statement->execute();
            $insert_id = $db->lastInsertId();
           
            
            $message = "Thank you so much ".$_SESSION['username']." for sharing your views";
           
            }
          

           

        }

        else
        { 
            $message = "So Sorry! ".$_SESSION['username']." The upload is failed."."<br>"."Please try agian";
            
        }
        
        
    }


    
?>
      
 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="design.css">
    <style>
        .container a{
            margin: 7px;
        }
    </style>
</head>
<body>
    
<div class = "container">
<a class="float-right" href = "logout.php">Logout</a>
<a class="float-right" href = "home.php" >Home</a>
<a class="float-right" href = "yourProblem.php" >BACK</a>
    <div class = "row">
    <div class = "col-md-6">
<form  method = "post" enctype = "multipart/form-data">
    <h2>Raise Your Voice</h2>

    <div class = "form-group">
    
    </div>

    <div class = "form-group">
    <label>Topic</label><br>
    <input type="text" class="form-control" name="topic" ><br>
    </div>
    <div class = "form-group">
    <textarea  name="comment" id ="comment" rows="5" cols="50"  placeholder = "what do you think...?"></textarea><br>
    </div>
    
    <div class = "form-group">
        <br>
    <label>Upload Image if you want: </label><br>
    <input type="file" class="form-control" name="image" ><br>
    </div>
    
    <button class="btn-primary" type="submit" name="upload">Upload</button>

    

</form> 

<h3> <?php echo $message; ?> </h3><br>


       
</div>
</div>
</div>
</body>
</html>