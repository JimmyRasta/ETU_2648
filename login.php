<?php
require('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password, role FROM Utilisateurs WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password, $role);

if ($stmt->fetch()) {

    if (password_verify($password, $hashed_password)) {

        session_start();
        $_SESSION["user_id"] = $user_id;  
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $role;

        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Mot de passe incorrect (vérifiez la comparaison sensible à la casse)";
    }
} else {
    $error_message = "Nom d'utilisateur ou mot de passe incorrect (vérifiez les détails de la requête SQL)";
    // Ajoutez une déclaration pour afficher les détails de la requête SQL
    echo "Erreur SQL: " . $stmt->error;
}
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Connexion Admin</h2>
                    <?php if (isset($error_message)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="check_permissions.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur:</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe:</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

