<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Romaelys</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .registration-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-header h2 {
            color: #2c3e50;
            font-weight: 700;
        }
        .required-field::after {
            content: " *";
            color: #e74c3c;
        }
        .btn-register {
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            font-weight: 500;
        }
        .btn-register:hover {
            background-color: #1a252f;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="registration-container">
            <div class="form-header">
                <h2><i class="bi bi-person-plus"></i> Créer un compte</h2>
                <p class="text-muted">Rejoignez Romaelys pour postuler à nos offres d'emploi</p>
            </div>

            <form action="process_register.php" method="POST" id="registrationForm">
                <!-- Informations de connexion -->
                <div class="mb-4">
                    <h5 class="border-bottom pb-2">Informations de connexion</h5>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="username" class="form-label required-field">Nom d'utilisateur</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" id="username" name="username" required
                                   placeholder="Votre nom d'utilisateur" minlength="3" maxlength="50">
                        </div>
                        <div class="form-text">Entre 3 et 50 caractères</div>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label required-field">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required
                                   placeholder="exemple@email.com">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="password" class="form-label required-field">Mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required
                                   placeholder="••••••••" minlength="8">
                        </div>
                        <div class="form-text">Minimum 8 caractères</div>
                    </div>

                    <div class="col-md-6">
                        <label for="confirm_password" class="form-label required-field">Confirmer le mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required
                                   placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <!-- Informations personnelles -->
                <div class="mb-4 mt-4">
                    <h5 class="border-bottom pb-2">Informations personnelles</h5>
                </div>

                <div class="mb-3">
                    <label for="full_name" class="form-label required-field">Nom complet</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <input type="text" class="form-control" id="full_name" name="full_name" required
                               placeholder="Prénom et Nom" maxlength="100">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="phone" class="form-label">Téléphone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                   placeholder="+33 6 12 34 56 78" maxlength="20">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <textarea class="form-control" id="address" name="address" rows="2"
                              placeholder="Votre adresse complète"></textarea>
                </div>

                <!-- Conditions et soumission -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">J'accepte les <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">conditions d'utilisation</a></label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-register btn-lg">
                        <i class="bi bi-check-circle"></i> S'inscrire
                    </button>
                </div>

                <div class="mt-3 text-center">
                    <p>Déjà un compte ? <a href="login.php">Connectez-vous ici</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Conditions d'utilisation -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Conditions d'utilisation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.</p>
                    <!-- Ajoutez ici vos conditions d'utilisation complètes -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Validation JavaScript -->
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            if (password !== confirmPassword) {
                alert('Les mots de passe ne correspondent pas !');
                event.preventDefault();
            }
            
            if (!document.getElementById('terms').checked) {
                alert('Veuillez accepter les conditions d\'utilisation');
                event.preventDefault();
            }
        });
    </script>
</body>
</html>