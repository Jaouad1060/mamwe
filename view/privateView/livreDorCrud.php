<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Livre D'or";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";
// var_dump($allLivreDor);
?>

<!-- HTML -->

<!-- nav bar de l'admin -->
<?php include_once '../view/include/privateNav.php'; ?>

<!-- titre -->
<h1><?= $title ?></h1>

<!-- Message erreur ou validation des actions : -->
<?php if (isset($response)): ?>
    <h4><?= $response ?></h4>
<?php endif; ?> 

<!-- le rest : -->

<?php if(!empty($allLivreDor)) :?>
    <table>
        <thead>
            <tr>
                <th>Nom et/ou présnom </th>
                <th>E-mail</th>
                <th>Message</th>
                <th>Date</th>
                <th>Effacer</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($allLivreDor as $message): ?>
            <tr>
                <td><?= $message->getMwNameLivreDor() ?></td>
                <td><?= $message->getMwMailLivreDor() ?></td>
                <td><?= $message->getMwMessageLivreDor() ?></td>
                <td><?= date('d/m/Y', strtotime($message->getMwDateLivreDor())) ?></td>
                <td><button><a onclick="void(0);let a=confirm('Voulez-vous vraiment supprimer \'<?= $message -> getMwNameLivreDor() ?>\' ?'); if(a){ document.location = '?p=livredorCrud&message-delete=<?= $message -> getMwIdLivreDor() ?>'; };" href="#">Effacer</a></button></td>
            </tr>
        <?php endforeach; ?> 
        </tbody>
    </table>
<?php endif; ?>

<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";