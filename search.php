<?php
require './connection.php';

if(isset($_POST['search']))
{
    $find = $_POST['name'];
   

    $query = "SELECT * FROM uploads WHERE id ='$find' OR dates LIKE '$find%' OR topic LIKE '$find%' OR user LIKE '$find%' ";
    $prep = $db->prepare($query);
    $prep->execute();
    $result = $prep->fetchAll();
    $error = "";
	 
    

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <form action = "search.php"  method = "POST" >
    
    <input type="text" name ="name">
    <input type="submit" name="search" value = "submit">

    </form>

    <table style="width:100%">
   <caption style >Your Search Result</caption>
    
    <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Topic</th>
    <th>Date</th>
    </tr>
    <?php foreach ($result as $results): ?>
    <tr>
    <td><?= $results['id'];?></td>
    <td><?= $results['user'];?></td>
    <td><?= $results['topic'];?></td>
    <td><?= $results['dates'];?></td>
    
    </tr>
    <?php endforeach; ?>

    </table>
</body>
</html>