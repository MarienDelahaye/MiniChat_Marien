<!DOCTYPE html>
<html>
<header>
<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">MiniChat Marien</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="minichat.php">Accueil</a></li>
      </ul>
    </div>
  </nav>
  </header>
    <head>
        <meta charset="utf-8" />
        <title>MiniChat Marien</title>
        <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input class="waves-effect waves-light btn" type="submit" value="Envoyer" />
	</p>
    </form>
    
    <?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'marien_delahaye');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');
while ($donnees = $reponse->fetch())
{
  ?>


    <p>
      <strong><?= htmlspecialchars($donnees['pseudo']) ; ?></strong> : <?php echo htmlspecialchars($donnees['message']) ; ?>
    </p>

<?php
}

$reponse->closeCursor();

?>
    </body>

    <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">MiniChat par Marien</h5>
                <p class="grey-text text-lighten-4">MiniChat Utilisant une base de données.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Liens utile.</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="">Google</a></li>
                  <li><a class="grey-text text-lighten-3" href="">YouTube</a></li>
                  <li><a class="grey-text text-lighten-3" href="">Twitch</a></li>
                  <li><a class="grey-text text-lighten-3" href="">GitHub</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            Réalisé par Marien
            <a class="grey-text text-lighten-4 right" href=""></a>
            </div>
          </div>
        </footer>
                
    </html>