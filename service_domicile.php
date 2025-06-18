<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Service à domicile | Romaelyss</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="asset/css/style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .hero {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
        url('asset/img/home-2486092_1280.jpg') center/cover no-repeat;
      color: white;
      padding: 100px 0;
      text-align: center;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .section-services {
      padding: 60px 0;
    }

    .service-card {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      padding: 30px 20px;
      text-align: center;
      transition: transform 0.2s;
    }

    .service-card:hover {
      transform: translateY(-5px);
    }

    .service-card i {
      font-size: 2.5rem;
      color: #dc3545;
      margin-bottom: 15px;
    }

    @media (max-width: 767px) {
      .hero h1 {
        font-size: 2rem;
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
            <a class="nav-link" href="#">Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Menages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Service nettoyage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">A propos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Section Héros -->
  <section class="hero">
    <div class="container">
      <h1>Service à domicile</h1>
      <p class="lead mt-3">Nous mettons à votre disposition des professionnels qualifiés pour vous accompagner au quotidien.</p>
    </div>
  </section>

  <!-- Section Services -->
  <section class="section-services">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
          <h3 class="text-danger mb-3">Nos Services à domicile</h3>
          <p class="text-muted">Notre équipe de professionnels formés et rigoureusement sélectionnés est prête à intervenir chez vous en toute confiance.</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="service-card">
            <i class="bi bi-house-heart-fill"></i>
            <h5>Personnel de Ménage</h5>
            <p>Entretien complet de votre maison, avec rigueur et discrétion.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="service-card">
            <i class="bi bi-person-check-fill"></i>
            <h5>Garde d'enfants</h5>
            <p>Des nounous expérimentées pour prendre soin de vos enfants.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="service-card">
            <i class="bi bi-tools"></i>
            <h5>Petits Travaux</h5>
            <p>Électriciens, plombiers ou bricoleurs pour vos réparations urgentes.</p>
          </div>
        </div>
      </div>

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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <script>
    const track = document.getElementById('carousel-track');
    const scrollAmount = 320;

    function scrollCarousel(dir) {
      track.scrollBy({
        left: dir * scrollAmount,
        behavior: 'smooth'
      });
    }
  </script>
</body>
</html>
