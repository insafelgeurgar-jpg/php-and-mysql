<?php
session_start();

if (!isset($_SESSION['nom'])) {
    header('Location: login.php');
    exit;
}

echo "<h2>Bienvenue " . $_SESSION['nom'] . "</h2>";
echo "<a href='logout.php'>Logout</a>";
