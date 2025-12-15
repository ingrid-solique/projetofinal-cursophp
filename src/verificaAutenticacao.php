<?php

session_start();

if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    echo "<script>
        alert('Faz login para acessar essa página!');
        window.location.href = '../index.php';
    </script>";
}
