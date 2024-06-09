<?php

session_start();
//destruye la sesión y redirije al index
session_destroy();
header("Location: ../index.php");
?>