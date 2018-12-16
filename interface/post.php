<!DOCTYPE html>
<html>

<?php
     error_reporting(E_Error);
     include($_SERVER['DOCUMENT_ROOT'] . "/config.php");
     $post_id = $_GET['post_id'];
     $query =  "SELECT *
                    FROM comment
                    WHERE post_id = '$post_id'";
     $comments = mysqli_query($db, $query);?>


<head>
     <title>RedditX</title>
     <meta charset="UTF-8">
     <link rel="icon" type="image/png" href="../resources/icon.png" sizes="32x32" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="style.css" rel="stylesheet">
     <link href="layout.css" rel="stylesheet">
</head>
<body>
     <script>
          function send_comment() {
               var last_id = "";
               let comment_text = "post_text=" + document.querySelector('input[name=comment-text]').value;
               var post_id = "post_id=" +  '<?=$_GET['post_id']?>';

               // Delete sent message
               document.querySelector('input[name=comment-text]').value='';

               var request = new XMLHttpRequest();
               request.open("POST", "/interface/user/action_comment.php", true);
               request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
               request.send(encodeURI(comment_text + "&" + post_id));
               request.onreadystatechange = function() {
                    if (this.responseText.trim()!=''){
                         var commentJson = JSON.parse(this.responseText);
                         if(last_id != commentJson.post_id){
                              messages_received(commentJson);
                              last_id = commentJson.post_id;
                         }
                    }
             };

               return false;
          };

          function messages_received(commentJson){
               console.log(commentJson);
               let comment = document.createElement('section');
               let section = document.querySelector('#comment_section');

               comment.className = "comment";

               comment.innerHTML =
                    '<span class="author">' + commentJson.username + '</span>' +
                    '<p>' + commentJson.text + '</p>' +
                    '<div class="times"><span class="date">Now</span></div>';

               section.append(comment);
               section.scrollTop = section.scrollTopMax;
          }
     </script>

     <nav id="menu">
          <!-- just for the hamburguer menu in responsive layout -->
          <!-- tudo na mesma linha -->
          <!-- <label class="hamburger" for="hamburger"></label> -->
          <button id="logo" href="index.html">
               <h1>RedditX</h1>
          </button>
          <div id="menu-items">
               <a class="menu-item" href="index.html">New</a>
               <a class="menu-item" href="index.html">Hot</a>
               <a class="menu-item" href="index.html">Trending</a>
               <a class="menu-item" href="index.html">Gore</a>
               <a class="menu-item" href="index.html">4Chan</a>
          </div>
          <div id="submit-post">
               <a href="newPost.html">Submit New Post</a>
          </div>
          <div id="signup-login">
               <button class="button-signup-login" href="register.html">Sign Up</button>
               <button class="button-signup-login" href="login.html">Log In</button>
          </div>
     </nav>
     <div class="post">
          <div class="vote">
               <button id="upvote"><img src="../resources/feup.png" alt="Upvote" height="30" width="30" align="middle"></button>
               <div id="ratio" >999999</div>
               <button id="downvote"><img src="../resources/isep.jpg" alt="Downvote" height="30" width="30" align="middle"></button>
          </div>
          <article class="content">
               <header>
                    <h1><a class="content-title" href="post.html">Quisque a dapibus magna, non scelerisque</a></h1>
               </header>
               <p>Etiam massa magna, condimentum eu facilisis sit amet, dictum ac purus. Curabitur semper nisl vel
                    libero
                    pulvinar ultricies. Proin dignissim dolor nec scelerisque bibendum. Maecenas a sem euismod, iaculis
                    erat id, convallis arcu. Ut mollis, justo vitae suscipit imperdiet, eros dui laoreet enim,
                    fermentum
                    posuere felis arcu vel urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                    posuere
                    cubilia Curae; Proin blandit</p>
                    <footer class="relevance">
                         <span class="author">UserName</span>
                         <span class="date">15 mins. ago</span>
                         <a class="comments">2.1k comments</a>
                    </footer>
               </article>
          </div>
          <div>
          <section class="addComment">
               <form onsubmit="return send_comment()">
                    <input type="text" name="comment-text" placeholder="Comment" required>
                    <input type="submit" value="Submit">
               </form>
          </section>
          </div>
          <section  id="comment_section">
               <?php foreach ($comments as $comment) { ?>
                    <?php
                         $mComment->text = $comment['post_text'];
                         $mComment->post_id = $comment['post_id'];
                         $mComment->comment_id = $comment['comment_id'];
                         $mComment->user_id = $comment['user_id'];

                         $query = "SELECT username FROM user WHERE user_id = '$mComment->user_id' LIMIT 1";
                         $users = mysqli_query($db, $query);

                         foreach ($users as $user) {
                              $mComment->username = $user['username'];
                         }

                         $mJSON = json_encode($mComment);?>
                         <script type="text/javascript">
                              messages_received(<? echo $mJSON?>);
                         </script>
               <?php } ?>
          </section>
     </body>

</html>
