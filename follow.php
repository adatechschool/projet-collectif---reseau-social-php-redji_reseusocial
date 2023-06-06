<?php
// Gestion des abonnements dans la base de donnée
if (isset($_POST['follow'])) {
    $connectedId = $_SESSION['connected_id'];
    if ($_POST['follow']==="OK") { // il faut ajouter un abonnement
        $abonnementSQL = "INSERT INTO followers
        (id, followed_user_id, following_user_id)
        VALUES (NULL, $userId, $connectedId);";
    } 
    if ($_POST['follow']==="NOK") { // il faut supprimer un abonnement
        $abonnementSQL = "DELETE FROM followers
        WHERE followed_user_id=$userId 
        AND following_user_id=$connectedId;";
    }
    // Exécution de la requête SQL
    $ok = $mysqli->query($abonnementSQL);
    if ( ! $ok)
    {
        echo "Impossible d'effectuer l'abonnement/désabonnement: " . $mysqli->error;
    } else
    {
        if ($_POST['follow']==="OK") {
            echo "user " . $connectedId ." s'est abonné à " . $user['alias'];
        } else {
            echo "user " . $connectedId ." s'est désabonné de " . $user['alias'];
        }
    }
}
// Ajout d'un formulaire pour que l'utilisateur loggé s'abonne à une autre personne 
// depuis le mur de cette personne (ou se désabonne).
if (isset($_SESSION['connected_id']) && $_SESSION['connected_id']!=="" && $_SESSION['connected_id']!=="".$userId):
    $connectedId = $_SESSION['connected_id'];
    // on vérifie si la personne loggée est déjà abonnée ou pas
    $isAbonneSQL = "
    SELECT * 
    FROM followers 
    WHERE followed_user_id=$userId 
    AND following_user_id=$connectedId
    ";
    $isAbonneInfo = $mysqli->query($isAbonneSQL);
    if (!$isAbonneInfo) {
        echo("Echec de la requete : " . $mysqli->error);
    } else { // on affiche des boutons pour s'abonner ou se désabonner ?>
        <form action="wall.php" method="post">
            <input type='hidden' name='user_id' value=<?php echo $userId ?>>
    <?php if ($isAbonneInfo->num_rows > 0) { // Déjà abonné ?>
            <input type='hidden' name='follow' value='NOK'>
            <input type='submit' value="Se désabonner">
    <?php } else { // Pour s'abonner ?>
            <input type='hidden' name='follow' value='OK'>
            <input type='submit' value="S'abonner">
        </form> 
<?php }
    } 
endif; 
?>