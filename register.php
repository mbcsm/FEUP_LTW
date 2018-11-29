<!doctype html>

<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans+Condensed:300" rel="stylesheet">
  </head>
  
  <body>
    <header>
      <h1><a href="index.php"><i class="redditx"></i>RedditX</a></h1>
    </header>
  
    <section id="register">
  
      <header><h2>Register New Account</h2></header>
  
      <form method="post" action="action_register.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Register">
      </form>
  
      <footer>
        <p>Already have an account? <a href="index.php">Login</a></p>
      </footer>
  
    </section>
    
  </body>

</html>