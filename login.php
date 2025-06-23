<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header('Location: ' . ($_SESSION['user_type'] === 'admin' ? 'admin/dashboard.php' : 'candidate/dashboard.php'));
    exit();
}

// Récupérer les erreurs de connexion
$error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Romaelys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 500px;
            margin: 100px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h2 {
            color: #2c3e50;
            font-weight: 700;
        }
        .btn-login {
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            font-weight: 500;
        }
        .btn-login:hover {
            background-color: #1a252f;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <h2><i class="bi bi-box-arrow-in-right"></i> Connexion</h2>
                <p class="text-muted">Accédez à votre espace personnel</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="process_login.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur ou email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="username" name="username" required
                               placeholder="Votre nom d'utilisateur ou email">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required
                               placeholder="••••••••">
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-login btn-lg">
                        <i class="bi bi-box-arrow-in-right"></i> Se connecter
                    </button>
                </div>

                <div class="mt-3 text-center">
                    <p>Pas encore de compte ? <a href="register.php">Inscrivez-vous ici</a></p>
                    <p><a href="forgot_password.php">Mot de passe oublié ?</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>