 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/slicebox.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
    <script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
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
    ?> 
      
    <div class ="Text1" >
      Notre association a pour but d'aider à la fois les associations humanitaires et à la fois le grand public suceptible de donner. Dans cette optique nous proposer aux organismes humanitaire une solution de payement innovante et avantageuse, avec des taux quasi-nulle (sans profit de notre part). 
      <br/>
      <br/>
      Seulement les associations certifié par nos soins avec l'aide de certification officiel d'état auront la possibilité d'utiliser nos services. Cela permettant aux donateurs d'être sur du bien fondé de l'utilisation de leur dons, avec en plus de cela un suivi du projet soutenue. 
      Vous souhaitez en savoir plus sur notre système de cerfification ? C'est par ici : <br/><br/>  <a href = "Certif.html" class = "Partenaire">Notre Systeme de Certification </a> 

      <br/>
      <br/>

      Ce projet est née lors d'une initiative académique : Le projet Transverse d'Efrei Paris. Le choix du sujet étant complétement libre, notre équipe de 5 étudiants a décidé de se pencher sur une plateforme de donnation innovante afin de faciliter les dons et les initiatives carritatives.<br/><br/><strong> Voici notre équipe de choc </strong>:
      <div class="container">
      <div class="wrapper">
        <ul id="sb-slider" class="sb-slider">
          <li>
            <a href="http://www.flickr.com/photos/strupler/2969141180" target="_blank"><img src="Image/T.Image.Jeanpierre1.png" alt="image1"/></a>
            <div class="sb-description">
              <h3>Chief Happiness Officer : Tran Jean-Pierre</h3>
            </div>
          </li>
          <li>
            <a href="http://www.flickr.com/photos/strupler/2968268187" target="_blank"><img src="Image/T.Image.Theo1.jpg" alt="image2"/></a>
            <div class="sb-description">
              <h3>Back End Developper : Bedouet Theo</h3>
            </div>
          </li>
          <li>
            <a href="http://www.flickr.com/photos/strupler/2968114825" target="_blank"><img src="Image/T.Image.Kevin1.jpg" alt="image1"/></a>
            <div class="sb-description">
              <h3>Project Manager : Leflock Kevin</h3>
            </div>
          </li>
          <li>
            <a href="http://www.flickr.com/photos/strupler/2968122059" target="_blank"><img src="Image/T.Image.Siedou1.jpg" alt="image1"/></a>
            <div class="sb-description">
              <h3>Co Back End Dev : Koulibali Siedou</h3>
            </div>
          </li>
          <li>
            <a href="http://www.flickr.com/photos/strupler/2969119944" target="_blank"><img src="Image/T.Image.Vincent1.jpg" alt="image1"/></a>
            <div class="sb-description">
              <h3>Front End Developper : Bernet Vincent</h3>
            </div>
          </li>
        </ul>

        <div id="shadow" class="shadow"></div>

        <div id="nav-arrows" class="nav-arrows">
          <a href="#">Next</a>
          <a href="#">Previous</a>
        </div>

      </div><!-- /wrapper -->


    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.slicebox.js"></script>
    <script type="text/javascript">
      $(function() {
        
        var Page = (function() {

          var $navArrows = $( '#nav-arrows' ).hide(),
            $shadow = $( '#shadow' ).hide(),
            slicebox = $( '#sb-slider' ).slicebox( {
              onReady : function() {

                $navArrows.show();
                $shadow.show();

              },
              orientation : 'r',
              cuboidsRandom : true
            } ),
            
            init = function() {

              initEvents();
              
            },
            initEvents = function() {

              // add navigation events
              $navArrows.children( ':first' ).on( 'click', function() {

                slicebox.next();
                return false;

              } );

              $navArrows.children( ':last' ).on( 'click', function() {
                
                slicebox.previous();
                return false;

              } );

            };

            return { init : init };

        })();

        Page.init();

      });
    </script>
    </div>

    </div>
    <footer>
         <img id="logo2" src="Image/GDC.png" alt="logo Transverse" /> Plateforme de Don et de Certification d'organisation humanitaire, méthode de payement associatif innovant
    </footer>
    </body>
</html>