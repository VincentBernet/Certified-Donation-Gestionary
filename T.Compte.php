 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
         <link rel="stylesheet" href="Style.T.Accueil.CSS" />
        <title>Mon Compte GDC</title>
    </head>

    <body>
    	 
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
    	?> 

    	<div class ="Text1" >

      <table class="Tableau1" summary="Information Personnel">
      <thead class="Perso" ></thead>
      <tfoot class="Perso"></tfoot>
      <tbody>
      	<tr>
      <td class="Perso">Nom de Famille :<div class = "Info1"></div></td>
      <td class="Perso">Prénom :<div class = "Info2"></div></td>
      <td class="Perso">Adresse mail : <div class = "Info3"> </div></td>
        </tr>
        <tr>
        	<td class="Perso">Identifiant: <div class = "Info4"> </div></td>
        	<td class="Perso">Numéro de téléphone : <div class = "Info5"> </div></td>
        	<td class="Perso">Identifiants banquaires : <div class = "Info6"> </div></td>
        </tr>
	</tbody>
  	</table>
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

  <tbody>
    <tr>
     <th>Transaction Certifié</th>
     <td>Secours Catholique</td>
     <td>150.00 €</td>
     <td>11/06/2020</td>
    </tr>
    <tr>
     <th>Transaction Certifié</th>
     <td></td>
     <td></td>
     <td></td>
    </tr>
  </tbody>

  <tbody>
    <tr>
     <th>Transaction Certifié</th>
     <td></td>
     <td></td>
     <td></td>
    </tr>
    <tr>
     <th>Transaction Certifié</th>
     <td></td>
     <td></td>
     <td></td>
    </tr>
  </tbody>

</table>




    </div>
    	 <footer>
         <img id="logo2" src="Image/GDC.png" alt="logo Transverse" /> Plateforme de Don et de Certification d'organisation humanitaire, méthode de payement associatif innovant
    </footer>
    </body>
</html>
