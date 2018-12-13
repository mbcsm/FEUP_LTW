<?php
     include($_SERVER['DOCUMENT_ROOT'] . "/config.php");
     session_start();

     $username = mysqli_real_escape_string($db, $_POST["username"]);
     $password = mysqli_real_escape_string($db, $_POST["password"]);
     $query = "SELECT * FROM user WHERE username = '$username'";
     $result = mysqli_query($db, $query);
     if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_array($result)){
               if(password_verify($password, $row["password"])){
                    $_SESSION['username'] = $username;
                    $_SESSION['loggedin'] = true;
                    $home_page = 'https://' . $_SERVER['HTTP_HOST'] . '/interface/index.php';
                    header('location: ' . $home_page);
               }
               else{
                    echo "ERROR 1: Could Not LOGIN";
               }
          }
     }
     else{
          echo "ERROR 2: Could Not LOGIN";
     }

?>
