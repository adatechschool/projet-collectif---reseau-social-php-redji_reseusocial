<?php
session_start();
if (isset($_SESSION['connected_id'])) {
    $connectedId = $_SESSION['connected_id'];
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>ReSoC - Connexion</title> 
        <meta name="author" content="Julien Falconnet">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
<header>
            <a href='admin.php'><img src="resoc.jpg" alt="Logo de notre réseau social"/></a>
            <nav id="menu">
                <a href="news.php">Actualités</a>
            <?php if(isset($connectedId) && $connectedId!==""): ?>
                <a href="wall.php?user_id=<?php echo $connectedId; ?>">Mur</a>
                <a href="feed.php?user_id=<?php echo $connectedId; ?>">Flux</a>
            <?php endif; ?>
                <a href="tags.php?tag_id=1">Mots-clés</a>
            </nav>
        <?php if(isset($connectedId) && $connectedId!==""): ?>
            <nav id="user">
                <a href="#">▾ Profil</a>
                <ul>
                    <li><a href="settings.php?user_id=<?php echo $connectedId; ?>">Paramètres</a></li>
                    <li><a href="followers.php?user_id=<?php echo $connectedId; ?>">Mes suiveurs</a></li>
                    <li><a href="subscriptions.php?user_id=<?php echo $connectedId; ?>">Mes abonnements</a></li>
                    <li><a href="logout.php">Se déconnecter</a></li>
                </ul>
            </nav>
        <?php endif; ?>
</header>
