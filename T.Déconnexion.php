<!-- Bernet Vincent GDC Application, check the READ-ME -->


<!-- Simple page where we log-out of our session by destroying it, after that we redirect to T.Presentation.php -->
<?php
session_start();
session_destroy();
// unset(session_id()); Was another solution to logout, but i prefer the radical one
header("Location: T.Accueil.php?Message");
return;
?>