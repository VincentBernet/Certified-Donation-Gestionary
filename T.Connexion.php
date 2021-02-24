
<!DOCTYPE html> <!-- Précision obligatoire sur la page -->
<html>

<head>
    <!-- En tête de la page -->
    <meta charset="utf-8" />
    <!--Encoding pour afficher les caractères spéciaux -->
    <link rel="stylesheet" href="background.css" /> <!-- insertion du CSS  -->

    <title>Connexion</title> <!-- Le titre de la page -->

    <!-- insertion du CSS de bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=IbHxtKnoGJ5PeANnFZGQDbFMQEeuhm_yUrsyNKYeezdbsDtwLXCuSI1FBKxWtnWf6qYKgyB7zyfbRc-mgJC65mQSxCllMc33PvmY64DgYMTMDQArUFHacs7IjyvzvqsSF1rT-6HhZd_nZwJFDuOWhw" charset="UTF-8"></script></head>

<body>
<div id="GlobalContainer">
  <?php
    session_start();
    session_regenerate_id(true);

    // We connect to our data base via our function in an external files
    require_once "T.pdo.php";

    // We call our personnal librairy
    require_once "Utilitaire.php";


     if ( isset($_POST['Email']) && isset($_POST['Password']) )
     {
        if (strpos($_POST["Email"],'@') === false)
        {
            $_SESSION["message"] ='<span style="color:red;weight:bold;text-align:center;">Email must have an at-sign (@)</span>';
            header("Location: T.Connexion.php");
            return;
        }
        else 
        {
        
        $check = $_POST["Password"];
        $stmt = $pdo->prepare('SELECT user_id, Email FROM users WHERE Email = :Email AND Password = :Password');
          $stmt->execute(array( ':Email' => $_POST['Email'], ':Password' => $check));

          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          if ( $row!==false ) {
              // Right password so we redirect the browser to our index.php and add $_POST value to our Session
              $_SESSION['Email']=$_POST['Email'];
              $_SESSION['FirstName'] = $row['FirstName'];
              $_SESSION['user_id'] = $row['user_id'];
              $_SESSION["message"]='<span style="color:green;weight:bold;text-aligne:center;">Logged In.</span><br>';
              // Save our error_log just in case
              error_log("Login sucess ".$_POST["email"]."$check");
              header("Location: T.Accueil.php");
              return;
          } // in case of Bad password, load login page again, with an error message via our session
            else {

              error_log("Login fail ".$_POST["email"]."$check");
              $_SESSION["message"] = '<span style="color:red;weight:bold;text-aligne:center;">Password and Email don\'t match (Incorrect Password or Incorrect Email).';
              unset($_SESSION["email"]);
              header("Location: T.Connexion.php");
              return;
          }
        }
     }
  ?>
   <!-- We call our Header -->
   <?php
      include('header.php');
      // Flash Message if log-in, or not, or specification on what is wrong with users input
      flashMessage();
    ?> 
    <div class="form-container">
        <h1 style="text-align: center; font-size: 300%; font-family: Calibri; font-weight: 700;">Connexion </h1>

        <div id="Cforum">
            <form method="post"> <a href="T.Inscription.php" style="color:blue;"> Vous n'avez pas encore de compte ? Créez en un ici ! </a>
                <p>
                    <input class="form-control" name="Email" type="text" placeholder="Email" required /><br>
                    <input class="form-control" name="Password" type="password" placeholder="Mot de Passe" required /><br>
                    <input type="submit" />
                </p>
            </form>
        </div>
    </div>
  
    <br><br><br><br>
    </div>
		<footer>
			<img id="logo2" src="Image/GDC.png" alt="logo Transverse" /><span class="Partenaire"> Plateforme
			de Don et de Certification d'organisation humanitaire, méthode de
			payement associatif innovant</span>
		</footer>
</body>

</html>