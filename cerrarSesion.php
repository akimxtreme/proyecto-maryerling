<?php 
session_start();
session_destroy();
?>

<?php 
/*?><script>alert("Se ha cerrado la sesi\u00f3n");</script><?*/
echo '<html><head><meta http-equiv="REFRESH" content="0; url=principal.php"></head></html>';
?>
