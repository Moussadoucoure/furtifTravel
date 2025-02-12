<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
 <title><?=$titre?></title>
</head>
<body>
    <header>
      <nav class="navbar navbar-dark navbar-expand-lg  bg-dark">
        <div class="container-fluid" >
          <a class="navbar-brand text-white" href="#">FURTIF-TRAVEL</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon navbar-light"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
              <li class="nav-item nav-link <?php if ($page == 'home'): ?> active <?php endif;?>">
                <a class="nav-link active text-white" aria-current="page" href="../index.php">Accueil</a>
              </li>
              <li class="nav-item nav-link px-2 <?php if ($page == 'pageEmploi') {echo 'active';}?>">
                <a class="nav-link text-white" href="../liste-emplois.php">Emploi</a>
              </li>
              <li class="nav-item nav-link px-2 <?php if ($page == 'pageMembre') {echo 'active';}?>">
              <a class="nav-link text-white" href="../membre.php">Membre</a>
              </li>
              <li class="nav-item nav-link px-2 <?php if ($page == 'pageContact') {echo 'active';}?>">
                <a class="nav-link text-white" href="../contact.php">Contact</a>
              </li>
              <li class="nav-item nav-link px-2 <?php if ($page == 'pageRecherche') {echo 'active';}?>">
                <a class="nav-link text-white" href="recherche-avancee.php">Recherche Avancée</a>
              </li>


            </ul>
            <div id="recherche-rapide">
            <form class="d-flex" role="search" action="traitement-recherche-rapide.php" method="get">
              <input class="form-control me-2" name="mot" type="search" placeholder="Recherche avancée" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Recherche</button>
            </form>
            </div>

          </div>
        </div>
      </nav>

    </header>