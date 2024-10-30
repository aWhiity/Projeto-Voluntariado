<?php 
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.view.php");
        exit();
    }
    echo "Bem-vindo, " . $_SESSION['usuario'];
    
?>