<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Créer un compte</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .register-card {
      max-width: 500px;
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

  <div class="register-card">
    <h3 class="text-center mb-4 text-danger">Créer un compte</h3>
    <form action="inscription.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
      </div>
      <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Adresse Gmail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="exemple@gmail.com" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
      </div>
      <div class="mb-3">
        <label for="photo" class="form-label">Photo de profil</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
      </div>
      <button type="submit" class="btn btn-danger">Créer mon compte</button>
    </form>
    <p class="mt-3 text-center text-muted">
      Vous avez déjà un compte ? <a href="login.php">Connectez-vous</a>
    </p>
  </div>

</body>
</html>
