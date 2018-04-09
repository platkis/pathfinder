<?php
session_start();
//if logout is pressed, reset session id and redirect to home page
$_SESSION['id'] = null;
echo '<script>

window.location.href = "/";

</script>';
?>