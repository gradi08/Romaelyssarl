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
 <?php include 'includes/header.php'; ?>
  <!-- Section Héros -->
  <section class="hero">
    <div class="container">
      <h1>Service à domicile</h1>
      <p class="lead mt-3">Nous mettons à votre disposition des professionnels qualifiés pour vous accompagner au quotidien.</p>
      <p class="lead mt-3"> Que ce soit pour l'entretien de votre maison, la garde de vos enfants, ou l'entretien de vos espaces verts, nous avons des solutions adaptées à vos besoins.</p>
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
