<!DOCTYPE html>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 50px;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        textarea {
            resize: vertical;
        }

        button {
            margin-top: 15px;
            padding: 10px 20px;
            border: none;
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            background-color: #ffe6e6;
            color: #d8000c;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }

        .success {
            background-color: #e6ffe6;
            color: #4f8a10;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }
    </style>

<html>

    <body>
 <h1 >furmulaire</h1>     
 <form method="POST" action=""> 
 <label>nom:</label>
 <input type="text" name="nom">
 <br><br>
<label>email:</label>
<input type="text" name="email">
<br> <br>
<label>message:</label>
<textarea type=text name='message'></textarea>
<button type="submit"> envoyer</button>
</form>
    </body>
</html>
<?php

$Error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom'] );
    $email = trim($_POST['email'] );
    $message = trim($_POST['message']);

    if (empty($nom)) {
        $Error[] = "Le nom est obligatoire";
    }

    if (empty($email)) {
        $Error[] = "L'email est obligatoire";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $Error[] = "Email non valide";
    }

    if (empty($message)) {
        $Error[] = "Le message est obligatoire";
    }

    if (empty($Error)) {
        echo "<p style='color:green'>Formulaire envoyé avec succès</p>";
        echo "Nom : $nom <br>";
        echo "Email : $email <br>";
        echo "Message : $message";
    } else {
        foreach ($Error as $err) {
            echo "<p style='color:red'>$err</p>";
            
        }
    }
   }