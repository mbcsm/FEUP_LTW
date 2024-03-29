<?php
          session_start();
          include($_SERVER['DOCUMENT_ROOT'] . "/config.php");

          $title = mysqli_real_escape_string($db, $_POST["title"]);
          $text = mysqli_real_escape_string($db, $_POST["text"]);
          $username = $_SESSION['username'];

          if(empty($title) || empty($text)){
                    echo "ERROR 1: One or more fields empty";
          }

          $query = "SELECT * FROM user WHERE username = '$username'";
          $result = mysqli_query($db, $query);

          if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                              $user_id = $row["user_id"];
                              $statement = $db->prepare('INSERT INTO story (story_title,story_text, user_id) VALUES (?,?,?)');
                              $statement->bind_param("sss", $title, $text,$user_id);
                              $statement->execute();
                              $home_page = 'https://' . $_SERVER['HTTP_HOST'] . '/interface/index.php';
                              header('location: ' . $home_page);
                    }
          }
          else{
                    echo "ERROR 2: User Not Logged In, Can't make post";
          }

?>
