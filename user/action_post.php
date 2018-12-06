<?php
          session_start();
          include($_SERVER['DOCUMENT_ROOT'] . "/config.php");

          $title = mysqli_real_escape_string($db, $_POST["title"]);
          $text = mysqli_real_escape_string($db, $_POST["text"]);
          $username = $_SESSION['username'];

          $query = "SELECT * FROM user WHERE username = '$username'";
          $result = mysqli_query($db, $query);

          if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                              $user_id = $row["user_id"];
                              $statement = $db->prepare('INSERT INTO story (story_title,story_text, user_id) VALUES (?,?,?)');
                              $statement->bind_param("sss", $title, $text,$user_id);
                              $statement->execute();
                              header('location: interface/index.php');
                    }
          }
          else{
                    echo "ERROR 2: User Not Logged In, Can't make post";
          }

?>
