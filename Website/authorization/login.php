
<?php
    session_start();
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['occupation'] = $_POST['occupation'];
    if(empty($_SESSION['password']) || empty($_SESSION['login']) || empty($_SESSION['occupation'])){
        session_destroy();
        
    }
    header('Location: authorization.php');
?>
