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
  <title>Recrutement | Romaelyss</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="asset/css/style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }
    .hero-section {
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
        url('asset/img/laptop-3196481_1280.jpg') center/cover no-repeat;
      color: white;
      padding: 100px 0;
      text-align: center;

      /* background: linear-gradient(to right, #dc3545, #a71d2a), 
        url('asset/img/laptop-3196481_1280.jpg') center/cover no-repeat;
      color: white;
      padding: 80px 0; */
    }
    .hero-section h1 {
      font-size: 2.5rem;
      font-weight: 700;
    }
    .content-section {
      padding: 60px 15px;
    }
    .form-section {
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      margin-top: 40px;
    }
  </style>
</head>
<body>
 <?php include 'includes/header.php'; ?>
 
  <!-- Section Héros -->
  <section class="hero-section text-center">
    <div class="container">
      <h1>Recrutement</h1>
      <p class="lead mt-3">Trouvons ensemble les talents qu’il vous faut.</p>
    </div>
  </section>

  <!-- Contenu -->
  <section class="content-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h3 class="mb-4 text-danger">Notre mission en recrutement</h3>
          <p>
            Recrutement du personnel permanent, temporaire ou contractuel.
            Nous assurons une évaluation rigoureuse des compétences techniques et comportementales,
            afin de vous proposer les meilleurs profils adaptés à vos besoins.
          </p>
          <p>
            Notre équipe vous accompagne également dans toutes les étapes du processus de sélection,
            en vous garantissant un service fiable, rapide et conforme à vos attentes.
          </p>

          <!-- Formulaire de demande -->
          <div class="form-section">
            <h5 class="mb-4 text-dark">Formulaire de demande de personnel</h5>
            <form action="#" method="post">
              <div class="mb-3">
                <label for="nomEntreprise" class="form-label">Nom de l'entreprise</label>
                <input type="text" class="form-control" id="nomEntreprise" name="entreprise" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" required>
              </div>
              <div class="mb-3">
                <label for="poste" class="form-label">Poste recherché</label>
                <input type="text" class="form-control" id="poste" name="poste" required>
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Description des besoins</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
              </div>
              <button type="submit" class="btn btn-danger">Soumettre la demande</button>
            </form>
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
