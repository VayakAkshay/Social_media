<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/search.css">
    <title>SEARCH</title>
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
      echo '
      <header>
      <i class="fas" id ="menu">&#xf406;</i>
      <i class="fas" id ="menu2">&#xf406;</i>
      <h3>twitter</h3>
      </header>
        <ul id = "menubar" class ="ul">
          <li><a href="">'.$usernames.'</a></li>
          <li><a href="./profile.php">Profile</a></li>
          <li><a href="./logout.php">Log-out</a></li>
        </ul>';
        echo '
        <div class="search">
        <form action="./search.php" method = "post">
        <input type="text" placeholder="Search" name = "search"><br><br>
        <button>Search</button>
        </form>
        </div>';
        include "connect.php";
        if($_SERVER['REQUEST_METHOD'] == "POST"){
          $search = $_POST['search'];
          $sql = "SELECT * FROM `posts` WHERE name= '$search'";
          $result = mysqli_query($conn,$sql);
          $num = mysqli_num_rows($result);
          if($num<1){
            echo '
            <div class="main">
            <h1>No Result Found!!!</h1>
            </div>';
          }
          else{
            while($row = mysqli_fetch_assoc($result)){
              $profile = $row['profile_img'];
              $post = $row['post_img'];
              $name = $row['name'];
              
              
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
          }
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