<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Social App</title>
  </head>
  <body>
          <div class="container">
            <?php
            include "connect.php";
            session_start();
            $usernames = $_SESSION['username'];
            echo '<header>
            <i class="fas" id ="menu">&#xf406;</i>
            <i class="fas" id ="menu2">&#xf406;</i>
            <h3>twitter</h3>
            </header>
              <ul id = "menubar" class ="ul">
                <li><a href="">'.$usernames.'</a></li>
                <li><a href="./profile.php">Profile</a></li>
                <li><a href="./logout.php">Log-out</a></li>
              </ul>';
            if(!isset($_SESSION['loggedin'])){
              echo '
              <div class="error">
              <h1>Sorry You had to First Log In</h1>
              <div class="errorimg">
                <img src="./image/oops.jpg" alt="">
              </div>
              <a href="./login.php"><button>Go To Login</button></a>
              </div>';
            }
            else{
              $sql = "SELECT * FROM `posts`";
              $result = mysqli_query($conn,$sql);
             while($row = mysqli_fetch_assoc($result)){
              $profile = $row['profile_img'];
              $post = $row['post_img'];
              $name = $row['name'];
              $post_id = $row['post_id'];
              $id = $row['id'];
              echo '
                <div class="main">
                <h2>Popular Post</h2>
              <div class="post1">
                        <div class="head">
                          <img src="'.$profile.'" alt="">
                          <h5>'.$name.'</h5><br><br>
                        </div>
                        <div class="content1">
                          <img src="'.$post.'" alt="">
                        </div>
                        <div class="icons">
                          <div class="icon1">
                            <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i>
                            <div class="count" id="count"></div>
                          </div>
                          <a href="comment.php?post-id='.$post_id.'"><i style="font-size:30px" class="fa">&#xf0e5;</i></a>
                          <i style="font-size:30px" class="fa">&#xf141;</i>
                        </div>
                      </div>
                </div>
              ';
            }
            echo '
            <footer>
              <a href="./index.php"><i style="font-size:30px" class="fa">&#xf015;</i></a>
              <a href="./search.php"><i style="font-size:30px" class="fa">&#xf002;</i></a>
              <a href="./notification.php"><i style="font-size:30px" class="fa">&#xf0a2;</i></a>
              <a href="./email.php"><i style="font-size:30px" class="fa">&#xf003;</i></a>
            </footer>';
            }
            ?>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
  <script src="script.js"></script>
</html>
<!-- <i class="fa iconed click" id = "icon1">&#xf08a;</i>
                            <i class="fa fa-heart iconed heart" style="color:red" id="icon2"></i> -->