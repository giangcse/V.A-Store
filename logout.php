<?php
    session_start();
    if (isset($_SESSION['IDKH'])) {
        unset($_SESSION['IDKH']);
        unset($_SESSION['cart']);
        unset($_SESSION['stt']);
        header('Location: index.php');
    }
?>