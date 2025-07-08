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
  <title>Gestion de la paie | Romaelyss</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="asset/css/style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .hero-paie {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.6)),
        url('asset/img/man-5982512_1280.jpg') center/cover no-repeat;
      color: white;
      padding: 100px 0;
      text-align: center;
    }

    .hero-paie h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .section-content {
      padding: 60px 0;
    }

    .feature-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      padding: 30px;
      text-align: center;
      transition: 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    .feature-card i {
      font-size: 2.5rem;
      color: #dc3545;
      margin-bottom: 20px;
    }

    @media (max-width: 767px) {
      .hero-paie h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
 <?php include 'includes/header.php'; ?>
 
  <!-- Bannière principale -->
  <section class="hero-paie">
    <div class="container">
      <h1>Gestion de la paie</h1>
      <p class="lead mt-3">Notre service de payroll sur mesure vous permet de vous concentrer sur votre activité, pendant que nous nous chargeons de l’ensemble du processus de paie de vos collaborateurs.</p>
    </div>
  </section>

  <!-- Contenu -->
  <section class="section-content">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
          <h3 class="text-danger mb-3">Un service fiable, discret et conforme</h3>
          <p class="text-muted">Nous assurons la gestion complète de vos bulletins de salaire, des déclarations sociales, et du respect des obligations légales liées à la paie.</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature-card">
            <i class="bi bi-cash-stack"></i>
            <h5>Calcul de salaires</h5>
            <p>Nous assurons le calcul juste et à temps des salaires, primes, retenues et avantages.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <i class="bi bi-file-earmark-check"></i>
            <h5>Déclarations sociales</h5>
            <p>Préparation et soumission des déclarations CNSS, INPP, ONEM et autres obligations légales.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <i class="bi bi-shield-check"></i>
            <h5>Confidentialité et conformité</h5>
            <p>Vos données sont traitées avec le plus haut niveau de sécurité, dans le respect des normes fiscales et sociales.</p>
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
