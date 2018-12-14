<?php
          session_start();
          include($_SERVER['DOCUMENT_ROOT'] . "/config.php");

          $post_text = mysqli_real_escape_string($db, $_POST["post_text"]);
          $post_id = mysqli_real_escape_string($db, $_POST["post_id"]);
          $username = $_SESSION['username'];

          echo $post_text;

          if(empty($post_id) || empty($post_text)){
                    echo "ERROR 1: One or more fields empty";
                    return;
          }

          $query = "SELECT * FROM user WHERE username = '$username'";
          $result = mysqli_query($db, $query);

          if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                              $user_id = $row["user_id"];
                              $statement = $db->prepare('INSERT INTO comment (user_id ,post_id, post_text) VALUES (?,?,?)');
                              $statement->bind_param("sss", $user_id, $post_id, $post_text);
                              $statement->execute();
                              //$home_page = 'https://' . $_SERVER['HTTP_HOST'] . '/interface/index.php';
                              //header('location: ' . $home_page);
                    }
          }
          else{
                    echo "ERROR 2: User Not Logged In, Can't make post";
                    return;
          }

?>
