<?php 
    require_once 'config.php';

    if(!empty($_POST['pseudo']) && !empty($_POST['rating']) && !empty($_POST['comment'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $rating = htmlspecialchars($_POST['rating']);
        $comment = htmlspecialchars($_POST['comment']);

        $insert = $bdd->prepare('INSERT INTO feedbacks(pseudo, rating, comment) VALUES(:pseudo, :rating, :comment)');
        $insert->execute(array(
            'pseudo' => $pseudo,
            'rating' => $rating,
            'comment' => $comment
        ));
        header('Location:offers.php?reg_err=success');
        die();
    }