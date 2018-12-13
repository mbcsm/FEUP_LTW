<?php
          session_start();
          session_destroy();
          $home_page = 'https://' . $_SERVER['HTTP_HOST'] . '/interface/index.php';
          header('location: ' . $home_page);
          exit();
?>
