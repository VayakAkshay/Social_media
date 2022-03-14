<?php
    $showalert = false;
    $succerror = false;
    include "connect.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
            $sql = "Select * from regester where username='$username'";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
              if($num == 1){
                while($row = mysqli_fetch_assoc($result)){
                  if(password_verify($pass,$row['password'])){
                    $succerror = true;
                    $succerror = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['pass'] = $pass;
                    header("Location: /social/index.php");
                  }
                  else{
                    $showalert = true;
                  }
                }
              }
              else{
                $showalert = true;
              }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="./css/signin.css">
    <title>SIGN IN</title>
  </head>
  <body>
  <?php
    if($showalert){
        echo '
        <div class="alert alert-warning alert-dismissible fade show" id = "alert" role="alert">
            <strong>Alert! </strong> Username And Password Doesn\'t Match
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if($succerror){
        echo '
        <div class="alert alert-success alert-dismissible fade show" id = "alert" role="alert">
            <strong>Success! </strong> You Are Login Successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>
        <main>
            <div class="container">
                <div class="user">
                <i class='fas'>&#xf406;</i>
                </div>
                <form action="/social/login.php" method = "post">
                    <input type="text" placeholder = "Enter Username" name = "username"><br><br>
                    <div class="mb-3">
                        <input type="password" placeholder = "Password" name = "pass" id="pass">
                    </div>
                  <button type="submit" class="btn">Submit</button>
                  <!-- <h6>Don't have an Account? <a>Sign Up</a></h6> -->
                  <h6>Don't have an Account? <a href="/social/regester.php">Sign Up</a></h6>
                </form> 
            </div>
        </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
  <script src="script1.js"></script>
</html>