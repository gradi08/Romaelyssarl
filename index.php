<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="asset/css/style.css">
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
            <a class="nav-link" href="#service">Nos services</a>
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
  <div class="container-fluid hero p-0">
    <img src="asset/img/software-developer-6521720_1280.jpg" class="img-fluid" alt="...">
    <div class="hero-content">
      <h2>Bienvenue sur notre plateforme</h2>
      <h3>Nous croyons que les succès
        de notre entreprise repose
        sur :
      </h3>
      <h1 style="color:red;">DES TALENTS BIEN CHOISIS ET ACCOMPANÉS</h1>
      <div>
        <a href="login.php" class="btn custom-btn me-2">Connexion</a>
        <a href="register.php" class="btn custom-btn">Créer un compte</a>
      </div>
      <div class="social-icons text-center py-4">
        <a href="#" class="bt text-white fs-3 me-3"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="bt text-white fs-3 me-3"><i class="fab fa-instagram"></i></a>
        <a href="#" class="bt text-white fs-3 me-3"><i class="fab fa-whatsapp"></i></a>
        <a href="#" class="bt text-white fs-3"><i class="fab fa-twitter"></i></a>
      </div>
    </div>
  </div>
  <!-- SECTION POURQUOI NOUS -->
  <section class="bg-light py-5 text-center">
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

    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, 0.6);">
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

      <div class="carousel-container">
        <!-- Boutons de navigation -->
        <button class="carousel-button prev" aria-label="Précédent">
          <i class="bi bi-chevron-left"></i>
        </button>
        <button class="carousel-button next" aria-label="Suivant">
          <i class="bi bi-chevron-right"></i>
        </button>

        <!-- Carrousel -->
        <div class="carousel-track" id="carousel-track">
          <div class="carousel-inner">
            <!-- Offre 1 -->
            <div class="carousel-item-custom">
              <img src="asset/img/software-developer-6521720_1280.jpg" alt="Informaticien">
              <div class="card-body">
                <h5>Informaticien</h5>
                <p>📅 Date limite : 10/07/2025</p>
                <a href="#" class="btn btn-danger">Postuler</a>
              </div>
            </div>

            <!-- Offre 2 -->
            <div class="carousel-item-custom">
              <img src="asset/img/ai-generated-8881144_1280.jpg" alt="Secrétaire">
              <div class="card-body">
                <h5>Secrétaire</h5>
                <p>📅 Date limite : 10/07/2025</p>
                <a href="#" class="btn btn-danger">Postuler</a>
              </div>
            </div>

            <!-- Offre 3 -->
            <div class="carousel-item-custom">
              <img src="asset/img/girl-1531575_1280.jpg" alt="Nettoyeur">
              <div class="card-body">
                <h5>Nettoyeur</h5>
                <p>📅 Date limite : 03/09/2025</p>
                <a href="#" class="btn btn-danger">Postuler</a>
              </div>
            </div>

            <!-- Offre 4 -->
            <div class="carousel-item-custom">
              <img src="asset/img/police-1355512_1280.jpg" alt="Sécurité">
              <div class="card-body">
                <h5>Sécurité</h5>
                <p>📅 Date limite : 10/07/2025</p>
                <a href="#" class="btn btn-danger">Postuler</a>
              </div>
            </div>

            <!-- Offre 5 -->
            <div class="carousel-item-custom">
              <img src="asset/img/software-developer-6521720_1280.jpg" alt="Électricien">
              <div class="card-body">
                <h5>Électricien</h5>
                <p>📅 Date limite : 10/07/2025</p>
                <a href="#" class="btn btn-danger">Postuler</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Indicateurs de position (optionnel) -->
        <div class="carousel-indicators"></div>
      </div>

    </div>
    </div>
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
</body>

</html>