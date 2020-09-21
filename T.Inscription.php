
<!DOCTYPE html> <!-- Précision obligatoire sur la page -->
<html>

<head>
  <!-- En tête de la page -->
  <meta charset="utf-8" />
  <!--Encoding pour afficher les caractères spéciaux -->
  <link rel="stylesheet" href="background.css" /> <!-- insertion du CSS  -->

  <title>Inscription GDC</title> <!-- Le titre de la page -->

  <!-- insertion du CSS de bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=msnur84yDBSkOw8K92Dhe48DXXDl0S3ftPtRoMootWW5WkID8SmEkkPJ6cU37eIJ9T4qGprlQiyRTswUCNkniDTbkcXe64731_pCzNeKGMJV_gvpZTWmffPVOWLEVpvzEUYWb39PXvw4eillkBHBYg" charset="UTF-8"></script></head>

<body>
  <div id="GlobalContainer">
  <?php
    session_start();
    session_regenerate_id(true);

    // We connect to our data base via our function in an external files
    require_once "T.pdo.php";

    // We call our personnal librairy
    require_once "utilitaire.php";
    
    if(isset($_POST["FirstName"])&&isset($_POST["Email"])&&isset($_POST["Password"])&&isset($_POST["Password2"]))
    {
      if (strpos($_POST["Email"],'@') === false)
        {
            $_SESSION["message"] ='<span style="color:red;weight:bold;text-align:center;">Email must have an at-sign (@)</span>';
            header("Location: T.Inscription.php");
            return;
        }
      else if ($_POST["Password"] != $_POST["Password2"])
        {
            $_SESSION["message"] ='<span style="color:red;weight:bold;text-align:center;">Your Confirmation Password doen\'t match initial one</span>';
            header("Location: T.Inscription.php");
            return;
        }
      else
        {
          $sql = "INSERT INTO users(FirstName,LastName,Email,Password,PhoneNumber) VALUES (:FirstName,:LastName,:Email,:Password,:PhoneNumber)";
        $result1 = $pdo->prepare($sql);
        $result1->execute(array
        (

        ':FirstName' => htmlentities($_POST['FirstName']),
        ':LastName'  => htmlentities($_POST['LastName']),
        ':Email' => htmlentities($_POST['Email']),
        ':Password' => htmlentities($_POST['Password']),
        ':PhoneNumber' => htmlentities($_POST['PhoneNumber']),
        ));

        $_SESSION["message"]="<div style='color:green; text-align: center;'>You are register. Welcome !</div>";
        header("Location: T.Accueil.php");
        return;
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
    <h1 style="text-align: center; font-size: 300%; font-family: Calibri; font-weight: 700;"> Inscription </h1>

    <div id="Cforum">
      <form method="post">
        <p>
          <input class="form-control" name="FirstName" type="text" placeholder="Prénom(s)" required /><br>
          <input class="form-control" name="LastName" type="text" placeholder="Nom de Famille" required /><br>
          <input class="form-control" name="Email" type="email" placeholder="Adresse email" required /><br>
          <input class="form-control" name="PhoneNumber" type="tel" placeholder="Numéro de téléphone" required /><br>
          <input class="form-control" name="Password" type="password" placeholder="Mot de passe" required /><br>
          <input class="form-control" name="Password2" type="password" placeholder="Confirmation" required /><br>
          <input type="submit" class="btn btn-primary btn-primary btn-block" />
        </p>
    </form>
  </div>

  </div>
  <br><br><br>
  </div>
  <footer>
      <img id="logo2" src="Image/GDC.png" alt="logo Transverse" /> 
      Plateformede Don et de Certification d'organisation humanitaire, méthode de payement associatif innovant
  </footer>
<!-- insertion JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>