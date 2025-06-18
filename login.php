<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .login-card {
      max-width: 400px;
      width: 100%;
      padding: 2rem;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .btn-danger {
      width: 100%;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h3 class="text-center mb-4 text-danger">Connexion</h3>
    <form action="traitement.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Adresse Gmail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="exemple@gmail.com" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
      </div>
      <button type="submit" class="btn btn-danger">Se connecter</button>
    </form>
    <p class="mt-3 text-center text-muted">
      Vous n'avez pas de compte ? <a href="register.php">Créer un compte</a>
    </p>
  </div>

</body>
</html>
