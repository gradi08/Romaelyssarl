<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
// redirectIfNotAdmin();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Romaelys SARL - À propos</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        
        /* Hero Section */
        .about-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 20px;
            text-align: center;
        }
        
        .about-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .about-hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
        }
        
        /* About Section */
        .about-section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 50px;
            position: relative;
        }
        
        .section-title:after {
            content: "";
            display: block;
            width: 100px;
            height: 4px;
            background: var(--secondary-color);
            margin: 20px auto 0;
        }
        
        .about-content {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            align-items: center;
            margin-bottom: 60px;
        }
        
        .about-text {
            flex: 1;
            min-width: 300px;
        }
        
        .about-image {
            flex: 1;
            min-width: 300px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        /* Values Section */
        .values-section {
            background-color: var(--light-color);
            padding: 80px 20px;
        }
        
        .values-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .value-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s;
        }
        
        .value-card:hover {
            transform: translateY(-10px);
        }
        
        .value-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }
        
        /* Team Section */
        .team-section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .team-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
        }
        
        .team-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .team-info {
            padding: 20px;
            text-align: center;
        }
        
        /* CTA Section */
        .cta-section {
            background: var(--primary-color);
            color: white;
            text-align: center;
            padding: 80px 20px;
        }
        
        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        
        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        
        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .cta-button-primary {
            background: var(--secondary-color);
            color: white;
        }
        
        .cta-button-primary:hover {
            background: #c0392b;
        }
        
        .cta-button-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }
        
        .cta-button-secondary:hover {
            background: white;
            color: var(--primary-color);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .about-hero h1 {
                font-size: 2.2rem;
            }
            
            .about-hero p {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .about-content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <!-- Hero Section -->
    <section class="about-hero">
        <h1>À propos de Romaelys SARL</h1>
        <p>Découvrez notre entreprise, nos valeurs et notre équipe dédiée à votre satisfaction</p>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <h2 class="section-title">Notre histoire</h2>
        
        <div class="about-content">
            <div class="about-text">
                <p>Fondée en 2010, Romaelys SARL s'est rapidement imposée comme un acteur clé dans les secteurs de la sécurité électronique, de l'énergie et des services de nettoyage professionnel.</p>
                <p>Notre entreprise est née de la volonté de fournir des solutions intégrées et innovantes pour répondre aux besoins croissants des professionnels en matière d'environnement de travail optimal.</p>
                <p>Au fil des années, nous avons élargi nos compétences et notre champ d'action pour couvrir aujourd'hui plusieurs domaines d'expertise complémentaires.</p>
            </div>
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Équipe Romaelys">
            </div>
        </div>
        
        <div class="about-content">
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Services Romaelys">
            </div>
            <div class="about-text">
                <h3>Nos domaines d'expertise</h3>
                <p><strong>Sécurité électronique :</strong> Systèmes de surveillance et de protection pour les entreprises.</p>
                <p><strong>Énergie :</strong> Solutions innovantes pour une gestion optimale de l'énergie.</p>
                <p><strong>Nettoyage professionnel :</strong> Services complets pour des espaces de travail impeccables.</p>
                <p><strong>Informatique :</strong> Support technique et solutions digitales sur mesure.</p>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="values-container">
            <h2 class="section-title">Nos valeurs</h2>
            
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <h3>Excellence</h3>
                    <p>Nous nous engageons à fournir des services de la plus haute qualité, en respectant les normes les plus strictes.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-leaf"></i>
                    </div>
                    <h3>Écologie</h3>
                    <p>Dans nos services de nettoyage comme dans tous nos domaines d'activité, nous privilégions des solutions respectueuses de l'environnement.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h3>Équipe</h3>
                    <p>Nos collaborateurs sont notre force. Nous investissons dans leur formation et leur bien-être au travail.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>Nous adoptons les dernières technologies pour améliorer continuellement nos services.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <h2 class="section-title">Notre équipe</h2>
        
        <div class="team-grid">
            <div class="team-card">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=987&q=80" class="team-image" alt="Directeur général">
                <div class="team-info">
                    <h3>Jean Dupont</h3>
                    <p>Directeur Général</p>
                    <p>Fondateur de Romaelys avec 20 ans d'expérience dans le secteur.</p>
                </div>
            </div>
            
            <div class="team-card">
                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=987&q=80" class="team-image" alt="Responsable nettoyage">
                <div class="team-info">
                    <h3>Marie Lambert</h3>
                    <p>Responsable Services de Nettoyage</p>
                    <p>15 ans d'expérience dans le nettoyage professionnel.</p>
                </div>
            </div>
            
            <div class="team-card">
                <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" class="team-image" alt="Responsable sécurité">
                <div class="team-info">
                    <h3>Thomas Martin</h3>
                    <p>Responsable Sécurité Électronique</p>
                    <p>Expert en systèmes de sécurité depuis 12 ans.</p>
                </div>
            </div>
            
            <div class="team-card">
                <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?ixlib=rb-4.0.3&auto=format&fit=crop&w=987&q=80" class="team-image" alt="Responsable RH">
                <div class="team-info">
                    <h3>Sophie Leroy</h3>
                    <p>Responsable Ressources Humaines</p>
                    <p>En charge du recrutement et du bien-être des équipes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2>Prêt à travailler avec nous ?</h2>
        <p>Que vous cherchiez nos services ou à rejoindre notre équipe, nous sommes à votre écoute.</p>
        
        <div class="cta-buttons">
            <a href="index.php#service" class="cta-button cta-button-primary">Nos services</a>
            <a href="nos_offres.php" class="cta-button cta-button-secondary">Nos offres d'emploi</a>
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