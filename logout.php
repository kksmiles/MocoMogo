<?php  
session_start();
session_destroy();
//session_regenerate_id();
echo "<script>window.alert('Logout Success.')</script>";
echo "<script>window.location='Intro.php'</script>";
?>