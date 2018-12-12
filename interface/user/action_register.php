<?php
          session_start();
          include($_SERVER['DOCUMENT_ROOT'] . "/config.php");

          $username = $_POST['username'];
          $password = $_POST['password'];

          if(empty($username) || empty($password)){
                    echo "ERROR 1: One or more fields empty";
          }

          if($username && $password){
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $statement = $db->prepare('INSERT INTO user (username,password) VALUES (?,?)');
                    $statement->bind_param("ss", $username, $password);
                    $statement->execute();
            	$_SESSION['username'] = $username;
            	$_SESSION['loggedin'] = true;
                    $home_page = 'https://' . $_SERVER['HTTP_HOST'] . '/interface/index.html';
                    header('location: ' . $home_page);
          }else{
                    echo "ERROR: Could Not Register";
          }

?>
