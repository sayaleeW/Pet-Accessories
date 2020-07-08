<?php
session_start();


?>
<html>
<head>
<script>

document.location.href = "index.php";
</script>
</head>
<?php

session_unset();         
    session_destroy();
    unset($_SESSION["name"]);
     unset($_SESSION["id"]);
?>
</html>