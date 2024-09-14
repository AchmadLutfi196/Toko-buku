<?php
session_start();

// Hapus semua session
session_unset();
session_destroy();

// Redirect ke halaman home
header('Location: home.php');
exit;
?>
