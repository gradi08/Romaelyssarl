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
  <title>Service de peinture | Romaelyss</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
 <link rel="stylesheet" href="asset/css/style.css">
 <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9f9f9;
    }

    .hero-painting {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
        url('asset/img/graffiti-1380108_1280.jpg') center/cover no-repeat;
      color: white;
      padding: 100px 0;
      text-align: center;
    }

    .hero-painting h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .section-painting {
      padding: 60px 0;
    }

    .painting-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
      padding: 30px 20px;
      text-align: center;
      transition: transform 0.3s;
    }

    .painting-card:hover {
      transform: translateY(-5px);
    }

    .painting-card i {
      font-size: 2.5rem;
      color: #dc3545;
      margin-bottom: 15px;
    }

    @media (max-width: 767px) {
      .hero-painting h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
     <?php include 'includes/header.php'; ?>
  <!-- Section Héros -->
  <section class="hero-painting">
    <div class="container">
      <h1>Service de peinture</h1>
      <p class="lead mt-3">Romaelyss SARL vous propose des services professionnels de peinture intérieure et extérieure, destinés aux particuliers, entreprises et collectivités.</p>
    </div>
  </section>

  <!-- Section détails -->
  <section class="section-painting">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
          <h3 class="text-danger mb-3">Des finitions à la hauteur de vos attentes</h3>
          <p class="text-muted">Notre équipe de peintres expérimentés intervient avec soin, précision et efficacité sur tous vos projets de rénovation ou de construction neuve.</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="painting-card">
            <i class="bi bi-house-door-fill"></i>
            <h5>Peinture intérieure</h5>
            <p>Valorisez vos espaces de vie et de travail avec des couleurs modernes et des finitions impeccables.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="painting-card">
            <i class="bi bi-building"></i>
            <h5>Peinture extérieure</h5>
            <p>Redonnez vie à vos façades grâce à des peintures durables, résistantes aux intempéries.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="painting-card">
            <i class="bi bi-tools"></i>
            <h5>Intervention personnalisée</h5>
            <p>Nous adaptons nos prestations aux exigences spécifiques de chaque client : particuliers, entreprises, collectivités.</p>
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
