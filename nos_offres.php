<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Romaelys SARL - Nos Offres d'Emploi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <style>
        /* Style de base */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        
        /* Hero Section avec fond d'image */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
            margin-bottom: 50px;
        }
        
        .hero-title {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .hero-description {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        
        /* Section des offres */
        .offers-section {
            padding: 0 20px 60px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.2rem;
            color: #2c3e50;
            margin-bottom: 40px;
            position: relative;
        }
        
        .section-title:after {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background: #e74c3c;
            margin: 15px auto 0;
        }
        
         .offers-section {
        padding: 40px 20px;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .section-title {
        text-align: center;
        font-size: 2.2rem;
        color: #2c3e50;
        margin-bottom: 40px;
        position: relative;
    }
    
    .section-title:after {
        content: "";
        display: block;
        width: 80px;
        height: 4px;
        background: #e74c3c;
        margin: 15px auto 0;
    }
    
    /* Grille des offres */
    .offers-grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
        padding: 20px 0;
    }
    
    .offer-card {
        background: #333;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .offer-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    
    .offer-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }
    
    .offer-content {
        padding: 20px;
    }
    
    .offer-title {
        font-size: 1.4rem;
        color:rgb(249, 251, 253);
        margin-bottom: 10px;
    }
    
    .offer-expiry {
        display: flex;
        align-items: center;
        color: #e74c3c;
        font-weight: 500;
        margin-bottom: 15px;
    }
    
    .offer-expiry i {
        margin-right: 8px;
    }
    
    .offer-description {
        color: #fff;
        margin-bottom: 20px;
        height: 80px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
    
    .offer-button {
        display: inline-block;
        background: #e74c3c;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        transition: background 0.3s;
    }
    
    .offer-button:hover {
        background: #c0392b;
        color: white;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .offers-grid-container {
            grid-template-columns: 1fr;
        }
    }
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-description {
                font-size: 1rem;
                padding: 0 20px;
            }
            
            .offers-carousel-button {
                width: 40px;
                height: 40px;
            }
            
            .offers-prev {
                left: -15px;
            }
            
            .offers-next {
                right: -15px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-red ">
    <div class="container-fluid bg-red">
      <a class="navbar-brand nav-link" href="#">Romaelyssarl</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#service">Nos services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nos_offres.php">Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="service_domicile.php">Menages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nettoyage.php">Service nettoyage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">A propos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- Hero Section avec fond d'image -->
    <section class="hero-section">
        <h1 class="hero-title">Nos Offres d'Emploi</h1>
        <p class="hero-description">
            Vous êtes passionné(e), motivé(e) et à la recherche d'un nouveau défi professionnel ? 
            Romaelys SARL recrute ! Nous sommes constamment à la recherche de talents dynamiques 
            pour renforcer notre équipe dans les domaines de la sécurité électronique, de l'énergie, 
            de l'informatique et bien plus encore.
        </p>

    </section>

    <!-- Section des offres -->
    <section class="offers-section" id="offres">
    <h2 class="section-title">Découvrez nos opportunités</h2>
    
    <div class="offers-grid-container">
        <!-- Offre 1 -->
        <div class="offer-card">
            <img src="https://images.unsplash.com/photo-1517430816045-df4b7de11d1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80" 
                 alt="Informaticien" class="offer-image">
            <div class="offer-content">
                <h3 class="offer-title">Informaticien</h3>
                <div class="offer-expiry">
                    <i class="bi bi-calendar-check"></i> Exp: 28/05/2025
                </div>
                <p class="offer-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                </p>
                <a href="#" class="offer-button">Postuler</a>
            </div>
        </div>
        
        <!-- Offre 2 -->
        <div class="offer-card">
            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2022&q=80" 
                 alt="Secrétaire" class="offer-image">
            <div class="offer-content">
                <h3 class="offer-title">Secrétaire</h3>
                <div class="offer-expiry">
                    <i class="bi bi-calendar-check"></i> Exp: 28/05/2025
                </div>
                <p class="offer-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                </p>
                <a href="#" class="offer-button">Postuler</a>
            </div>
        </div>
        
        <!-- Offre 3 -->
        <div class="offer-card">
            <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                 alt="Agent de sécurité" class="offer-image">
            <div class="offer-content">
                <h3 class="offer-title">Agent de sécurité</h3>
                <div class="offer-expiry">
                    <i class="bi bi-calendar-check"></i> Exp: 28/05/2025
                </div>
                <p class="offer-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                </p>
                <a href="#" class="offer-button">Postuler</a>
            </div>
        </div>
        
        <!-- Offre 4 -->
        <div class="offer-card">
            <img src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                 alt="Nettoyeur de surface" class="offer-image">
            <div class="offer-content">
                <h3 class="offer-title">Nettoyeur de surface</h3>
                <div class="offer-expiry">
                    <i class="bi bi-calendar-check"></i> Exp: 28/05/2025
                </div>
                <p class="offer-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                </p>
                <a href="#" class="offer-button">Postuler</a>
            </div>
        </div>
        
        <!-- Offre 5 -->
        <!-- <div class="offer-card">
            <img src="https://images.unsplash.com/photo-1581093450021-4a7360e9a9d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                 alt="Électricien" class="offer-image">
            <div class="offer-content">
                <h3 class="offer-title">Électricien</h3>
                <div class="offer-expiry">
                    <i class="bi bi-calendar-check"></i> Exp: 28/05/2025
                </div>
                <p class="offer-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                </p>
                <a href="#" class="offer-button">Postuler</a>
            </div>
        </div> -->
    </div>
</section>
<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
      <div class="row gy-4">
        <!-- Logo et description -->
        <div class="col-md-4">
          <img src="logo.png" alt="Logo Romaelyss" class="mb-3" style="max-width: 160px;">
          <p class="mb-3">
            Romaelyss est une entreprise dynamique et innovante, spécialisée dans le recrutement, le placement et la gestion du personnel.
          </p>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline-light btn-sm rounded-circle btn-social" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="btn btn-outline-light btn-sm rounded-circle btn-social" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="btn btn-outline-light btn-sm rounded-circle btn-social" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
            <a href="#" class="btn btn-outline-light btn-sm rounded-circle btn-social" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>

        <!-- Navigation -->
        <div class="col-md-2">
          <h5 class="fw-semibold mb-3">Navigation</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white-50 text-decoration-none">Accueil</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Qui sommes-nous ?</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Notre mission</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Nos Services</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Nos atouts</a></li>
          </ul>
        </div>

        <!-- Liens rapides -->
        <div class="col-md-3">
          <h5 class="fw-semibold mb-3">Liens rapides</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white-50 text-decoration-none">Nous contacter</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Nos secteurs d'intervention</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Service nettoyage</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Pourquoi nous ?</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">À propos</a></li>
          </ul>
        </div>

        <!-- Heures de travail -->
        <div class="col-md-3">
          <h5 class="fw-semibold mb-3">Heure de travail</h5>
          <p class="mb-1"><i class="bi bi-clock me-2"></i>Disponible 24h/24</p>
          <p class="text-white-50">
            Chez Romaelyss Sarl, nous croyons que le succès de votre entreprise repose sur des talents bien choisis et bien accompagnés.
            Ensemble, construisons l’avenir.
          </p>
          <a href="#" class="btn btn-danger mt-2">
            <i class="bi bi-telephone-fill me-2"></i>Contactez-nous
          </a>
        </div>
      </div>

      <hr class="border-secondary mt-5">

      <div class="text-center text-white-50">
        &copy; 2025 Romaelyss Sarl • Tous droits réservés<br>
        <span>Design par <a href="https://menjidrc.com/" style="text-decoration: none;" class="text-white">Osee kalala</a></span>
      </div>
    </div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>