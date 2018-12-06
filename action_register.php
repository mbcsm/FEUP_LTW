<?php

          include("config.php");
          session_start();

          $username = $_POST['username'];
          $password = $_POST['password'];

          if($username && $password){
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $statement = $db->prepare('INSERT INTO user (username,password) VALUES (?,?)');
                    $statement->bind_param("ss", $username, $password);
                    $statement->execute();
            	$_SESSION['username'] = $username;
            	$_SESSION['loggedin'] = true;
            	header('location: index.php');
          }else{
                    echo "ERROR: Could Not Register";
          }

?>
