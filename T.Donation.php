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
			  require_once "utilitaire.php";
		  ?>

		  <!-- We call our Header -->
		  <?php
      	include('header.php');
      	// Flash Message if log-in, or not, or specification on what is wrong with users input
        flashMessage();
        
        if(isset($_POST["Association"]))
        {
          $sql = "INSERT INTO don(user_id,Association,NumCarte,DateExpi,Titulaire,Crypto,Montant) VALUES (:user_id,:Association,:NumCarte,:DateExpi,:Titulaire,:Crypto,:Montant)";
          $result1 = $pdo->prepare($sql);
          $result1->execute(array
          (
            ':user_id' => $_SESSION['user_id'],
            ':Association' => htmlentities($_POST['Association']),
            ':NumCarte'  => htmlentities($_POST['NumCarte']),
            ':DateExpi' => htmlentities($_POST['DateExpi']),
            ':Titulaire' => htmlentities($_POST['Titulaire']),
            ':Crypto' => htmlentities($_POST['Crypto']),
            ':Montant' => htmlentities($_POST['Montant']),
          ));

          $_SESSION["message"]="<div style='color:green; text-align: center;'>Your Donation has been accepted !</div>";
          header("Location: T.Accueil.php");
          return;
        }
        

    	?> 
    	

    <div class="form-container">
  <div id="Cforum">
    <form method="post">
      <p>
        <input class="form-control" name="Association" type="text" placeholder="Association" required /><br>
        <input class="form-control" name="NumCarte" type="number" placeholder="Numéro de Carte •••• •••• •••• •••• required /><br>
        <input class="form-control" name="DateExpi" type="text" placeholder="Date d'Expiration" required /><br>
        <input class="form-control" name="Titulaire" type="text" placeholder="Titulaire" required /><br>
        <input class="form-control" name="Crypto" type="password" placeholder="Cryptogrammme visuel" required /><br>
        <input class="form-control" name="Montant" type="number" placeholder="Montant" required /><br> <br>
        <button >Valider le don ?</button>

    
      </p>
    </form>
  </div>
</div>
      
<br/>
</div>
      <footer>
         <img id="logo2" src="Image/GDC.png" alt="logo Transverse" /> Plateforme de Don et de Certification d'organisation humanitaire, méthode de payement associatif innovant
    </footer>
    </body>
</html>