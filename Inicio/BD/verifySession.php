<?php

session_start();

$utilizador = $_SESSION["nome"];

if ($utilizador != null) {
    if (substr($utilizador, 0, 1) == "F" || substr($utilizador, 0, 1) == "f") {
        echo "professor";
    } else {
        echo "aluno";
    }
}
?>
