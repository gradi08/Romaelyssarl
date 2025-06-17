<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Secteurs & Services</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e0e0e0;
      font-family: Arial, sans-serif;
    }
    .section-title {
      color: red;
      font-weight: bold;
      text-align: center;
      margin-top: 50px;
    }
    .section-title::after {
      content: "";
      display: block;
      width: 40px;
      height: 6px;
      background: #3c3c3c;
      margin: 10px auto;
      border-radius: 5px;
    }
    .icon-check {
      color: #fff;
      background-color: #3c3c3c;
      border-radius: 50%;
      padding: 8px;
      margin-right: 10px;
    }
    .list-group-item {
      background-color: transparent;
      border: none;
      font-weight: bold;
    }
  </style>
</head>
<body>

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
    <h2 class="section-title text-danger">Nous mettons à votre disposition</h2>
    <div class="row">
      <div class="col-md-4">
        <ul class="list-group">
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Paysagistes Et Jardiniers</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Personnel De Ménage</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Techniciens De Surface</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Secrétaire De Direction</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Caissiers Compteurs</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Agents Commerciaux</li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="list-group">
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Électricien</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Plombier</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Nounou</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Manutentionnaire</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Chauffeurs</li>
          <li class="list-group-item"><i class="fas fa-circle-check icon-check"></i>Informaticiens</li>
        </ul>
      </div>
      <div class="col-md-4">
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

  <!-- Bootstrap JS (si besoin) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
