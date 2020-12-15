<?php
session_start();

$codigo = $_SESSION['nome'];

if ($codigo != "f345607") {
    echo "orientador";
}

?>