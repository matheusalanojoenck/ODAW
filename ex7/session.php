<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
date_default_timezone_set('America/Sao_Paulo');
$_SESSION["last_session"] = date("d/m/y H:i:s");
$_SESSION["usr"] = "matheus";
?>

</body>
</html>