<?php
          error_reporting(E_Error);
          session_start();
          include($_SERVER['DOCUMENT_ROOT'] . "/config.php");

          $post_text = mysqli_real_escape_string($db, $_POST["post_text"]);
          $post_id = mysqli_real_escape_string($db, $_POST["post_id"]);
          $username = $_SESSION['username'];

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

                              $mComment->text = $post_text;
                              $mComment->post_id = $post_id;
                              $mComment->user_id = $user_id;
                              $mComment->username = $username;

                              $mJSON = json_encode($mComment);
                              echo $mJSON;
                    }
          }
          else{
                    echo "ERROR 2: User Not Logged In, Can't make post";
                    return;
          }

?>
