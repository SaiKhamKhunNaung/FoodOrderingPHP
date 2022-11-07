<?php
session_start();
session_destroy();
echo "<script>window.alert('Log Out Success')</script>";
echo "<script>window.location='admin_login.php'</script>";
?>