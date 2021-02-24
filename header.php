<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.T.Accueil.css" />
		<title>Transverse</title>
	</head>

	<body>
		<header>
			<a href="T.Accueil.php"
				><img id="logo" src="Image/logo.png" alt="logo Transverse" />
			</a>
			<nav>
				<ul class="nav_links">
					<li>
						<div class="dropdown">
							<div class="Partenaire">ONG Certifiées</div>
							<div class="dropdown-content">
								<a href="Certif.php"> Certification </a>
								<a href="https://www.croix-rouge.fr/" target="_blank">La Croix Rouge</a>
								<a href="https://www.fondation-abbe-pierre.fr/en/home" target="_blank">Fondation Abbé Pierre</a>
								<a href="https://www.worldwildlife.org/" target="_blank">WWF</a>
							</div>
						</div>
					</li>
					<li><a href="T.Presentation.php"> Qui sommes nous ? </a></li>
					<?php
						
						if (isset($_SESSION["Email"]))
						{
							echo('<li><a href="T.Donation.php"> Donation Rapide </a></li>');
							echo('<li><a href="T.Compte.php"> Mon Compte </a></li>');
							echo('<li><a href="T.Déconnexion.php"> Déconnexion </a></li>');
							
						}
						else
						{
							echo('<li><a href="T.ErreurDonation.php" class="forbiden"> Donation Rapide </a></li>');
							echo('<li><a href="T.Connexion.php"> Connexion </a></li>');
							echo('<li><a href="T.Inscription.php"> Inscription </a></li>');
						}
					?>
					<li>
						<a class="cta" href="mailto:vincent.bernet@efrei.net"
							><button>Nous Contacter</button>
						</a>
					</li>
				</ul>
			</nav>
        </header>
 