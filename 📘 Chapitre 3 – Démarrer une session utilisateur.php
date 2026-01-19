<?php
session_start();


if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST['nom']);

    if (!empty($nom)) {
        $_SESSION['utilisateur'] = $nom;
    } else {
        $message = "Veuillez entrer votre nom.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Session PHP</title>
</head>
<body>

<?php if (isset($_SESSION['utilisateur'])): ?>

    <!-- ====== PROFIL ====== -->
    <h1>Bienvenue <?php echo htmlspecialchars($_SESSION['utilisateur']); ?> 👋</h1>
    <a href="?logout=true">Se déconnecter</a>

<?php else: ?>

    <!-- ====== LOGIN FORM ====== -->
    <h2>Connexion</h2>

    <form method="POST">
        <label>Nom :</label><br>
        <input type="text" name="nom">
        <br><br>
        <button type="submit">Se connecter</button>
    </form>

    <?php if (!empty($message)): ?>
        <p style="color:red;"><?php echo $message; ?></p>
    <?php endif; ?>

<?php endif; ?>

</body>
</html>
