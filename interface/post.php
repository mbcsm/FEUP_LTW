<!DOCTYPE html>
<html>
<head>
     <title>RedditX</title>
     <meta charset="UTF-8">
     <link rel="icon" type="image/png" href="../resources/icon.png" sizes="32x32" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="style.css" rel="stylesheet">
     <link href="layout.css" rel="stylesheet">
</head>
<body>

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
                    <form onsubmit="return send_message()">
                         <input type="text" name="comment-text" placeholder="Comment" required>
                         <input type="submit" value="Submit">
                    </form>
               </section>
          </div>
          <div>
               <section class="comment">
                    <span class="author">UserName</span>
                    <p>U R MOM GAY!</p>
                    <div class="times">
                         <span class="date">5 mins. ago</span>
                         <a class="editted">5 mins. ago (eddited)</a>
                    </div>
               </section>
               <section class="comment">
                    <span class="author">UserName</span>
                    <p>U R MOM GAY!</p>
                    <div class="times">
                         <span class="date">5 mins. ago</span>
                         <a class="editted">5 mins. ago (eddited)</a>
                    </div>
               </section>
          </div>
     </body>
     <script>
     function send_message() {
          let comment_text = "post_text=" + document.querySelector('input[name=comment-text]').value;
          var post_id = "post_id=" +  '<?=$_GET['post_id']?>';

          // Delete sent message
          document.querySelector('input[name=comment-text]').value='';

          var request = new XMLHttpRequest();
          request.open("POST", "/interface/user/action_comment.php", true);
          request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          request.send(encodeURI(comment_text + "&" + post_id));
          // Send message

          return false;
     };

     function messages_received(){
          console.log("comment_made");
     }
</script>
</html>
