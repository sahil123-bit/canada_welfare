<?php
    
    require './connection.php';

    $query = "SELECT * FROM uploads WHERE id = {$_GET['id']}";
    $state = $db->prepare($query);
    $state->execute();
    $post = $state->fetchAll();
    $id = $_GET['id'];
    $message = " ";

    if (isset($_POST['update']))
    {
        $topic = $_POST['topic'];
        $comment = $_POST['comment'];
        $old_image = $_POST['old_image'];
        $new_image = $_FILES['image']['name'];
        $image_stored_location = "images/".$new_image;
        $image_tem_location = $_FILES['image']['tmp_name'];

       

        if($_FILES['image']['name'] != '')
        {
            
            // $update_filename = $new_image;
            $image_stored_location = "images/".$new_image;
           
        }
        else
        {
          
            $image_stored_location = $old_image;
            
            $query = "UPDATE uploads SET 	topic = :topic, opinion = :opinion  WHERE id = :id";

            $statement = $db->prepare($query);
            $statement->bindValue(':topic', $topic);        
            $statement->bindValue(':opinion', $comment);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
            $statement->execute();

           
        }

        if(!(file_exists($image_stored_location)))
        {
           
            // $filename =  $_FILES['image']['name'];

            // $message = "The Image already exists: ".$filename;
            $query = "UPDATE uploads SET 	topic = :topic, opinion = :opinion , images = :images  WHERE id = :id";

            $statement = $db->prepare($query);
            $statement->bindValue(':topic', $topic);        
            $statement->bindValue(':opinion', $comment);
            $statement->bindValue(':images', $image_stored_location);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
            $statement->execute();
            move_uploaded_file($image_tem_location,$image_stored_location);

            
          


        }
        else
        {
            
            $query = "UPDATE uploads SET 	topic = :topic, opinion = :opinion , images = :images  WHERE id = :id";

            $statement = $db->prepare($query);
            $statement->bindValue(':topic', $topic);        
            $statement->bindValue(':opinion', $comment);
            $statement->bindValue(':images', $image_stored_location);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
           if($statement->execute())
           {
             if($_FILES['image']['name'] != '')
             {
                
                move_uploaded_file($image_tem_location,$image_stored_location);
                // unlink($old_image);

             }
             $message = " COngrats! Your data is updated.";
           }
           else
           {
             $message = "The file could not updated.";
           }

        }
         echo " The Data is updated.";

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
<a class="float-right" href = "Admin.php" >Home</a>
<a class="float-right" href = "publicProfile.php" >BACK</a>
    <div class = "row">
    <div class = "col-md-6">
<form method = "post" enctype = "multipart/form-data">
    <h2>Raise Your Voice</h2>

   

    <div class = "form-group">
    <label>Topic</label><br>
    <input type="text" class="form-control" name="topic" value = "<?= $post[0]['topic']; ?>" ><br>
    </div>
    <div class = "form-group">
    <textarea  name="comment" id ="comment" rows="5" cols="50"  ><?= $post[0]['opinion'] ?></textarea><br>
    </div>
    
    <div class = "form-group">
        <br>
    <label>Upload Image if you want: </label><br>
    <input type="file" class="form-control" name="image" ><br>
    <input type="hidden" class = "form-control" name="old_image" value ="<?= $post[0]['images'] ?>" >
    </div>
    
    <button class="btn-primary" type="submit" name="update">Update</button>

    

</form> 

<h3> <? echo $message; ?></h3>



       
</div>
</div>
</div>
</body>
</html>