<?php
          session_start();
          session_destroy();
          header('location: interface/index.php');
          exit();
?>
