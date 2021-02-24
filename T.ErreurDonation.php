<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="Style.T.Accueil.css">
</head>

<body>
<div id="GlobalContainer">
      <?php
			  session_start();
    		session_regenerate_id(true);

    		// We connect to our data base via our function in an external files
    		require_once "T.pdo.php";

    		// We call our personnal librairy
			  require_once "Utilitaire.php";
		  ?>

		  <!-- We call our Header -->
		  <?php
        header( "refresh:2;url=T.Connexion.php" );
      	include('header.php');
      	// Flash Message if log-in, or not, or specification on what is wrong with users input
        flashMessage();
        ?>
        <br><br><br><br><br>
        <span style="position:absolute;text-align:center;left:15%;right:15%;    font-family: Antic;
    font-size: 3vmin;
    font-weight: 600;
    color: red;

">Vous devez d'abord vous connecter avant de pouvoir effectuer un don pour votre association de coeur !</span>

       
</div>
<footer>
			<img id="logo2" src="Image/GDC.png" alt="logo Transverse" /><span class="Partenaire"> Plateforme
			de Don et de Certification d'organisation humanitaire, méthode de
			payement associatif innovant</span>
		</footer>
</body>
</html>
