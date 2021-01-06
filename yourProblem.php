<?php
    require './connection.php';

    session_start();

    if(!isset($_SESSION['username'])){

        header('location ./login.php');
    }
     $user = $_SESSION['username'];
  
   
   
    $query = "SELECT * FROM uploads where user = '$user' ORDER BY dates  DESC";
    $prep = $db->prepare($query);
    if($prep->execute())
    {

        $post = $prep->fetchAll();
        $message = "Welcome ".$user;

        if(isset($_POST['search']))
        {
            $find = $_POST['name'];
            
           
        
            $query = "SELECT * FROM uploads WHERE (id ='$find'  OR dates LIKE '$find%' OR topic LIKE '$find%' OR user LIKE '$find%' OR user LIKE '$find%') AND user = '$user' " ;
            $prep = $db->prepare($query);
            $prep->execute();
            $result = $prep->fetchAll();
            $error = "";
            
           
            
        
        }
        
    }
   

   


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account</title>
    <link rel="stylesheet" href="design.css">
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <style>
        .new-div{
            display : flex;
        }
        .new-div input[type = text]{
            margin-right: 5px;
        }
    </style>
</head>
<body>
        <header>
            <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="upload.php">Upload</a>
          <a class="nav-link active" aria-current="page" href="publicProblem.php">PUBLIC_VIEWS</a>
        </li>
        
        <!-- Navbar dropdown -->
       
          </ul>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5 ">
            <a class="navbar-brand" href="#">
      
    </a>
     <!-------------------------------------------Added a search control in the navbar --------------->
     <form  method = "POST" >
    <div class = "new-div" >
    <input type="text" name ="name">
    <input type="submit" name="search" value = "Search">
    </div>
    </form>


        </div><
            <div class="col-md-2"></div>
            <div class="col-md-3">

            <ul class="navbar-nav justify-content-center">
         <!-- Icons -->
        <li class="nav-item mr-3 mr-lg-0">
        <a class="nav-link" href="home.php">
        <i class="fas fa-home fa-lg text-dark"></i>
        </a>
        </li>
       
      <!-- Icon dropdown -->
     

      <li class="nav-item mr-3 mr-lg-0">
        <a class="nav-link" href="logout.php">
        <i class="fas fa-sign-out-alt fa-lg text-dark"></i>
        </a>
      </li>
    </ul>
        </div>
        
            
        </div>

    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
        </header>
        <h2 style ="text-align: center"><?php echo $message; ?> </h2>
        <?php foreach ($post as $posts): ?>
        <main>
      <!-- -------------------------------------------------------Table is made--------------------------->  
    <table style="width:100%">
   <caption style >Your Search Result</caption>
    
    <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Topic</th>
    <th>Date</th>
    </tr>
    <?php if(isset($result)): ?>
    <?php foreach ($result as $results): ?>
    <tr>
    <td><a href="./Read.php?id=<?= $results['id']; ?>"><?= $results['id'];?></a></td>
    <td><?= $results['user'];?></td>
    <td><?= $results['topic'];?></td>
    <td><?= $results['dates'];?></td>
    
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
    <p>No Data Found</p>
    
    <?php endif; ?>
    





    </table>
        
            <div class="container my-5">
                <div class="row">

                    <div class="col-md-1"></div>
                    <div class="col-md-7 ">

                    <section class ="story-container" id ="story">
                      <ul>
                          <li style= "list-style: none">
                              <div class="story">
                              
                              </div>
                          </li>
                      </ul>
                    </section>

                    <section class="newsfeed my-5">
                        <div class="post">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">

                                   

                                        <!--Author-->
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="story">
                                             <!--- <?= $posts['user']; ?> <br> <?= $posts['dates']; ?> ------>  <strong class="text-dark"><?= $posts['user']; ?>  <br> <?= $posts['dates']; ?></strong>     <!--comment out from here-->
                                             <div class="mt-2"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                            <a href="Edit.php?id=<?= $posts['id']; ?>"><i class="fas fa-edit fl-lg float-right"><br>Edit</i></a>
                                            <a href="delete.php?id=<?= $posts['id']; ?>">Delete</a>
                                            
                                            </div>

                                        </div>
                                       
                                    </div>
                                </div>
                                 <!--Photo-->
                                 <div
                    class="bg-image hover-overlay ripple shadow-1-strong rounded-0"
                    data-ripple-color="light"
>
                <img src="<?= $posts['images']; ?>" class="w-100" />     <!---Change the image source -------------->
                    <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                </a>
                </div>
                <!---Interaction----->
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                            <i class="far fa-thumbs-up fa-lg ml-0"></i>
                            <i class="far fa-thumbs-down fa-lg mx-2"></i>
                            <a href="comment.php?id=<?= $posts['id']; ?>"><i class="far fa-comment fa-lg "></i></a>
                            </div>
                            <div class="col-md-4 text-right"></div>
                        </div>
                        <!--Description-->
                        <div class="row">
                           <div class="col-md-12 mt-1">
                               <p>

                               <strong class="text-dark"><?= $posts['topic']; ?></strong> <?= substr($posts['opinion'],0,70); ?>.... <small class="my-1" "><a href="./Read.php?id=<?= $posts['id']; ?>"> more </a></small>
                               </p>
                           </div>
                        
                        </div>
                    </div>
                </div>
                            </div>
                        </div>
                    </section>
  
                    </div>

                    <div class="col-md-2 "></div>

                </div>
                <?php endforeach; ?>
            </div>
        </main>
    
</body>
</html>