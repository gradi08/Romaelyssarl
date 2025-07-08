<head>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <script src="asset/css/bootstrap.bundle.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="index.php">Romaelyssarl</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active px-3" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="index.php#service">Nos services</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" id="jobsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jobs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="jobsDropdown">
                        <li><a class="dropdown-item" href="nos_offres.php">Toutes les offres</a></li>
                        <li><a class="dropdown-item" href="service_domicile.php">Services à domicile</a></li>
                        <li><a class="dropdown-item" href="nettoyage.php">Services de nettoyage</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="apropos.php">À propos</a>
                </li>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                  <?php if ($_SESSION['user_type'] === 'admin'): ?>
                    <li class="nav-item">
                      <a href="dashboard.php" class=" nav-link px-3">Tableau de bord</a>
                    
                      </li>
                                <?php else: ?>   
                                 <li class="nav-item">
                    
                                   <a href="profile.php" class="nav-item">Mon compte</a>
                </li> 
                                <?php endif; ?>
                    <li class="nav-item ms-lg-3 my-2 my-lg-0">
                        <a href="logout.php" class="btn btn-outline-light">Déconnexion</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item ms-lg-3 my-2 my-lg-0">
                        <a href="login.php" class="btn btn-light text-danger fw-bold">Connexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
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
            <a class="nav-link" href="apropos.php">A propos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <style>
    /* Navigation */
    .navbar {
        padding: 1rem 0;
        transition: all 0.3s;
    }
    
    .navbar.scrolled {
        padding: 0.5rem 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .nav-link {
        position: relative;
        font-weight: 500;
    }
    
    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        background-color: white;
        transition: all 0.3s;
        transform: translateX(-50%);
    }
    
    .nav-link:hover::after,
    .nav-link.active::after {
        width: 50%;
    }
    
    /* Carrousel */
    .carousel-caption {
        bottom: 0;
        left: 0;
        right: 0;
        padding-bottom: 8rem;
    }
    
    .carousel-indicators button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: none;
        margin: 0 8px;
        background-color: rgba(255, 255, 255, 0.5);
    }
    
    .carousel-indicators .active {
        background-color: white;
        transform: scale(1.3);
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-size: 60%;
    }
    
    /* Social icons */
    .social-icons a {
        transition: transform 0.3s;
        display: inline-block;
    }
    
    .social-icons a:hover {
        transform: translateY(-5px) scale(1.2);
        color: #ff4d4f !important;
    }
    
    /* Boutons */
    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.9);
        color: #dc3545 !important;
    }
</style>

<!-- Scripts améliorés -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation de la navbar au scroll
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    
    // Animation des éléments du carrousel
    const carousel = document.getElementById('heroCarousel');
    carousel.addEventListener('slide.bs.carousel', function (e) {
        const activeSlide = e.relatedTarget;
        const elements = activeSlide.querySelectorAll('.animate__animated');
        
        elements.forEach(el => {
            el.style.opacity = '0';
        });
        
        setTimeout(() => {
            elements.forEach(el => {
                el.style.opacity = '1';
            });
        }, 100);
    });
});
</script>