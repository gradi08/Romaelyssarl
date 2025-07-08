<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
// redirectIfNotAdmin();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Placement | Romaelyss</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="asset/css/style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .hero-placement {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
        url('asset/img/teamwork-3276694_1280.jpg') center/cover no-repeat;
      color: white;
      padding: 100px 0;
      text-align: center;
    }

    .hero-placement h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .section-placement {
      padding: 60px 0;
    }

    .placement-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
      padding: 30px 20px;
      text-align: center;
      transition: transform 0.2s;
    }

    .placement-card:hover {
      transform: translateY(-5px);
    }

    .placement-card i {
      font-size: 2.5rem;
      color: #dc3545;
      margin-bottom: 15px;
    }

    @media (max-width: 767px) {
      .hero-placement h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
 <?php include 'includes/header.php'; ?>
 
  <!-- Section Héros -->
  <section class="hero-placement">
    <div class="container">
      <h1>Placement</h1>
      <p class="lead mt-3">Placement rapide et efficace des talents dans divers secteurs d’activité. Gestion des contrats pour des missions temporaires ou à long terme.</p>
    </div>
  </section>

  <!-- Section Détails -->
  <section class="section-placement">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
          <h3 class="text-danger mb-3">Nos Solutions de Placement</h3>
          <p class="text-muted">Nous répondons avec réactivité à vos besoins en personnel, en assurant un suivi rigoureux et un accompagnement sur mesure.</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="placement-card">
            <i class="bi bi-people-fill"></i>
            <h5>Placement Temporaire</h5>
            <p>Des profils disponibles rapidement pour vos missions ponctuelles ou remplacements urgents.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="placement-card">
            <i class="bi bi-journal-check"></i>
            <h5>Contrats Long Terme</h5>
            <p>Nous vous accompagnons dans le recrutement et la gestion de contrats stables et durables.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="placement-card">
            <i class="bi bi-briefcase-fill"></i>
            <h5>Multi-secteurs</h5>
            <p>Industrie, commerce, administration, santé… Nous couvrons tous les secteurs d’activité.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'includes/footer.php'; ?>
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
