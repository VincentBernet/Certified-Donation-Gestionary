<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.T.Accueil.css" />
		<title>Transverse</title>
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
      		include('header.php');
      		// Flash Message if log-in, or not, or specification on what is wrong with users input
			  flashMessage();
			  if (isset($_GET['Message'])) {
				echo('<span style = "color:red;weight:bold;text-align:center;" >Déconnexion effectué !</span>');
			  }
    	?> 


		<br /><br /><br />
		<div class="slideshow-container">
			<div class="mySlides fade">
				<div class="numbertext">1/3</div>
				<a  href="https://dondesang.efs.sante.fr/le-don-de-sang"  target="_blank"> <img style="width:100%;border: 6px solid #101540;" src="Image/DonSang.jpg" alt="Blood's ONG" /> </a>
				<div class="textBlanc">
					ONG 1 : Une simple donation pour améliorer la campagne de don du Sang
					sauvera peut être un de vos proche.
				</div>
			</div>

			<div class="mySlides fade">
				<div class="numbertext">2/3</div>
				<a href="https://www.allianceurgences.org/?reserved_tracking=20URG2SE&gclid=Cj0KCQjwnv71BRCOARIsAIkxW9EIoYIAqcV9Xf0FWQuLQ_XyGFvlMWLAmAPQAcFBgK0Emd00VId3glMaAj4nEALw_wcB" target="_blank" >
					<img class="ImageSlide" style="width:130%;border: 6px solid #101540;" src="Image/Cov19.jpg" alt="CoronaVirus's ONG" />
				</a>
				<div class="text">ONG 2 : Campagne de dons contre le CoronaVirus</div>
			</div>

			<div class="mySlides fade">
				<div class="numbertext">3/3</div>
				<a href="https://www.helloasso.com/associations/actions-pour-l-education-des-enfants-au-gabon/formulaires/1/en"target="_blank" >
					<img class="ImageSlide" style="width:105%;border: 6px solid #101540;" src="Image/ONG.png" alt="Gabon's ONG" />
				</a>
				<div class="textBlanc">ONG 3 : Soutenir l'Education au Gabon</div>
			</div>

			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>

		<br />

		<div style="text-align: center">
			<span class="dot" onclick="currentSlide(1)"></span>
			<span class="dot" onclick="currentSlide(2)"></span>
			<span class="dot" onclick="currentSlide(3)"></span>
		</div>
		<br />

		<!--JavaScript Carroussel/SlideShow-->
		<script>
			var slideIndex = 1;
			showSlides(slideIndex);

			function plusSlides(n) {
				showSlides((slideIndex += n));
			}

			function currentSlide(n) {
				showSlides((slideIndex = n));
			}

			function showSlides(n) {
				var i;
				var slides = document.getElementsByClassName('mySlides');
				var dots = document.getElementsByClassName('dot');
				if (n > slides.length) {
					slideIndex = 1;
				}
				if (n < 1) {
					slideIndex = slides.length;
				}
				for (i = 0; i < slides.length; i++) {
					slides[i].style.display = 'none';
				}
				for (i = 0; i < dots.length; i++) {
					dots[i].className = dots[i].className.replace(' active', '');
				}
				slides[slideIndex - 1].style.display = 'block';
				dots[slideIndex - 1].className += ' active';
			}
		</script>
		<br /><br />
		</div>
		<footer>
			<img id="logo2" src="Image/GDC.png" alt="logo Transverse" /><span class="Partenaire"> Plateforme
			de Don et de Certification d'organisation humanitaire, méthode de
			payement associatif innovant</span>
		</footer>
	</body>
</html>
