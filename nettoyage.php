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
    <title>Romaelys - Services de Nettoyage Professionnel</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --text-color: #333;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        
        /* Hero Section avec image de fond améliorée */
        .cleaning-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            padding: 150px 20px;
            text-align: center;
            position: relative;
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .cleaning-hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        
        .cleaning-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 25px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .cleaning-hero .lead {
            font-size: 1.3rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        
        .hero-btn {
            background-color: var(--secondary-color);
            color: white;
            padding: 12px 30px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .hero-btn:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        /* Services Section */
        .services-container {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
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
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .service-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            padding: 30px;
            text-align: center;
            border: 1px solid #eee;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .service-icon {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }
        
        .service-card:hover .service-icon {
            transform: scale(1.1);
        }
        
        .service-card h3 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .service-card p {
            color: #666;
            margin-bottom: 0;
        }
        
        /* Why Choose Us Section */
        .why-choose-us {
            background-color: var(--light-color);
            padding: 80px 20px;
            background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), 
                        url('https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .advantages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 40px auto 0;
        }
        
        .advantage-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-left: 4px solid var(--secondary-color);
        }
        
        .advantage-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .advantage-card h3 {
            color: var(--secondary-color);
            margin-bottom: 15px;
            font-size: 1.4rem;
            font-weight: 600;
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(44, 62, 80, 0.9)), 
                        url('https://images.unsplash.com/photo-1581093196270-c1a2b5d16d3b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px 20px;
            position: relative;
        }
        
        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .cta-section p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
        }
        
        .cta-button {
            display: inline-block;
            background: var(--secondary-color);
            color: white;
            padding: 15px 40px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            border: 2px solid var(--secondary-color);
        }
        
        .cta-button:hover {
            background: transparent;
            color: white;
            border-color: white;
            transform: translateY(-3px);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .cleaning-hero {
                padding: 100px 20px;
                min-height: 60vh;
                background-attachment: scroll;
            }
            
            .cleaning-hero h1 {
                font-size: 2.2rem;
            }
            
            .cleaning-hero .lead {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .cta-section {
                padding: 60px 20px;
            }
            
            .cta-section h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
     <?php include 'includes/header.php'; ?>
    <!-- Hero Section avec image de fond -->
    <section class="cleaning-hero">
        <div class="cleaning-hero-content">
            <h1>Service de Nettoyage et Entretien Professionnel</h1>
            <p class="lead">Nous sommes une entreprise spécialisée dans le nettoyage et l'entretien des espaces professionnels. Notre mission est de fournir des services de qualité, efficaces et respectueux de l'environnement.</p>
            <!-- <a href="#services" class="hero-btn">Découvrez nos services</a> -->
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-container" id="services">
        <h2 class="section-title">Nos services Nettoyages</h2>
        
        <div class="services-grid">
            <!-- Service 1 -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="bi bi-building"></i>
                </div>
                <h3>Nettoyage de bureaux</h3>
                <p>Nous intervenons régulièrement pour maintenir vos bureaux propres et ordonnés. Cela inclut le nettoyage des sols, des vitres, des meubles, et des équipements.</p>
            </div>
            
            <!-- Service 2 -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="bi bi-door-open"></i>
                </div>
                <h3>Entretien des espaces communs</h3>
                <p>Hall d'entrée, couloirs, sanitaires, et autres zones partagées. Nous assurons un environnement impeccable dans tous vos espaces communs.</p>
            </div>
            
            <!-- Service 3 -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="bi bi-hammer"></i>
                </div>
                <h3>Nettoyage de fin de chantier</h3>
                <p>Après des travaux, nous nous chargeons du nettoyage pour que votre espace soit immédiatement prêt à être utilisé.</p>
            </div>
            
            <!-- Service 4 -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h3>Désinfection des surfaces</h3>
                <p>Pour assurer la sécurité sanitaire, nous proposons des services de désinfection des surfaces fréquemment touchées.</p>
            </div>
            
            <!-- Service 5 -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="bi bi-gear"></i>
                </div>
                <h3>Nettoyage industriel</h3>
                <p>Services spécialisés pour les industries (ateliers, entrepôts, etc.) avec des protocoles adaptés à chaque environnement.</p>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us">
        <div class="container">
            <h2 class="section-title">Pourquoi choisir notre service</h2>
            
            <div class="advantages-grid">
                <!-- Advantage 1 -->
                <div class="advantage-card">
                    <h3>Professionnalisme et Expertise</h3>
                    <p>Nos équipes sont formées et expérimentées pour répondre aux normes de qualité les plus strictes.</p>
                </div>
                
                <!-- Advantage 2 -->
                <div class="advantage-card">
                    <h3>Respect de l'environnement</h3>
                    <p>Nous utilisons des produits écologiques et des techniques qui respectent l'environnement.</p>
                </div>
                
                <!-- Advantage 3 -->
                <div class="advantage-card">
                    <h3>Flexibilité</h3>
                    <p>Nous adaptons nos services selon vos besoins, en fonction de la taille de vos locaux et de vos horaires.</p>
                </div>
                
                <!-- Advantage 4 -->
                <div class="advantage-card">
                    <h3>Disponibilité et réactivité</h3>
                    <p>Nous assurons une disponibilité pour intervenir à tout moment, selon vos demandes urgentes ou planifiées.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Prêt à profiter de nos services de nettoyage professionnel ?</h2>
            <p>Contactez-nous dès aujourd'hui pour un devis gratuit et personnalisé.</p>
            <a href="#" class="cta-button">Demander un devis</a>
        </div>
    </section>
    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>