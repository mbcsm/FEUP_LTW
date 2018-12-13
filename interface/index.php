<!DOCTYPE html>
<html>

<?php
     include($_SERVER['DOCUMENT_ROOT'] . "/config.php");
     $query = "SELECT *
                           FROM story
                           ORDER BY timestamp DESC";
     $posts = mysqli_query($db, $query);?>
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

     <section id="posts">
          <?php foreach ($posts as $post) { ?>
               <div class="post">
                    <div class="vote">
                         <button id="upvote"><img src="../resources/feup.png" alt="Upvote" height="30" width="30" align="middle"></button>
                         <div id="ratio" >999999</div>
                         <button id="downvote"><img src="../resources/isep.jpg" alt="Downvote" height="30" width="30" align="middle"></button>
                    </div>
                    <article class="content">
                         <header>
                              <h1><a class="content-title" href="post.html"><?=$post['story_title']?></a></h1>
                         </header>
                         <p><?=$post['story_text']?></p>
                         <footer class="relevance">
                              <span class="author"></span>
                              <span class="date"></span>
                              <a class="comments"></a>
                         </footer>
                    </article>
               </div>
          <?php } ?>
     </section>

     <footer id="credits">
          <p>&copy; RedditX, 2018/2019</p>
     </footer>
</body>
</html>
