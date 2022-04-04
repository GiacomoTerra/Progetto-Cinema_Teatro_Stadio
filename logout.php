<?php
     setcookie("session","",time()-3600);
     header("location:./homepage.php");
?>