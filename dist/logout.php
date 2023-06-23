<?php
session_start();
$_SESSION['login'] == "";

session_unset();
$_SESSION['action1'] = "You have logged out successfully..!";
$_SESSION['id'] = 0;
?>
<script language="javascript">
    document.location = "index.php";
</script>