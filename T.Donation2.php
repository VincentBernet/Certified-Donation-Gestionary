<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 ;
}



.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
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
<br><br>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Information Donateur pour fiscalité</h3>
            <label for="fname"><i class="fa fa-user"></i> Nom Prénoms</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Adresse de Facture</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> Ville</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">Département</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Code Postal</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="fname"><i class="fa fa-user"></i> Association</label>
            <input type="text" id="fname" name="Association" placeholder="Don du Sang">
            <label for="fname"><img src="Image/dona.png" style="width: 3vmin;"/> Montant de la Donation</label>
            <input type="text" id="fname" name="Montant" placeholder="50.00 €">
            <label for="cname">Titulaire</label>
            <input type="text" id="cname" name="Titulaire" placeholder="John More Doe">
            <label for="ccnum">Numéro de Carte</label>
            <input type="text" id="ccnum" name="NumCarte" placeholder="••••  ••••  ••••  •••• ">
            
            <div class="row">
              <div class="col-50">
                <label for="expyear">Date d'Expiration</label>
                <input type="text" id="expyear" name="DateExpi" placeholder="06/21">
              </div>
              <div class="col-50">
                <label for="cvv">Cryptogrammme visuel</label>
                <input type="text" id="cvv" name="Crypto" placeholder="•••">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Je souhaite recevoir ma facture par adresse mail
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  </div>
</div><br><br>
</div>
<footer>
			<img id="logo2" src="Image/GDC.png" alt="logo Transverse" /><span class="Partenaire"> Plateforme
			de Don et de Certification d'organisation humanitaire, méthode de
			payement associatif innovant</span>
		</footer>
</body>
</html>
