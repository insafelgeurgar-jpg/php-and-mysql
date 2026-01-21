<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);

    if (!empty($nom)) {
        $_SESSION['nom'] = $nom;

        // cookie (اختياري)
        setcookie('nom', $nom, time() + 3600, "/");

        header('Location: home.php');
        exit;
    } else {
        $error = "❌ Le nom est obligatoire";
    }
}
?>

<form method="POST">
    <label>Nom :</label>
    <input type="text" name="nom">
    <button type="submit">Entrer</button>
</form>

<?php
if (!empty($error)) {
    echo "<p style='color:red'>$error</p>";
}
?>
