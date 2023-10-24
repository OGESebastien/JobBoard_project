
<?php

// Ici, vous pouvez inclure tous les contrôleurs de modèle nécessaires
require dirname(__FILE__) . '/../controller/user_controller.php';
require dirname(__FILE__) . '/../controller/annonces_controller.php';
require dirname(__FILE__) . '/../controller/entreprise_controller.php';
require dirname(__FILE__) . '/../controller/info_relative_controller.php';

// Ajoutez les autres contrôleurs nécessaires ...

$userController = new UserController();
$annonceController = new AnnoncesController();
$entrepriseController = new EntrepriseController();
$infoController = new InfoRelativeController();
// Instanciez les autres contrôleurs ...

// Obtenez les données nécessaires pour afficher 
$users = $userController->getAllUsers();
$annonces = $annonceController->getAllAnnonces();
$entreprise = $entrepriseController->getAllEntreprises();
$info = $infoController->getAllInfo();
// Obtenez les autres données nécessaires ...

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord d'administration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            background: #333;
            color: #fff;
            padding: 1rem 0;
        }

        section {
            border: 1px solid #ddd;
            background: #f9f9f9;
            margin: 10px;
            padding: 20px;
            border-radius: 5px;
        }

        section h3 {
            color: #333;
        }

        section div {
            margin-bottom: 10px;
        }

        section a {
            text-decoration: none;
            background: #333;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
           .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
<div class="navbar">
        <div>
            <h2>Tableau de bord d'administration</h2>
        </div>
        <div>
            <a href="http://localhost:3001/home">Home</a>
        </div>
    </div>

<section>
    <h3>Utilisateurs</h3>

    <!-- Lien pour créer un nouvel utilisateur -->
    <div>
        <a href="create_user.php">Créer un nouvel utilisateur</a>
    </div>
    <hr>

    <?php foreach ($users as $user) { ?>
        <div>
            ID: <?php echo $user['id_user']; ?><br>
            Nom: <?php echo $user['nom']; ?><br>
            Prénom: <?php echo $user['prenom']; ?><br>
            Email: <?php echo $user['mail']; ?><br>
            Role: <?php echo $user['role']; ?><br>
            <a href="edit_user.php?id=<?php echo $user['id_user']; ?>">Modifier</a> | <a href="delete.php?type=user&id=<?php echo $user['id_user']; ?>">Supprimer</a>
        </div>
        <hr>
    <?php } ?>
</section>


<section>
    <h3>Annonces</h3>
    
    <!-- Lien pour créer une nouvelle annonce -->
    <div>
        <a href="create_annonce.php">Créer une nouvelle annonce</a>
    </div>
    <hr>

    <?php foreach ($annonces as $annonce) { ?>
        <div>
            ID: <?php echo $annonce['id_annonces']; ?><br>
            Titre: <?php echo $annonce['titre']; ?><br>
            Description: <?php echo $annonce['description']; ?><br>
            Salaire: <?php echo $annonce['salaire']; ?> €<br>
            Lieu: <?php echo $annonce['lieu']; ?><br>
            Temps de travail: <?php echo $annonce['temps_travail']; ?> heures<br>
            Domaine: <?php echo $annonce['domaine']; ?><br>
            Type de poste: <?php echo $annonce['type_poste']; ?><br>
            <a href="edit_annonce.php?id=<?php echo $annonce['id_annonces']; ?>">Modifier</a> | <a href="delete.php?type=annonce&id=<?php echo $annonce['id_annonces']; ?>">Supprimer</a>
        </div>
        <hr>
    <?php } ?>
</section>



<section>
    <h3>Entreprises</h3>
    
    <!-- Lien pour créer une nouvelle entreprise -->
    <div>
        <a href="create_entreprise.php">Créer une nouvelle entreprise</a>
    </div>
    <hr>

    <?php foreach ($entreprise as $ent) { ?>
        <div>
            ID: <?php echo $ent['id_entreprise']; ?><br>
            Nom: <?php echo $ent['nom']; ?><br>
            Description: <?php echo $ent['description']; ?><br>
            <a href="edit_entreprise.php?id=<?php echo $ent['id_entreprise']; ?>">Modifier</a> | <a href="delete.php?type=entreprise&id=<?php echo $ent['id_entreprise']; ?>">Supprimer</a>
        </div>
        <hr>
    <?php } ?>
</section>

<section>
    <h3>Informations Relatives</h3>

    <!-- Lien pour créer une nouvelle information relative -->
    <div>
        <a href="create_info_relative.php">Créer une nouvelle information relative</a>
    </div>
    <hr>

    <?php foreach ($info as $information) { ?>
        <div>
            ID: <?php echo $information['id_info_relative']; ?><br>
            Courriel Envoyé: <?php echo $information['courriel_envoye']; ?><br>
            Personne Annonce Concernée: <?php echo $information['pers_annonce_concerne']; ?><br>
            <a href="edit_info_relative.php?id=<?php echo $information['id_info_relative']; ?>">Modifier</a> | <a href="delete.php?type=info&id=<?php echo $information['id_info_relative']; ?>">Supprimer</a>
        </div>
        <hr>
    <?php } ?>
</section>
</body>
</html>
