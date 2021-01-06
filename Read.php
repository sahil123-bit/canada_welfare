<?php

require './connection.php';
$query = "SELECT * FROM uploads WHERE id = {$_GET['id']}";
 	$state = $db->prepare($query);
 	$state->execute();
     $post = $state->fetchAll();
     
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
        
    </style>
</head>
<body>
        <header>
            <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
  

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
      <img
        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXwAAACFCAMAAABv07OdAAAAflBMVEX///8AAACDg4N+fn75+fns7Ox2dnb7+/t5eXkiIiL29vbg4ODl5eXGxsadnZ2oqKjQ0NC7u7uPj4+bm5uJiYnW1tbIyMheXl4YGBiqqqpZWVm2trYrKytOTk6VlZVnZ2c8PDxFRUVra2s+Pj41NTUSEhJTU1MkJCQUFBQvLy+MaD4XAAAOrklEQVR4nO1d6XYjrQ5sL5043rd4T2wntjN5/xe8hpZQicbOZKZzes79VL8IZpEKAULQM1lmMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMBoPB8A9i3WkZKkNn/S3yHxqGCvHwLfI7dYv7/wUjv0YY+TXCyK8RRn6NMPJrxJ+R331sG/4Yj/lfkf/4rVqGCG0jvz50jfz6YOTXCCO/Rhj5NcLIrxFGfo0w8muEkV8jfoT8x26e538yML3tcDYadP+gJiIfjGbDSf93ijpBv92db3/b+0qAOwW494rJHzSXJ/rx42Eg+ZvVE+LTZ559erWnMsMV1dznRUb7rCo1QJ2Gzzm/uvSiAW1mk3dq5cTdn0I3Xao2vxI0fztyf5t1PABU8KmxvZoSSXEmDY9Uazehwsfi9/fsRoHHxg01qiZ/2UCcgvk1NDxRHFdq+hK9J/i9kK8X1QKKsCrdKE+9Phco31QqtrLsmZLD6xjpprdaDRatsRApLp5IVPBBybLMbhTo31KjavJPUUfEfkzji8tkKtaJEr7lgc5bQT8oNnTVXakaquWRMH6dE8NIoqFSI/DVk0qza357V67EAzXPbhSI1GiEXqomP+qncSqyt1H2G2YuQA7GyBUY6byX8iC7dsbQ0yGhJ+t+ZXxGyV7iSkIt0cEUrgvglJLja/5LVKkt/RcjfYwKdMtqHH+K/LwRo1h4m1GuXxBe6Y9+VubimKiFMhILm2tyXiTdcMXm7Htn3Xvy5KVdprGwBwZPSqfhRpLruNI2sqFkgZtqVEz+cyNG0fAxyvUb5Zu0Uh40V2Cjs2bQ0b7IcpPho0h23c4WYwq6d4MYbv1alcqiHmzNH1LS7aelOs6IeGb0bxW4qUbF5LMVfAbDKtYd+uNlSUz5KUpuyVMmJvs24DXTzVe9fjYmZQkOYYW4QO/HAY/rg+i+AjFE77Mwg77pglsSu5jK6n8Y8BTagw21ZYU7TLiA24XRk1BqVEw+ryTPWYtSv1w2L6Fdnu0TGBFH25HSYkdgyJus64Ed0VrzGbp085sdjTx0+Ca6A+MdkagZjNyv6QymeS/jMJBVqxdGxHFL24+zoXSBm2pUTD5bQR508t4xm2RgYpwpF5Dv014U+exyNBMSzILGJxGFyn9K1Y4MYUsYH4qNjmSpSJE/ly3jKtCv0Clz+6ZtiFaolRTY31OjYvL5gCOKOoPgZXcTJHWuBTjdXHguxpPJwjtKSMCUsGqOBWCE256J7uDbT6T+QBa3Z2h+K5VIoJ1wtZRGp+q0ki5wW42KyT8HSZlPf+47siTcnTvCgtPNdrgOXojbKtZSoIQwl4jFBQzWq6J5IUneWZ5lF+4J+bjm89hsg/falBGdi8BbyR0pG1pIgdtqVEs+DD3L5GMHQX82CLfwgdPNui7UcXEqBUpg7XmwcEC2qu21JHlWdcUDkcXE++wMHqZxWLUmMqJrEXgsvQ5uFbitRrXkJ2zDnft6oXsu4AoDFbR9Xo2vDdX2CVYYbOXUtF9PWcvnZNtd3NbZPz2LZeD5OTgOvSB7LiOykImTY1EsMJcCrEY5gFct+TD0Q0nCfktD4txnpuIMND8GXV21U6hWBpd7DXzjbo80L6UbWhSPaofPJSmQESPZf4HWfZk40Gv3VoHPIrUq6VAx+TD0HUmyKu9hGPz5tSFpWld3MnwLXaAEpqywYD+YOFhCM9v4UXR9U94Qr86KgVZoaiq/8tnlMTTq4oPkY7jRuYRavJHsMjxc/Cz5PNv74vf0RepWGJ1l1DMl9zJ8PeE3KZqOBRWHRvrjXbX9KMkwW4TxoazOKrImLg6Z8Fba30mj4MW7cV6lCtxRo1rywTaYF2BlHebA1eACFTPl8cNxcSwFElDk91GVN0VzX1rhWQUeyER6XGDrlPkStuO+LFUbaXSuDm5yKMRIJ3i9P0s+Df2TMLcEmp+DUi7kAt4gLLvboYfzibdS4Avyi4WJtXxVNI+lFfA0eU3vSUNqPyR7fwuiZXgoDhNnnTytNFWkE3ywHyWfG9uIPWHYT2KJGIF8hrCauvoDNyIBdhBJxUwxDm2vJclS5xKI6Aav7KJaJznnTLNzmOFQDK4x2BAUgEjnHTUqJV8OGeH+wNkTmZnb7j8CP+gNhmjkAVvj8WtOp9O5vuvI9K1NYbTs26c9zVwWxSzsh2e5fdHz651pHAY+kXH2NPuqVygAkU6lhl57KiWfKV+GT0V96JiUhjjIIlNUZEcuvykTQE3GIlxKv3Gn2tPcS5J4PokcT0xS41O3ToMz4Uad2QLj4EjCOEMB8Z3vqVEp+dGVDXNJfwylt+dMhcmh4k5WnjO2NI9FeJPfyGiPSZp3oRveMPep64PorQP1PeYJ5vJ4qXoMjT5l6rQCBTpLj30WeQZajUrJT95XBddgIUqD7/AWE80bk3YmSx9pw9UXSUF/HZTfk0mSF0WIdTGOedQ6y0kLojciCsjulFsD/i2fpj6SBBcYJX+rhPyL6ojvb3lLysU16CpvMNM3YJ2slJWISs3DTyQ6GDbQzMP9qoJh8ZXyOG6d8tvU0hDyNipInBjnjWrpnhqVkv8R6XRQNGUQDlNUOKAtFgujfttR8hXkupaYA8YTnuY2Geu62TzLuZUuIHTMnuZI2ZB+CcO4p0aV5LcbMfxiQTsr3PPhxSEbXQ9WnpFm16EUlQpX1RwzgdGEttnGnyVkkKsNo0B09qd15cSG4/SEsDwEiaHXdNz+nhpVkh8/DtIxnKlIcsgUFSSJuAX+9ovdiOnr1UeblkQIFsV7GBg2OPRTSULkJX5hAmIgKxeq49WA0DEc0eBEAQUSVKXUqJJ8no2zfpjWjzIxt928S4y7VRGoYMhbL+cNHcsFEOEkwTMZorzgxYKnKRtmiMfkoRXt5udMSjEd/b4EYXlwa8CGoEDeL5AFWc4pHaokn2fjWC7s89K7PO4M4oIBzLffCMhdTMY0M9nITpwBvjfQfAqleFGEWFdHGNNrBc3hV2LHh33gduFTuoJxhpcw78J4444aVZIvVyJB0j66JQFz8db22EBwv0dfCwaRnAJPgWa4T4N4KdzxQawL3wIKqOyalnG/UtMwfojsbqM4h16Z8ZXkLr/41LZK8nk2ttW9RulpmPfcIC74OCuCafA2Y6SCnkmAR1MgSTM8uoF74nQ8BkCjsxgFZvGRAsveUv4tFGBS51+oUSX5NBudLwPH6zL3jjCIC8KDDogAMivpmKaKqXjAcwGgGd7iQuQF6sI4AMjiew/MoQp7s1szVP5t4jH0uuRR/xz5lAmPoM4pF8j7A0AFvEpiKsZS4DktAUZykC+8wVzIaI5V5AXiMeAjAUikXrHU+IGBRwpwGZAY56G6jrurRoXk8xRvZXjoTuy3+HSjrx6ycjJPuKIRjvQ7/w27fUvahre4sCFDXSgL0ELnmKU9TRg7KABvJ+6qUSH5MBvh0M2SHg6Hd/YSNBXwkLUpuQlXVIGb5b/ToWPwQCgYttJ1QQ6ACj/sfBYQCs8RErHlnrpTT7dfPflwyABXBCPHPEm7ioqLJGnLdqEpckVPid5R7uAtlR161yCdpj7FRbnoeMwHEhygXnoXsSZ4XQ4X9fB8/EGSBxGAZDn8NPlwyABXhFI+2jQK1TAuSA69c9x2IRfdiBRgpysgDj3cp8ETLHBRMKYnBRAqNl7slcfij6dMue5yZY6nqYZodFeNCsmHySaHbnBCwvCsVFyQae6IqK1M10ug5EUIi3CVCj4fBMPANNLBsLCEePSx/Rf1HCFtQ3CGu69GheST7bmhl21GuXKUfVJBKPA04U0rvHVMIo7LwXMBcN0TnuZA1VWf9Agw6lkE7sBE4FVFIrasC4BH/bPkU56bjbJbwqkXPydJxAUn6qUBOC9JxF5Emmbw+eBlLNTFT3oAeCovbnsSh5FJMrasC9xXozry8XEQbTPver/NjkGdhLfWVy8NwHlJgoeXJQAWW9I2eCC8NbbV6yL8pCehn0NhtGAi8CQ0bUNQ4L4a1ZGPj4MagWVKFXElGpOmiguCpwmHHy5wSwKIqXgAzUdpuyMN0pIMTzZdTI/3qah1jPcXUVNw6OGBc9rjhwL31aiOfFjdeSl8jb7KCNnorQnjvH053yG8dSw+pSl9CEBFg5ciNLBGbrzFI+dV4UGFNzkY9hG1zvWENx5ceTPuxg6iWeUCzjDoZLN7TKpRHfkQMJG7OxX+YqnWyhnjVeJtcqTUvPxdYbxmQlyuAE/15YAXFXfvGr6Lm/D1yUTXpeQmah6+H6Th5U36MuDfnKNKp4SnmwXuq1Ed+RBskbUblj/ZFSbojIUIgKBfftsRr5klL6L0asVXKYezdV3WPv5cCiKx9ForvnIv2qfk5VaBL9SojvyjqCd3d6yF/76Bp/4YIxGBiwB3IInfdsQCQFyuQOkDYBdhKgeWXIdsGgsVLVOAa0aKiMX/foEnDKNZpQKdr9WojnzKciudHPUpUdxXha9J9BvYWGp3dRHZUSnIADEVwlnXOHvR4tXr4DLB+8WvARDwDINVjL4J9lKiDcX/6sS5/bUalZGPwZYDq9pXrcsDHvWZUvTJvDe16G1H6XQO3hIhMnK62VVH1ca5i3XbslDH/zaPjGR41hD96xVeSmVDUYHeb6hRGfkYbAl9MSPFtGaW29FnSuhVnwvW0N1oJE7ncEvLwPX9I7CJDb13sa7bJXmzj50pqRNuKdXe9KuQUn/qhgXo1eMXalRGPvg13dAX/oMdQbqzrKlUV2yfdY3edpSCDJSv4mEyx/HOLuzEv9a6rtslNzIOqeYbyj+ZhH+ugaWMPnWTAvymWj2SLavxj/wba4tZ66E1vBVL+F2Mk60MXjsPzdGtG7FvtT+8tj+7I6Uv8Ptq/CPk/zdh5NcII79GGPk1wsivEUZ+jTDya4SRXyP+jvwfEuq/gr/734Jyw9+g/1fkGyqBkV8jjPwaYeTXCCO/Rhj5NeJ75D983aDh9/E98retpqEytNJvmA0Gg8FgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBhqxv8AU3PwdUuZ5+IAAAAASUVORK5CYII="
        height="50"
        width = "500"
        alt=""
        loading="lazy"
      />
    </a>

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
      <li class="nav-item mr-3 mr-lg-0 dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="yourProblem.php""
          id="navbarDropdown"
          role="button"
          data-toggle="dropdown"
          aria-expanded="false"
        >
          <i class="fas fa-user fa-lg text-dark"></i>
        </a>

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
        
       
        <main>
        
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
                                               <strong class="text-dark"><?= $post[0]['user']; ?>  <br> <?= $post[0]['dates']; ?></strong>    
                                             <div class="mt-2"></div>
                                            
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                            <i class="fas fa-ellipsis-v fa-lf mt-2 float-right"></i>
                                            </div>

                                        </div>
                                       
                                    </div>
                                </div>
                                 <!--Photo-->
                                 <div
                    class="bg-image hover-overlay ripple shadow-1-strong rounded-0"
                    data-ripple-color="light"
>
                <img src="<?= $post[0]['images']; ?>" class="w-100" />     <!---Change the image source -------------->
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
                            <i class="far fa-comment fa-lg "></i>
                            </div>
                            <div class="col-md-4 text-right"></div>
                        </div>
                        <!--Description-->
                        <div class="row">
                           <div class="col-md-12 mt-1">
                               <p>

                               <strong class="text-dark"><?= $post[0]['topic']; ?></strong> <?= $post[0]['opinion']; ?>.
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
                
            </div>
        </main>
    
</body>
</html>