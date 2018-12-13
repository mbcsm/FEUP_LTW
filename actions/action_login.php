<?php
          include("/config.php");
          session_start();

          $username = mysqli_real_escape_string($db, $_POST["username"]);
          $password = mysqli_real_escape_string($db, $_POST["password"]);
          $query = "SELECT * FROM user WHERE username = '$username'";
          $result = mysqli_query($connect, $query);
          if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                              if(password_verify($password, $row["password"])){
                                        $_SESSION['username'] = $username;
                                        $_SESSION['success'] = "You are now logged in";
                                        header('location: interface/index.php');
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
