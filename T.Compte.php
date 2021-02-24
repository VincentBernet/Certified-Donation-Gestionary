 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
         <link rel="stylesheet" href="Style.T.Accueil.CSS" />
        <title>Mon Compte GDC</title>
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
    		  include('header.php');
      		// Flash Message if log-in, or not, or specification on what is wàrong with users input
          flashMessage();

    	?> 

    <?php
    // Display profile information from the eponymic table.
    
$stmt = $pdo->prepare("SELECT FirstName,LastName,Email,Password,PhoneNumber FROM users  WHERE user_id = :user_id");
$stmt -> execute(array
(
  ':user_id' => $_SESSION['user_id']
));

while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) )
{
  echo('<div class ="Text1" >

  <table class="Tableau1" summary="Information Personnel">
  <thead class="Perso" ></thead>
  <tfoot class="Perso"></tfoot>
  <tbody>
    <tr>
  <td class="Perso">Nom de Famille : '.htmlentities($row['LastName']).'</td>
  <td class="Perso">Prénom : '.htmlentities($row['FirstName']).'</td>
  <td class="Perso">Adresse mail : '.htmlentities($row['Email']).'</td>
    </tr>
    <tr>
      <td class="Perso">Mot de Passe: '.htmlentities($row['Password']).'</td>
      <td class="Perso">Numéro de téléphone : '.htmlentities($row['PhoneNumber']).'</td>
      <td class="Perso">Identifiants banquaires : Pour votre sécurité nous ne les enregistrons pas !</td>
    </tr>
</tbody>
</table>');
}
// Display an Historique of user donnation from the donnation table.
echo('
<br/> <br/>
<table summary="Historique de Donnation">
<caption> </caption>

  <thead>
    <tr>
     <th>Historique de vos donnations</th>
     <th>Association</th>
     <th>Montant</th>
     <th>Date</th>
    </tr>
  </thead>

  <tfoot>
    <tr>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
    </tr>
  </tfoot>
');

$stmt = $pdo->prepare("SELECT Association, Montant, Date_Don FROM don  WHERE user_id = :user_id");
$stmt -> execute(array
(
  ':user_id' => $_SESSION['user_id']
));

while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) )
{
  echo('
  <tbody>
    <tr>
     <th>Transaction Certifié</th>
     <td>'.htmlentities($row['Association']).'</td>
     <td>'.htmlentities($row['Montant']).'</td>
     <td>'.htmlentities($row['Date_Don']).'</td>
    </tr>
  </tbody>

');
}
echo('</table>');
?>
    </div></div>
		<footer>
			<img id="logo2" src="Image/GDC.png" alt="logo Transverse" /><span class="Partenaire"> Plateforme
			de Don et de Certification d'organisation humanitaire, méthode de
			payement associatif innovant</span>
		</footer>
    </body>
</html>
