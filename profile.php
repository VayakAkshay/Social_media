<?php
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/profile.css">
    <title>Profile</title>
  </head>
  <body>
    <div class="container">
    <?php  
    session_start();
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
      $usernames = $_SESSION['username'];
      echo '<div class="profile">
      <i class="fas">&#xf406;</i>
      </div>
      <div class="name"><h1>'.$usernames.'</h1></div>
      <div class="comment">
        <h2>Your Comments</h2>';
        include "connect.php";
        $sql = "Select * from `comment` where name = '$usernames'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
          if($num<1){
            echo '
          <div class="comm">
          <b>No Any Comments Yet!</b>
          </div>';
          }
        while($row = mysqli_fetch_assoc($result)){
          $id = $row['post_id'];
          $comment = $row['comment'];
          $data = "SELECT * FROM `posts` WHERE post_id=$id";
          $results = mysqli_query($conn,$data);
        while($rows = mysqli_fetch_assoc($results)){
          $profile = $rows['profile_img'];
          $post = $rows['post_img'];
          $name = $rows['name'];
          echo '
          <div class="main">
            <div class="header">
                <img src="'.$profile.'" alt="">
                '.$name.'
            </div>
            <div class="post">
                <img src="'.$post.'" alt="">
            </div>
          </div>
          ';
        }
          echo '
          <div class="comm">
          <h4>You</h4>
          <b>'.$comment.'</b>
          </div>';
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>