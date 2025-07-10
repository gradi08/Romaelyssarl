<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Récupération des offres valides
$stmt = $pdo->prepare("SELECT * FROM jobs 
                      WHERE published = 1 
                      AND expiry_date >= CURDATE() 
                      ORDER BY created_at DESC 
                      LIMIT 5");
$stmt->execute();
$jobs = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="asset/css/style.css">
  <link rel="stylesheet" href="asset/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <title>Document</title>
  <style>
    .carousel-container {
      position: relative;
      max-width: 100%;
      margin: 0 auto;
      overflow: hidden;
    }

    .carousel-track {
      display: flex;
      overflow-x: auto;
      scroll-behavior: smooth;
      scroll-snap-type: x mandatory;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: none;
      /* Firefox */
    }

    .carousel-track::-webkit-scrollbar {
      display: none;
      /* Chrome/Safari */
    }

    .carousel-inner {
      display: flex;
      gap: 15px;
      padding: 10px 0;
    }

    .carousel-item-custom {
      scroll-snap-align: start;
      min-width: 300px;
      flex: 0 0 auto;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }

    .carousel-item-custom:hover {
      transform: translateY(-5px);
    }

    .carousel-item-custom img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .carousel-button {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: white;
      border: none;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      z-index: 10;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0.8;
      transition: opacity 0.3s;
    }

    .carousel-button:hover {
      opacity: 1;
    }

    .prev {
      left: 15px;
    }

    .next {
      right: 15px;
    }

    .carousel-indicators {
      display: flex;
      justify-content: center;
      padding: 10px 0;
      gap: 8px;
    }

    .carousel-indicators span {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #ccc;
      cursor: pointer;
    }

    .carousel-indicators span.active {
      background: #333;
    }

    .partners-section {
      text-align: center;
      padding: 40px 20px;
      background: #f9f9f9;
      margin: 30px 0;
    }

    .partners-title {
      font-size: 2rem;
      color: #333;
      margin-bottom: 10px;
    }

    .partners-subtitle {
      color: #666;
      font-size: 1.1rem;
      margin-bottom: 30px;
    }

    .partners-carousel-container {
      position: relative;
      max-width: 1200px;
      margin: 0 auto;
    }

    .partners-carousel-track {
      overflow: hidden;
      padding: 20px 0;
    }

    .partners-carousel-inner {
      display: flex;
      gap: 30px;
      transition: transform 0.5s ease;
    }

    .partner-item {
      flex: 0 0 180px;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .partner-item a {
      display: block;
      text-align: center;
      transition: all 0.3s ease;
    }

    .partner-item img {
      max-width: 100%;
      height: 80px;
      object-fit: contain;
      filter: grayscale(100%);
      opacity: 0.7;
      transition: all 0.3s ease;
    }

    .partner-item:hover img {
      filter: grayscale(0%);
      opacity: 1;
      transform: scale(1.05);
    }

    .partner-tooltip {
      position: absolute;
      bottom: -30px;
      left: 50%;
      transform: translateX(-50%);
      background: #333;
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      font-size: 0.8rem;
      opacity: 0;
      transition: opacity 0.3s;
      width: max-content;
      pointer-events: none;
    }

    .partner-item:hover .partner-tooltip {
      opacity: 1;
    }

    .partners-carousel-button {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: white;
      border: 1px solid #ddd;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      z-index: 10;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
    }

    .partners-carousel-button:hover {
      background: #f0f0f0;
    }

    .prev {
      left: -20px;
    }

    .next {
      right: -20px;
    }
    .carousel-container {
    max-width: 100%;
    position: relative;
    background: #fff;
}

.carousel-track {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    gap: 1rem;
    padding-bottom: 1rem;
}

.carousel-item-custom {
    scroll-snap-align: start;
    transition: transform 0.3s ease-in-out;
    border: 1px solid #ddd;
}

.carousel-track::-webkit-scrollbar {
    display: none;
}

.carousel-button {
    z-index: 10;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    border: none;
}

.carousel-indicators .indicator {
    width: 10px;
    height: 10px;
    background-color: #ccc;
    border-radius: 50%;
    display: inline-block;
    cursor: pointer;
}

.carousel-indicators .indicator.active {
    background-color: #ff4d4f;
}

  </style>
</head>

<body>
 <!-- Navigation améliorée -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="index.php"><img src="asset/img/LOGO_1.png" alt="Logo Romaelyss gradi" class="mb-3" style="max-width: 80px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active px-3" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="#service">Nos services</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" id="jobsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jobs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="jobsDropdown">
                        <li><a class="dropdown-item" href="nos_offres.php">Toutes les offres</a></li>
                        <li><a class="dropdown-item" href="service_domicile.php">Services à domicile</a></li>
                        <li><a class="dropdown-item" href="nettoyage.php">Services de nettoyage</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="apropos.php">À propos</a>
                </li>
                <?php if (isset($_SESSION['user_id'])): ?>
                  <?php if ($_SESSION['user_type'] === 'admin'): ?>
                    <li class="nav-item">
                      <a href="dashboard.php" class=" nav-link px-3">Tableau de bord</a>
                    
                      </li>
                                <?php else: ?>   
                                 <li class="nav-item">
                    
                                   <a href="profile.php" class="nav-link px-3">Mon compte</a>
                </li> 
                                <?php endif; ?>
                    <li class="nav-item ms-lg-3 my-2 my-lg-0">
                        <a href="logout.php" class="btn btn-outline-light">Déconnexion</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item ms-lg-3 my-2 my-lg-0">
                        <a href="login.php" class="btn btn-light text-danger fw-bold">Connexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Carrousel Héro amélioré -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <!-- Indicateurs -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active vh-100">
            <div class="position-relative h-100">
                <img src="asset/img/software-developer-6521720_1280.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Développeurs">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <div class="container">
                        <h2 class="display-4 fw-light mb-4 animate__animated animate__fadeInDown">Bienvenue sur notre plateforme</h2>
                        <h3 class="fs-3 mb-4 animate__animated animate__fadeIn animate__delay-1s">Nous croyons que les succès de notre entreprise repose sur :</h3>
                        <h1 class="display-3 fw-bold text-danger mb-5 animate__animated animate__fadeInUp animate__delay-2s">DES TALENTS BIEN CHOISIS</h1>
                        
                        <div class="d-flex justify-content-center gap-3 mb-5">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <a href="logout.php" class="btn btn-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Déconnexion</a>
                                <?php if ($_SESSION['user_type'] === 'admin'): ?>
                                    <a href="dashboard.php" class="btn btn-outline-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Tableau de bord</a>
                                <?php else: ?>   
                                    <a href="profile.php" class="btn btn-outline-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Mon compte</a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="login.php" class="btn btn-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Connexion</a>
                                <a href="register.php" class="btn btn-outline-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Créer un compte</a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="social-icons animate__animated animate__fadeIn animate__delay-4s">
                            <a href="https://www.facebook.com/romaelyss" class="text-white mx-2 fs-4"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/romaelysssarl?igsh=OW04ZTR1NGIwbHFm&utm_source=ig_contact_invite" class="text-white mx-2 fs-4"><i class="fab fa-instagram"></i></a>
                            <a href="" class="text-white mx-2 fs-4"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://x.com/Romaelyss?t=kXZsjiMn9pihMlvqZcpX_Q&s=09" class="text-white mx-2 fs-4"><i class="fab fa-x"></i></a>
                            <a href="https://www.youtube.com/@romaelyssarl/videos" class="text-white mx-2 fs-4"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item vh-100">
            <div class="position-relative h-100">
                <img src="asset/img/686570602ef4f_IMG-20241231-WA0006.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Équipe">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <div class="container">
                        <h2 class="display-4 fw-light mb-4">Une équipe unie</h2>
                        <h3 class="fs-3 mb-4">Notre force réside dans la collaboration et l'engagement de :</h3>
                        <h1 class="display-3 fw-bold text-danger mb-5">PROFESSIONNELS PASSIONNÉS</h1>
                        <!-- Boutons identiques à la première slide -->
                         <div class="d-flex justify-content-center gap-3 mb-5">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <a href="logout.php" class="btn btn-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Déconnexion</a>
                                <?php if ($_SESSION['user_type'] === 'admin'): ?>
                                    <a href="dashboard.php" class="btn btn-outline-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Tableau de bord</a>
                                <?php else: ?>   
                                    <a href="profile.php" class="btn btn-outline-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Mon compte</a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="login.php" class="btn btn-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Connexion</a>
                                <a href="register.php" class="btn btn-outline-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Créer un compte</a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="social-icons animate__animated animate__fadeIn animate__delay-4s">
                            <a href="https://www.facebook.com/romaelyss" class="text-white mx-2 fs-4"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/romaelysssarl?igsh=OW04ZTR1NGIwbHFm&utm_source=ig_contact_invite" class="text-white mx-2 fs-4"><i class="fab fa-instagram"></i></a>
                            <a href="" class="text-white mx-2 fs-4"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://x.com/Romaelyss?t=kXZsjiMn9pihMlvqZcpX_Q&s=09" class="text-white mx-2 fs-4"><i class="fab fa-x"></i></a>
                            <a href="https://www.youtube.com/@romaelyssarl/videos" class="text-white mx-2 fs-4"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item vh-100">
            <div class="position-relative h-100">
                <img src="asset/img/ai-generated-8881144_1280.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Croissance">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <div class="container">
                        <h2 class="display-4 fw-light mb-4">Développez votre potentiel</h2>
                        <h3 class="fs-3 mb-4">Nous offrons des opportunités pour :</h3>
                        <h1 class="display-3 fw-bold text-danger mb-5">ÉVOLUER ET RÉUSSIR</h1>
                        <!-- Boutons identiques à la première slide -->
                         <div class="d-flex justify-content-center gap-3 mb-5">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <a href="logout.php" class="btn btn-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Déconnexion</a>
                                <?php if ($_SESSION['user_type'] === 'admin'): ?>
                                    <a href="dashboard.php" class="btn btn-outline-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Tableau de bord</a>
                                <?php else: ?>   
                                    <a href="profile.php" class="btn btn-outline-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Mon compte</a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="login.php" class="btn btn-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Connexion</a>
                                <a href="register.php" class="btn btn-outline-light btn-lg rounded-pill px-4 animate__animated animate__zoomIn animate__delay-3s">Créer un compte</a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="social-icons animate__animated animate__fadeIn animate__delay-4s">
                            <a href="https://www.facebook.com/romaelyss" class="text-white mx-2 fs-4"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/romaelysssarl?igsh=OW04ZTR1NGIwbHFm&utm_source=ig_contact_invite" class="text-white mx-2 fs-4"><i class="fab fa-instagram"></i></a>
                            <a href="" class="text-white mx-2 fs-4"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://x.com/Romaelyss?t=kXZsjiMn9pihMlvqZcpX_Q&s=09" class="text-white mx-2 fs-4"><i class="fab fa-x"></i></a>
                            <a href="https://www.youtube.com/@romaelyssarl/videos" class="text-white mx-2 fs-4"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contrôles -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-danger rounded-circle p-3" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-danger rounded-circle p-3" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>

<!-- Styles améliorés -->
<style>
    /* Navigation */
    .navbar {
        padding: 1rem 0;
        transition: all 0.3s;
    }
    
    .navbar.scrolled {
        padding: 0.5rem 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .nav-link {
        position: relative;
        font-weight: 500;
    }
    
    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        background-color: white;
        transition: all 0.3s;
        transform: translateX(-50%);
    }
    
    .nav-link:hover::after,
    .nav-link.active::after {
        width: 50%;
    }
    
    /* Carrousel */
    .carousel-caption {
        bottom: 0;
        left: 0;
        right: 0;
        padding-bottom: 8rem;
    }
    
    .carousel-indicators button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: none;
        margin: 0 8px;
        background-color: rgba(255, 255, 255, 0.5);
    }
    
    .carousel-indicators .active {
        background-color: white;
        transform: scale(1.3);
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-size: 60%;
    }
    
    /* Social icons */
    .social-icons a {
        transition: transform 0.3s;
        display: inline-block;
    }
    
    .social-icons a:hover {
        transform: translateY(-5px) scale(1.2);
        color: #ff4d4f !important;
    }
    
    /* Boutons */
    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.9);
        color: #dc3545 !important;
    }
</style>

<!-- Scripts améliorés -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation de la navbar au scroll
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    
    // Animation des éléments du carrousel
    const carousel = document.getElementById('heroCarousel');
    carousel.addEventListener('slide.bs.carousel', function (e) {
        const activeSlide = e.relatedTarget;
        const elements = activeSlide.querySelectorAll('.animate__animated');
        
        elements.forEach(el => {
            el.style.opacity = '0';
        });
        
        setTimeout(() => {
            elements.forEach(el => {
                el.style.opacity = '1';
            });
        }, 100);
    });
});
</script>

<!-- Ajouter dans l'en-tête -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <!-- SECTION POURQUOI NOUS -->
  <section class="bg-light py-5 text-center" id="vous">
    <div class="container">
      <h2 class="fw-bold text-danger mb-3 position-relative d-inline-block">
        <span class="line-left me-3"></span>
        Pourquoi nous ?
        <span class="line-right ms-3"></span>
      </h2>
      <p class="text-muted fs-5 fw-semibold mb-5 ">
        Chez Romaelyss Sarl, Nous Croyons Que Le Succès De Votre<br />
        Entreprise Repose Sur Des Talents Bien Choisis Et Bien Accompagnés.
      </p>

      <div class="row g-4">
        <!-- Bloc 1 -->
        <div class="col-md-4">
          <div class="card text-white text-center h-100 bg-danger" style="background-color: #ff0000;">
            <div class="card-body">
              <i class="fas fa-briefcase fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Professionnels</h5>
              <p class="card-text">Un Processus De Recrutement Rigoureux Et Transparent.</p>
            </div>
          </div>
        </div>

        <!-- Bloc 2 -->
        <div class="col-md-4">
          <div class="card text-white text-center h-100" style="background-color: #333;">
            <div class="card-body">
              <i class="fas fa-lightbulb fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Solutions</h5>
              <p class="card-text">Des Solutions Flexibles Et Adaptées À Vos Besoins Spécifiques.</p>
            </div>
          </div>
        </div>

        <!-- Bloc 3 -->
        <div class="col-md-4">
          <div class="card text-white text-center h-100 bg-danger" style="background-color: #ff0000;">
            <div class="card-body">
              <i class="fas fa-user-cog fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Experience</h5>
              <p class="card-text">Une Équipe D'experts En Ressources Humaines Dédiée À Chaque Client.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="position-relative text-white">
    <img src="asset/img/ai-generated-8881144_1280.jpg" class="w-100 img-fluid object-cover" alt="À propos" style="height: 100vh; max-height: 700px;">

    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" id="nous" style="background: rgba(0, 0, 0, 0.6);">
      <div class="container px-3 px-md-5">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8 text-center">
            <h2 class="text-danger fw-bold mb-3 display-6">Qui sommes nous ?</h2>
            <p class="fs-6 fs-md-5 fw-normal lh-base lh-md-lg">
              Romaelyss est une entreprise dynamique et innovante spécialisée dans le recrutement, le placement et la gestion du personnel. Depuis notre création en 2024, nous avons pour mission d’accompagner les entreprises dans la recherche de talents adaptés à leurs besoins et de permettre aux candidats de trouver des opportunités correspondant à leurs aspirations professionnelles.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5 bg-light text-center">
    <div class="container">
      <h2 class="fw-bold text-danger mb-5">
        <span class="border-line me-2"></span>
        Notre mission
        <span class="border-line ms-2"></span>
      </h2>

      <div class="row g-0 text-white overflow-hidden">
        <!-- Bloc Entreprises -->
        <div class="col-md-6 bg-dark position-relative mission-box">
          <div class="p-4 p-md-5">
            <i class="fas fa-landmark fa-3x mb-3"></i>
            <h4 class="fw-bold mb-3">Pour les entreprises</h4>
            <p class="fw-normal">
              Pour les entreprises : Fournir des solutions personnalisées et efficaces en matière de recrutement et de gestion des ressources humaines, en garantissant la qualité, la rapidité et la pertinence.
            </p>
          </div>
          <div class="mission-triangle-left"></div>
        </div>

        <!-- Bloc Candidats -->
        <div class="col-md-6 bg-danger position-relative mission-box">
          <div class="p-4 p-md-5">
            <i class="fas fa-user fa-3x mb-3"></i>
            <h4 class="fw-bold mb-3">Pour les candidats</h4>
            <p class="fw-normal">
              Offrir un accompagnement sur mesure dans leur recherche d’emploi, en valorisant leurs compétences et en les guidant vers des postes en adéquation avec leurs objectifs de carrière.
            </p>
          </div>
          <div class="mission-triangle-right"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-light py-5 text-center" id="service">
    <div class="container">
      <h2 class="fw-bold text-danger mb-3 position-relative d-inline-block">
        <span class="line-left me-3"></span>
        Nos services
        <span class="line-right ms-3"></span>
      </h2>
      <div class="services-subtitle">
        Forts de notre expertise et de notre engagement envers l’excellence, nous offrons des services adaptés à vos exigences, que ce soit pour des espaces résidentiels, commerciaux ou industriels.
      </div>

      <div class="row g-4">
        <!-- Bloc 1 -->
        <div class="col-md-6">
          <div class="card text-white text-center h-100 bg-danger">
            <div class="card-body">
              <i class="fas fa-user fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Recrutement</h5>
              <p class="card-text">Recrutement du personnel permanent, temporaire ou contractuel. Évaluation des compétences techniques et comportementales. Accompagnement dans les processus de sélection.</p>
              <div class="arrow-down"><a href="recrutement.php">&#x25BC;</a></div>
            </div>
          </div>
        </div>

        <!-- Bloc 2 -->
        <div class="col-md-6">
          <div class="card text-white text-center h-100" style="background-color: #333;">
            <div class="card-body">
              <i class="fas fa-home fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Service à domicile</h5>
              <p class="card-text">Nous mettons à votre disposition des professionnels qualifiés pour vous accompagner au quotidien.</p>
              <div class="arrow-down"><a href="service_domicile.php">&#x25BC;</a></div>
            </div>
          </div>
        </div>

        <!-- Bloc 3 -->
        <div class="col-md-6">
          <div class="card text-white text-center h-100" style="background-color: #333;">
            <div class="card-body">
              <i class="fas fa-map-marker-alt fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Placement</h5>
              <p class="card-text">Placement rapide et efficace des talents dans divers secteurs d’activité. Gestion des contrats pour des missions temporaires ou à long terme.</p>
              <div class="arrow-down"><a href="placement.php">&#x25BC;</a></div>
            </div>
          </div>
        </div>
        <!-- Bloc 4 -->
        <div class="col-md-6">
          <div class="card text-white text-center h-100 bg-danger">
            <div class="card-body">
              <i class="fas fa-paint-roller fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Service de peinture</h5>
              <p class="card-text">Romaelyss SARL vous propose des services professionnels de peinture intérieure et extérieure, destinés aux particuliers, entreprises et collectivités.</p>
              <div class="arrow-down"><a href="service_peinture.php">&#x25BC;</a></div>
            </div>
          </div>
        </div>

        <!-- Bloc 5 -->
        <div class="col-md-6">
          <div class="card text-white text-center h-100 bg-danger">
            <div class="card-body">
              <i class="fas fa-users-cog fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Gestion du personnel</h5>
              <p class="card-text">Externalisation de la gestion des ressources humaines (paie, administration, etc.). Mise en place des programmes de formation pour développer les compétences des employés.</p>
              <div class="arrow-down"><a href="gestion_personnel.php">&#x25BC;</a></div>
            </div>
          </div>
        </div>

        <!-- Bloc 6 -->
        <div class="col-md-6">
          <div class="card text-white text-center h-100" style="background-color: #333;">
            <div class="card-body">
              <i class="fas fa-money-bill-wave fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Gestion de la paie</h5>
              <p class="card-text">Notre service de payroll sur mesure vous permet de vous concentrer sur notre activité, pendant que nous nous chargeons de l’ensemble du processus de paie de vos collaborateurs.</p>
              <div class="arrow-down"><a href="gestion_paie.php">&#x25BC;</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-light py-5 text-center">
    <div class="container">
      <h2 class="fw-bold text-danger mb-3 position-relative d-inline-block">
        <span class="line-left me-3"></span>
        Nos atouts
        <span class="line-right ms-3"></span>
      </h2>
      <div class="row g-4">
        <!-- Bloc 1 -->
        <div class="col-md-3">
          <div class="card text-white text-center h-100 bg-danger">
            <div class="card-body">
              <i class="fas fa-gem fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Expertise Sectorielle</h5>
              <p class="card-text">Une Connaissance Approfondie Des Besoins Et Spécificités Des Différents Secteurs D’activité.</p>
            </div>
          </div>
        </div>

        <!-- Bloc 2 -->
        <div class="col-md-3">
          <div class="card text-white text-center h-100" style="background-color: #333;">
            <div class="card-body">
              <i class="fas fa-gem fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Approche Humaine </h5>
              <p class="card-text">Une Attention Particulière Portée Aux Relations Humaines Pour Garantir Des Partenariats Solides Et Durables.</p>
            </div>
          </div>
        </div>

        <!-- Bloc 3 -->
        <div class="col-md-3">
          <div class="card text-white text-center h-100 bg-danger">
            <div class="card-body">
              <i class="fas fa-gem fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Technologie Et Innovation</h5>
              <p class="card-text">Utilisation Des Outils Les Plus Avancés Pour Identifier, Évaluer Et Suivre Les Talents</p>
            </div>
          </div>
        </div>
        <!-- Bloc 4 -->
        <div class="col-md-3">
          <div class="card text-white text-center h-100 " style="background-color: #333;">
            <div class="card-body">
              <i class="fas fa-gem fa-2x mb-3"></i>
              <h5 class="card-title fw-bold">Réseau Étendu</h5>
              <p class="card-text">Une Base Des Données Riche Et Diversifiée, Ainsi Qu’un Vaste Réseau Professionnel.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Secteurs d’intervention -->
  <div class="container">
    <h2 class="section-title text-danger">Nos secteurs d’intervention</h2>
    <div class="row">
      <div class="col-md-4">
        <ul class="list-group">
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Industrie Et Ingénierie</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Santé Et Services</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Commerce Et Distribution</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Commerce Et Distribution</li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="list-group">
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Construction</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Finance Et Banque</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Douane Et Transit</li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="list-group">
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Agriculture</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Transport Et Logistique</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Technologies De L’information</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Ressources disponibles -->
  <div class="container">
    <h2 class="section-title text-danger text-center mb-4">Nous mettons à votre disposition</h2>

    <div class="d-flex gap-3 scroll-x">
      <!-- Colonne 1 -->
      <div class="list-wrapper">
        <ul class="list-group">
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Paysagistes Et Jardiniers</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Personnel De Ménage</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Techniciens De Surface</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Secrétaire De Direction</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Caissiers Compteurs</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Agents Commerciaux</li>
        </ul>
      </div>

      <!-- Colonne 2 -->
      <div class="list-wrapper">
        <ul class="list-group">
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Électricien</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Plombier</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Nounou</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Manutentionnaire</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Chauffeurs</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Informaticiens</li>
        </ul>
      </div>

      <!-- Colonne 3 -->
      <div class="list-wrapper">
        <ul class="list-group">
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Comptables Et Financiers</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Gestionnaire Du Personnel</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Personnel Médical</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Cadres Nationaux Et Expatriés</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Personnel Paramédical</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Agents Nationaux Et Expatriés</li>
        </ul>
      </div>
    </div>
  </div>
  <section class="bg-light py-5 text-center">

    <div class="container my-5">
    <h2 class="fw-bold text-danger mb-3 position-relative d-inline-block">
        <span class="line-left me-3"></span>
        Nos Offres
        <span class="line-right ms-3"></span>
    </h2>

    <div class="carousel-container position-relative p-4 rounded-4 bg-white shadow-lg">
    <!-- Titre et navigation -->
    <div class="d-flex justify-content-between align-items-center mb-4 px-2">
        <h3 class="fw-bold mb-0 text-danger">Nos dernières offres</h3>
        <div class="d-flex gap-2">
            <button class="carousel-nav-btn prev btn btn-outline-danger rounded-circle p-2" aria-label="Précédent">
                <i class="bi bi-chevron-left fs-5"></i>
            </button>
            <button class="carousel-nav-btn next btn btn-outline-danger rounded-circle p-2" aria-label="Suivant">
                <i class="bi bi-chevron-right fs-5"></i>
            </button>
        </div>
    </div>

    <!-- Carrousel -->
    <div class="position-relative overflow-hidden">
        <div class="carousel-track d-flex gap-3 pb-4" id="carousel-track">
            <?php foreach ($jobs as $job): ?>
            <div class="carousel-item-custom card border-0 flex-shrink-0 h-100" style="width: 320px;">
                <!-- Image -->
                <div class="card-img-container ratio ratio-16x9 overflow-hidden rounded-top">
                    <?php if ($job['image_path']): ?>
                        <img src="<?= htmlspecialchars($job['image_path']) ?>" 
                             class="card-img-top object-fit-cover transition" 
                             alt="<?= htmlspecialchars($job['title']) ?>">
                    <?php else: ?>
                        <div class="d-flex align-items-center justify-content-center bg-light text-muted h-100">
                            <i class="bi bi-briefcase fs-1"></i>
                        </div>
                    <?php endif; ?>
                    <div class="card-img-overlay d-flex align-items-end p-0">
                        <span class="badge bg-danger bg-opacity-90 text-white mb-2 ms-auto me-2">
                            <?= htmlspecialchars($job['category']) ?>
                        </span>
                    </div>
                </div>
                
                <!-- Contenu -->
                <div class="card-body d-flex flex-column">
                    <div class="mb-3">
                        <h5 class="card-title fw-bold mb-2 text-truncate"><?= htmlspecialchars($job['title']) ?></h5>
                        <p class="card-text text-muted small line-clamp-2 mb-3">
                            <?= nl2br(htmlspecialchars(shortenText($job['description'], 150))) ?>
                        </p>
                    </div>
                    
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <div class="d-flex flex-column">
                                <small class="text-muted">Date limite</small>
                                <span class="fw-semibold text-danger">
                                    <?= date('d/m/Y', strtotime($job['expiry_date'])) ?>
                                </span>
                            </div>
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <a href="apply.php?job_id=<?= $job['id'] ?>" 
                                   class="btn btn-danger btn-sm rounded-pill px-3">
                                   <i class="bi bi-send-fill me-1"></i>Postuler
                                </a>
                            <?php else: ?>
                                <a href="login.php?redirect=apply.php?job_id=<?= $job['id'] ?>" 
                                   class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                   <i class="bi bi-lock me-1"></i>Connectez-vous
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Indicateurs -->
    <div class="carousel-indicators d-flex justify-content-center mt-4 gap-2">
        <?php for ($i = 0; $i < min(5, count($jobs)); $i++): ?>
            <button class="indicator-btn rounded-circle p-1 border-0 bg-secondary bg-opacity-25 transition" 
                    data-index="<?= $i ?>" 
                    aria-label="Aller à l'offre <?= $i + 1 ?>"></button>
        <?php endfor; ?>
    </div>
</div>

<style>
    .carousel-container {
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        border: 1px solid rgba(220, 53, 69, 0.2);
    }
    
    .carousel-item-custom {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px !important;
    }
    
    .carousel-item-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .carousel-nav-btn {
        width: 40px;
        height: 40px;
        transition: all 0.3s ease;
    }
    
    .carousel-nav-btn:hover {
        background-color: #dc3545 !important;
        color: white !important;
    }
    
    .card-img-container {
        background-color: #f8f9fa;
    }
    
    .transition {
        transition: all 0.3s ease;
    }
    
    .carousel-item-custom:hover .card-img-top {
        transform: scale(1.05);
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    .indicator-btn {
        width: 10px;
        height: 10px;
    }
    
    /* .indicator-btn.active, .indicator-btn:hover {
        background-color: #dc3545 !important;
        transform: scale(1.2);
    } */
</style>


    <div class="container py-5">
      <div class="row g-5 align-items-center">

        <!-- Texte à droite -->
        <div class="col-lg-5 order-lg-1">
          <h2 class="section-title">Pourquoi nous choisir ?</h2>
          <p class="text-muted mb-3">Nous intervenons dans la ville province de Kinshasa et offrons des devis gratuits sur demande.</p>
          <ul class="checklist list-unstyled">
            <li>Expertise technique : Une équipe de professionnels formés et certifiés.</li>
            <li>Service rapide : Interventions ponctuelles et respect des délais.</li>
            <li>Matériel de qualité : Collaboration avec les meilleures marques du marché.</li>
            <li>Écologie : Des solutions économes en énergie et respectueuses de l’environnement.</li>
          </ul>
        </div>

        <!-- Cartes à gauche -->
        <div class="col-lg-7 order-lg-2">
          <div class="row g-4">
            <div class="col-md-6">
              <div class="red-card text-center fr">
                <div class="star-rating">★★★★★</div>
                <h5>Professionnalisme</h5>
                <p>Une équipe qualifiée et formée aux dernières techniques de nettoyage.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="red-card text-center fn">
                <div class="star-rating">★★★★★</div>
                <h5>Qualité</h5>
                <p>Des produits écologiques et des équipements modernes pour un résultat impeccable.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="red-card text-center fn">
                <div class="star-rating">★★★★★</div>
                <h5>Flexibilité</h5>
                <p>Des solutions personnalisées selon vos horaires et vos besoins.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="red-card text-center fr">
                <div class="star-rating">★★★★★</div>
                <h5>Fiabilité</h5>
                <p>Respect des délais et engagement envers votre satisfaction.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="partners-section">
        <h2 class="fw-bold text-danger mb-3 position-relative d-inline-block">
        <span class="line-left me-3"></span>
        Nos Partenaires Officiels
        <span class="line-right ms-3"></span>
      </h2>
        <!-- <h2 class="partners-title">Nos Partenaires Officiels</h2> -->
        <p class="partners-subtitle">Ils nous font confiance et accompagnent notre croissance</p>

        <div class="partners-carousel-container">
          <button class="partners-carousel-button prev" aria-label="Précédent">
            <i class="bi bi-chevron-left"></i>
          </button>

          <div class="partners-carousel-track" id="partners-carousel-track">
            <div class="partners-carousel-inner">
              <!-- Partenaire 1 -->
              <div class="partner-item">
                <a href="https://www.microsoft.com" target="_blank" rel="noopener">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg" alt="Microsoft">
                  <span class="partner-tooltip">Microsoft - Partenaire technologique</span>
                </a>
              </div>

              <!-- Partenaire 2 -->
              <div class="partner-item">
                <a href="https://www.ibm.com" target="_blank" rel="noopener">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg" alt="IBM">
                  <span class="partner-tooltip">IBM - Solutions cloud</span>
                </a>
              </div>

              <!-- Partenaire 3 -->
              <div class="partner-item">
                <a href="https://www.adobe.com" target="_blank" rel="noopener">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/7/7b/Adobe_Systems_logo.svg" alt="Adobe">
                  <span class="partner-tooltip">Adobe - Créativité digitale</span>
                </a>
              </div>

              <!-- Partenaire 4 -->
              <div class="partner-item">
                <a href="https://www.salesforce.com" target="_blank" rel="noopener">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/f/f9/Salesforce.com_logo.svg" alt="Salesforce">
                  <span class="partner-tooltip">Salesforce - CRM innovant</span>
                </a>
              </div>

              <!-- Partenaire 5 -->
              <div class="partner-item">
                <a href="https://www.cisco.com" target="_blank" rel="noopener">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/6/64/Cisco_logo.svg" alt="Cisco">
                  <span class="partner-tooltip">Cisco - Infrastructure réseau</span>
                </a>
              </div>

              <!-- Partenaire 6 -->
              <div class="partner-item">
                <a href="https://www.intel.com" target="_blank" rel="noopener">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/7/7d/Intel_logo_%282006-2020%29.svg" alt="Intel">
                  <span class="partner-tooltip">Intel - Technologie processeur</span>
                </a>
              </div>
            </div>
          </div>

          <button class="partners-carousel-button next" aria-label="Suivant">
            <i class="bi bi-chevron-right"></i>
          </button>
        </div>
      </div>
  </section>
  <footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
      <div class="row gy-4">
        <!-- Logo et description -->
        <div class="col-md-4">
          <img src="asset/img/LOGO_1.png" alt="Logo Romaelyss gradi" class="mb-3" style="max-width: 160px;">
          <p class="mb-3">
            Romaelyss est une entreprise dynamique et innovante, spécialisée dans le recrutement, le placement et la gestion du personnel.
          </p>
          <div class="d-flex gap-2">
            <a href="https://www.facebook.com/romaelyss" class="btn btn-outline-light btn-sm rounded-circle btn-social" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/romaelysssarl?igsh=OW04ZTR1NGIwbHFm&utm_source=ig_contact_invite" class="btn btn-outline-light btn-sm rounded-circle btn-social" aria-label="WhatsApp"><i class="bi bi-instagram"></i></a>
            <a href="https://wa.me/243812388151" class="btn btn-outline-light btn-sm rounded-circle btn-social" aria-label="WhatsApp" target="_blank"><i class="bi bi-whatsapp"></i></a>
            <a href="https://x.com/Romaelyss?t=kXZsjiMn9pihMlvqZcpX_Q&s=09" class="btn btn-outline-light btn-sm rounded-circle btn-social" aria-label="x"><i class="bi bi-x"></i></a>
            <a href="https://www.youtube.com/@romaelyssarl/videos" class="btn btn-outline-light btn-sm rounded-circle btn-social" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
          </div>
          <!-- <div class="social-icons animate__animated animate__fadeIn animate__delay-4s">
                            <a href="https://www.facebook.com/romaelyss" class="text-white mx-2 fs-4"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/romaelysssarl?igsh=OW04ZTR1NGIwbHFm&utm_source=ig_contact_invite" class="text-white mx-2 fs-4"><i class="fab fa-instagram"></i></a>
                            <a href="" class="text-white mx-2 fs-4"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://x.com/Romaelyss?t=kXZsjiMn9pihMlvqZcpX_Q&s=09" class="text-white mx-2 fs-4"><i class="fab fa-x"></i></a>
                            <a href="https://www.youtube.com/@romaelyssarl/videos" class="text-white mx-2 fs-4"><i class="fab fa-youtube"></i></a>
                        </div> -->
        </div>

        <!-- Navigation -->
        <div class="col-md-2">
          <h5 class="fw-semibold mb-3">Navigation</h5>
          <ul class="list-unstyled">
            <li><a href="index.php" class="text-white-50 text-decoration-none">Accueil</a></li>
            <li><a href="#nous" class="text-white-50 text-decoration-none">Qui sommes-nous ?</a></li>
            <li><a href="#vous" class="text-white-50 text-decoration-none">Pourquoi nous ?</a></li>
            <li><a href="#service" class="text-white-50 text-decoration-none">Nos Services</a></li>
          </ul>
        </div>

        <!-- Liens rapides -->
        <div class="col-md-3">
          <h5 class="fw-semibold mb-3">Liens rapides</h5>
          <ul class="list-unstyled">
            <li><a href="nos_offres.php" class="text-white-50 text-decoration-none">Toutes les offres</a></li>
            <li><a href="service_domicile.php" class="text-white-50 text-decoration-none">Services à domicile</a></li>
            <li><a href="nettoyage.php" class="text-white-50 text-decoration-none">Service nettoyage</a></li>
            
            <li><a href="apropos.php" class="text-white-50 text-decoration-none">À propos</a></li>
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
          <a href="https://wa.me/243812388151" class="btn btn-danger mt-2">
            <i class="fab fa-whatsapp me-2"></i>Contactez-nous
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const track = document.getElementById('carousel-track');
      const inner = track.querySelector('.carousel-inner');
      const items = document.querySelectorAll('.carousel-item-custom');
      const prevBtn = document.querySelector('.prev');
      const nextBtn = document.querySelector('.next');
      const indicatorsContainer = document.querySelector('.carousel-indicators');

      // Clone les éléments pour l'effet infini
      items.forEach(item => {
        inner.appendChild(item.cloneNode(true));
      });

      // Crée les indicateurs
      items.forEach((_, index) => {
        const indicator = document.createElement('span');
        indicator.dataset.index = index;
        indicator.addEventListener('click', () => goToItem(index));
        indicatorsContainer.appendChild(indicator);
      });

      const indicators = document.querySelectorAll('.carousel-indicators span');

      let itemWidth = items[0].offsetWidth + 15; // 15px de gap
      let currentIndex = 0;
      let autoScrollInterval;
      let isHovering = false;

      // Défilement automatique
      function startAutoScroll() {
        autoScrollInterval = setInterval(() => {
          if (!isHovering) {
            currentIndex++;
            scrollToItem(currentIndex);
          }
        }, 3000);
      }

      function scrollToItem(index) {
        currentIndex = index;
        track.scrollTo({
          left: (index % items.length) * itemWidth,
          behavior: 'smooth'
        });

        // Met à jour les indicateurs
        updateIndicators();
      }

      function goToItem(index) {
        currentIndex = index;
        scrollToItem(index);
      }

      function updateIndicators() {
        indicators.forEach((indicator, i) => {
          indicator.classList.toggle('active', i === currentIndex % items.length);
        });
      }

      function handleScroll() {
        const scrollPos = track.scrollLeft;
        currentIndex = Math.round(scrollPos / itemWidth) % items.length;
        updateIndicators();
      }

      // Événements
      prevBtn.addEventListener('click', () => {
        currentIndex--;
        scrollToItem(currentIndex);
        resetAutoScroll();
      });

      nextBtn.addEventListener('click', () => {
        currentIndex++;
        scrollToItem(currentIndex);
        resetAutoScroll();
      });

      track.addEventListener('mouseenter', () => {
        isHovering = true;
      });

      track.addEventListener('mouseleave', () => {
        isHovering = false;
      });

      track.addEventListener('scroll', handleScroll);

      function resetAutoScroll() {
        clearInterval(autoScrollInterval);
        startAutoScroll();
      }

      // Initialisation
      updateIndicators();
      startAutoScroll();
    });


    // deuxiemme caroussel

    document.addEventListener('DOMContentLoaded', function() {
      const track = document.getElementById('partners-carousel-track');
      const inner = track.querySelector('.partners-carousel-inner');
      const items = document.querySelectorAll('.partner-item');
      const prevBtn = document.querySelector('.partners-carousel-button.prev');
      const nextBtn = document.querySelector('.partners-carousel-button.next');

      // Clone les premiers éléments à la fin pour l'effet infini
      const cloneCount = 3;
      for (let i = 0; i < cloneCount; i++) {
        const clone = items[i].cloneNode(true);
        inner.appendChild(clone);
      }

      let currentPosition = 0;
      const itemWidth = items[0].offsetWidth + 30; // 30px de gap
      let autoScrollInterval;

      function updateCarousel() {
        inner.style.transform = `translateX(-${currentPosition}px)`;

        // Réinitialisation invisible pour l'effet infini
        if (currentPosition >= (items.length * itemWidth)) {
          currentPosition = 0;
          inner.style.transition = 'none';
          inner.style.transform = `translateX(-${currentPosition}px)`;
          setTimeout(() => {
            inner.style.transition = 'transform 0.5s ease';
          }, 10);
        }
      }

      function scrollNext() {
        currentPosition += itemWidth;
        updateCarousel();
      }

      function scrollPrev() {
        currentPosition = Math.max(0, currentPosition - itemWidth);
        updateCarousel();
      }

      function startAutoScroll() {
        autoScrollInterval = setInterval(scrollNext, 3000);
      }

      function stopAutoScroll() {
        clearInterval(autoScrollInterval);
      }

      // Événements
      nextBtn.addEventListener('click', () => {
        scrollNext();
        stopAutoScroll();
        startAutoScroll();
      });

      prevBtn.addEventListener('click', () => {
        scrollPrev();
        stopAutoScroll();
        startAutoScroll();
      });

      track.addEventListener('mouseenter', stopAutoScroll);
      track.addEventListener('mouseleave', startAutoScroll);

      // Initialisation
      startAutoScroll();
    });
  </script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('carousel-track');
    const items = document.querySelectorAll('.carousel-item-custom');
    const prevBtn = document.querySelector('.carousel-nav-btn.prev');
    const nextBtn = document.querySelector('.carousel-nav-btn.next');
    const indicators = document.querySelectorAll('.indicator-btn');
    const itemWidth = items[0]?.offsetWidth + 12; // 12px pour le gap
    
    let currentPosition = 0;
    let maxPosition = (items.length * itemWidth) - track.offsetWidth;
    
    // Navigation
    function updateCarousel() {
        track.style.transform = `translateX(-${currentPosition}px)`;
        updateIndicators();
    }
    
    function updateIndicators() {
        const activeIndex = Math.round(currentPosition / itemWidth);
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === activeIndex);
        });
    }
    
    prevBtn.addEventListener('click', () => {
        currentPosition = Math.max(0, currentPosition - itemWidth * 3);
        updateCarousel();
    });
    
    nextBtn.addEventListener('click', () => {
        currentPosition = Math.min(maxPosition, currentPosition + itemWidth * 3);
        updateCarousel();
    });
    
    // Indicateurs cliquables
    indicators.forEach(indicator => {
        indicator.addEventListener('click', () => {
            const index = parseInt(indicator.dataset.index);
            currentPosition = index * itemWidth * 3;
            updateCarousel();
        });
    });
    
    // Initialisation
    updateIndicators();
});
</script>

</body>

</html>