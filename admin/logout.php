<?php
    session_start();
    if (isset($_SESSION['MSNV'])) {
        unset($_SESSION['MSNV']);
        unset($_SESSION['cart']);
        unset($_SESSION['stt']);
        header('Location: index.php');
    }
?>