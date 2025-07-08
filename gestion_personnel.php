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
  <title>Gestion du personnel | Romaelyss</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="asset/css/style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f5f5;
    }

    .hero-personnel {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
        url('asset/img/meeting-room-857994_1280.jpg') center/cover no-repeat;
      color: white;
      padding: 100px 0;
      text-align: center;
    }

    .hero-personnel h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .section-content {
      padding: 60px 0;
    }

    .service-card {
      background: #fff;
      padding: 30px 25px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .service-card:hover {
      transform: translateY(-5px);
    }

    .service-card i {
      font-size: 2.8rem;
      color: #dc3545;
      margin-bottom: 20px;
    }

    @media (max-width: 767px) {
      .hero-personnel h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
     <?php include 'includes/header.php'; ?>
  <!-- Section Héros -->
  <section class="hero-personnel">
    <div class="container">
      <h1>Gestion du personnel</h1>
      <p class="lead mt-3">Externalisation de la gestion des ressources humaines (paie, administration, etc.). Mise en place des programmes de formation pour développer les compétences des employés.</p>
    </div>
  </section>

  <!-- Section détails -->
  <section class="section-content">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
          <h3 class="text-danger mb-3">Optimisez la performance de vos équipes</h3>
          <p class="text-muted">Confiez-nous la gestion administrative et le développement des talents pour vous concentrer sur votre cœur de métier.</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="service-card">
            <i class="bi bi-cash-coin"></i>
            <h5>Pilotage de la paie</h5>
            <p>Gestion complète des fiches de paie, déclarations sociales et obligations administratives RH.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="service-card">
            <i class="bi bi-people-fill"></i>
            <h5>Suivi RH externalisé</h5>
            <p>Gestion des contrats, absences, congés, évaluations du personnel et suivi des performances.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="service-card">
            <i class="bi bi-mortarboard-fill"></i>
            <h5>Formations professionnelles</h5>
            <p>Programmes sur mesure pour renforcer les compétences techniques et humaines de vos collaborateurs.</p>
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
