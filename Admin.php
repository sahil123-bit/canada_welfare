<?php
    require './connection.php';

    $limit = 4;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
      }
      else{
        $page = 1;
      }
      $offset = ($page -1) * $limit;

    $query = "SELECT * FROM registration ORDER BY username LIMIT {$offset},{$limit}";
    $prep = $db->prepare($query);
    $prep->execute();
    $post = $prep->fetchAll();

   
    
  

    $select = "SELECT * FROM registration";
    $statement=$db->prepare($select);
    $statement->execute();
  
    if($statement->rowCount() >0)
    {
      $total_records = $statement->rowCount();
      
      $total_page = ceil($total_records/$limit);
   
    

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administratior Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<a class="float-right" href = "logout.php">Logout</a>

<a class="float-left" href = "publicProfile.php">Public Profile</a><br>
<h2>Click here to  <a href = "RegisterAdmin.php"> Add a Admin</a></h2>

    <table style="width:100%">
        <caption>Users of this site</caption>
        <tr>
        <th>Username</th>
        <th>Email ID</th>
        <th>User Type</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        <?php foreach ($post as $posts): ?>
        <tr>
            <td><?= $posts['username'];?></td>
            <td><?= $posts['email'];?></td>
            <td><?= $posts['user_type'];?></td>
            <td>
                <form action="RegEdit.php?id=<?= $posts['id']; ?>" method ="post">
                <button class="btn btn-success" type = "submit" name = "edit_btn">Edit</button>
                </form>
            </td>
            <td>
            <form action="RegDelete.php?id=<?= $posts['id']; ?>" method ="post">
                <button class="btn btn-danger" type = "submit" name = "edit_btn">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php
                echo '<ul class = "pagination admin-pagination">';
                if($page >1){
                  echo  '<li class = ".$active."><a href ="Admin.php?page='.($page- 1).'">Previous</a></li>';
                  echo  '<li>-</li>';
                }
                for($i = 1; $i <=$total_page; $i++){
                  if($i == $page){
                    $active = "active";
                  }
                  else{
                    $active = '';
                  }
                  echo '<li class = ".$active."><a href ="Admin.php?page='.$i.'">'.$i.'</a></li>';
                  echo  '<li>-</li>';
                  
                }
                if($total_page >$page){
                  echo  '<li class = ".$active."><a href ="Admin.php?page='.($page+ 1).'">Next</a></li>';
                  
                }
                echo '</ul>';
              }
              ?>
              
</body>
</html>