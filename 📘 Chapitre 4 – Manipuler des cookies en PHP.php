<?php
setcookie("utilisateur", "Alice", time() + 3600, "/");
?>

<!DOCTYPE html>
<html>
<body>
<?php
if (isset($_COOKIE["utilisateur"])) {
    echo "BONJOUR " . $_COOKIE["utilisateur"];
} else {
    echo "Le nom n'est pas trouvé. Rafraîchis la page.";
}
?>
</body>
</html>
